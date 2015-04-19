<?php

	if(!is_user_logged_in())
	{
		echo '<div class="padd10"><div class="padd10">';
		echo sprintf(__('You are not logged in. In order to bid please <a href="%s">login</a> or <a href="%s">register</a> an account','ProjectTheme'),
		get_bloginfo('siteurl').'/wp-login.php',get_bloginfo('siteurl').'/wp-login.php?action=register');
		echo '</div></div>';
		exit;	
	}



	global $wpdb,$wp_rewrite,$wp_query;
	$pid = $_GET['pid'];
	
	global $current_user;
	get_currentuserinfo();
	$cid = $current_user->ID;
	$bidding_points = get_user_meta( $cid, 'bidding_points', true );
	$cwd = str_replace('wp-admin','',getcwd());
	$post = get_post($pid);
	//echo $bidding_points;
	//---------
	/*
	if($bidding_points == "0" || $bidding_points == "")
	{

    	$args = array(
            'post_type' =>'pricing',
            'posts_per_page' => -1
    	);
    	$pricing = get_posts($args);	
    		//echo'<pre>';print_r($pricing);exit;

	?>
	<div class="container">
	<div class="row">
    			<?php foreach($pricing as $price ) { 


    				?>
    			<div class="col-md-4 col-lg-4">
					<!-- PRICE ITEM -->
					<div class="panel price panel-red">
						<div class="panel-heading  text-center">
						<h3><?php echo $price->post_title; ?></h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>$<?php echo get_post_meta( $price->ID, 'amount' , true ); ?> / month</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item">Biding Points - <?php echo get_post_meta( $price->ID, 'bids_points', true); ?> </li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-success" href="#">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->
					
					
				</div>
				
				<?php } ?>
				
				
					<!-- /PRICE ITEM -->
					
					
				</div>
				
				
			
            
</div>
<?php }else {
	//---------
	*/
	if($post->post_author == $cid)
	{
		echo '<div class="padd10"><div class="padd10" id="msg">';
		echo sprintf(__('You cannot submit proposals to your own projects.','ProjectTheme'));
		echo '</div></div>';
		exit;	
	}
	
	//----------------------
	
	$cwd .= 'wp-content/uploads';
	
	
	
	$query = "select * from ".$wpdb->prefix."project_bids where uid='$cid' AND pid='$pid'";
	$r = $wpdb->get_results($query); $bd_plc = 0;
	
	if(count($r) > 0) { $row = $r[0]; $bid = $row->bid; $description = $row->description; $days_done = $row->days_done; $bd_plc = 1; }
	
	do_action('ProjectTheme_display_bidding_panel', $pid);
	
	//====================================================================
	
 
	$is_it_allowed = true;
	$is_it_allowed = apply_filters('ProjectTheme_is_it_allowed_place_bids', $is_it_allowed);
	
	if($is_it_allowed != true):
	
	do_action('ProjectTheme_is_it_not_allowed_place_bids_action');	
?>



<?php else: ?>	


<script type="text/javascript">

function check_submits()
{
	if(!jQuery('#submits_crt_check').is(':checked'))
	{
		alert("<?php _e('Please accept you can do the work.','ProjectTheme'); ?>");
		return false;
	}
	
	if( jQuery("#days_done").val().length == 0 ) 
	{
		alert("<?php _e('Please type in the number of days.','ProjectTheme'); ?>");
		return false;	
	}
	
	if( jQuery("#bid").val().length == 0 ) 
	{
		alert("<?php _e('Please type in a bid value.','ProjectTheme'); ?>");
		return false;	
	}
	
	
	return true;
}


</script>

<div class="super_bid_panel">

	<div class="bid_panel_box_title"><?php echo sprintf(__("Submit Your Proposal",'ProjectTheme')); ?></div>
  	<div class="bid_panel" >
    <?php
	
	$do_not_show = 0;
	$uid = $cid;
	
	$projectTheme_enable_custom_bidding = get_option('projectTheme_enable_custom_bidding');
	if($projectTheme_enable_custom_bidding == "yes")
	{
		$ProjectTheme_get_project_primary_cat = ProjectTheme_get_project_primary_cat($pid);	
		$projectTheme_theme_bidding_cat_ = get_option('projectTheme_theme_bidding_cat_' . $ProjectTheme_get_project_primary_cat);
		
		if($projectTheme_theme_bidding_cat_ > 0)
		{
			$ProjectTheme_get_credits = ProjectTheme_get_credits($uid);
			
			if(	$ProjectTheme_get_credits < $projectTheme_theme_bidding_cat_) { $do_not_show = 1;	
				$prc = projecttheme_get_show_price($projectTheme_theme_bidding_cat_);
			}
		}
		
	}
    
	if($do_not_show == 1 and $bd_plc != 1)
	{
		echo '<div class="padd10" id="msg">';
		echo sprintf(__('You need to have at least %s in your account to bid. <a href="%s" id="click-here">Click here</a> to deposit money.','ProjectTheme'), $prc, get_permalink(get_option('ProjectTheme_my_account_payments_id')));		
		echo '</div>';
	}
	else
	{
		?>
    
                <div class="padd10">
                <form onsubmit="return check_submits();" method="post" action="<?php echo get_permalink($pid); ?>"> 
                <input type="hidden" name="control_id" value="<?php echo base64_encode($pid); ?>" /> 
                	<ul class="project-details" style="width:100%">
		                           
                            <li>
								<h3><?php _e('Your Bid','ProjectTheme'); ?></h3>
								<p><input type="text" name="bid" id="bid" class="bid_field" value="<?php echo $bid; ?>" size="10" /> 
                                <?php 
								
								$currency = projectTheme_currency();
								$currency = apply_filters('ProjectTheme_currency_in_bidding_panel', $currency);
								
								echo $currency; ?>
                                </p>
							</li>
                            
                            <li>
								<h3><?php _e('Days to Complete','ProjectTheme'); ?></h3>
								<p><input type="text" name="days_done" id="days_done" class="bid_field" value="<?php echo $days_done; ?>" size="10" /> 
                              
                                </p>
							</li>
                           <?php
						   
						   	$ProjectTheme_enable_project_files = get_option('ProjectTheme_enable_project_files');
						   
						   	if($ProjectTheme_enable_project_files != "no"):
						   
						   ?> 
                            
                            <li>
								<h3><?php _e('Attach Files','ProjectTheme'); ?></h3>
								 
                                <!-- ################### -->
                                
         <div class="cross_cross2">



	<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/dropzone.js"></script>     
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/dropzone.css" type="text/css" />
    
 
    
    
    <script>
 
	
	jQuery(function() {

Dropzone.autoDiscover = false; 	 
var myDropzoneOptions = {
  maxFilesize: 15,
    addRemoveLinks: true,
	acceptedFiles:'.zip,.pdf,.rar,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.psd,.ai',
    clickable: true,
	url: "<?php bloginfo('siteurl') ?>/?my_upload_of_project_files=1",
};
 
var myDropzone = new Dropzone('div#myDropzoneElement', myDropzoneOptions);

myDropzone.on("sending", function(file, xhr, formData) {
  formData.append("author", "<?php echo $cid; ?>"); // Will send the filesize along with the file as POST data.
  formData.append("ID", "<?php echo $pid; ?>"); // Will send the filesize along with the file as POST data.
});

   
    <?php

	if(empty($cid)) $cid = -1;
	
	$args = array(
	'order'          => 'ASC',
	'post_type'      => 'attachment',
	'post_parent'    => $pid,
		'post_author'    => $cid,
	'meta_key'		 => 'is_bidding_file',
	'meta_value'	 => '1',
	'numberposts'    => -1,
	'post_status'    => null,
	);
	
	$attachments = get_posts($args);
	
	if($pid > 0)
	if ($attachments) {
	    foreach ($attachments as $attachment) {
		$url = $attachment->guid;
		$imggg = $attachment->post_mime_type; 
		
		if('image/png' != $imggg && 'image/jpeg' != $imggg)
		{
			$url = wp_get_attachment_url($attachment->ID);
 			if($attachment->post_author == $cid)
			{
			
			?>

					var mockFile = { name: "<?php echo $attachment->post_title ?>", size: 12345, serverId: '<?php echo $attachment->ID ?>' };
					myDropzone.options.addedfile.call(myDropzone, mockFile);
					myDropzone.options.thumbnail.call(myDropzone, mockFile, "<?php echo bloginfo('template_url') ?>/images/file_icon.png");
					 
			
			<?php
			}
	  
	}
	}}


	?>
   


myDropzone.on("success", function(file, response) {
    /* Maybe display some more file information on your page */
	 file.serverId = response;
	 file.thumbnail = "<?php echo bloginfo('template_url') ?>/images/file_icon.png";
	 
	   
  });
  
  
myDropzone.on("removedfile", function(file, response) {
    /* Maybe display some more file information on your page */
	  delete_this2(file.serverId);
	 
  });  	
	
	});
	
	</script>

    <script type="text/javascript">
	
	function delete_this2(id)
	{
		 jQuery.ajax({
						method: 'get',
						url : '<?php echo get_bloginfo('siteurl');?>/index.php/?_ad_delete_pid='+id,
						dataType : 'text',
						success: function (text) {   jQuery('#image_ss'+id).remove();  }
					 });
		  //alert("a");
	
	}

	
 
	
	
	</script>

	<?php _e('Click the grey area below to add project files. Images are not accepted.','ProjectTheme') ?>
    <div class="dropzone dropzone-previews" id="myDropzoneElement" ></div>
 
    
	</div>                        
           
 
                                
                                
                                
                                <!-- ################### -->
                                
							</li>
                            <?php endif; ?>
                            
                            <li>
								<h3><?php _e('Description','ProjectTheme'); ?></h3>
								<p>
                                
                                <textarea name="description2" cols="28" class="bid_field" rows="3"><?php echo $description; ?></textarea><br/>
                             
                                <input type="hidden" name="control_id" value="<?php echo base64_encode($pid); ?>" />
                                </p>
							</li>
                            
                            
                            <li>
								<h3> </h3>
								<p>
                                
                                
                                <input type="checkbox" name="accept_trms" id="submits_crt_check" value="1" /><?php _e("I can perform work where/when described in post.",'ProjectTheme'); ?> </p>
							</li>
                            
                            <li>
								<h3> </h3>
								<p>
                                
                                
                                <input class="my-buttons" id="submits_crt" type="submit" name="bid_now_reverse" value="<?php _e("Place Bid",'ProjectTheme'); ?>" /></p>
							</li>
                            
                	</ul>
                   </form>
                </div> <?php } ?>
                </div> </div> <?php endif; //} ?>
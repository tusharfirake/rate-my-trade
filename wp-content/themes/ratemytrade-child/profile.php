
<?php

/**
Template Name: TradesmenSignupTemplate

This template is used for display current openings on home page.
*/


get_header();

if($_POST){
	
	$sanitized_user_login = $_POST['email'];
	$random_password = wp_generate_password( $length=6, $include_standard_special_chars=false );
	$user_email = $_POST['email'];
	$capa = 'service_provider';
	$user_id = wp_create_user( $sanitized_user_login, $random_password, $user_email, $capa );
	$user = new WP_User($user_id);
	$user->set_role($capa);
    update_user_meta( $user_id, 'user_tp', 'service_provider' );
        //send mail to user
        $userdata = (get_userdata( $user_id));  
        $message = '<html>
                      <body>
                        <h4>Thank You for Registering</h4>
                        <p>Username : '.$userdata->user_login.'</p>
                        <p>Password : '.$random_password.'</p>
                        <p>Link : <a href="http://ratemytrade.brandsout.com/wp-login.php"> http://ratemytrade.brandsout.com/wp-login.php </a></p>
                      </body>
                    </html>';
      
        
        $headers = 'From: Rate My Trade <sujeet@initsolutions.co.in>\r\n';
        $headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        if($user_id)
        {
        	wp_mail( $userdata->user_email, 'Confirmation of Registration',$message , $headers );
        	update_user_meta( $user_id, 'first_name', $_POST['first_name']);
        	update_user_meta( $user_id, 'last_name', $_POST['last_name']);
        	update_user_meta( $user_id, 'trading_name', $_POST['trading_name']);
        	update_user_meta( $user_id, 'postal_code', $_POST['postal_code']);
        	update_user_meta( $user_id, 'trade_category', $_POST['trade_category']);
        	if(isset($_POST['monthly_newsletter']))
        		update_user_meta( $user_id, 'monthly_newsletter', 'yes');
        	else
        		update_user_meta( $user_id, 'monthly_newsletter', 'no');	     	
        }
        	
	
}
	


?>
<div id="main_wrapper">
	<div id="bg">
		<div id="main" class="container">
            <div id="register_my_box" class="my_box3">
            	<div id="trdesmen-signup" class="padd10_signup">
                    <div class="box_content1">
                		<table style="width:100%;">
						    <tbody >
						    	<tr id="tab_list"  >
							         
							        <td id="personal_det_td" role="presentation" class="active" >
							        	<a role="tab" class="tab_link" data-toggle="tab" href="#sectionA" aria-controls="sectionA" role="tab" >Personal details</a>
							        </td>
							        <td id="trade_td" class="">
							        	<a role="tab" class="tab_link" data-toggle="tab" href="#sectionB" aria-controls="sectionB" role="tab">Trades</a>
							        </td>
							        <td id="profile_td" class="">
							        	<a role="tab" class="tab_link" data-toggle="tab" href="#sectionC" aria-controls="sectionC" role="tab">Profile</a>
							        </td>
							        <td id="business_det_td" class="">
							        	<a role="tab" class="tab_link" data-toggle="tab" href="#sectionD" aria-controls="sectionD" role="tab">Business details</a>
							        </td>
							        <td id="thank_you_td" class="">
							        	<a role="tab" class="tab_link" data-toggle="tab" href="#sectionE" aria-controls="sectionE" role="tab">Thank you</a>
							        </td>
						    	</tr>
						    </tbody>
						</table> 

						<!-- <ul class="nav nav-tabs" role="tablist">
    						<li role="presentation" class="active">
    							<!-- <a role="tab" class="tab_link" data-toggle="tab" href="#sectionA">Personal details</a> -->
						      
    							<!-- <a href="#sectionA" aria-controls="home" role="tab" data-toggle="tab">Personal details</a>
    						</li>
						    <li role="presentation">
						    	<!-- <a role="tab" class="tab_link" data-toggle="tab" href="#sectionB">Trades</a> -->
						       
						    	<!-- <a href="#sectionB" id="trade" aria-controls="profile" role="tab" data-toggle="tab"  class="tab_link">Trades</a>
						    </li>
						    <li role="presentation"> -->
						    	<!-- <a role="tab" class="tab_link" data-toggle="tab" href="#sectionB">Trades</a> -->
						       
						    	<!-- <a href="#sectionC" aria-controls="profile" role="tab" data-toggle="tab"  class="tab_link">Profile</a>
						    </li>
						    <li role="presentation"> -->
						    	<!-- <a role="tab" class="tab_link" data-toggle="tab" href="#sectionB">Trades</a> -->
						       
						    	<!-- <a href="#sectionD" aria-controls="profile" role="tab" data-toggle="tab"  class="tab_link">Business Details</a>
						    </li>
						    <li role="presentation"> -->
						    	<!-- <a role="tab" class="tab_link" data-toggle="tab" href="#sectionB">Trades</a> -->
						       
						    	<!-- <a href="#sectionE" aria-controls="profile" role="tab" data-toggle="tab"  class="tab_link">Thank You</a>
						    </li> -->
     					<!-- </ul>  -->
                    	 
					    <div class="tab-content">
					    	<form id="tradesmen_signup_form" method="POST">
						        <div id="sectionA" class="tab-pane  in active">
						        	
					        		<div class="row">
							        	<div class="tab-content_col col-xs-12 col-sm-12 col-md-12 col-lg-12">
							        		<h4>First step to winning more work</h4>
							        	</div>
							        </div>
						        	<div class="row">
							        	<div class="tab-content_col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		<p><label>First Name*<label></p>
							        		<p class="tradesmen-signup-input">
							        			<input id="tradesmen_first_name" type="text" name="first_name" value="" required>
							        		</p>
							        	</div>
							        	<div class="tab-content_col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		<p><label>Last Name*<label></p>
							        		<p  class="tradesmen-signup-input">
							        			<input id="tradesmen_last_name" type="text" name="last_name" value="" required>
							        		</p>
							        	</div>
						        	</div>
						        	<div class="row">
							        	<div class="tab-content_col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		<p><p><label>Trading Name*<label></p>
							        		<p class="tradesmen-signup-input">
							        			<input id="tradesmen_trading_name" type="text" name="trading_name" value="" required>
							        		</p>
							        	</div>
							        	<div class="tab-content_col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		<p><label>Email*<label></p>
							        		<p class="tradesmen-signup-input">
							        			<input id="tradesmen_email" type="email" name="email" value="" required>
							        		</p>
							        	</div>
						        	</div>
						        	<div class="row">
							        	<div class="tab-content_col  col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		<p><label>Postal Code*<label></p>
							        		<p class="tradesmen-signup-input">
							        			<input id="tradesmen_postal_code" type="text" name="postal_code" value="" required>
							        		</p>
							        	</div>
							        	<div class="tab-content_col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		
							        	</div>
						        	</div>
						        	<div class="row">
							        	<div class="tab-content_col  col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		<input id="personal_details_checkbox" type="checkbox" name="monthly_newsletter" value="yes"> <span> I'd like monthly newsletter</span>
							        	</div>
							        	<div class="tab-content_col col-xs-12 col-sm-6 col-md-6 col-lg-6">
							        		
							        	</div>
						        	</div>
						        	<div class="row">
						        		
							        	<div id="personal_details_submit_col" class="tab-content_col  col-xs-12 col-sm-12 col-md-12 col-lg-12">
							        			<p id="error_msg" style="color:red;"></p>
							        			<a href="" id="personal_details_submit" data-toggle="tab" aria-expanded="false">SAVE AND CONTINUE</a>
							        			<a href="<?php echo get_site_url(); ?>" id="cancel" >CANCEL</a>
							           	</div>
							        </div>
							    	
						        </div>
						        <div id="sectionB" class="tab-pane">
						            
						        		<div class="row">
								        	<div class="tab-content_col col-xs-12 col-sm-12 col-md-12 col-lg-12">
								        		<h4>Solid leads tailored to your trades</h4>
								        	</div>
								        </div>
							        	<div id="traiding_radio_btns" class="row">
							        		<?php 
												$args = array(
												    'type'                     => 'project',
												    'child_of'                 => 0,
												    'parent'                   => '',
												    'orderby'                  => 'name',
												    'order'                    => 'ASC',
												    'hide_empty'               => 0,
												    'hierarchical'             => 0,
												    'exclude'                  => '',
												    'include'                  => '',
												    'number'                   => '',
												    'taxonomy'                 => 'project_cat',
												    'pad_counts'               => false 
												); 
												$categories = get_categories( $args );
											?>

											<?php foreach($categories as $category ) { ?>    
									            <div class="tab-content_col col-xs-12 col-sm-4 col-md-4 col-lg-4">
									            	<input type="radio" name="trade_category" value="<?php echo  $category->name; ?>"><label><?php echo  $category->name; ?></label><br>
									            </div>
									        <?php } ?>

								        </div>
							        	<div class="row">
								        	<div id="personal_details_submit_col" class="tab-content_col  col-xs-12 col-sm-12 col-md-12 col-lg-12">
								        			<p id="error_msg1" style="color:red;"></p>
								        			<a href="#sectionC" class="hover" id="trades_submit" data-toggle="tab" aria-expanded="false">SAVE AND CONTINUE</a>
								        			<a href="<?php echo get_site_url(); ?>" id="cancel" >CANCEL</a>
								           	</div>
								        </div>
							            
						        	
						        </div>
						        <div id="sectionC" class="tab-pane ">
						            <p>This is profile div…</p>
						            <div class="row">
							        	<div id="personal_details_submit_col" class="hover tab-content_col  col-xs-12 col-sm-12 col-md-12 col-lg-12">
							        		<p id="error_msg2" style="color:red;"></p>
							        		<a href="#sectionD" id="profile_submit" data-toggle="tab" aria-expanded="false">SAVE AND CONTINUE</a>
							        		<a href="<?php echo get_site_url(); ?>" id="cancel" >CANCEL</a>
							           	</div>
							        </div>
						        </div>
						        <div id="sectionD" class="tab-pane ">
						            <p>This is business details div…</p>
						            <div class="row">
							            <div id="personal_details_submit_col" class="hover tab-content_col  col-xs-12 col-sm-12 col-md-12 col-lg-12">
									        <p id="error_msg3" style="color:red;"></p>
									        <a href="#sectionE" id="business_details_submit" data-toggle="tab" aria-expanded="false">SAVE AND CONTINUE</a>
									        <a href="<?php echo get_site_url(); ?>" id="cancel" >CANCEL</a>
									    </div>
									</div>
						        </div>
						        <div id="sectionE" class="tab-pane ">
						            <p>Thank you for signing up</p>
						            <div class="row">
							            <div id="personal_details_submit_col" class="hover tab-content_col  col-xs-12 col-sm-12 col-md-12 col-lg-12">
									    	<input id="thank_you_submit" type="submit" value="SAVE">
									    </div>
									</div>
						        </div>
					    	</form>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

get_footer();
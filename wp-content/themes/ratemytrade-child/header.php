<?php
/***************************************************************************
*
*	ProjectTheme - copyright (c) - sitemile.com
*	The only project theme for wordpress on the world wide web.
*
*	Coder: Andrei Dragos Saioc
*	Email: sitemile[at]sitemile.com | andreisaioc[at]gmail.com
*	More info about the theme here: http://sitemile.com/products/wordpress-project-freelancer-theme/
*	since v1.2.5.3
*
***************************************************************************/


?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?> >
	<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    
	<title>
	<?php wp_title(  ); ?>
    </title>
 
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,300,600' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,900,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>

	<?php

		wp_head();

	?>	


	 <?php
	 	
		$ProjectTheme_color_for_footer = get_option('ProjectTheme_color_for_footer');
		if(!empty($ProjectTheme_color_for_footer))
		{
			echo '<style> #footer { background:#'.$ProjectTheme_color_for_footer.' }</style>';	
		}
		
		
		$ProjectTheme_color_for_bk = get_option('ProjectTheme_color_for_bk');
		if(!empty($ProjectTheme_color_for_bk))
		{
			echo '<style> body { background:#'.$ProjectTheme_color_for_bk.' }</style>';	
		}
		
		$ProjectTheme_color_for_top_links = get_option('ProjectTheme_color_for_top_links');
		if(!empty($ProjectTheme_color_for_top_links))
		{
			echo '<style> .top-bar { background:#'.$ProjectTheme_color_for_top_links.' }</style>';	
		}
		
		
		//----------------------
		
	 	$ProjectTheme_home_page_layout = get_option('ProjectTheme_home_page_layout');
		if(ProjectTheme_is_home()):
			if($ProjectTheme_home_page_layout == "4"):
				echo '<style>#content { float:right } #left-sidebar { float:left; }</style>';
			endif;
			
			if($ProjectTheme_home_page_layout == "5"):
				echo '<style>#content { width:100%; }  </style>';
			endif;
			
			if($ProjectTheme_home_page_layout == "3"):
				echo '<style>#content { width:395px } .title_holder { width:285px; } #left-sidebar{	float:left;margin-right:15px;}
				 </style>';
			endif;
			
			
			if($ProjectTheme_home_page_layout == "2"):
				echo '<style>#content { width:395px } #left-sidebar{ float:right } #left-sidebar{ margin-right:15px; } .title_holder { width:285px; }
				 </style>';
			endif;
		
		endif;
	 
	 
	 ?>
	 
     <script type="text/javascript">
		
		var $ = jQuery;
		
	function suggest(inputString){
	
		if(inputString.length == 0) {
			jQuery('#suggestions').fadeOut();
		} else {
		jQuery('#big-search').addClass('load');
			jQuery.post("<?php bloginfo('siteurl'); ?>/?autosuggest=1", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					jQuery('#suggestions').fadeIn();
					jQuery('#suggestionsList').html(data);
					jQuery('#big-search').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		jQuery('#big-search').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}
	
	<?php
	
	if(is_home()):
	
		$quant_slider 		= 5;
		$quant_slider_move 	= 1;
		$slider_pause 		= 5000;
		$slider_speed		= 1000;
		
		$quant_slider 		= apply_filters('ProjectTheme_quantity_slider_filter', 		$quant_slider);
		$quant_slider_move 	= apply_filters('ProjectTheme_quantity_slider_move_filter', $quant_slider_move);
		$slider_pause 		= apply_filters('ProjectTheme_slider_pause_filter', 		$slider_pause);
		$slider_speed 		= apply_filters('ProjectTheme_slider_speed_filter', 		$slider_speed);
		
	?>
	
	
		jQuery(function(){
	  jQuery('#slider2').bxSlider({
		auto: true,
		speed: <?php echo $slider_speed; ?>,
		pause: <?php echo $slider_pause; ?>,
		autoControls: false,
		displaySlideQty: <?php echo $quant_slider; ?>,
    	moveSlideQty: <?php echo $quant_slider_move; ?>
	  });
	  
	  jQuery("#project-home-page-main-inner").show();
	  
	  
	});	
	
	<?php endif; ?>
	
 
  
			(function($){
			jQuery(document).ready(function(){
			
			jQuery("#cssmenu").menumaker({
			   title: "<?php _e('User Menu','ProjectTheme'); ?>",
			   format: "multitoggle"
			});
			
			jQuery("#cssmenu2").menumaker({
			   title: "<?php _e('Main Menu','ProjectTheme'); ?>",
			   format: "multitoggle"
			});
			
			});
			})(jQuery);
				
	</script>
    
	
    <!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/all-ie.css" />
    <![endif]-->
    
    <?php do_action('ProjectTheme_before_head_tag_closes'); ?>
	</head>
	<body <?php body_class(); ?> >

	<?php do_action('ProjectTheme_after_body_tag_open'); ?>

	<div id="container">
		<!-- start header area -->
		
		<div id="header">
			<div class="hiring">
				<div class="top-bar container">

					<div class="social">
						<?php
						global $current_user;
      					if (is_user_logged_in()) { 
      						global  $current_user;
      						//echo'<pre>';print_r($current_user);
      						$uid = $current_user->ID;
      						$usern = $current_user->user_login;
      						$user_url = $current_user->user_url;
      						
      						$explode = explode('/',$user_url);
      						
      						if($user_url != '' && $explode[2] == 'www.facebook.com') {
      							$value = $explode[4];
      							$img = 'https://graph.facebook.com/'.$value.'/picture?type=normal';
      							$imgPic = '<img width="40" height="40" border="0" src="'.$img.'" />';
      						}elseif ($user_url == '') {
								$pic = ProjectTheme_get_avatar($uid,50,50);      							
								$imgPic = '<img width="40" height="40" border="0" src="'.$pic.'" />';
      						}else {
      							$imgPic = get_avatar( $uid, 32 );	
      						}
      						
      						?>
      					<?php echo $imgPic?>
      					<span style="color:#FFF; margin-right:5px;"><?php echo $usern; ?></span>
      					<span class="login-logout"><a href="<?php echo wp_logout_url( home_url() ) ?>">Log out</a> </span>
      					<?php } else {  ?>
      					<span class="login-logout">
      						<a href="<?php echo home_url().'/wp-login.php' ?>" >Login / </a><a href="<?php echo home_url().'/wp-login.php?action=register' ?>" >Signup</a>
      					</span>
      					<?php }?>
      					<!--
						<span class="fb"><a href="#"></a></span>
						<span class="twitter"><a href="#"></a></span>
						<span class="feed"><a href="#"></a></span>-->
					</div>

					<div class="hiring-note">
					We're hiring! Marketers, customer service and software developers. 
					</div>

				</div>
			</div>
			<div class="top-bar-bg">
				<div class="top-bar container"> 
                
                	<div class="my-logo">
                    	
                        <?php
							$logo = get_option('projectTheme_logo_url');
							if(empty($logo)){
								
								$logo = get_bloginfo('template_url').'/images/logo.png';
								$logo = apply_filters('ProjectTheme_logo_url', $logo);
							}
						
							$logo_options = '';
							$logo_options = apply_filters('ProjectTheme_logo_options', $logo_options);	
							
						?>
						<a href="<?php bloginfo('siteurl'); ?>"><img id="logo" alt="<?php bloginfo('name'); ?>" <?php echo $logo_options; ?> src="<?php echo $logo; ?>" /></a>
                    
                    </div>
                
                                  
                    <div class="top-links" id="cssmenu">
                    	<?php
			 
							$menu_name = 'primary-projecttheme-main-header';
							
							if(is_user_logged_in()){
								wp_nav_menu( array('menu_id' => 'jetmenu_m', 'menu_class' => 'jetmenua bluea' , 'fallback_cb' => '', 'menu' => 'primary-navigation', 'container' => false, 'walker' => new Project_Walker_Nav_Menu() ) );
							}else{
								wp_nav_menu( array('menu_id' => 'jetmenu_m', 'menu_class' => 'jetmenua bluea' , 'fallback_cb' => '', 'menu' => 'main-menu', 'container' => false, 'walker' => new Project_Walker_Nav_Menu() ) );
							}
						?>		
					</div>
                    
                    
				</div>
			</div> <!-- end top-bar-bg -->
			
            </div>
           
        
       
        
        
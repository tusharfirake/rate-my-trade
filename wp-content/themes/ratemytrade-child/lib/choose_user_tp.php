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


if(!is_user_logged_in()) { wp_redirect(get_bloginfo('siteurl')."/wp-login.php"); exit; }
//-----------


	//----------

	global $wpdb,$wp_rewrite,$wp_query;

//---------------------------------

	global $current_user;
	get_currentuserinfo();
	$uid = $current_user->ID;

	if(isset($_POST['submit']))
	{
		
		update_user_meta($uid, 'user_tp', $_POST['user_tp']);		
		update_user_meta($uid, 'bidding_points', '3');	
		
		$user = new WP_User($uid);
		$user->set_role($_POST['user_tp']);
		
		wp_redirect(get_permalink(get_option('ProjectTheme_my_account_payments_id')));
		exit;	
	}
	
	
//==========================

get_header();

?>
<div class="clear10"></div>
<div id="bg">	
	<div id="main" class="container">
		<div id="choose_user_tp_box" class="my_box3">
	       	<div class="padd10">
	           	<div  class="box_title choose_user_tp_center">
	           		<?php  printf(__("Choose User Type",'ProjectTheme')); ?>
	           	</div>
	            <div class="box_content choose_user_tp_center">   
	               <?php
					   printf(__("Choose your user type",'ProjectTheme'));
				   ?> 
	                
	                <div class="clear10">
	                </div>
	               
	               	<form id="choose_user_tp_form" method="post" > 
	                    <input type="radio" class="do_input" name="user_tp" id="user_tp" value="service_provider" checked="checked" /> 
	                    <?php _e('Service Provider', 'ProjectTheme'); ?><br/>
	               		<input type="radio" class="do_input" name="user_tp" id="user_tp" value="business_owner" />
	               		<?php _e('Service Contractor','ProjectTheme'); ?><br/>
	                    <br/>
	                    <input id="choose_user_tp_submit" type="submit" value="Submit" name="submit" />
	                </form>
	    		</div>
			</div>
		</div>
	</div>
</div>    
        
<div class="clear100">
</div>
            
            
<?php

get_footer();

?>                        
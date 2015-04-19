<?php


/*****************************************************************************
*
*	copyright(c) - sitemile.com - ProjectTheme
*	More Info: http://sitemile.com/p/project
*	Coder: Saioc Dragos Andrei
*	Email: andreisaioc@gmail.com
*
******************************************************************************/	
		
		if(!function_exists('ProjectTheme_do_register_scr')) {
		function ProjectTheme_do_register_scr()
		{
		  global $wpdb, $wp_query, $current_theme_locale_name;
		
		  if (!is_array($wp_query->query_vars))
			$wp_query->query_vars = array();
		
		header('Content-Type: '.get_bloginfo('html_type').'; charset='.get_bloginfo('charset'));
		
		session_start();
		  switch( $_REQUEST["action"] ) 
		  {
			
			case 'register':
			  require_once( ABSPATH . WPINC . '/registration-functions.php');
			  
				$user_login = sanitize_user( str_replace(" ","",$_POST['user_login']) );
				$user_email = trim($_POST['user_email']);
			
				$sanitized_user_login = $user_login;
		
			
				
				$errors = Project_register_new_user_sitemile($user_login, $user_email);
				
					if (!is_wp_error($errors)) 
					{	
						$ok_reg = 1;						
					}	
					
				
			  if ( 1 == $ok_reg ) 
			  {//continues after the break; 
		
				get_header();
				global $current_theme_locale_name;	
				
		?>
   <!--  <div class="page_heading_me">
        <div class="page_heading_me_inner">
            <div class="mm_inn">
            	<?php printf(__("Registration Complete - %s",$current_theme_locale_name), get_bloginfo('name')); ?> 
            </div>
        </div>
    </div>  -->
        
<div id="main_wrapper">
	<div id="bg">
		<div id="main" class="container">
			<div class="padd10">
				<div id="after_registration" class="my_box3">
			       	<div class="padd10">
			       		<div id="after_registration_contents">
							<p>
								<?php printf(__('Username: %s',$current_theme_locale_name), "<strong>" . wp_specialchars($user_login) . "</strong>") ?><br />
								<?php printf(__('Password: %s',$current_theme_locale_name), '<strong>' . __('emailed to you',$current_theme_locale_name) . '</strong>') ?> <br />
								<?php printf(__('E-mail: %s',$current_theme_locale_name), "<strong>" . wp_specialchars($user_email) . "</strong>") ?><br /><br />
								<?php _e("Please check your <strong>Junk Mail</strong> if your account information does not appear within 5 minutes.",$current_theme_locale_name); ?>
			                </p>
							<p class="submit">
								<a id="post_free_job_btn" class="btn" href="wp-login.php"><?php _e('Login', $current_theme_locale_name); ?> &raquo;</a>
							</p>
						</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
</div> 
		<?php
								
				
				get_footer();
		
				die();
			break;
			  }//continued from the error check above
		
			default:
			get_header();
			
		
				
				?>
    <!-- <div class="page_heading_me">
        <div class="page_heading_me_inner">
            <div class="mm_inn">
            	<?php printf(__("Register - %s",$current_theme_locale_name), get_bloginfo('name')); ?> 
            </div>
        </div>
    </div> --> 
  


<!-- ########## -->

<div id="main_wrapper">
	<div id="bg">
		<div id="main" class="container">
			<div class="padd10">

				<div class="row signup-page box_content" id="signup-page" style="  margin: 0px;padding: 25px;">
						<h4 id="register_name">Let's get started!</h4>
	                	<h5 style="margin-bottom:50px;">First, tell us what you're looking for.</h5>
					<div id="signup_normal" class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-bottom: 20px;">   
								<div class="col-md-12 .col-xs-*">
								<span class=""><img src="<?php echo get_template_directory_uri().'/images/icon_1.png';?>" alt="" style="float: left;padding-top: 0px;margin-right:15px;" class="img-circle"></span>
								<h2 class="fname2">I need a work </h2>
								<p>Find, hire, manage, and pay for help, on demand.</p>
								<a href="<?php echo site_url().'/tradesman-start/'?>" id="post_free_job_btn" > Sign up </a>
								</div>
                		</div>
                		<div id="signup_normal" class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >   
                			<div class="col-md-12 .col-xs-*">
								<span class=""><img src="<?php echo get_template_directory_uri().'/images/icon_2.png';?>" alt="" style="float: left;padding-top: 0px;margin-right:15px;" class="img-circle"></span>
								<h2 class="fname2">I need a Tradesmen</h2>
								<p>Find, hire, manage, and pay for help, on demand.</p>
								<a href="#" class="submit_btn" id="post_free_job_btn" > Sign up </a>
							</div>
                	</div>
				</div>	





	            <div id="register_box" class="my_box3" style="display:none">
	            	<div class="padd10">
	                    <div class="box_content">     
	                    	<div class="row">
	                    		<div id="signup_normal" class="col-xs-12 col-sm-5 col-md-5 col-lg-5" >   
	                    			                                
									<?php if ( isset($errors) && isset($_POST['action']) ) : ?>
									<div class="error">
										<ul>
											<?php 
											 
											$me = $errors->get_error_messages();
									 
										 	foreach($me as $mm)
											 echo "<li>".($mm)."</li>";
											
											
											 
											?>
										</ul>
								 	</div>
								  	<?php endif; ?>
								  	<div class="login-submit-form">
		                                <form method="post" id="registerform" action="<?php echo esc_url( site_url('wp-login.php?action=register', 'login_post') ); ?>">
											<h4>Signup Here</h4>
											<hr> 
											<input type="hidden" name="action" value="register" />	
											<p>
		                            			<label for="register-username"><?php _e('Username:',$current_theme_locale_name) ?></label>
												<input type="text" class="do_input" name="user_login" id="user_login" size="30" maxlength="100" value="<?php echo wp_specialchars($user_login); ?>" />
											</p>							
							
											<p>							 
												<label for="register-email"><?php _e('E-mail:',$current_theme_locale_name) ?></label>
												<input type="text" class="do_input" name="user_email" id="user_email" size="30" maxlength="100" value="<?php echo wp_specialchars($user_email); ?>" />
												<input type="hidden" class="do_input" name="user_tp" id="user_tp" size="30" maxlength="100" value="business_owner" />
											</p>
									
				                            <?php
											
												$ProjectTheme_enable_2_user_tp = get_option('ProjectTheme_enable_2_user_tp');
												if($ProjectTheme_enable_2_user_tp == "yes"):
												
												$enbl = true;
												$enbl = apply_filters('ProjectTheme_enbl_two_user_types_thing',$enbl);
												
												if($enbl):
											?>                           
		                            		<!-- <div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				                            		<p id="register_user_type">							 
														<label for="register-email"><?php _e('User Type:',$current_theme_locale_name) ?></label>
													</p> -->
												<!-- </div>
											</div> -->
											<!--<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<p>							 
														<input type="radio" class="do_input" name="user_tp" id="user_tp" value="service_provider" checked="checked" /> <?php _e('Service Provider',$current_theme_locale_name); ?><br/>
				                            			
				                            		</p>
				                            	</div>

				                            	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<p>							 
														<input type="radio" class="do_input" name="user_tp" id="user_tp" value="business_owner" /> <?php _e('Service Contractor',$current_theme_locale_name); ?><br/>
													</p>
												</div>
											</div>-->
		                                                       
		                            		<?php endif; endif; ?>
		                            
											<?php do_action('register_form'); ?>

											<p>
												<!-- <label for="submitbtn">&nbsp;</label> -->
												<?php _e('A password will be emailed to you.',$current_theme_locale_name) ?>
											</p>
											<div class="row">
												<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
													<p class="submit">
				                       					<!-- <label for="submitbtn">&nbsp;</label> -->
											 			<input type="submit" class="submit_bottom" value="<?php _e('Register',$current_theme_locale_name) ?>" id="post_free_job_btn" name="submits" />
													</p>
												</div>
												<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
													<!-- <p>
														<a class="btn" id="registerform_home_link" href="<?php bloginfo('home'); ?>/" title="<?php _e('Are you lost?',$current_theme_locale_name) ?>"><?php _e('Home',$current_theme_locale_name) ?></a>
													</p> -->
												</div>
											</div>
		                          
											<!-- <ul id="logins">
												<li><a href="<?php bloginfo('home'); ?>/" title="<?php _e('Are you lost?',$current_theme_locale_name) ?>"><?php _e('Home',$current_theme_locale_name) ?></a></li>
												<li><a href="<?php bloginfo('wpurl'); ?>/wp-login.php"><?php _e('Login',$current_theme_locale_name) ?></a></li>
												<li><a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=lostpassword" title="<?php _e('Password Lost?',$current_theme_locale_name) ?>"><?php _e('Lost your password?',$current_theme_locale_name) ?></a></li>
											</ul> -->
		                          
		                       			</form>
									</div>
								</div>
								<div id="signup_or" class="col-xs-12 col-sm-2 col-md-2 col-lg-2" >   
	                    			<h4>OR</h4>
									
								</div>
								<div id="signup_social" class="col-xs-12 col-sm-5 col-md-5 col-lg-5" > 
									<h4>Signup With Social Profile</h4>
									<hr>
									<div id="social_login_logo" class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
	        							<span>
	        								<a id="fb_login_logo" target="_blank" href="http://ratemytrade.brandsout.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Facebook&redirect_to=http%3A%2F%2Fratemytrade.brandsout.com%2Fwp-login.php%3Fredirect_to%3Dhttp%253A%252F%252Fratemytrade.brandsout.com%252Fwp-admin%252F%26reauth%3D1"></a>
	        							</spna>
	        							<span>
	        								<a id="tweeter_login_logo" target="_blank" href="http://ratemytrade.brandsout.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Twitter&redirect_to=http%3A%2F%2Fratemytrade.brandsout.com%2Fwp-login.php%3Fredirect_to%3Dhttp%253A%252F%252Fratemytrade.brandsout.com%252Fwp-admin%252F%26reauth%3D1"></a>
	        							</spna>
	        						</div>
								</div>
							</div>
                    	</div>
               		 </div>
            	</div>
        	</div>
    	</div>
	</div> 
</div>
                        
                        
		<?php
				
				
	 			  get_footer();
		
			  die();
			break;
			case 'disabled':
     
	 			  get_header();
				
			
		?>
		
        <div class="clear10">
        </div>	
		<div class="my_box3">
    		<div class="padd10">

				<div class="box_title">
					<?php _e('Registration Disabled',$current_theme_locale_name) ?>
				</div>
       			<div class="box_content">
         			
					<p>
						<?php _e('User registration is currently not allowed.',$current_theme_locale_name) ?><br />
						<a href="<?php echo get_settings('home'); ?>/" title="<?php _e('Go back to the blog',$current_theme_locale_name) ?>"><?php _e('Home',$current_theme_locale_name) ?></a>
					</p>
				</div>
			</div>
		</div> 

<!-- tabs creation -->

<div id="main_wrapper">
	<div id="bg">
		<div id="main" class="container">
			<div class="padd10">
        		<div class="my_box3">
        			<div class="padd10">
                		<div class="box_content"> 
							<ul class="nav nav-tabs">

						        <li class="active">
						        	<a data-toggle="tab" href="#sectionA">Section A</a>
						        </li>

						        <li>
						        	<a data-toggle="tab" href="#sectionB">Section B</a>
						        </li>

						        <li class="dropdown">
        							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown<b class="caret"></b></a>

        							<ul class="dropdown-menu">
                						<li>
                							<a data-toggle="tab" href="#dropdown1">Dropdown 1</a>
                						</li>
           								<li>
           									<a data-toggle="tab" href="#dropdown2">Dropdown 2</a>
           								</li>
        							</ul>
						        </li>
							</ul>

							<div class="tab-content">
						        <div id="sectionA" class="tab-pane fade in active">
				           			<p>Section A content…</p>
    							</div>
						        <div id="sectionB" class="tab-pane fade">
						            <p>Section B content…</p>
						        </div>
						        <div id="dropdown1" class="tab-pane fade">
						            <p>Dropdown 1 content…</p>
						        </div>
						        <div id="dropdown2" class="tab-pane fade">
						            <p>Dropdown 2 content…</p>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







		<?php
				
				 get_footer();
		
			  die();
			break;
		  }
		}


		}

//===================================================================

if(!function_exists('Project_register_new_user_sitemile')) {
function Project_register_new_user_sitemile( $user_login, $user_email ) {
	$errors = new WP_Error();
	global $current_theme_locale_name;
	$sanitized_user_login = sanitize_user( $user_login );
	$user_email = apply_filters( 'user_registration_email', $user_email );

	// Check the username
	if ( $sanitized_user_login == '' ) {
		$errors->add( 'empty_username', __( '<strong>ERROR</strong>: Please enter a username.', $current_theme_locale_name ) );
	} elseif ( ! validate_username( $user_login ) ) {
		$errors->add( 'invalid_username', __( '<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.', $current_theme_locale_name ) );
		$sanitized_user_login = '';
	} elseif ( username_exists( $sanitized_user_login ) ) {
		$errors->add( 'username_exists', __( '<strong>ERROR</strong>: This username is already registered, please choose another one.', $current_theme_locale_name ) );
	}

	// Check the e-mail address 
	if ( $user_email == '' ) {
		$errors->add( 'empty_email', __( '<strong>ERROR</strong>: Please type your e-mail address.', $current_theme_locale_name ) );
	} elseif ( ! is_email( $user_email ) ) {
		$errors->add( 'invalid_email', __( '<strong>ERROR</strong>: The email address isn&#8217;t correct.', $current_theme_locale_name ) );
		$user_email = '';
	} elseif ( email_exists( $user_email ) ) {
		$errors->add( 'email_exists', __( '<strong>ERROR</strong>: This email is already registered, please choose another one.', $current_theme_locale_name ) );
	}

	do_action( 'register_post', $sanitized_user_login, $user_email, $errors );

	$errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );

	if ( $errors->get_error_code() )
		return $errors;
	
	//--------------------
	
	$user_tp = $_POST['user_tp'];
	if(empty($user_tp)) $capa = 'subscriber';
	else $capa = $user_tp;
	
	//--------------------
	
	$user_pass = wp_generate_password( 6, false);
	
	$user_id = wp_create_user( $sanitized_user_login, $user_pass, $user_email, $capa );
	if ( ! $user_id ) {
		$errors->add( 'registerfail', sprintf( __( '<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !', $current_theme_locale_name ), get_option( 'admin_email' ) ) );
		return $errors;
	}
	
	//---------------------
	
	$user = new WP_User($user_id);
	$user->set_role($capa);
	
	//---------------------
	
	update_user_meta( $user_id, 'user_tp', $user_tp );
	update_user_meta( $user_id, 'bidding_points', '3' );
	update_user_option( $user_id, 'default_password_nag', true, true ); //Set up the Password change nag.

	//echo 'raj---'.$user_id;echo'<br>';
	//echo 'rasaas---'.$user_pass;echo'<br>';
	ProjectTheme_new_user_notification($user_id, $user_pass );
	ProjectTheme_new_user_notification_admin($user_id);
	
	return $user_id;
} }

?>
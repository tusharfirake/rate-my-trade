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

 


	<div id="footer">
	<div id="colophon" class="container">	
	
		<?php
            get_sidebar( 'footer' );
        ?>
        
        
            <div id="site-info">
                <div class="padd10">

                	<!-- <div class="row">
                		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                				<h5>HOMEOWNERS</h5>
                				<p><a href="<?php echo site_url().'/post-new';?>" >Post a job</a></p>
                				<p><a href="<?php echo site_url().'/how-it-works';?>">How it works</a></p>
                				<p><a href="">Find tradesmen</a></p>
                				<p><a href="">Ask a tradesmen</a></p>
                				<p><a href="">Advise centre</a></p>
                			</div>
	                		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                			<h5>TRADESMEN</h5>
	                			<p><a href="<?php echo site_url().'/tradesman-start';?>">Trade sign up</a></p>
	                			<p><a href="<?php echo site_url().'/how-it-works';?>">How it works</a></p>
	                			<p><a href="">Completed jobs</a></p>
	                			<p><a href="">Featured tradesmen</a></p>
	                		</div>
	                		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                			<h5>COMPANY</h5>
	                			<p><a href="<?php echo site_url().'/about-us';?>">About Us</a></p>
	                			<p><a href="">Careers New</a></p>
	                			<p><a href="">Press Centre</a></p>
	                			<p><a href="">Partners</a></p>
	                			<p><a href="">Blog</a></p>
	                		</div>
                		</div>
                		<div id="connect_to_social" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                			<h4>CONNECT WITH US</h4>
	                			<span>
    								<a id="fb_login_logo" href="http://ratemytrade.brandsout.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Facebook&redirect_to=http%3A%2F%2Fratemytrade.brandsout.com%2Fwp-login.php%3Fredirect_to%3Dhttp%253A%252F%252Fratemytrade.brandsout.com%252Fwp-admin%252F%26reauth%3D1"></a>
    							</spna>
    							<span>
    								<a id="tweeter_login_logo" href="http://ratemytrade.brandsout.com/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Twitter&redirect_to=http%3A%2F%2Fratemytrade.brandsout.com%2Fwp-login.php%3Fredirect_to%3Dhttp%253A%252F%252Fratemytrade.brandsout.com%252Fwp-admin%252F%26reauth%3D1"></a>
    							</spna>
	        			</div>
                	</div>  -->
                	<div id="d_and_d" class="row">
                		<div id="site-info-left_col" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                        <div id="site-info-left" >					
	                            <h3><?php echo stripslashes(get_option('ProjectTheme_left_side_footer')); ?></h3>					
	                        </div>
                        </div>
                        <div id="site-info-right_col" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                        <div id="site-info-right" >
	                            <?php //echo stripslashes(get_option('ProjectTheme_right_side_footer')); ?>
	                            Designed And Devloped By <a id="footer_link" href="http://initsolutions.co.in" target="_blank">init solutions.</a>
	                        </div>
	                    </div>
                    </div>

                
                </div>
            </div>
        
        
        </div>
    </div>

</div>


<?php

	$ProjectTheme_enable_google_analytics = get_option('ProjectTheme_enable_google_analytics');
	if($ProjectTheme_enable_google_analytics == "yes"):		
		echo stripslashes(get_option('ProjectTheme_analytics_code'));	
	endif;
	
	//----------------
	
	$ProjectTheme_enable_other_tracking = get_option('ProjectTheme_enable_other_tracking');
	if($ProjectTheme_enable_other_tracking == "yes"):		
		echo stripslashes(get_option('ProjectTheme_other_tracking_code'));	
	endif;


?>


	<?php 	
            wp_footer();
    ?>
</body>
</html>
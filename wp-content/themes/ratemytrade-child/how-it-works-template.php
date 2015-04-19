<?php
/*
Template Name: How it works
*/
?>

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


	get_header();
	global $post;
 
?>

<section id="how-it-works">
    <div class="container">
        <div class="row text-center">

        	

        	<!---<div class="col-md-12">
        		<h1 class="how-heading">HOW IT WORKS</h1>
        	</div>
            <div class="col-md-12">

            	<div class="col-md-3">
            		<div class="col-md-8">
            			<img src="<?php echo get_template_directory_uri().'/images/post.png';?>">
            			<span class="sub-heading">
		                 POST JOB   
		                </span>
            		</div>
            		<div class="col-md-4">
		        		<img src="<?php echo get_template_directory_uri().'/images/yellow-arrow.png';?>">
		            </div>
            	</div>

            	<div class="col-md-3">
            		<div class="col-md-8">
            			<img src="<?php echo get_template_directory_uri().'/images/post.png';?>">
            			<span class="sub-heading">
		                 POST JOB   
		                </span>
            		</div>
            		<div class="col-md-4">
		        		<img src="<?php echo get_template_directory_uri().'/images/yellow-arrow.png';?>">
		            </div>
            	</div>

            	<div class="col-md-3">
            		<div class="col-md-8">
            			<img src="<?php echo get_template_directory_uri().'/images/post.png';?>">
            			<span class="sub-heading">
		                 POST JOB   
		                </span>
            		</div>
            		<div class="col-md-4">
		        		<img src="<?php echo get_template_directory_uri().'/images/yellow-arrow.png';?>">
		            </div>
            	</div>

            	<div class="col-md-2">
            		<div class="col-md-12">
            			<img src="<?php echo get_template_directory_uri().'/images/post.png';?>">
            			<span class="sub-heading">
		                 POST JOB   
		                </span>
            		</div>
            		
            	</div>
            </div>-->
            
        </div>
    </div>
</section>

<section id="post-job">
	<div class="container">
    	<div class="row">
	<div class="col-md-12">
		<h1 class="post-job-heading">POST YOUR JOB</h1>
	</div>
	<div class="col-md-12">
		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.</p>
	</div>
	<div class="col-md-12">
		<img src="<?php echo get_template_directory_uri().'/images/world.jpg';?>">
	</div>
	</div>
	</div>
</section>

<section id="how-job-post">
    <div class="container">
    	<div class="row">
	    	<div class="col-md-6" id="section-one">
	            <span>
	                <img src="<?php echo get_option('get_quotes_img'); ?>" />
	            </span>
	            <h4 class="service-heading">GET QUOTES</h4>
	            <p class="text-muted">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.
				Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.</p>
	        </div>

	        <div class="col-md-6" id="section-two">
	            <span>
	                <img src="<?php echo get_option('hire_the_best_img'); ?>" />
	            </span>
	            <h4 class="service-heading">HIRE THE BEST</h4>
	            <p class="text-muted">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.
				Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.</p>
	        </div>
		</div>	        
    </div>
</section>

<section id="get-work-done">
    <div class="container">
    	<div class="row">
	    	<div class="col-md-5 get-section-one">
	            <span>
	                
					<img src="<?php echo get_option('get_work_done_img'); ?>" />
	            </span>
	        </div>

	        <div class="col-md-5 get-section-one">
	            
	            <h4 class="service-heading">Get work done</h4>
	            <p class="text-muted">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.
				Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat ante venenatis dapibus posuere velit aliquet.</p>
	        </div>
		</div>	        
    </div>
</section>


<?php 
    $args = array(
            'post_type' =>'testimonials',
            'posts_per_page' => 4
    );
    $testimonials = get_posts($args); 
    //echo'<pre>';print_r($tradesmens);exit;
?>

<section id="say-about-us">
    <div class="container">
    	<div class="row">
	    	<div class="col-md-12">
				<h1 class="say-about-us-heading">WHAT OTHERS ARE SAYING ABOUT US</h1>
			</div>
			<hr>
			<?php foreach($testimonials as $testimonial ) { ?>  
			<div class="col-md-6">
				<div class="col-md-3" id="about-img">
					<?php echo get_the_post_thumbnail($testimonial->ID); ?>
				</div>
				<div class="col-md-9">
					<h3 style="text-align:left;color:#FFF;"><?php echo $testimonial->post_title; ?></h3>
					<h5 style="text-align:left;color:#FFF;"><?php echo $testimonial->designation; ?></h5>
				</div>
				<div class="col-md-12">
					<p class="text-muted" id="text"><?php echo $testimonial->post_content?></p>
				</div>
			</div>
			<?php } ?>
			
	        
		</div>	        
    </div>
</section>


<?php get_footer(); ?>
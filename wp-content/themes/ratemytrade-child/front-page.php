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

/**************************************************/ 
?>


 <!-- head scr -->
        
        <div class="home_blur">
            <div class="main_area_homepg">
       		   <div class="row main_tagLine" style="margin:0 auto;">
           		    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 regular_ul">
                        <p>
           		    	    <?php _e('THE BETTER WAY TO FIND A BUILDER','ProjectTheme') ?>
                        </p>
                    </div>
                    <div id="post_free_btn" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 regular_ul" style="text-align:left;">
                    	<a  class="post-btn" href="<?php echo projectTheme_post_new_link(); ?>"><?php _e('POST A JOB FOR FREE','ProjectTheme') ?></a>
                    </div>
       	        </div>
            </div>
       	</div>

        <div class="row signup" style="margin: 0;">

        	<div class="col-md-12 help container">
              	<h2>We help great builders succeed </h2>
                <p class=" enter">Enter your email address and we'll contact you. </p>
            </div>
        	
        	<div class="col-md-12 signup-text">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align:right;">
                    <span class="arrow_span_next"></span>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <?php echo do_shortcode('[mc4wp_form]');?>
                    <!-- <input type="email" name="signup-email" class="sign_up_input">
                    <a class="btn btn-default" href="#" role="button">SIGN UP</a>
                     -->
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align:left;">
                    <span class="arrow_span"></span>
                </div>
        	</div>
        </div>


<?php 
    $args = array(
            'post_type' =>'tradesmens',
            'posts_per_page' => 3
    );
    $tradesmens = get_posts($args);	
    //echo'<pre>';print_r($tradesmens);exit;
?>

<section id="services">
    <div class="container">
        <div class="row text-center">
        	<?php foreach($tradesmens as $tradesmen ) { ?>	
            <div class="col-md-4">
                <span>
                    <?php echo get_the_post_thumbnail($tradesmen->ID); ?>
                </span>
                <h4 class="service-heading"><?php echo $tradesmen->post_title; ?></h4>
                <p class="text-muted"><?php echo $tradesmen->post_content?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<div class="clear"></div>
<?php 
    $args = array(
            'post_type' =>'testimonials',
            'posts_per_page' => 3
    );
    $testimonials = get_posts($args); 
    //echo'<pre>';print_r($tradesmens);exit;
?>
<section id="our-clients">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
                <h4 class="clients-heading">Be one of our clients :)</h4>
                <p class="text-muted">becouse we make every thing with best quality ever, our customer  and partners are very happy.we make every thing clear aweseome  and we never miss details. with us you can make every thing  you need in a small time , 

and weith the best coast ever!  becouse we make every thing with best quality ever, our customer  and partners are  very happy.we make every thing clear aweseome</p>
            </div>

            <div class="col-md-6" id="client-para">
            	
                <div class="about-testimonial boxed-style about-flexslider ">
            <section class="slider wow fadeInRight">
              <div class="flexslider">
                <ul class="slides about-flex-slides">
                <?php foreach($testimonials as $testimonial ) { ?>  
                  <li>
                    <div class="about-testimonial-image ">
                      <?php echo get_the_post_thumbnail($testimonial->ID); ?>
                    </div>
                    <span class="about-testimonial-author">
                      <?php echo $testimonial->post_title; ?>
                    </span>
                    <span class="about-testimonial-company">
                      CCD Realestate
                    </span>
                    <div class="about-testimonial-content">
                      <p class="about-testimonial-quote">
                        <?php echo $testimonial->post_content?>
                      </p>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </section>
          </div>
            </div>
        </div>
    </div>
</section>


<?php 
    $args = array(
            'post_type' =>'project',
            'posts_per_page' => -1
    );
    $projects = get_posts($args); 
    
   
?>
<section id="job-post">
    <div class="container">
    	<div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="job-heading">35,686 jobs posted across the UK in the last 30 days</h4>
            </div>
        </div>
        <div class="row text-center">
        	<div class="col-lg-12 col-sm-12 flipster">
		  <ul>
            <?php foreach($projects as $project ) {

                $date1 = $project->post_date;
                $date2 =  Date('Y:m:d H:i:s');
                $diff = strtotime($date2) - strtotime($date1);
                $diff_in_hrs = $diff/3600;
                
             ?>
		  	<li>
		  		<a href="<?php echo get_permalink( $project->ID ); ?>" class="Button Block">
		  			<h2><?php echo $project->post_title; ?></h2>
                     <hr class="post-hr">
		  			<p>Posted about <?php echo round($diff_in_hrs); ?> hour ago</p>
		  		</a>
		  	</li>
            <?php } ?>
            
	  	  </ul>
		</div>
        </div>
    </div>
</section>

<?php 
    $args = array(
            'post_type' =>'tradesmen_rate',
            'posts_per_page' => 3
    );
    $tradesmensRates = get_posts($args);	
    //echo'<pre>';print_r($tradesmensRates);exit;
?>

<!----Rate -------->
<section id="rate">
    <div class="container">
    	<div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="rate-heading">How Rate a Trade works</h2>
            </div>
        </div>
        <div class="row text-center">
        	<?php foreach($tradesmensRates as $tradesmensRate ) { ?>	
            <div class="col-md-4">
        	 	<h4 class="rate-heading"><?php echo $tradesmensRate->post_title; ?></h4>
                <div class="rate-img">
                   <?php echo get_the_post_thumbnail($tradesmensRate->ID); ?>
                </div>
               
                <p class="text-muted"><?php echo $tradesmensRate->post_content?></p>
            </div>
            <?php } ?>
            
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a id="post_free_job_btn" href="<?php echo projectTheme_post_new_link(); ?>" class="btn btn-x">POST A JOB FOR FREE</a>
            </div>
        </div>
    </div>
</section>

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

<!---- Many trades -------->
<section id="trades">
    <div class="container">
    	<div  class="row">
            <div class="col-lg-12 text-center">
                <h2 class="trades-heading">With so many trades, you’ll find what you’re looking for</h2>
            </div>
        </div>
        <div class="clear"></div>
        <hr>
        <div id="home_category_row" class="row">
            <?php foreach($categories as $category ) { ?>    
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="<?php echo  get_term_link( $category ); ?>" target="_blank"><?php echo $category->name; ?></a>
        	 	<!-- <p class="text-muted"><?php echo $category->name; ?></p> -->
            </div>
            <?php } ?>
            
        </div>
       
    </div>
</section>


<?php 
    $args = array(
            'post_type' =>'logo_slider',
            'posts_per_page' => -1
    );
    $logoSliders = get_posts($args);    
    //echo'<pre>';print_r($tradesmensRates);exit;
?>
<section id="logo-slider">
<div class="col-md-12 logo-slider">
    <?php foreach($logoSliders as $logoSlider ) { ?>
  <div><?php echo get_the_post_thumbnail($logoSlider->ID); ?></div>
  <?php } ?>
</div>
</section>






<script>
<!--

	$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });

-->
$('.logo-slider').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000,
});
</script>
 <script>
      $('a.info').tooltip();

      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider) {
            $('body').removeClass('loading');
          }
        });
      });

      

    </script>

<?php
		get_footer();

?>
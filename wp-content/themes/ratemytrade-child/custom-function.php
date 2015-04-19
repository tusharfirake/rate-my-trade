<?php
/**
 * Proper way to enqueue scripts and styles
 */
require_once locate_template('theme_option.php');  
function theme_name_scripts() {
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri(). '/css/bootstrap.css' );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri(). '/custom-style.css' );
	wp_enqueue_style( 'flip-design', get_stylesheet_directory_uri(). '/css/flip-design.css' );
	wp_enqueue_style( 'jquery.flipster', get_stylesheet_directory_uri(). '/css/jquery.flipster.css' );
	wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri(). '/css/flexslider.css' );
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri(). '/css/slick.css' );
	wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri(). '/css/slick-theme.css' );
	//wp_enqueue_style( 'slider', get_template_directory_uri(). '/css/slider.css' );
	wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/custom-script.js' );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'jquery.flipster', get_stylesheet_directory_uri() . '/js/jquery.flipster.js' );
	wp_enqueue_script( 'jquery.flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider.js' );
	wp_enqueue_script( 'slick',get_stylesheet_directory_uri() . '/js/slick.js' );
	//wp_enqueue_script( 'thumbnail-slider', get_template_directory_uri() . '/js/thumbnail-slider.js' );
}


add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


/*function my_wp_nav_menu_args( $args = '' ) {


if( is_user_logged_in() ) { 
  $args['menu'] = 'primary-navigation';

} else { 
  $args['menu'] = 'main-menu';

} 
  return $args;
}*/
//add_action( 'init', 'my_wp_nav_menu_args' );

/**
 * resister custom post type testimonials
 */
add_action( 'init', 'register_testimonials_cpt' );
function register_testimonials_cpt() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Testimonial', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Testimonials', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Testimonial', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Testimonial', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Testimonials', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Testimonials', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Testimonials', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Testimonials found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonials' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail' )
	);

	register_post_type( 'testimonials', $args );
}


/**
 * resister custom post type logo_slider
 */
add_action( 'init', 'register_logo_slider_cpt' );
function register_logo_slider_cpt() {
	$labels = array(
		'name'               => _x( 'Logo Sliders', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Logo Slider', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Logo Sliders', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Logo Sliders', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Logo Slider', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Logo Slider', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Logo Slider', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Logo Slider', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Logo Sliders', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Logo Sliders', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Logo Sliders', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Logo Sliders:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Logo Sliders found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Logo Sliders found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'logo_slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail' )
	);

	register_post_type( 'logo_slider', $args );
}




/**
 * resister custom post type Rate
 */
add_action( 'init', 'register_tradesmen_rate_cpt' );
function register_tradesmen_rate_cpt() {
	$labels = array(
		'name'               => _x( 'Tradesmen Rates', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Tradesmen Rate', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Tradesmen Rates', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Tradesmen Rates', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Tradesmen Rate', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Tradesmen Rate', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Tradesmen Rate', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Tradesmen Rate', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Tradesmen Rate', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Tradesmen Rates', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Tradesmen Rate', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Tradesmen Rate:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Tradesmen Rates found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Tradesmen Rates found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tradesmen_rate' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail' )
	);

	register_post_type( 'tradesmen_rate', $args );
}


/**
 * resister custom post type tradesmens
 */
add_action( 'init', 'register_tradesmen_cpt' );
function register_tradesmen_cpt() {
	$labels = array(
		'name'               => _x( 'Tradesmens', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Tradesmen', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Tradesmens', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Tradesmens', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Tradesmen', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Tradesmens', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Tradesmens', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Tradesmens', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Tradesmens', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Tradesmens', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Tradesmens', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Tradesmens:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Tradesmens found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Tradesmens found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tradesmens' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail' )
	);

	register_post_type( 'tradesmens', $args );
}


/**
 * resister custom post type Pricing
 */
add_action( 'init', 'register_tradesmen_rate_pricing' );
function register_tradesmen_rate_pricing() {
	$labels = array(
		'name'               => _x( 'Pricing', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Pricing', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Pricing', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Pricing', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Pricing', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Pricing', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Pricing', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Pricing', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Pricing', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Pricing', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Pricing', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Pricing:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Pricing found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Pricing found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'pricing' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title','editor', 'thumbnail' )
	);

	register_post_type( 'pricing', $args );
}


/****
 * Meta box code here
 */


// designation meta for Testimonials cpt
add_action( 'add_meta_boxes', 'add_designation_meta' );  
function add_designation_meta()  
{  
  	global $post;
  	if( $post->post_type == 'testimonials'){
    		add_meta_box( 'designation-meta-box-id', 'Designation', 'designation_meta_box_cb', 'testimonials', 'normal', 'high');	
	} 
} 
function designation_meta_box_cb(){
	global $post; 
	$designation = get_post_meta($post->ID,'designation',true);
	?>
	<p>
            <label for="designation">Designation</label></p> 
            <input type="text" name="designation" value="<?php echo $designation; ?>">
	

<?php
}
add_action('save_post','save_designation_meta');
function save_designation_meta($post_id){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		 return $post_id;
	} 
	if( isset( $_POST['designation'] ) )  
		 update_post_meta( $post_id, 'designation', $_POST['designation'] ) ; 	
}






// amount meta for pricing cpt
add_action( 'add_meta_boxes', 'add_pricing_meta' );  
function add_pricing_meta()  
{  
  	global $post;
  	if( $post->post_type == 'pricing'){
    		add_meta_box( 'pricing-meta-box-id', 'Amount', 'pricing_meta_box_cb', 'pricing', 'normal', 'high');	
	} 
} 
function pricing_meta_box_cb(){
	global $post; 
	$amount = get_post_meta($post->ID,'amount',true);
	?>
	<p>
            <label for="amount">Amount in USD</label></p> 
            <input type="text" name="amount" value="<?php echo $amount; ?>">
	

<?php
}
add_action('save_post','save_pricing_meta');
function save_pricing_meta($post_id){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		 return $post_id;
	} 
	if( isset( $_POST['amount'] ) )  
		 update_post_meta( $post_id, 'amount', $_POST['amount'] ) ; 	
}


// bids points meta for pricing cpt
add_action( 'add_meta_boxes', 'add_bids_points_meta' );  
function add_bids_points_meta()  
{  
  	global $post;
  	if( $post->post_type == 'pricing'){
    		add_meta_box( 'bids_points-meta-box-id', 'Bids Count', 'bids_points_meta_box_cb', 'pricing', 'normal', 'high');	
	} 
} 
function bids_points_meta_box_cb(){
	global $post; 
	$bids_points = get_post_meta($post->ID,'bids_points',true);
	?>
	<p>
            <label for="bids_points">Bids Count</label></p> 
            <input type="text" name="bids_points" value="<?php echo $bids_points; ?>">
	
<?php
}
add_action('save_post','save_bids_points_meta');
function save_bids_points_meta($post_id){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		 return $post_id;
	} 
	if( isset( $_POST['bids_points'] ) )  
		 update_post_meta( $post_id, 'bids_points', $_POST['bids_points'] ) ; 	
}

add_filter( 'wp_mail_from', 'custom_wp_mail_from' );
function custom_wp_mail_from( $original_email_address ) {
	//Make sure the email is from the same domain 
	//as your website to avoid being marked as spam.
	return 'info@ratemytrade.com';
}

//ajax call back fun to validate trademen personal details
function validate_trademen_personal_details()
{
	$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';


	if (preg_match($pattern, $_POST['email']) === 1) {
	    if(username_exists( $_POST['email'] ) || email_exists($_POST['email']))
			echo "fail1";
		else
			echo "success";
	}else {
	  	 echo 'fail2' ;
	  	
	}

	
	die();

}
add_action('wp_ajax_validate_trademen_personal_details', 'validate_trademen_personal_details');
add_action('wp_ajax_nopriv_validate_trademen_personal_details', 'validate_trademen_personal_details'); // not really needed

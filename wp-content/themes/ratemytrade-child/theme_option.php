<?php
function wp_gear_manager_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
}

function wp_gear_manager_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');


function _theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === _get_theme_options() )
		add_option( '_theme_options', _get_default_theme_options() );

	register_setting(
		'_options',       // Options group, see settings_fields() call in theme_options_render_page()
		'_theme_options' // Database option, see _get_theme_options()
	);
	$to_array = array( 'post_your_job', 'get_quotes','hire_the_best','get_work_done', 'get_work_done_img', 'get_quotes_img',
		'hire_the_best_img');
	foreach( $to_array as  $t_array ){
		register_setting( '_options', $t_array );
		
	}
}

add_action( 'admin_init', '_theme_options_init' );

function _theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', '' ),   // Name of page
		__( 'Theme Options', '' ),   // Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'_theme_options_render_page' // Function that renders the options page
	);

	if ( ! $theme_page )
		return;
}

add_action( 'admin_menu', '_theme_options_add_page' );

function _default_schemes() {
	$default_scheme_options = array(
		'Default_theme' => array(
			'value' => 'Default_theme',
			'label' => __( 'Default_theme', '' ),
			'get_quotes_img' =>'',
			'post_your_job' => '',
			'get_quotes' => '',
			'hire_the_best' =>'',
			'get_work_done' =>'',
			'get_work_done_img' => '',
			'hire_the_best_img' => ''
			
		),
	);

	return apply_filters( '_default_schemes', $default_scheme_options );
}

function _get_default_theme_options() {
	$default_theme_options = array(
		'default_scheme' => 'Default_theme',
		'post_your_job' => _get_default_post_your_job( 'Default_theme' ),
		'get_quotes' => _get_default_get_quotes( 'Default_theme' ),
		'hire_the_best' => _get_default_hire_the_best( 'Default_theme' ),
		'get_work_done' => _get_default_get_work_done( 'Default_theme' ),
		'get_work_done_img' => _get_default_get_work_done_img( 'Default_theme' ),
		'get_quotes_img' => _get_default_get_quotes_img( 'Default_theme' ),
		'hire_the_best_img' =>_get_default_hire_the_best_img( 'Default_theme' )
	);
	return apply_filters( '_default_theme_options', $default_theme_options );
}

function _get_default_get_quotes_img( $default_scheme = null ){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['get_quotes_img'];
}

function _get_default_hire_the_best_img( $default_scheme = null ){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['hire_the_best_img'];
}

function _get_default_get_work_done_img($default_scheme = null){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['get_work_done_img'];
}
function _get_default_hire_the_best($default_scheme = null){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['hire_the_best'];
}
function _get_default_get_work_done($default_scheme = null){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['get_work_done'];
}

function _get_default_post_your_job( $default_scheme = null){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['post_your_job'];
}

function _get_default_get_quotes( $default_scheme = null){
	if ( null === $default_scheme ) {
		$options = _get_theme_options();
		$default_scheme = $options['default_scheme'];
	}
	$default_schemes = _default_schemes();
	if ( ! isset( $default_schemes[ $default_scheme ] ) )
		return false;
	return $default_schemes[ $default_scheme ]['get_quotes'];
}
/**********/
function _get_theme_options() {
	return get_option( '_theme_options', _get_default_theme_options() );
}

function _theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', '' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>
		<hr>
			<form method="post" enctype="multipart/form-data" action="options.php">
			<?php
					 
				settings_fields( '_options' );
				$options = _get_theme_options();
				$default_options = _get_default_theme_options();
				do_settings_sections('post_your_job');
				do_settings_sections('get_quotes');
				do_settings_sections('hire_the_best');
				do_settings_sections('get_work_done');
				do_settings_sections('get_work_done_img');
				do_settings_sections('get_quotes_img');
				do_settings_sections('hire_the_best_img');
				
			?>
				<script language="JavaScript">
					jQuery(document).ready(function() {
							jQuery('.upload_image_button').click(function() {
							 formfield = jQuery(this).prev('input').attr('class');
							
							tb_show('', 'media-upload.php?type=image&TB_iframe=true');
							return false;
						});
																	
							window.send_to_editor = function(html) {
									
								imgurl = jQuery('img',html).attr('src');
								jQuery('.'+formfield).val(imgurl);
								tb_remove();
							}
					});
				</script>

			<b><?php _e( "(Use ' http:// ' for Hyperlinks)", '' );
				//add_option('widgets_grid','above');
				$widgets_grid=get_option('widgets_grid');
				//echo $widgets_grid."hello"; 
				if($widgets_grid=='above'){
					$checked1='checked';
				}
				elseif($widgets_grid=='below'){
					$checked2='checked';
				}
				elseif($widgets_grid=='none'){
					$checked3='checked';
				}
			 ?></b>
			 
			
			<h3 class="title">Theme Options</h3>
				<table class="form-table">
					<tr>	
						<th scope="row"><label for="post_your_job">POST YOUR JOB </label></th>
						<td>
							<textarea name="post_your_job" id="post_your_job" rows="5" cols="60" ><?php echo get_option('post_your_job'); ?></textarea>
						
						</td>	
					</tr>	

					<tr>	
						<th scope="row"><label for="get_quotes">GET QUOTES</label></th>
						<td>
							<textarea name="get_quotes" id="get_quotes" rows="5" cols="60" ><?php echo get_option('get_quotes'); ?></textarea>
						
						</td>	
					</tr>
					<tr>	
						<th scope="row"><label for="hire_the_best">HIRE THE BEST</label></th>
						<td>
							<textarea name="hire_the_best" id="hire_the_best" rows="5" cols="60" ><?php echo get_option('hire_the_best'); ?>
							</textarea>
						
						</td>	
					</tr>
					<tr>	
						<th scope="row"><label for="get_work_done">Get work done</label></th>
						<td>
							<textarea name="get_work_done" id="get_work_done" rows="5" cols="60" ><?php echo get_option('get_work_done'); ?>
							</textarea>
						
						</td>	
					</tr>
					<tr>	
						<th scope="row"><label for="get_work_done_img">Get work done Image</label></th>
						<td>
							<input  id="get_work_done_img" class="upload_image_vim" type="text" name="get_work_done_img" value="<?php echo get_option('get_work_done_img'); ?>"></input>
							<input class="upload_image_button" type="button" value="Upload Image" />
							<img src="<?php echo get_option('get_work_done_img'); ?>" width="100" />
						</td>	
					</tr>	
					
					<tr>
						<th scope="row"><label for="get_quotes_img">GET QUOTES IMAGE</label></th>
						<td>
								<input  id="get_quotes_img" class="upload_image4" type="text" name="get_quotes_img" value="<?php echo get_option('get_quotes_img'); ?>" ></input>
								<input class="upload_image_button" type="button" value="Upload Image" />
								<img src="<?php echo get_option('get_quotes_img'); ?>" width="100"/>
						</td>
					</tr>	

					<tr>
						<th scope="row"><label for="hire_the_best_img">HIRE THE BEST IMAGE</label></th>
						<td>
								<input  id="hire_the_best_img" class="upload_image5" type="text" name="hire_the_best_img" value="<?php echo get_option('hire_the_best_img'); ?>" ></input>
								<input class="upload_image_button" type="button" value="Upload Image" />
								<img src="<?php echo get_option('hire_the_best_img'); ?>" width="100"/>
						</td>
					</tr>
			
				</table>
				<?php submit_button(); ?>
			</form>
			
	</div>	
			
	<?php
}

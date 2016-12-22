<?php
/**
* These are settings for the Theme Customizer in the admin panel.
*
*/

if ( ! function_exists( 'wp_newsstream_theme_customizer' ) ) :
	function wp_newsstream_theme_customizer( $wp_customize ) {		
		$wp_customize->remove_section( 'title_tagline');
		/* logo option */
		$wp_customize->add_section( 'wp_newsstream_logo_section' , array(
			'title'       => __( 'Site Logo', 'wp-newsstream' ),
			'priority'    => 29,
			'description' => __( 'Upload a logo to replace the default site name in the header', 'wp-newsstream' ),
		) );		
		$wp_customize->add_setting( 'wp_newsstream_logo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_newsstream_logo', array(
			'label'    => __( 'Choose your logo (ideal width is 100-300px and ideal height is 40-100px)', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_logo_section',
			'settings' => 'wp_newsstream_logo',
		) ) );	
		/* color theme */
		$wp_customize->add_setting( 'wp_newsstream_theme_color', array (
			'default' => '#ff3333',
			'sanitize_callback' => 'sanitize_hex_color',
		) );		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_newsstream_theme_color', array(
			'label'    => __( 'Theme Color Option', 'wp-newsstream' ),
			'section'  => 'colors',
			'settings' => 'wp_newsstream_theme_color',
			'priority' => 31,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_theme_border_color', array (
			'default' => '#d10000',
			'sanitize_callback' => 'sanitize_hex_color',
		) );		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_newsstream_theme_border_color', array(
			'label'    => __( 'Theme Border Color Option', 'wp-newsstream' ),
			'section'  => 'colors',
			'settings' => 'wp_newsstream_theme_border_color',
			'priority' => 32,
		) ) );		
		/* social media option */
		$wp_customize->add_section( 'wp_newsstream_social_section' , array(
			'title'       => __( 'Social Media Icons', 'wp-newsstream' ),
			'priority'    => 33,
			'description' => __( 'Optional social media buttons in the header', 'wp-newsstream' ),
		) );		
		$wp_customize->add_setting( 'wp_newsstream_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_facebook', array(
			'label'    => __( 'Enter your Facebook url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_facebook',
			'priority'    => 101,
		) ) );	
		$wp_customize->add_setting( 'wp_newsstream_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_twitter', array(
			'label'    => __( 'Enter your Twitter url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_twitter',
			'priority'    => 102,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_google', array(
			'label'    => __( 'Enter your Google+ url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_google',
			'priority'    => 103,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_pinterest', array(
			'label'    => __( 'Enter your Pinterest url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_pinterest',
			'priority'    => 104,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_linkedin', array(
			'label'    => __( 'Enter your Linkedin url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_linkedin',
			'priority'    => 105,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_youtube', array(
			'label'    => __( 'Enter your Youtube url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_youtube',
			'priority'    => 106,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_tumblr', array(
			'label'    => __( 'Enter your Tumblr url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_tumblr',
			'priority'    => 107,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_instagram', array(
			'label'    => __( 'Enter your Instagram url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_instagram',
			'priority'    => 108,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_flickr', array(
			'label'    => __( 'Enter your Flickr url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_flickr',
			'priority'    => 109,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_vimeo', array(
			'label'    => __( 'Enter your Vimeo url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_vimeo',
			'priority'    => 110,
		) ) );			
		$wp_customize->add_setting( 'wp_newsstream_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_rss', array(
			'label'    => __( 'Enter your RSS url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_rss',
			'priority'    => 111,
		) ) );		
		$wp_customize->add_setting( 'wp_newsstream_email', array (
			'sanitize_callback' => 'sanitize_email',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_email', array(
			'label'    => __( 'Enter your email address', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_email',
			'priority'    => 112,
		) ) );		
		// author bio in posts option 
		$wp_customize->add_section( 'wp_newsstream_author_bio_section' , array(
			'title'       => __( 'Display Author Bio', 'wp-newsstream' ),
			'priority'    => 113,
			'description' => __( 'Option to show/hide the author bio in the posts.', 'wp-newsstream' ),
		) );		
		$wp_customize->add_setting( 'wp_newsstream_author_bio', array (
			'default'        => '1',
			'sanitize_callback' => 'wp_newsstream_sanitize_checkbox',
		) );		
		 $wp_customize->add_control('author_bio', array(
			'settings' => 'wp_newsstream_author_bio',
			'label' => __('Show the author bio in posts?', 'wp-newsstream'),
			'section' => 'wp_newsstream_author_bio_section',
			'type' => 'checkbox',
		));		
		//slider		
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}
		
		//  =============================
		//  Select Box               
		//  =============================
		$wp_customize->add_section('wp_newsstream_slider', array(
        'title'    => __('Slider Option', 'wp-newsstream'),
        'priority' => 114,
		));	 
		
		$wp_customize->add_setting(
			'wp_newsstream_category',
			array(
				'default' => '',
				'sanitize_callback' => 'wp_newsstream_sanitize_category',
			)
		);		 
		$wp_customize->add_control(
			'wp_newsstream_category',
			array(
				'type' => 'select',
				'label' => 'Select Category:',
				'section' => 'wp_newsstream_slider',
				'choices' => $cats,
			)
		);		
		$wp_customize->add_setting( 'wp_newsstream_slider_speed', array (
			'sanitize_callback' => 'wp_newsstream_sanitize_integer',
		) );		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_slider_speed', array(
			'default' => 6000,
			'label'    => __( 'Slider Speed (milliseconds)', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_slider',
			'settings' => 'wp_newsstream_slider_speed',
			'priority'    => 115,
		) ) );	
	}
endif;
add_action('customize_register', 'wp_newsstream_theme_customizer');

if ( ! function_exists( 'wp_newsstream_sanitize_category' ) ){
	function wp_newsstream_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
}

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'wp_newsstream_sanitize_integer' ) ) :
	function wp_newsstream_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;
/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'wp_newsstream_sanitize_checkbox' ) ) :
	function wp_newsstream_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
endif;
if ( ! function_exists( 'wp_newsstream_enqueue_comment_reply' ) ) :
	function wp_newsstream_enqueue_comment_reply() {
		wp_enqueue_script( 'comment-reply' );

	 }
endif;
add_action( 'comment_form_before', 'wp_newsstream_enqueue_comment_reply' );
/**
* Apply Color Scheme
*/
if ( ! function_exists( 'wp_newsstream_apply_color' ) ) :
  function wp_newsstream_apply_color() {
	 if ( get_theme_mod('wp_newsstream_theme_color') ) {
	?>
	<style id="color-settings">
	<?php if ( get_theme_mod('wp_newsstream_theme_color') ) : ?>
		.btn-default, .navbar-default .navbar-toggle .icon-bar, .nav_container, #respond #submit, .post-content form input[type=submit], .post-content form input[type=button], #footer .widget_calendar thead tr, #copyright, .btn-info, .pagination .fa, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .dropdown-menu > li > a, .dropdown-menu .sub-menu a, .navbar-default .navbar-nav > li, .main-navigation, .main-navigation ul ul a, .navbar-toggle .icon-bar, .main-navigation ul > li, .main-navigation ul ul.children >li > a, .main-navigation ul ul.sub-menu >li > a, .skdslider ul.slide-navs li.current-slide{
			background-color:<?php echo get_theme_mod('wp_newsstream_theme_color'); ?>;
			}
		.btn-info, .nav_container, #footer, .navbar-default .navbar-toggle, .post_box{
			border-color: <?php echo get_theme_mod('wp_newsstream_theme_border_color'); ?>;
		}
		a, a:hover, a:focus .logo h1 span, .logo a, .fan-sociel-media a.btn:hover, .meta-info a:hover, .post_box a.meta-comment:hover,  aside ul li a, a.comment-reply-link, ul li.recentcomments, cite.fn, cite.fn a, footer ul li a, .widget_calendar td a {
		color:<?php echo get_theme_mod('wp_newsstream_theme_color'); ?>;
		}
		h2.post_title a{
		<?php
			$header_text_color = get_header_textcolor();
			if($header_text_color != ""){
		?>	
		color:<?php echo "#" . $header_text_color; ?>	
		<?php
			}
		?>	
		}
		
	<?php endif; ?>
	</style>
	<?php	  
	} 
  }
endif;
add_action( 'wp_head', 'wp_newsstream_apply_color' );
<?php
/**
* WP Newsstream functions
*
*/
require_once(get_template_directory() . '/includes/excerpts.php');
require_once(get_template_directory() . '/includes/pagination.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/breadcrumbs.php');
require_once(get_template_directory() . '/includes/widgetsrecentposts.php');

add_action('after_setup_theme', 'wp_newsstream_theme_setup');
if ( ! function_exists( 'wp_newsstream_theme_setup' ) ) :
	function wp_newsstream_theme_setup(){
		global $content_width;
		load_theme_textdomain('wp-newsstream', get_template_directory() . '/languages');		
		add_editor_style();
		add_theme_support( "title-tag" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background') ;
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'content-width', 550 );		
		add_image_size( 'widget-post-thumb',  70, 70, true );
		add_image_size( 'post-thumb',  905, 380 , true );
		add_image_size( 'slide-small-thumb',  130, 135 , true );
		add_image_size( 'slide-medium-thumb',  265, 135 , true );
		add_image_size( 'slide-large-image',  1256, 450, true );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'wp-newsstream' ),
		) );
	}
endif;

/**
 * Enqueue scripts & styles
 */
if ( ! function_exists( 'wp_newsstream_custom_scripts' ) ) :
	function wp_newsstream_custom_scripts() {
		global $wp_scripts;
		//wp_enqueue_script('jquery');
		wp_enqueue_script( 'wp_newsstream_skdslider_js', get_template_directory_uri() . '/js/skdslider.js', array('jquery') );
		wp_enqueue_script( 'wp_newsstream_navigation_skdslider_js', get_template_directory_uri() . '/js/navigation.js', array('jquery') );			
		wp_enqueue_style( 'wp_newsstream_skdslider', get_template_directory_uri() .'/css/skdslider.css', array(), false ,'screen' );
		wp_enqueue_script( 'wp_newsstream_responsive_js', get_template_directory_uri() . '/js/responsive.js', array('jquery') );
		wp_enqueue_script( 'wp_newsstream_navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );	
		wp_enqueue_script( 'wp_newsstream_ie', get_template_directory_uri() . "/js/html5shiv.js");
    	$wp_scripts->add_data( 'wp_newsstream_ie', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'wp_newsstream_ie-responsive', get_template_directory_uri() . "/js/ie-responsive.min.js");
    	$wp_scripts->add_data( 'wp_newsstream_ie-responsive', 'conditional', 'lt IE 9' );	
		wp_enqueue_style( 'wp_newsstream_responsive', get_template_directory_uri() .'/css/responsive.css', array(), false ,'screen' );		
		wp_enqueue_style( 'wp_newsstream_font_awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );		
		wp_enqueue_style('wp_newsstream_googleFonts', '//fonts.googleapis.com/css?family=Droid +Sans|Lobster|Ubuntu:400,700|Lato|Oswald');
		wp_enqueue_style( 'wp_newsstream_style', get_stylesheet_uri() );
	
		$slider_speed = get_theme_mod( 'wp_newsstream_slider_speed' ) ;
		wp_enqueue_script( "wp_newsstream_custom_js", get_template_directory_uri() . "/js/custom.js", array('jquery') );
		wp_localize_script( "wp_newsstream_custom_js", "slider_speed", array('vars' => $slider_speed) );
	}
endif;
add_action('wp_enqueue_scripts', 'wp_newsstream_custom_scripts');


if ( !function_exists( 'wp_newsstream_menu' ) ){
	function wp_newsstream_menu() {	
		require_once (get_template_directory() . '/includes/wpnewsstreammenu.php');
	}
}

// Register widgetized area and update sidebar with default widgets
if ( !function_exists( 'wp_newsstream_widgets_init' ) ){
	function wp_newsstream_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Homepage Sidebar', 'wp-newsstream' ),
			'id' => 'defaul-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<div class="widget-title"><h4>',
			'after_title' => '</h4></div>',
		) );		
		register_sidebar( array(
			'name' => __( 'Post Sidebar', 'wp-newsstream' ),
			'id' => 'post-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<div class="widget-title"><h4>',
			'after_title' => '</h4></div>',
		) );		
		register_sidebar( array(
			'name' => __( 'Page Sidebar', 'wp-newsstream' ),
			'id' => 'page-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<div class="widget-title"><h4>',
			'after_title' => '</h4></div>',
		) );		
		register_sidebar( array(
			'name' => __( 'Archives Sidebar', 'wp-newsstream' ),
			'id' => 'archives-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<div class="widget-title"><h4>',
			'after_title' => '</h4></div>',
		) );		
		register_sidebar( array(
			'name' => __( 'Banner Widget', 'wp-newsstream' ),
			'description' => 'Enter your banner code into this text widget.',
			'id' => 'top-right-widget',
			'before_widget' => '<div id="top-widget">',
			'after_widget' => "</div>",
			'before_title' => '',
			'after_title' => '',
		) );		
		register_sidebar( array(
			'name' => __( 'Footer 1', 'wp-newsstream' ),
			'id' => 'footer-one',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3></div>',
		) );		
		register_sidebar( array(
			'name' => __( 'Footer 2', 'wp-newsstream' ),
			'id' => 'footer-two',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3></div>',
		) );		
		register_sidebar( array(
			'name' => __( 'Footer 3', 'wp-newsstream' ),
			'id' => 'footer-three',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="widget-title"><h3>',
			'after_title' => '</h3></div>',
		) );
		
}	}
add_action( 'widgets_init', 'wp_newsstream_widgets_init' );

// Template for comments and pingbacks.
if ( ! function_exists( 'wp_newsstream_comment' ) ) :
function wp_newsstream_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'wp-newsstream' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'wp-newsstream' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<footer class="clearfix comment-head">
            
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
					<?php printf( __( '%s', 'wp-newsstream' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'wp-newsstream' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
                    
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content">
            	<?php if ( $comment->comment_approved == '0' ) : ?>
					<h6><em><?php _e( 'Your comment is awaiting moderation.', 'wp-newsstream' ); ?></em></h6>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
                <span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </span><!-- .reply -->
					<?php edit_comment_link( __( '(Edit)', 'wp-newsstream' ), ' ' );?>
            </div>			
		</article><!-- #comment-## -->
	<?php
			break;
	endswitch;
}
endif;

?>
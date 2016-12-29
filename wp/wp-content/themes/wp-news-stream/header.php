 <?php
 /**
 * The template for displaying the header
 *
 */
 ?> 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="container">
	<div id="main-container">
    	<div class="top-bar">
            <div class="row">    
                <div class="col-md-12 fan-sociel-media">  
					<?php if ( get_theme_mod( 'wp_newsstream_email' ) ) : ?>    
                        <a href="<?php _e('mailto:', 'wp-newsstream'); echo sanitize_email( get_theme_mod( 'wp_newsstream_email' ) ); ?>" class="btn" title="Email"><span class="fa fa-envelope"></span></a>    
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'wp_newsstream_rss' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_rss' ) ); ?>" class="btn" title="RSS"><span class="fa fa-rss"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_vimeo' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_vimeo' ) ); ?>" class="btn" title="Vimeo"><span class="fa fa-vimeo-square"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_flickr' ) ) : ?>   
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_flickr' ) ); ?>" class="btn" title="Flickr"><span class="fa fa-flickr"></span></a>   
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_instagram' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_instagram' ) ); ?>" class="btn" title="Instagram"><span class="fa fa-instagram"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_tumblr' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_tumblr' ) ); ?>" class="btn" title="Tumblr"><span class="fa fa-tumblr"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_youtube' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_youtube' ) ); ?>" class="btn" title="Youtube"><span class="fa fa-youtube"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_linkedin' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_linkedin' ) ); ?>" class="btn" title="Linkedin"><span class="fa fa-linkedin"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_pinterest' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_pinterest' ) ); ?>" class="btn" title="Pinterest"><span class="fa fa-pinterest"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_google' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_google' ) ); ?>" class="btn" title="Google Plus"><span class="fa fa-google-plus"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_twitter' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_twitter' ) ); ?>" class="btn" title="Twitter"><span class="fa fa-twitter"></span></a>    
                    <?php endif; ?>
					<?php if ( get_theme_mod( 'wp_newsstream_facebook' ) ) : ?>    
                        <a href="<?php echo esc_url( get_theme_mod( 'wp_newsstream_facebook' ) ); ?>" class="btn" title="Facebook"><span class="fa fa-facebook"></span></a>    
                    <?php endif; ?>         
    			</div> <!--end fan-sociel-media-->    
            </div>     
		</div> <!--end top-bar-->

        <header id="header" class="header">
        	<div>
            	<div class="row">
                	<div class="col-md-12">
                    	<div class="logo">
                        	<?php if ( get_theme_mod( 'wp_newsstream_logo' ) ) : ?>
                                <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'wp_newsstream_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
                                <?php else : ?>
                                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <p id="description"><?php bloginfo('description'); ?></p>
                           <?php endif; ?>
                        </div>
						<?php dynamic_sidebar('top-right-widget'); ?>
                    </div>
                </div>
            </div>
         <div class="nav_container">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                  <button class="menu-toggle navbar-toggle" aria-controls="menu" aria-expanded="false">
                  	<span class="sr-only"><?php _e( 'Toggle navigation', 'wp-newsstream' ); ?></span>            
                    <span class="icon-bar"></span>            
                    <span class="icon-bar"></span>            
                    <span class="icon-bar"></span>
                  </button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'wp_newsstream_menu' ) ); ?>

                </nav>
        </div> <!--end nav_container-->
        </header>

        <div class="clearfix"></div>
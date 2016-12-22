<?php
/**
 * The template for displaying Archive pages
 *
 */
?>

<?php get_header(); ?>
<div id="content">
	<div class="row">
		<article class="col-md-9">
        <div class="row breadcrumb-container">
			<?php wp_newsstream_breadcrumb(); ?>
        </div>
			<?php if (have_posts()) : ?>
            <div id="page-heading">
                <?php $post = $posts[0]; ?>
                <?php if (is_category()) { ?>
                <h1><?php single_cat_title(); ?></h1>
                <?php  } elseif (is_author()) { ?>
                <h1><?php _e( 'Author: ', 'wp-newsstream' ); ?><?php the_author(); ?></h1>
                <?php } elseif( is_tag() ) { ?>
                <h1><?php _e( 'Posts Tagged: ', 'wp-newsstream' ); ?><?php single_tag_title(); ?></h1>
                <?php  } elseif (is_day()) { ?>
                <h1><?php _e( 'Daily Archive: ', 'wp-newsstream' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></h1>
                <?php  } elseif (is_month()) { ?>
                <h1><?php _e( 'Monthly Archive: ', 'wp-newsstream' ); ?><?php single_month_title(' '); ?></h1>
                <?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h1><?php _e( 'Blog Archives: ', 'wp-newsstream' ); ?></h1>
                <?php } ?>
            </div>
            <!-- END page-heading -->
            <?php get_template_part( 'loop', 'entry' ); ?>
                           	     
                <div class="clearfix"></div>
					 <?php if (function_exists("wp_newsstream_pagination")) {
                                wp_newsstream_pagination(); 
                    }
                    ?>
            
            <!-- END post -->
            <?php endif; ?>
		</article>            
	    <aside class="col-md-3">         
			<?php get_sidebar(); ?>
        </aside>
	</div>
</div>   
<?php get_footer(' '); ?>
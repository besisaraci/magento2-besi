<?php
/**
 * The template for displaying 404 pages (Not Found)
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
            <div id="page-heading">
                <h1><?php _e('404 Error - Page Not Found','wp-newsstream'); ?></h1>		
            </div>
            <!-- END page-heading -->
            <div class="post_box" >
                <div class="post clearfix">                
                    <div class="entry clearfix">	
                    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'wp-newsstream' ); ?>.</p>
                    <?php get_search_form(); ?>                  
                    </div>
                    <!-- END entry -->
                    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>                    
                </div>
			</div>
        </article>	  
	    <aside class="col-md-3">         
			<?php get_sidebar(); ?>
        </aside>
	</div>
</div>
<?php get_footer(); ?>
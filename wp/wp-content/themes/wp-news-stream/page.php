<?php
/**
 * The template for displaying all pages by default
 */
?>
<?php get_header(); ?>
<div id="content">
	<div class="row">
		<article class="col-md-9">
        	<div class="row breadcrumb-container">
				<?php wp_newsstream_breadcrumb(); ?>
            </div>
            
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <div id="page-heading">
                <h1><?php the_title(); ?></h1>		
            </div>
            <!-- END page-heading -->
            <div class="post_box" >
            <div class="post clearfix">
            
                <div class="entry clearfix">	
                <?php the_content(); ?>
                <?php comments_template(); ?>  
                </div>
                <!-- END entry -->
                
            </div>
            <!-- END post -->
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            
        </article>	  
	    <aside class="col-md-3">         
			<?php get_sidebar(); ?>
        </aside>
	</div>
</div>
<?php get_footer(); ?>
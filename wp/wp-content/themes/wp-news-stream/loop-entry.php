<?php 
/**
* The template for displaying all loop entry
*
*/
?>
<?php while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
            <div class="post_box">
            		<h2 class="post_title post_box_inner"><a href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h2>
                    <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a> 
                    <div class="post_box_inner">               
                        <p class="post_desc"><?php echo wp_newsstream_excerpt('30'); ?></p>                    
                        <div class="col-md-4">
                            <a href="<?php the_permalink('') ?>" class="btn btn-info"><?php _e( 'Read More', 'wp-newsstream' ); ?></a>
                        </div>
                        <div class="col-md-8">
                        	<ul class="meta-info">
                            	<li><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>
                            	<li><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
                                <li><a href="<?php comments_link(); ?>" class="meta-comment"><i class="fa fa-comments"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></li>
                            </ul>
                            <div class="clearfix"></div> 
                        </div>
                    </div>
                    <div class="clearfix"></div>                     
            </div>
         </div>  
<?php endwhile; ?>
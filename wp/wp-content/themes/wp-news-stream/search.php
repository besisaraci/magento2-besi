<?php
/**
 * The template for displaying Search Results pages
 *
 */
 
 ?>
<?php get_header(); ?>        
        <div id="content">
            <div id="content" class="content">
                <div  class="row">           		
                    <div class="col-md-9">
                    	 <div class="row breadcrumb-container">
							<?php wp_newsstream_breadcrumb(); ?>
                        </div>
                         <div id="inner_content">
								<?php
                                //query posts
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									query_posts($query_string .'&posts_per_page=10&paged=' . $paged);
                                ?>
                         	<div id="page-heading"><h1 class="post_title"><?php _e( 'Search Results For: ', 'wp-newsstream' ); ?><?php the_search_query(); ?></h1></div>
                            <div id="post" class="row">                             
								<?php if (have_posts()) : ?>
                                	<?php get_template_part( 'loop', 'entry' ); ?>                               	
                              	<?php else : ?>
                                    <!-- END page-heading -->
                                    <div class="post_box" >
                                    <div id="post" class="post clearfix">
                                    <div class="col-md-12"><h3><?php _e('No results found for that query.', 'wp-newsstream'); ?></h3></div>
                                    </div>
                                    <!-- END post  -->
                                     </div>
								<?php endif; ?> 		 
                                <?php wp_reset_query(); ?>                                
                             </div> <!--end class="row"-->
                              
                             <div class="clearfix"></div>
                             <?php if (function_exists("wp_newsstream_pagination")) {
									wp_newsstream_pagination(); 								
								}
								?>
                        </div> <!--end id="inner_content"-->                      
                        
                    </div> <!--end class="col-md-9"-->
                    <div class="col-md-3">
                         <aside id="widget">
                         	<?php get_sidebar(); ?>
                        </aside>
                    </div>
                </div> <!--end <div class="row"> -->
            </div> <!--end <div id="content" class="content">-->
        </div>
<?php get_footer(' '); ?>

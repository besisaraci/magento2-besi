<?php
/**
 * The main template file.
 *
 */
?>
<?php get_header(); ?>	
        
        <div id="content" >
        	<div class="row slide_container">
                <div class="col-md-12">
        			<?php get_template_part( 'includes/slider' ) ?>           
                    
    			</div>
        	</div>
            <div id="content" class="content">
                <div  class="row">           		
                    <div class="col-md-9">
                    
                         <div id="inner_content">
                            <div id="posts" class="row">                                    
								<?php
                                //query posts
                                    query_posts(
                                        array(
										
                                        'post_type'=> 'post',
                                        'paged'=>$paged,
										'orderby'=> 'post_date',
										'order'=> 'DESC'
                                    ));
                                ?>
                                <?php if (have_posts()) : ?>           
                                	<?php get_template_part( 'loop', 'entry' ); ?>
                                    <div class="clearfix"></div>
                                     
								<?php endif; ?> 		 
                                <?php wp_reset_query(); ?> 
                               
                             </div> <!--end class="row"-->
                              <?php if (function_exists("wp_newsstream_pagination")) {
									wp_newsstream_pagination(); 
								
								}
								?>
                             <div class="clearfix"></div>
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

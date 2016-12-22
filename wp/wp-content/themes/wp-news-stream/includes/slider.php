<?php 
/**
 * The template for displaying featured image
 *
 */
$slider_cat = get_theme_mod( 'wp_newsstream_category'); 
//query posts
query_posts(
	array(
	'offset'           => 0,
	'category_name' => $slider_cat,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true
));

?>
<?php if (have_posts()) : ?>           
	<?php while (have_posts()) : the_post(); ?> 
    	<ul id="wpslide">
    	<?php			
			if ( '' != get_the_post_thumbnail()) { 
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-large-image');
				$medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-medium-thumb');
				$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-small-thumb');			
		?>
        <li>
        	<img src="<?php echo $large_image_url[0] ?>" />
                    <!--Slider Description example-->
             <div class="slide-desc">
                    <h2><a class="more" href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo wp_newsstream_excerpt('30'); ?></p>
              </div>
        </li>
        <?php				
			}			
		 ?>    
    <?php endwhile; ?> 
<?php endif; ?> 
<?php wp_reset_query(); ?>

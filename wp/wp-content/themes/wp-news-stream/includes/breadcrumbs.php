<?php
/**
* WP Newsstream breadcrumb functionality
*
*/

if(!function_exists('wp_newsstream_breadcrumb')) {
	function wp_newsstream_breadcrumb() {
		global $post;
		echo '<ul id="breadcrumbs">';
		if (!is_home()) {
			echo '<li><a href="';
			echo home_url();
			echo '">';
			echo '<i class="fa fa-home"></i>Home';
			echo '</a></li><li class="separator"> / </li>';
			if (is_category() || is_single()) {
				echo '<li>';
				the_category(' </li><li class="separator"> / </li><li> ');
				if (is_single()) {
					echo '</li><li class="separator"> / </li><li>';
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				if($post->post_parent){
					$newsstream_act = get_post_ancestors( $post->ID );
					$title = get_the_title();
					foreach ( $newsstream_act as $newsstream_inherit ) {
						$output = '<li><a href="'.get_permalink($newsstream_inherit).'" title="'.get_the_title($newsstream_inherit).'">'.get_the_title($newsstream_inherit).'</a></li> <li class="separator">/</li>';
					}
					echo $output;
					echo '<strong title="'.$title.'"> '.$title.'</strong>';
				} else {
					echo '<li><strong> '.get_the_title().'</strong></li>';
				}
			}
		}
		echo '</ul>';
	}
}
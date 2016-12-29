<?php
/**
 * The template for displaying Comments
 *
 */
?>

	<div id="comments">
	<?php if ( post_password_required() ) : ?>    
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'wp-newsstream' ); ?></p>
	</div>
	<?php
			return;
		endif;
	?>
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>    
		<div id="comments-title">
        	<h3>
			<?php
				printf( _n( 'This article has 1 comment', 'This article has %1$s comments', get_comments_number(), 'wp-newsstream' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
            </h3>
		</div>
		<ol class="commentlist">
			<?php
				/* Loop through and list the comments.
				 */
				wp_list_comments( array( 'callback' => 'wp_newsstream_comment' ) );
			?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'wp-newsstream' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wp-newsstream' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wp-newsstream' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'wp-newsstream' ); ?></p>
	<?php endif; ?>    
<?php comment_form(array('comment_notes_after' => '')); ?>	
</div><!-- #comments -->
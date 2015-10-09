<?php
/**
 * @package framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>

		<div class="entry-meta">
			<?php framework_posted_on(); ?>
		</div>

	</header>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
		
	<?php else : ?>
	
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'framework' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'framework' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				// translators: used between list items, there is a space after the comma
				$categories_list = get_the_category_list( __( ', ', 'framework' ) );
				if ( $categories_list ) :
			?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'framework' ), $categories_list ); ?>
				</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'framework' ) );
				if ( $tags_list ) :
			?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'framework' ), $tags_list ); ?>
				</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'framework' ), __( '1 Comment', 'framework' ), __( '% Comments', 'framework' ) ); ?></span>
		<?php endif; ?>

	</footer>
</article>
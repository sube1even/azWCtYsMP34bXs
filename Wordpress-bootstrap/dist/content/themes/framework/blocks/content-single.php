<?php
/**
 * @package framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>

		<div class="entry-meta">
			<?php framework_posted_on(); ?>
		</div>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'framework' ),
				'after'  => '</div>',
			));
		?>
	</div>

	<footer class="entry-footer">
		<?php
			// translators: used between list items, there is a space after the comma
			$category_list = get_the_category_list( __( ', ', 'framework' ) );

			// translators: used between list items, there is a space after the comma
			$tag_list = get_the_tag_list( '', __( ', ', 'framework' ) );

			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) 
			{
				$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'framework' );
			}
			else 
			{
				$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'framework' );
			}

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

	</footer>
</article>

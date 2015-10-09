<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'framework' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	
</article>
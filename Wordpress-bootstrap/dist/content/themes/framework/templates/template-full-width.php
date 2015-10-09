<?php
/**
 * Template Name: Full Width
 *
 * @package framework
 */

get_header(); ?>

<div class="container">
	<main role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php block( 'content-page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</main>
</div>

<?php get_footer(); ?>

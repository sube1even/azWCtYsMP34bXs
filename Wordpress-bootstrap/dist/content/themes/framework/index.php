<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package framework
 */

get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-sm-8 col-md-9 col-lg-8">
			<main role="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php block( 'content' ); ?>

					<?php endwhile; ?>

					<?php framework_paging_nav(); ?>

				<?php else : ?>

					<?php block( 'content-none' ); ?>

				<?php endif; ?>

			</main>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>

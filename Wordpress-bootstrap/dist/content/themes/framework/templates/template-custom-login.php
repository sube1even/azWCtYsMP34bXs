<?php
/**
 * Template Name: Login
 *
 * @package framework
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-md-9 col-lg-8">
			<main role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php block( 'login-form' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>

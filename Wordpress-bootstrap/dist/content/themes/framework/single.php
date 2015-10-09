<?php
/**
 * The Template for displaying all single posts.
 *
 * @package framework
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-md-9 col-lg-8">
			<main role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php block( 'content-page' ); ?>

					<?php framework_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
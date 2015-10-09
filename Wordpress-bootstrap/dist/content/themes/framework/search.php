<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package framework
 */

get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-sm-8 col-md-9 col-lg-8">
			<main role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'framework' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					</header>

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

<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package framework
 */

get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-sm-8 col-md-9 col-lg-8">
			<main role="main">

				<header class="page-header">
					<h2 class="page-title"><?php _e( 'That page can&rsquo;t be found.', 'framework' ); ?></h2>
				</header>

			</main>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
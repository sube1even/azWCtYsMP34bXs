<?php
/**
 * The template for displaying Archive pages.
 *
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

					<header class="page-header">
						<h2 class="archive-title page-title">
							<?php

							if ( is_post_type_archive() ):
								echo post_type_archive_title();

							elseif ( is_category() ):
								single_cat_title();

							elseif ( is_tag() ):
								single_tag_title();

							elseif ( is_author() ):
								printf( __( 'Author: %s', 'framework' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ):
								printf( __( 'Day: %s', 'framework' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ):
								printf( __( 'Month: %s', 'framework' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'framework' ) ) . '</span>' );

							elseif ( is_year() ):
								printf( __( 'Year: %s', 'framework' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'framework' ) ) . '</span>' );

							elseif ( is_tax() ):
								echo framework_get_queried_object_title();

							else:
								_e( 'Archives', 'framework' );

							endif;

							?>
						</h2>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>
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

<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if ( WP_ENV == 'development' ): ?>
	<script src="//localhost:35729/livereload.js"></script>
<?php endif; ?>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page">

		<header class="site-header">
			<div class="container">

				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div>

				<div class="navbar navbar-inverse" role="navigation">
					<div class="navbar-collapse collapse">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'container' => false,
							'menu_class' => 'nav navbar-nav',
							'walker' => new wp_bootstrap_navwalker()
						));
						?>
					</div>
				</div>

			</header>


			<div id="content">

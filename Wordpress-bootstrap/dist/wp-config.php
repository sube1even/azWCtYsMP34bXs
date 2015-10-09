<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


$domains = array(
	'development' => 'http://localhost:4000',
	'staging' => 'http://framework3.staging.lithe.co',
	'live' => 'http://example.org',
);


if ( stristr( $_SERVER[ 'HTTP_HOST' ], 'localhost' ))
{
	/**
	 * Local environment
	 */
	define('WP_ENV', 'development');

	define('DB_NAME', 'wordpress');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');

	define('WP_SITEURL', $domains['development'] . '/wordpress' );
	define('WP_HOME', $domains['development'] );
	define('WP_CONTENT_URL', $domains['development'] . '/content');

	//define('WP_DEBUG', true);
}
elseif ( stristr( $_SERVER[ 'HTTP_HOST' ], 'staging' ) )
{
	/**
	 * Staging Environment
	 */
	define('WP_ENV', 'staging');

	define('DB_NAME', 'stagingl_wp_framework');
	define('DB_USER', 'stagingl_wp');
	define('DB_PASSWORD', 'ic0MnsA8TZH8');
	define('DB_HOST', 'localhost');

	define('WP_SITEURL', $domains['staging'] . '/wordpress' );
	define('WP_HOME', $domains['staging'] );
	define('WP_CONTENT_URL', $domains['staging'] . '/content');
}
else
{
	/**
	 * Production Environment
	 */
	define('WP_ENV', 'live');

	define( 'DB_NAME', 'wp_intranet' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '3gEDg6u!STv!' );
	define( 'DB_HOST', 'localhost' );

	define('WP_SITEURL', $domains['live'] . '/wordpress' );
	define('WP_HOME', $domains['live'] );
	define('WP_CONTENT_URL', $domains['live'] . '/content');

	// WP Super Cache
	define( 'WP_CACHE', true );
	define( 'WPCACHEHOME', dirname(__FILE__) . '/content/plugins/wp-super-cache/' );
}


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');


/**
 * Disable external requests
 *
 * This is so that users dont see update requests since things are managed through git
 */
define('WP_HTTP_BLOCK_EXTERNAL', true);


/*
 * Disable automatic updates
 */
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_AUTO_UPDATE_CORE', false );



/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'qantis' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#(cr/2=qFu UkRo`,f1-vK!XiAh-QWYwR[)cSBJp^Q3UpU,]=)uHaJCxewK%<SKF' );
define( 'SECURE_AUTH_KEY',  'V==fJQb%?M/NEC~r!V!XW{cOkKpaZoqMg%qZSE-^YRH#ImcA~R|!v>hY0 LD$;<i' );
define( 'LOGGED_IN_KEY',    'y^7;Sxz`8(PEiy@P^_|-Hva*,?^`B6Rl7n6Re5t+S^m+5$rbZ)*3`.Y8^;Ar$IAq' );
define( 'NONCE_KEY',        'kpbt@{rP @ZIO7qFpnWRcPTb|*>> y_L?s^t`}~}Qq!P9 l!zOl+A(v%+)d_dVQI' );
define( 'AUTH_SALT',        '^b]B08+HTrx kE]cb>@2l^ROEnoUpO;wjb&eD^rt/odNj1uVt<R{#iveFpbNKVz{' );
define( 'SECURE_AUTH_SALT', 'fy[tPtm|aZ F@~@4SMKV!=!Lqc!zU4.bC]!cu9EOL{=%T<Et>~NlZr`&i+~yfP/&' );
define( 'LOGGED_IN_SALT',   'VLE~=Vy++/O3uo?fj~w0r_+KM3v23JtG5kjcOf %T4gT>Ya~kTms`eCg_GIQX5Dx' );
define( 'NONCE_SALT',       'HS}uJ<eSrODZ:7ps<7g)XOF*%d/k+dD%Gw3Z@(ViM$G637harjKSw7~{mW7{1A4Q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

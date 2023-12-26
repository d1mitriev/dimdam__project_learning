<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mysql' );

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
define( 'AUTH_KEY',         '/%haq:Zn_$^s<$9Y#%O`8}jA8-RC)TE$ZHoz8=hwb+Zv)=/v{4XR]fAd:(IiI*YQ' );
define( 'SECURE_AUTH_KEY',  '^Q!z[VZ)C4.N.hdgWC+1b$1YYRA~d3,j5C1F-O7mE[ciPW(yv[ygx}a`8TB-0bck' );
define( 'LOGGED_IN_KEY',    'J_CLU2U@$%v:{`yru|.p-B5.6lFj1E?mt?z rC87.TJFQ8b@$l/M(Em7C#dcPwa=' );
define( 'NONCE_KEY',        'XdHv30v,i;HIU/qO}k@n!V:w{p9czDyxcb+^P0DGOqwf10[~K<q4d-/3mNk5`UuY' );
define( 'AUTH_SALT',        '!wCvL1$m`BOS@5Fd=9%&}AC^ct*)f]+MvPCRiz3-:B<){DwJ,j,|)F^=.P.|GmWQ' );
define( 'SECURE_AUTH_SALT', '1gv<w6=DpR_ts<PaBfFh(Y iUBDJ{#/4. 4f<hUu)8[,2h5Ymp@+`^y?6:]:m P)' );
define( 'LOGGED_IN_SALT',   ':H^uCe{nTB96U?a_b0dUYv8McRq.TJ5%2bjX.5bC;$iE rs}_nHHyW#t43~5_tPb' );
define( 'NONCE_SALT',       't~J$j<weWYKt:D5rW_VRZcENAJ;}baV}McAQA=NBFjnEvFgkGH]33P+nv:-<n[Q#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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

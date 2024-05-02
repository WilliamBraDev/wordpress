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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'basededatos_williamstile' );

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
define( 'AUTH_KEY',         'LV0T9zwyx@tHm:V;Kg:&JpUN`k ,?,o#8lXb+4}MXR{m~p|mzTOC;lwV(Wqf&L0}' );
define( 'SECURE_AUTH_KEY',  '0+V[]`0-&w~}v%peQuR|Q><mm0.yA~>+Bxw_>]hE[%Cy7`hpr_xB@Uw}8mEYIoNm' );
define( 'LOGGED_IN_KEY',    ' 3g3zqOnx!99t%*7sZ3 B^D=}RP|dRCbeExqenF<(RNTHEFFE78eb-S)ePLQdsHx' );
define( 'NONCE_KEY',        'E)R1-QE`CcQds|k4)wqXOGO1S7^<k#:YKa-zZIP9&5!GKyZ:q@HPR3P8`l|bevz(' );
define( 'AUTH_SALT',        'z-4%si|kQ=z@S%W9gkbJXO.&|]{a?&xY)w}{Wp2ZhSb9K_)ylB:]B7-x-.}0A^ST' );
define( 'SECURE_AUTH_SALT', 'NMeFIvOJ6}3>Bf:mv;g:=3Z.^M*]CJJsu{.q`/]c4Q-MmGRfHbAkG=`y -[%)C4Y' );
define( 'LOGGED_IN_SALT',   '=(O5F04p(%GG/>@NX$1oTwp~PBgi:rj=lFd^xOuU#ew%26_;%~xFC/gjHjh^Y$% ' );
define( 'NONCE_SALT',       '$hKqd4&55;umr/^wX;[R9~iO~-}[n`v3+]QU~Bp,nir4/o/*$JUgkL+.&f#P|qqJ' );

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

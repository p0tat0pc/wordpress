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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'Xr&0=yHD2hLWkQ=%/dBH=@n(*<u,?)*(W*wTesM}peIxx2Jj3By%z~0)pM`_$yk;' );
define( 'SECURE_AUTH_KEY',  '!hmZ/mL]p9B@1a4fCe2,g-$`)qMub72)m/JpA1&yGfoOg <%{vZK~3p,hfa}52li' );
define( 'LOGGED_IN_KEY',    'JYIZy ke 9K1qbc4]YQrtAtK:#b*[IKvz@JX_#JkHI,v)Kua?w&?[Sr<ZF*}cHN|' );
define( 'NONCE_KEY',        '.u}L`5ZJ4caz,:RZb0zqy4kW({[) pQ/|R}2*}oQM%b5*4*5,G?#O[h=rDrpVi2L' );
define( 'AUTH_SALT',        'ZUysKa_VSI-JW/ |84Y=g,,vFeeIC^1~{Ho%];c&eL`Ejz.~?]77bP,;V45|M.3v' );
define( 'SECURE_AUTH_SALT', '9qCPnJJ~~JHU[/uh$fnpj>S{*#$;5VK[!${&jQbit(Lw}RKvsS@=b#SPmIQq2(Nk' );
define( 'LOGGED_IN_SALT',   '_Zx;[>q+Zj rvC^+{rPR~rWYg@OX)N<>?-;c23R($C{a+]]fQ+-rNZp*h43Oc:Ca' );
define( 'NONCE_SALT',       '1dJM1xVthDlQb7jX.zNmf$=x5`n-ZF__/f7fn$~rXzLNi6:Eo8/YW-Za%Mj*TevR' );

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

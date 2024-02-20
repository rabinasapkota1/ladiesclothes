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
define( 'DB_NAME', 'ladiesclothing' );

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
define( 'AUTH_KEY',         '&xTtcwzvA[r<UL~+:nCP!]n01&[s@+pVC &vS%DGo:!>:n0m]`lzUxr ;3csRbb,' );
define( 'SECURE_AUTH_KEY',  '/HX{J^jF&&n(N1DksITh)uE%zdfzHcSTAmPH^oi,-PhJZ9dNY7Xa1Y&%=&?$wg)B' );
define( 'LOGGED_IN_KEY',    ' u|zRr{k&WCMI?0_OEom$(?T5(L)GofUEsg:n-_x !K}H)8MzAUIG7j_YlpoF#Q+' );
define( 'NONCE_KEY',        'Z, h/[R>W*t]MAJ%u?4%2|dQ=JTCph[MFG`cdP>ea!N3f6DMVUUc+e<1hTVyca9.' );
define( 'AUTH_SALT',        '&{Na1i`jm:hKy+of0b@=Wz^vMh4&[2Lwv8#otcP/b8-e?8V__4ceeeGR-{I/Jlw3' );
define( 'SECURE_AUTH_SALT', '5>O~vR5~NkUW2Aa+*!<7[xy}:c<kCr-6JkS0x]&`_fZch?B(;Dxm3S5B9D8D8e9H' );
define( 'LOGGED_IN_SALT',   '*ohD C# BrW0>;$@=#C9mPr4WB^P-3B<_s0l=Yzy49k[+O<(fK.2Fnb8wZTShtJo' );
define( 'NONCE_SALT',       'uhQmcq%VS;OS-tX/TgK1Rj[b=a9ws>:H+ct;pr_F57kN=~t.I7ZB<:P&2 zH)#ny' );

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

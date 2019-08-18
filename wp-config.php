<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'themes-handbook' );

/** MySQL database username */
define( 'DB_USER', 'themes-handbook' );

/** MySQL database password */
define( 'DB_PASSWORD', '123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3Ea.E1e[B?U:X[)SJWN%2x1% M)dEJRG<H~js$3<HmM%Zc_U&O4T`Wc/:@r|!&,(' );
define( 'SECURE_AUTH_KEY',  '}vnp%$?Fo/gw~NJ$6,)(g[g9R,Uuv4c)_JED>BwQ 0`|)Yj]+L!^INW$~;zytXs/' );
define( 'LOGGED_IN_KEY',    '_ZUGG< ni6!,Jv-caS 0P=aUs3,N MUYw <p_w9Tk44>FAGx%}g.Tw Vd,6M%@oW' );
define( 'NONCE_KEY',        '2q4SB*?hh ^8}o#^syTa:%O7@d8=EIJ>@-ht]pDsjdkf`AJ#moY[zfNS{_(9ZF1&' );
define( 'AUTH_SALT',        ')~xppZfSc;B/k3F(f](dlip_(~#=`U,E5z[^hL %;E +Hs^*[j3G.f.oH6_*12C0' );
define( 'SECURE_AUTH_SALT', 'A19<QNr#nzDsRPBA9(Uq#@:1a`&i5o1_=(DkKVJc`.9{|B/.[<VIuaLe+mk`(Wu6' );
define( 'LOGGED_IN_SALT',   'c(,,*;oAA?ZDyWybXP{$6`$*kS^J_sbm%,A|/]F7BCd0J/[srk^=)Q7q_d8(:X0(' );
define( 'NONCE_SALT',       '>WYvkEf$]sC%+XHK[$e&?b0:q+B.EmB5$HZqiHdTL+BTzOCZh`)C%z$5+0%/=+8R' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

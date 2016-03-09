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
define('DB_NAME', 'dreamy-wedding-company');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '+v.]2~AOh|</zlV6LT*EF=)|/%:BEH-g%ZO9q6tB).GWtVhxk*p}A$EIEqVf7Y*;');
define('SECURE_AUTH_KEY',  '@n1S$acDw,63{%$]~q3>xn=?wm7yYIirRSz)~pDGxlL`7Fmrr8ZEi1:1BuI)eap-');
define('LOGGED_IN_KEY',    'Q$+r{#x-P&DPMgq& C-kxju-K|AOm7D|$6nm^j,l=;)-N<cjfqgQ_Ouqg}8#G.Tj');
define('NONCE_KEY',        'qMu=|~@e^KuI1=Ts)9_,P-Z[nA[Z8iz83r|)~fbl1oXnWybTVQH+d~d+< ]a<&9 ');
define('AUTH_SALT',        'mBS}-hGFFx.So$SXv|9wpeXAzp}FT3-@o`OIKHV_v2HNu&-9!-^-9y<Jux8[9(eK');
define('SECURE_AUTH_SALT', '9?)LcCDySAPB-A0u0X| Gd1O{[|/<nv%&{N1bp[k7K@)TelCln79w-Uq]e;h>yL7');
define('LOGGED_IN_SALT',   'p,)T(UQ(+oh2Xl7!G J++9@|7565:ze7f4]9j?HAcu+Z$<Q=.eD,n,#aGs`;e=%E');
define('NONCE_SALT',       'Zt9g,1Q=7`jAxrvJ`hvGl:+,+^7Gj[hu*z! ,fBS$e;*/%Nq^K(*m[Q q|L|Je -');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

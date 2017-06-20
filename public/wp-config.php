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


$http_host = strtolower( $_SERVER['HTTP_HOST'] );

switch ($http_host) {
	case "restapi.dev":
		// Dev Environment
		define( 'DB_NAME', 'restapi' );
		define( 'DB_USER', 'restapi' );
		define( 'DB_PASSWORD', 'restapi' );
		define( 'DB_HOST', 'localhost' );

		define( 'WP_HOME', 'http://restapi.dev');
		define( 'WP_SITEURL', WP_HOME);

		// Dev will always want debug on and caching off
		define( 'WP_DEBUG', false );
		break;
	default:
		// Production Environment
		define('DB_NAME', 'u373124226_rest' );
		define('DB_USER', 'u373124226_rest' );
		define('DB_PASSWORD', 'restapi' );
		define('DB_HOST', 'mysql.hostinger.co.uk' );
		//define('FTP_USER', 'u373124226_rest'); // Your FTP username
		//define('FTP_PASS', 'restapi'); // Your FTP password
		//define('FTP_HOST', 'http://restapi.16mb.com'); // Your FTP URL:Your FTP port

		define( 'WP_HOME', 'http://restapi.16mb.com');
		define( 'WP_SITEURL', WP_HOME);

		// Live Environment will always be the same as production so turn off debug and turn on caching
		define( 'WP_DEBUG', false );
		break;
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'restapi');

/** MySQL database username */
define('DB_USER', 'restapi');

/** MySQL database password */
define('DB_PASSWORD', 'restapi');

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
define('AUTH_KEY',         'u!My0@Oe|&U$w+p$wt!1e4wqVb0]AKcSc$`= [>Ct${ug]R6A~}]=jCx+f~=Fm-A');
define('SECURE_AUTH_KEY',  'WR]+JAGOh^n^.0WhCdCpgsQ;rjvD9? GhFk`@%7YNIG[|jPpXdsr.n=#rq:;-jHC');
define('LOGGED_IN_KEY',    '?hrujq^bm_A Q0{)eY,r/PeX6mR=A<Yb(f$}oB!Skp+_NfnuRq_=AeqzHz9g1X#K');
define('NONCE_KEY',        'X{fx$d{_*gmn Gmc%jqE:AI2E ^$><UL+e#t`jsCkwn3>;i50hU{6(WKw-{{O9:b');
define('AUTH_SALT',        'f0/[`aboIW&&c#t_2Ek<;{mH!X[}sQUpXQbp-r_x#)_b)X75s1SU2%rkGcU^lXe6');
define('SECURE_AUTH_SALT', '#i)AL(*WLYR!yC)VN^szSE h2l=*kM^gCQ?L7ud&=FEWwKad!71(E{6Ww5zbO*!s');
define('LOGGED_IN_SALT',   'dJ!_4aDpoyh2O#$.;jgS]AXdm{#Yh8e;gPg!0jnb?qD$W(RW>P_#PRPc9uSA.T=z');
define('NONCE_SALT',       '{MJLOT!1q`9REth@rGPXA+Exut3=eeibm`~hA.:J}B1$HEAox0j_X]/nq0@Fs<U`');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

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
define('DB_NAME', 'hesstun');

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
define('AUTH_KEY',         's|1d^3q1XOJdcNRCS=!;83J9UaHS9|;f/UX?SaN|/{[$-,qZi=~X?#j:z<@osqYl');
define('SECURE_AUTH_KEY',  'tey7bcl4_&uw!ChV*Tc@vM*XO;]6}(F~1C(G tl%x@OJ(XywR]^TJyzZbv=bg}*F');
define('LOGGED_IN_KEY',    'pv # jxr$7dbMEXFq5v:EGd]Thtd?cV6ObfW-W@l>P}_h[Z^;#$LjC.g.Z6 xSk1');
define('NONCE_KEY',        ',M%D~M*-hZ`|_5fHv:|q}F{hXj$H~[}AL~SKO.:8:l_PkPCITzRA7^@kxj~ VoKR');
define('AUTH_SALT',        'ZURp142&MsER?h B<g_L.@6*8C[r|0(]U!n%FS2^,W.9edI=bF|S7EMFmGRDAGja');
define('SECURE_AUTH_SALT', '%|M^c::)NB=Nqw~9@,(BrQrpdg420lX|op?Z9L6 R 2WrC/iL2vPFPuD)o}+zreK');
define('LOGGED_IN_SALT',   '`sku>BPp;{x0o})efUCBdtzDRF;`2hC=w:oG8QQkr.y#B}7ByL)FGE^||w `8~sE');
define('NONCE_SALT',       '`ZjBdY+bcM5.BX>oNNOp@Qft#+>]qn{Q,0dkt-gJ@ra;D9**e_Cyu)PsAJw`J2#8');

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
define('WP_DEBUG', true); /* Change this back to false when you're done with the site! */

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

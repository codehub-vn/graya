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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'abcdabcd');

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
define('AUTH_KEY',         'Clzs>kC!UHR0i$imk%EpcrzHoJ-Zt:cUZJb:a]`)+(30qrmTz@;#^ZFW84y^2*Rc');
define('SECURE_AUTH_KEY',  'Zzn2vyZi_AVfH-D?PW5J jax,z+J-vpR=*E;Fx~gYZ!kGHFSII[&]gN!ps>X?6 u');
define('LOGGED_IN_KEY',    'ItgogY%@Pv ke,yd^Z]ZrY1$DE$}~U2PZ1gMyya/jX[_lSN+JZ3q=!CG-fUd|#tC');
define('NONCE_KEY',        'XX*4fleo0Gjg+KB5Pf:^.PJ=MC<X6H;&rFK;_:kIBB#}@5_r+RK`$s5$bx*a@0>C');
define('AUTH_SALT',        'YRps#,#F.$U_oZ=3&gw2VY#UE%^qH> Za0`YFy&EyhwnvSP!1%|V2aUIp~Q*Sr;0');
define('SECURE_AUTH_SALT', 'Mz>9)K:+QRnEy;1g{v]0>4JW^+jOeaVs9j$8#7X7#jPdvuJAzatx4n/By$3OS@6/');
define('LOGGED_IN_SALT',   'Z}9s|jng.eB!;YoII3To[E?q}:f!^]/N&2a=d3CU=X>=]Uy/DQ^S~ak8OTkHHqnv');
define('NONCE_SALT',       'l72.?cTb65hQnT?bnO&Wa6PF+g:+u`<BQl`k/N~e 5c,L0P_lw3J8y%c7+4]C*Iu');

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

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vnskills' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Hi/dT@bemyw8`X)H11gL$e3kX=}=[C5OWHP[XVN1UiO%  A_9_/4+Dl_kMQX:KZ;' );
define( 'SECURE_AUTH_KEY',  'MJUGV @2dP^vB/eoP(oy 7Rqn+8=$Zhz<9[Ys9E:ZCoEqkfUj{{b0(9,Q^(U/ZVq' );
define( 'LOGGED_IN_KEY',    'mF[9RXvB-9T@#H*leBD-dNIAK8Ah:@UbP4=87/,5ZQgrSu>I|TD^*fzt>x0*`3Fn' );
define( 'NONCE_KEY',        'Rn?d8+.X:XPWC*{A|=O[TAIY-JToP!I70;BHqS28&lHmC@f#H$L#H$,!FLjbB]D,' );
define( 'AUTH_SALT',        '9F~4<V{>DJL@z9JD+/Km6dw]/0VErQ]TX4-%,Ki01~@ 1xt97DYb>@u4!eUWEVz{' );
define( 'SECURE_AUTH_SALT', '@9Ci)&fWq1|yXBv[V*@9fp5=H8WV?_Re`RPvmEfc4T_yB$484A_[1vOv4#,}xQ9P' );
define( 'LOGGED_IN_SALT',   'VYfS/>;%DODXhs;<^;HRGLRP1J6_AG^,CgH%)L0o/|b 7odUX+MU|s#0Lb3z=OKv' );
define( 'NONCE_SALT',       '-&[$3m<X-X:}m5vh`G>_4 n_MC=<@{BhALZv yT=hud scID61w,%8gm0j /5^l&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vns_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

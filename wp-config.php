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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lovenote' );

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
define( 'AUTH_KEY',         'MxP]-eMrT+cUn2xq :`%]O|=jz21Mp?hd^Ty,]p*S=sjiO6Ra(X:XFBJGwz}=:>[' );
define( 'SECURE_AUTH_KEY',  'c%47(lE;<D:W3b:ifp[:^bpnO<,8W[C~mN5LAfbcp-=Q ysAva7@ZrvK&jorGwBS' );
define( 'LOGGED_IN_KEY',    'M2(DSKOy{Ta!zZo3,@s=:pnv}XBUa<N0Cx71SdVn=JG{P~#MVkmkk>=##.~Oz(V`' );
define( 'NONCE_KEY',        '9#GP[aKv5{Fe3,K=d8pF)Z*C{1(_%vI[J8W}`f`nm?m[b5a;m0g[.s^}!C!(ei3Z' );
define( 'AUTH_SALT',        '3JHh)vYHhmlxRbffj~5}dYv0PP1=ws=CJZW8;J#|No*LNWdXy8j$#s In)XEeV!*' );
define( 'SECURE_AUTH_SALT', '{S:Ifbxb6$4<Bf,nxOX1Ha}}1=#LIfZu`VaU;{{W* ^RwpF.IKC.PuJ[cK=r/g>T' );
define( 'LOGGED_IN_SALT',   'p(L=SZ#i7E+%/zVF04YTy`I Lpynx@-VCBAENs9eLcYDbB9{wo!Y:|ni4//r!<SD' );
define( 'NONCE_SALT',       ']rHc[TzV=Z#M4/+07O&2@{%*xA5`Y=}OBjKK)4]:4-DW.Q(X5{$@MMbP!ukq|q<2' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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

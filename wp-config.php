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
define( 'DB_NAME', 'wp_wccourse' );

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
define( 'AUTH_KEY',         'NWs!xE^Fv)zm3ODdi8:<T-:&xk|!6C!N|q=>oYwpCPGH5R0v,O$pa-]R):HSnCP>' );
define( 'SECURE_AUTH_KEY',  'hb8v(<p%+ux0+lNn7B.,77_9PV_|6jYz4ghbn:BS88~+fBRD3SIJ[l3O@lfZKP}L' );
define( 'LOGGED_IN_KEY',    '=b+@ZC(CI9c7)J>N+.*}+l~.,bwko{CH|t[(Nsk)#Hjhj(@9{3NZ:#Pez1$wRHY=' );
define( 'NONCE_KEY',        'Py@0Z.z:.94@6j=Nj@8/h@McQCVPt/26L: =ksLaq6Jz[B:Kk``ZbDet~3,dnQJ}' );
define( 'AUTH_SALT',        'piwMK~DCI6;@ER<(UUkCUhA8?fJB%h-drrnLSt &^Q$ m(j~0Lam=%HWwHXtX/Ic' );
define( 'SECURE_AUTH_SALT', '1H]iy7c|F*3ZSn*VgUmT[2,3`-fGg>YhMO-6>SpE|9KSZzl_BkCTH `[$o:dBLrA' );
define( 'LOGGED_IN_SALT',   '0m{TC&~/VLrKe;6V+B1aa)2V$JA7} .N`O8_{l(W}`xf:1x>+$0CW1Q o+)_9|&L' );
define( 'NONCE_SALT',       '(Zoq~[mJM=wfu2&}sFzJ7.s$B;inFz^.raF~GBBk[;:){wIi#SgOH?;9=azcQu`!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wcc_';

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

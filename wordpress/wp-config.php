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
define( 'DB_NAME', 'training' );

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
define( 'AUTH_KEY',         '#EQf@;71m%$#MbCi}oaO~&z<za37p7@{xx?$eh]1UlO1`Zs?+zcmrgkJ(R&pcMYO' );
define( 'SECURE_AUTH_KEY',  'Z`I8iOUtFxhdWiTinu.3&2L(-6c=n{UKRp`G@1_56FXR@fZEYw6g6p`}tms-02!F' );
define( 'LOGGED_IN_KEY',    'CA:g?*3|cII5l19]OUcp_[X9pH)wet+/hFsl?Rl)rNrFh<ohS3bU[,q#*}%}@K^E' );
define( 'NONCE_KEY',        ';]%1Eq3Ud.#dMj<= Alu&UA`laG(C(&JLHQ7jHBn;q@`?79Dz4N<!Q= 8:t<+*4Z' );
define( 'AUTH_SALT',        'kT5W:Kbe>[Wp`:gkiFzc1~>?iTZjzakkVPGs2gFc9pb^~`ghur^JPx e6vZNpe=P' );
define( 'SECURE_AUTH_SALT', '3l1qQ]P<b|V!/.JFnUu)]x:yOF)l;/j_9t@%sO<6Ri BOB(Lp8d`+8!Jo{=31/i@' );
define( 'LOGGED_IN_SALT',   'K2V1 `$gn.3q; xXQ2Y%h7dclh;{*iz.0c(!z7#6#8Om_x>5:Cbz`U*/0dlkn1._' );
define( 'NONCE_SALT',       'u>rpEp? -8zN=PCmaj.x,3xo^2K8^t,O@3UB9:hEyTftiExEQ!*2[a?R4vej.yCd' );

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

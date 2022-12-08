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
define( 'DB_NAME', 'bookfusionwpdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'i{N+Fb:A}f]^#@nNn,(H>sH/,/eKP~R,z(>8qs`ng7=+N)BTCHHte0Qndc8Et;8_' );
define( 'SECURE_AUTH_KEY',  'jNww>K/9F{(*1H;1ShmJqA-+ePUI|80ae{7#<$A7nE3:?)[X5Ki(gH->PWk>L2Bo' );
define( 'LOGGED_IN_KEY',    '2i}2(]8^cKS4Z:mq` m]sC]4&s&@WYyGwQyqQt#Cg,|F@o@/J{.#@&nJn|U{ymTI' );
define( 'NONCE_KEY',        ':+?Muv).MFA^-Hw|x*VpjlE81D%{(lr9 ,AS5}-}a}3CK;Rya bDH,m^|kc+9l`,' );
define( 'AUTH_SALT',        'S66cUjWW3(PQBW LW(0Nqsw u=Gi9kvNl$z;uv3 G8V*%]6]psG61-K*x!WY!*-e' );
define( 'SECURE_AUTH_SALT', ',Ck$;P6q&QDSyA>1fl :]CesYV]mqPqPX1V=qJI@&o1ES{xJqoE30=DGU>AaQ5*T' );
define( 'LOGGED_IN_SALT',   '6&b1|qRsgsKYxW|#76uERL&6##+rK*T2;lyI*]j<^!kpJ%e,}*xRjIL#2C(+XL{r' );
define( 'NONCE_SALT',       '5f_onqZ=yI%1~5kE qY{GXX[b;Q|<GGMwwqngaiMCn&8h6R>sG=RnYWw[ZU)ZrhV' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bookfusionwp143_';

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

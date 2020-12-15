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
define( 'DB_NAME', 'wordpress bd' );

/** MySQL database username */
define( 'DB_USER', 'system' );

/** MySQL database password */
define( 'DB_PASSWORD', 'capote' );

/** MySQL hostname */
define( 'DB_HOST', '82.223.11.63' );

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
define( 'AUTH_KEY',         'j<89~)eqRgS*Z14,9j4t]c#r@iLveP[/}v*]}[5X;|vtuhJ>RV#z~v%#RvKKry4$' );
define( 'SECURE_AUTH_KEY',  'g,Xx8>jICgMzOI&jha/br0^yx}4$&KAfou-&H-!Atb)$LknU[XrjWpA1wUR~:8x(' );
define( 'LOGGED_IN_KEY',    'GTaMwvDj$9HBF.Aa~%Ls3;+i3E9lxmod>(QrmVBN<tXPzL6PH:l+^:+FT;B~NWXc' );
define( 'NONCE_KEY',        '+I(9gCl]D:iWTelG48u&C)q)0v_)=9{:rOW9K*3>RTj%qTcvf/0$EhQAlshi~D2*' );
define( 'AUTH_SALT',        '96m9T/iIY!fS=|IkV%KmBnJdptf<;f(y7IDQ4g}$+bW@5v`u+7_0Q.^^ea=h~Md`' );
define( 'SECURE_AUTH_SALT', '; [0J%XMwM_V g#a+=T@cA^&$VC.vs0#>H<x:jsvt-Dw)O{fE|!(7g7q?:107Knu' );
define( 'LOGGED_IN_SALT',   'e0A^S)Ve{3{|*NM}@TKWb9r~VC!|yn;SpL-fEfNz+lw%)o=Y:8j!CI]1eSW:hUpP' );
define( 'NONCE_SALT',       'FZ/Zj)1Ia)T_F1^,E-bZqcZ3oX.lm9uz6I[C#~6MoPpllAF~StQLRMy8s/7.]MD#' );

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


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

//Using environment variables for DB connection information

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $connectstr_dbname);

/** MySQL database username */
define('DB_USER', $connectstr_dbusername);

/** MySQL database password */
define('DB_PASSWORD', $connectstr_dbpassword);

/** MySQL hostname */
define('DB_HOST', $connectstr_dbhost);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '`r*)wP|pa+C}z-[y|n(0Nujn{jSCYI0,U(y( ;09hX^F%Hg`%F+o6LMsA[<p;&CL');
define('SECURE_AUTH_KEY',  '^QB]LAZ3@a!zOz6gMQ1M&,#R!-P=yJkE64oJ|aM;f]pR,u%6vY2+G6D1`Va0Y9r)');
define('LOGGED_IN_KEY',    'AUbJUdgcOKk5hernl@4|l|%8.G_a|6 dC-4`rwRc)98z-p|pg{Ww+Dz[$dGQ!3HB');
define('NONCE_KEY',        'kv#4=_A;!-a|36+uoel^=Dcvtg+Ef%XZq0RYpy@e+pwG JCkI(6eRSOS3.^bL=d+');
define('AUTH_SALT',        '~CKP>x-5on_w8aXcI&[qnG>||^j[1{S +B!Wn@UtTN$2gPw+-:{:%Nel$Ft-UkMl');
define('SECURE_AUTH_SALT', 'Z;iL8z ew+eR-HX@Q>Mc(UZ(|S:Vx6&v4N]`&7_wtW.H;kL@`|R=[u9y5{uXrVc!');
define('LOGGED_IN_SALT',   'r_?1e%l!g}SaS21|;7^%=z{PLKUwERJ?| -RJW%H-L22;Z) >d=)6U*QEqd/|*8I');
define('NONCE_SALT',       'q/*im B <BzKEB?3vkDmeH:[GyE]rstGNjR^sI;#98pk*IS|7]DX@bcG$;oP]s;2');


/* Security for Wordpress : 
you may wish to disable the plugin or theme editor to prevent overzealous users from being able to edit sensitive files and 
potentially crash the site. Disabling these also provides an additional layer of security if a hacker gains access to a 
well-privileged user account.
Note : If your plugin or theme you use with your app requires editing of the files , comment the line below for 'DISALLOW_FILE_EDIT'
*/
define('DISALLOW_FILE_EDIT', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gs_';

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

//Relative URLs for swapping across app service deployment slots 
define('WP_HOME', 'http://'. filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));
define('WP_SITEURL', 'http://'. filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING));


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

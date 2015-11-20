<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pixelfir_wo9070');

/** MySQL database username */
define('DB_USER', 'pixelfir_wo9070');

/** MySQL database password */
define('DB_PASSWORD', 'U9oaG5WXJ7V8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', 'QY}HcD}Km=zij=Ouf<jQU>u<|(CaVpzr&=Pl<eVn<u(!f=GZD&Rrf^p?x((Ima-C@IWjlr==]dL<FTxwdH;)r;KOiZ[+kJYRLK]D=}FzpRIyj@ApDH/Qy^JJ@HEA[VFh');
define('SECURE_AUTH_KEY', 'n<j)WFu*$r->)t]amUx>mUL[?dFkSQH;)-hbSLsgN?*|RY}Y!Tv(/=Y^TtI!G_Wxl@rmrKBPu@j!>D|fh}MX$mGi&jM-jQ<pqZfZN!>A^jI]Iw}LUx[uGh$bBoS@/w]k');
define('LOGGED_IN_KEY', 'HU(FQMCbt$e_]Ymh=UKbE$-KiFmvUaAYOdUdA%^n|{LvPiW%YEu!<@gakf_qvVKcTAKf;tPQrUhI_!R+)@?urM*<_|C%CK|tBkbLwpHe@/lmU*yT)?x=<)|}^DNy%(S(');
define('NONCE_KEY', 'LJ!%p;zMw{d{+mwp*_iO&<Ncsr;^?ZV>NBPFX%a{AMfmjE@oU)?{ybjCN(!^{YyIzhydgfe<ib=%=B/KU^YS<niu*FI!q-{w+<TfmwD?Ajn=;DWl=$IvTNFa}sc@G}WH');
define('AUTH_SALT', 'M;$cbCi_K^Hj{Q^Kgwgty^*aD]FuEd/E<(PM|H^*DD_SWrCjVkEeov!g-N@s/>$uiIbcG]UoFzghn}tKl_MSEG-unTyjW>W}FNQND(!nr*--V&LH]ircX(e]C{;NNbKG');
define('SECURE_AUTH_SALT', 'CT$/^QPgtwSQ/!Zr)k((joIKpdKu>ww}L@mn}]TRw!FNp|wsBm!_kJYWevQLTComfigVU/EpL|!>MVjit+QYo/POZlueRLcsMExxvdWpqo*vD;cqCxpthvTT]f}Q;a[S');
define('LOGGED_IN_SALT', 'Xkc*$qszdOy_V[zCit@h}P-+Ir=/[EM=vBp}*tOlnWKGRQtBL;Y+L(=Ug/%qNn<d)zX}yy-hJ@Ty|>IB{meAmEsOAJ$|^qWEQlFkTv{GZ|+i$p;+|>eXdd+V{+wxP=z*');
define('NONCE_SALT', '%om%GA<Ek+-wxxTl$zmTGNT{;{Y>P|oOlBexLLporC_bL};_SJ/T>LYOF}Zf<@gj@OoahYXXM/cq_utm&vu?uU%y@Ylg$g[qleD$auTdn?i|vDT<wMbu<Kqs-F{N+irl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_rpri_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}

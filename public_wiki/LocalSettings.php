<?php

/*
 +----------------------------------------------------------------------+
 | This file has been heavily modified since being auto-generated by    |
 | MediaWiki.                                                           |
 | This file is tracked and updated by Git, DO NOT EDIT THIS FILE       |
 | MANUALLY.                                                            |
 |                                                                      |
 | User preference options are marked "UPO"                             |
 +----------------------------------------------------------------------+
*/

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}
/*
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}
*/
// Import settings that are not safe to put into Git
require_once( "/home/nottinghack/www_secure/mw_SecretSettings.php" );

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

// Set all default options
//require_once( "$IP/includes/DefaultSettings.php" );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}

$wgShellLocale = "en_GB.utf8";

$wgLanguageCode = "en";

//$wgReadOnly = 'Down for upgrade, access will be restored shortly - LWK';

/*
 +------------------------------+
 |      DATABASE SETTINGS       |
 |                              |
 | Mostly in SecretSettings.php |
 +------------------------------+
*/

# MySQL specific settings
$wgDBprefix         = "mw_";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;


/*
 +------------------------------+
 |        BASE SETTINGS         |
 +------------------------------+
*/

$wgSitename         = "Nottinghack Wiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgScriptExtension  = ".php";

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = array();
#$wgCacheDirectory = "$IP/cache";
$wgInvalidateCacheOnLocalSettingsChange = true;

$wgArticlePath = "/wiki/$1";  # Virtual path. This directory MUST be different from the one used in $wgScriptPath
$wgUsePathInfo = true;        # Enable use of pretty URLs
$wgFavicon = "$wgScriptPath/favicon.ico";
# Not needed as we have AppleTouchIcon extension
# $wgAppleTouchIcon = "$wgScriptPath/apple-touch-icon.png";

# This line stops all unregistered users from editing
$wgGroupPermissions['*']['edit'] = false;
# This line disables self-registration
# Sysops or logged-in users can create accounts for others through Special:Userlogin
$wgGroupPermissions['*']['createaccount'] = false;

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wiki.nottinghack.org.uk";

$wgLocaltimezone = 'UTC';

# $wgLocalTZoffset = date("Z") / 60;

$wgLocalInterwiki   = strtolower( $wgSitename );

$wgDiff3 = "/usr/bin/diff3";


/*
 +------------------------------+
 |        EMAIL SETTINGS        |
 +------------------------------+
*/

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; //UPO

$wgEmergencyContact = "webmaster@nottinghack.org.uk";
$wgPasswordSender = "webmaster@nottinghack.org.uk";

$wgEnotifUserTalk = true; //UPO
$wgEnotifWatchlist = true; //UPO
$wgEmailAuthentication = true;


/*
 +------------------------------+
 |       DISPLAY SETTINGS       |
 +------------------------------+
*/

$wgLogo             = "/logo/nottinghack_with_white.png";
$wgLogoHD = [
	"2x" => "/logo/nottinghack_with_white@2x.png",
	"3x" => "/logo/nottinghack_with_white@2x.png"
];

$wgUseTeX           = true;

$wgRightsPage = "Main:Copyright"; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by-sa/3.0/";
$wgRightsText = "Creative Commons Attribution-ShareAlike 3.0 License";
$wgRightsIcon = "https://i.creativecommons.org/l/by-sa/3.0/88x31.png";
# $wgRightsCode = ""; # Not yet used

wfLoadSkin( 'Vector' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'MinervaNeue' );
$wgDefaultSkin = 'minerva';
# To remove various skins from the User Preferences choices
$wgSkipSkins = array("modern", "chick", "cologneblue", "myskin", "nostalgia", "simple", "standard");

$wgAllowExternalImages = false;
$wgAllowExternalImagesFrom = array( 'http://chart.apis.google.com/' );


/*
 +------------------------------+
 |        FILE SETTINGS         |
 +------------------------------+
*/

$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# File Extensions allowed for upload
$wgFileExtensions = array('png', 'gif', 'pde', 'jpg', 'jpeg', 'pdf', 'sh3d', 'psd', 'svg', 'zip', 'ppt', 'odp', 'pem', 'key', 'mp4', 'm4v');

#If issues with JavaScript fasle positive uncomment
# $wgAllowTitlesInSVG = true;
$wgSVGConverter = 'ImageMagick';

# need to allow zips, as sh3d is a zip!
$wgMimeTypeBlacklist = array(
							 # HTML may contain cookie-stealing JavaScript and web bugs
							 'text/html', 'text/javascript', 'text/x-javascript',  'application/x-shellscript',
							 # PHP scripts may execute arbitrary code on the server
							 'application/x-php', 'text/x-php',
							 # Other types that may be interpreted by some servers
							 'text/x-python', 'text/x-perl', 'text/x-bash', 'text/x-sh', 'text/x-csh',
							 # Client-side hazards on Internet Explorer
							 'text/scriptlet', 'application/x-msdownload',
							 # Windows metafile, client-side vulnerability on some systems
							 'application/x-msmetafile',
							 # A ZIP file may be a valid Java archive containing an applet which exploits the
							 # same-origin policy to steal cookies
							 #'application/zip',
							 # MS Office OpenXML and other Open Package Conventions files are zip files
							 # and thus blacklisted just as other zip files
							 'application/x-opc+zip',
							 );


/*
 +------------------------------+
 |      NAMESPACE SETTINGS      |
 +------------------------------+
*/

define("NH_NS_PROJECT", 510);
define("NH_NS_PROJECT_TALK", 511);
define("NH_NS_GROUP", 512);
define("NH_NS_GROUP_TALK", 513);
define("NH_NS_LIBRARY", 514);
define("NH_NS_LIBRARY_TALK", 515);
define("NH_NS_TEAM", 516);
define("NH_NS_TEAM_TALK", 517);

$wgExtraNamespaces[NH_NS_PROJECT] = "Project";
$wgExtraNamespaces[NH_NS_PROJECT_TALK] = "Project_talk";
$wgExtraNamespaces[NH_NS_GROUP] = "Group";
$wgExtraNamespaces[NH_NS_GROUP_TALK] = "Group_talk";
$wgExtraNamespaces[NH_NS_LIBRARY] = "Library";
$wgExtraNamespaces[NH_NS_LIBRARY_TALK] = "Library_talk";
$wgExtraNamespaces[NH_NS_TEAM] = "Team";
$wgExtraNamespaces[NH_NS_TEAM_TALK] = "Team_talk";

$wgNamespacesToBeSearchedDefault = array(
	NS_MAIN				=>	true,
	NS_TALK				=>	false,
	NS_USER				=>	true,
	NS_USER_TALK		=>	false,
	NS_PROJECT			=>	false,
	NS_PROJECT_TALK		=>	false,
	NS_FILE				=>	false,
	NS_FILE_TALK		=>	false,
	NS_MEDIAWIKI		=>	false,
	NS_MEDIAWIKI_TALK	=>	false,
	NS_TEMPLATE			=>	false,
	NS_TEMPLATE_TALK	=>	false,
	NS_HELP				=>	false,
	NS_HELP_TALK		=>	false,
	NS_CATEGORY			=>	false,
	NS_CATEGORY_TALK	=>	false,
	NH_NS_PROJECT		=>	true,
	NH_NS_PROJECT_TALK	=>	false,
	NH_NS_GROUP			=>	true,
	NH_NS_GROUP_TALK	=>	false,
	NH_NS_LIBRARY		=>	true,
	NH_NS_LIBRARY_TALK	=>	false,
	NH_NS_TEAM		=>	true,
	NH_NS_TEAM_TALK		=>	false
);

$wgNamespacesWithSubpages = array(
	NS_MAIN				=>	true,
	NS_TALK				=>	false,
	NS_USER				=>	true,
	NS_USER_TALK		=>	false,
	NS_PROJECT			=>	false,
	NS_PROJECT_TALK		=>	false,
	NS_FILE				=>	false,
	NS_FILE_TALK		=>	false,
	NS_MEDIAWIKI		=>	false,
	NS_MEDIAWIKI_TALK	=>	false,
	NS_TEMPLATE			=>	false,
	NS_TEMPLATE_TALK	=>	false,
	NS_HELP				=>	false,
	NS_HELP_TALK		=>	false,
	NS_CATEGORY			=>	false,
	NS_CATEGORY_TALK	=>	false,
	NH_NS_PROJECT		=>	true,
	NH_NS_PROJECT_TALK	=>	false,
	NH_NS_GROUP			=>	true,
	NH_NS_GROUP_TALK	=>	false,
	NH_NS_LIBRARY		=>	true,
	NH_NS_LIBRARY_TALK	=>	false,
	NH_NS_TEAM		    =>	true,
	NH_NS_TEAM_TALK		=>	false
);


/*
 +------------------------------+
 |          EXTENSIONS          |
 +------------------------------+
*/

# Adding the ParserFunctions extension
wfLoadExtension( 'ParserFunctions' );
$wgPFEnableStringFunctions = true;

# Adding SyntaxHighlight_GeSHi extension
wfLoadExtension( 'SyntaxHighlight_GeSHi' );

# Adding Poem extension
wfLoadExtension( 'Poem');

# Adding Widgets extension
require_once("$IP/extensions/Widgets/Widgets.php");
$wgGroupPermissions['sysop']['editwidgets'] = true;

# Adding SpecialInterwiki extension
wfLoadExtension( 'Interwiki' );
$wgGroupPermissions['*']['interwiki'] = false;
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['interwiki']['interwiki'] = true;

# Adding ReplaceText Extension
wfLoadExtension( 'ReplaceText' );
$wgGroupPermissions['bureaucrat']['replacetext'] = true;

# Adding in the WikiEditor Extension
# Bundled in 1.19 an later
wfLoadExtension( 'WikiEditor' );
# Enables use of WikiEditor by default but still allow users to disable it in preferences
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
# Displays the Preview and Changes tabs
$wgDefaultUserOptions['wikieditor-preview'] = 1;
# Displays the Publish and Cancel buttons on the top right side
$wgDefaultUserOptions['wikieditor-publish'] = 1;
# Displays a navigation column (summary) on the right side
$wgDefaultUserOptions['usenavigabletoc'] = 0;

# Adding Renameuser extenstion
# Bundled in 1.19 and later
wfLoadExtension( 'Renameuser' );

# Adding Category Sort Headers extension
require_once "$IP/extensions/CategorySortHeaders/CategorySortHeaders.php";

# Adding MagicNumberedHeadings extension
//require_once($IP.'/extensions/MagicNumberedHeadings/MagicNumberedHeadings.php');
// Trying my own
require_once($IP.'/extensions/MagicNumberedHeadings_NH/MagicNumberedHeadings.php');

# Adding CSS extension
wfLoadExtension( 'CSS' );

# Adding HMS auth extension
wfLoadExtension( 'AuthHMS' );

$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgAuthManagerAutoConfig['primaryauth'] = [
	MediaWiki\Auth\LocalPasswordPrimaryAuthenticationProvider::class => [
		'class' => MediaWiki\Auth\LocalPasswordPrimaryAuthenticationProvider::class,
		'args' => [
		[
			// Last one should be authoritative, or else the user will get
			// a less-than-helpful error message (something like "supplied
			// authentication info not supported" rather than "wrong
			// password") if it too fails.
				'authoritative' => false //,
				//'loginOnly' => true
			]
		],
		'sort' => 10,
	],
	MediaWiki\Auth\HmsPasswordPrimaryAuthenticationProvider::class => [
		'class' => MediaWiki\Auth\HmsPasswordPrimaryAuthenticationProvider::class,
		'args' => [
			[
				 'hms_url'       => 'https://lspace.nottinghack.org.uk/wiki/wikiauth.php',
				 'secret'        => 'zklWx467WSd32x',
				 'salt'          => '$1$rwioejrikjxcv29xkmfcx$',
				 'debug'         => false,
				 'log_file'      => '/home/nottinghack/public_wiki/extensions/AuthHMS/wikiauth.log',
				 'authoritative' => true
			]
		],
		'sort' => 100,
	]
];

# Adding AppleTouchIcon extension
require_once('extensions/AppleTouchIcon/AppleTouchIcon.php');

# Adding Cookie notice
wfLoadExtension( 'CookieWarning' );
$wgCookieWarningEnabled = true;

# Adding InputBox and
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'ImageMap' );

# Adding EmbedVVideo https://www.mediawiki.org/wiki/Extension:EmbedVideo
wfLoadExtension( 'EmbedVideo' );

# not working with 1.35
// wfLoadExtension( 'MobileFrontend' );
// $wgMFDefaultSkinClass = 'SkinMinerva';

// $wgMinervaTalkAtTop['base'] = true;
// $wgMinervaAdvancedMainMenu['base'] = true;
// $wgMinervaPersonalMenu['base'] = true;
// $wgMinervaHistoryInPageActions['base'] = true;
// $wgMinervaOverflowInPageActions['base'] = true;
// $wgMinervaShowCategories['base'] = true;

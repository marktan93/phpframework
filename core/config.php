<?php 

# Path, URL

if (!defined("HOST")) {
	//define("HOST", $_SERVER["HTTP_HOST"].'/');
	define("HOST",'');
}

if (!defined("ROOT")) {
	define("ROOT", '/gst/');
}

if (!defined("DOC_ROOT")) {
	define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT'].'/');
}

# Default Routing

if (!defined("CONTROLLER"))
	define("CONTROLLER", "account"); // temp data
	
if (!defined("METHOD"))
	define("METHOD", "login"); // temp data

# Libs Path

if (!defined("LIBS"))
    define("LIBS", ROOT."app/libs/");

# Default View
# Multiple Templates

$templates = array(
				'cms' 	=> '/cms/',
			);

if (!defined("TEMPLATE")) 
	define("TEMPLATE", serialize($templates));
	
# Global JS

$GLOBALS['js'] = array(
                );

# Global CSS

$GLOBALS['css'] = array(
                );

# Security

if (!defined("SECRET_KEY"))
    define("SECRET_KEY", "somekeyhere");

# Database 

if (!defined("DB_HOST"))
    define("DB_HOST", "localhost");

if (!defined("DB_USERNAME"))
    define("DB_USERNAME", "root");
        
if (!defined("DB_PASSWORD"))
    define("DB_PASSWORD", "");
        
if (!defined("DB_DATABASE"))
    define("DB_DATABASE", "gst") ;     

# cookie

if (!defined("DOMAIN"))
    define("DOMAIN", "");

if (!defined("PATH"))
    define("PATH", "/");

?>
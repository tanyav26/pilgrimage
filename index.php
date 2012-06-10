<?php
/*
|------------------------------------------------------------------------------
|      o-o   O  o--o  o--o   o-o  o   o o  o 
|     /     / \ |   | |   | o   o |\  | |  | 
|    O     o---oO-Oo  O--o  |   | | \ | o--O 
|     \    |   ||  \  |   | o   o |  \|    | 
|      o-o o   oo   o o--o   o-o  o   o    o 
|                                     
|------------------------------------------------------------------------------
| NAMESPACE
|------------------------------------------------------------------------------
|
| Library	- All Library Classes
| Application	- All Applicaition action controllers
| Platform      - The platform utitlities
|
*/
namespace Platform;


/*
|---------------------------------------------------------------
| PHP ERROR REPORTING LEVEL
|---------------------------------------------------------------
|
| By default error reporting is set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
| For more info visit:  http://www.php.net/error_reporting. E Strict became
| Part of E_ALL as of PHP 5.4.0 so use E_ALL except strict standards
|
*/
error_reporting( E_ERROR | E_WARNING | E_PARSE | E_NOTICE );
//xdebug_stop_code_coverage();

/*
|---------------------------------------------------------------
| DEFINE APPLICATION CONSTANTS
|---------------------------------------------------------------
|
| EXT		- The file extension.  Typically ".php"
| SELF		- The name of THIS file (typically "index.php")
| FSPATH	- The full server path to THIS file
| APPPATH	- The full server path to the "application" folder
| DS            - The directory seperator constant
|
*/

define('DS',        DIRECTORY_SEPARATOR);
define('EXT',       '.php');
define('SELF',      pathinfo(__FILE__, PATHINFO_BASENAME));
define('FSPATH',    str_replace(SELF, '', __FILE__)).DS;
define('APPPATH',   FSPATH.'applications'.DS );

/*
|---------------------------------------------------------------
| CONFIG & SHARED ELEMENTS
|---------------------------------------------------------------
|
| All the Base configuration elements are defined in these files.
| You should technically not edit any of this files, application specific
| settings should be added to the config directory of the application in
| question
|
*/
require_once ( FSPATH .'framework'.DS.'utilities'.DS.'defines'.EXT );


/*
|                     (((               
|                    (o o)          
| ---------------ooO--(_)--Ooo---------------------------------
| BOOTING...
|---------------------------------------------------------------
|
| Fireaway
|
*/
require_once ( FSPATH.'framework'.DS.'utilities'.DS.'bootstrap'.EXT );


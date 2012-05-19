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
| Library	- The file extension.  Typically ".php"
| Application	- The name of THIS file (typically "index.php")
| Platform      - The platform utitlities
| Packages
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
| For more info visit:  http://www.php.net/error_reporting
|
*/
error_reporting( E_ALL | E_WARNING | E_NOTICE );

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


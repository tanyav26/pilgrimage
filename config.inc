<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * config.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/config
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
$config = array(
/*
|---------------------------------------------------------------
| SESSION SETTINGS
|---------------------------------------------------------------
|
| By default error reporting is set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
| For more info visit:  http://www.php.net/error_reporting. E Strict became
| Part of E_ALL as of PHP 5.4.0 so use E_ALL except strict standards
|
*/

'session' => 
    array(
        'store' => 'database',
        'table' => '?session',
        'cookie' => 'psession',
        'domain' => '',
        'path' => '/',
        'datafile' => '/',//The absolute path to the session data file store
        'life' => 60 * 15, //15 minutes The amount of time to keep for,
        //Time to session remberance
        //If no explicit expiry time is set, session will be remembered for this long
        'remember' => 60 * 60 * 24 * 14 //14 day
    ),
/*
|---------------------------------------------------------------
| OUTPUT SETTINGS
|---------------------------------------------------------------
|
| By default error reporting is set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
| For more info visit:  http://www.php.net/error_reporting. E Strict became
| Part of E_ALL as of PHP 5.4.0 so use E_ALL except strict standards
|
*/

'output' => 
    array(
        'filters' => array(
            "doctags" => true,
            "minimize" => true
        ),
        'parsers' => array(
            "elements" => true
        )
    ),
/*
|---------------------------------------------------------------
| ENCRYPTION KEY DUMMY
|---------------------------------------------------------------
|
| By default error reporting is set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
| For more info visit:  http://www.php.net/error_reporting. E Strict became
| Part of E_ALL as of PHP 5.4.0 so use E_ALL except strict standards
|
*/
'encrypt' => 
    array(
        'key' => 'awesome-secret'
    ),
/*
|---------------------------------------------------------------
| ENVIRONMENT SETTINGS
|---------------------------------------------------------------
|
| By default error reporting is set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
| For more info visit:  http://www.php.net/error_reporting. E Strict became
| Part of E_ALL as of PHP 5.4.0 so use E_ALL except strict standards
|
*/
'environment' => 
    array(
        'mode' => 1//0 = DEVELOPER, 1 = TEST, 2 = PRODUCTION 
    ),
/*
|---------------------------------------------------------------
| SYSTEM CONFIGURATION SETTINGS
|---------------------------------------------------------------
|
| The system config key can be overloaded with data from the database.
| but for now to test things i am just going to use it on file
*/
'system' => 
    array(
        'host' => 'imac.local',
        'path' => '/~livingstonefultang/',
        'template' => 'bootstrap'
    ),
    
 /*
|---------------------------------------------------------------
| Database Settings
|---------------------------------------------------------------
|
| The Default database settings. Please not that these settings
| will be overriden by config/setup.ini after installation. 
|
*/

'database' => 
    array(
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "name" => "networkapp",
        "driver" => "MySQLi",
        "prefix" => "dd_",
        "collate" => "",
        "charset" => "utf-8",
        "select" => true
    ),
);

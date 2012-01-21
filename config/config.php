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
$config['database'] = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'prefix' => 'dd_',
    'collate' => '',
    'name' => 'diddat',
    'select' => TRUE,
    'driver' => 'MySQL'
);

$config['session'] = array(
    'store' => 'database',
    'table' => '?session',
    'cookie' => 'c4session',
    'domain' => '',
    'path' => '/tuiyosocial.tld',
    //The absolute path to the session data file store
    'datafile' => '/',
    //The amount of time to keep for,
    'life' => 60 * 15, //15 minutes
    //Time to session remberance
    //If no explicit expiry time is set, session will be remembered for this long
    'remember' => 60 * 60 * 24 * 14 //14 day
);

$config['encrypt'] = array(
    'key' => 'awesome-secret'
);

$config['environment'] = array(
    'mode' => 0
); //0 = DEVELOPER, 1 = TEST, 2 = PRODUCTION 

//The system config key can be overloaded with data from the database. 
//but for now to test things i am just going to use it on file
$config['system'] = array(
    'host' => 'tuiyosocial.tld',
    'path' => '/',
    'template' => 'thenetwork'
);

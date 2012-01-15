<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * multibase.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Config
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/multibase
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
$config['multibase']['enabled'] = FALSE;

//Defining the database settings for various contexts in a multibase mode
//context can simply be regarded a domain. But it must be a unique id

//Create views for the same user table, and use those views to reflect user data, i.e
//Define an authentication style
//Other user tables need not be in the same databse as views can be created across databases. The only requirement
//is that the database be on the same server. so u can reference with 3 tier names as Create VIEW ?_users AS SELECT (x, y, z) FROM DatabaseA.SchemaB.TableUsers

//$config['multibase']['database'] = array(
//    "sub.domain.com"=> array(
//        'host'      => 'localhost',
//        'user'      => 'root',
//        'password'  => 'root',
//        'charset'   => 'utf8',
//        'prefix'    => 'dd_',
//        'collate'   => '',
//        'name'      => 'diddat',
//        'select'    => TRUE,
//        'driver'    => 'MySQL',
//        'store'     => 'database',
//        'table'     => '?session',
//        'cookie'    => 'do_session',
//        'domain'    => '',
//        'path'      => '/',
//        'datafile'  => '/',
//    )
//);
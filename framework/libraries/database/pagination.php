<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * pagination.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/output/pagination
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Library\Database;

use Library;
use Library\Database\Drivers\MySQL as MySQL;
use Library\Database\Drivers\MySQLi as MySQLi;
use Library\Database\Drivers\SQLite3 as SQLite3;
use Library\Database\Drivers\PostgreSQL as PostgreSQL;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/output/pagination
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Pagination extends Results {

    /**
     * Pagination class constructor
     * 
     * @return void
     */
    final public function __construct() {
        parent::__construct();
    }

    /**
     * Gets an instance of the registry element
     * 
     * @staticvar self $instance
     * @param type $name
     * @return self 
     */
    final public static function getInstance($name = 'default') {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance[$name]))
            return $instance[$name];

        $instance[$name] = new self($name);

        return $instance[$name];
    }

}
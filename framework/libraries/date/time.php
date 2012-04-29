<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * time.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/date/time
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library\Date;

use Library;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/date/time
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Time extends \Library\Date {

    /**
     * Get the current timestamp;
     * 
     * @return string
     */
    public static function now() {
        //returns the current timestamp
    }

    /**
     * Converts time to timestamp
     * 
     * @param type $time 
     * @return string
     */
    public static function stamp($time = null) {
        //converts a time to timestamp
    }

    /**
     * Translates a string to a time
     * 
     * @return string
     */
    public static function translate() {
        //Translate a human string to time
    }

    /**
     * Gets an instance of the timestamp
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * authenticate.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/authenticate
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library;

use Library\Auth;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/authenticate
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Authenticate extends Object {

    /**
     * 
     * @var type 
     */
    protected $userid = 0;

    /**
     * The type of authentication that was successful
     *
     * @var type string
     * @access public
     */
    var $type = '';

    /**
     * Any UTF-8 string that the End User wants to use as a username.
     *
     * @var fullname string
     * @access public
     */
    var $username = '';

    /**
     * Any UTF-8 string that the End User wants to use as a password.
     *
     * @var password string
     * @access public
     */
    var $password = '';

    /**
     * The email address of the End User as specified in section 3.4.1 of [RFC2822]
     *
     * @var email string
     * @access public
     */
    var $email = '';

    /**
     * UTF-8 string free text representation of the End User's full name.
     *
     * @var fullname string
     * @access public
     */
    var $fullname = '';

    /**
     * End User's preferred language as specified by ISO639.
     *
     * @var fullname string
     * @access public
     */
    var $language = '';

    /**
     * ASCII string from TimeZone database
     *
     * @var fullname string
     * @access public
     */
    var $timezone = '';

    /**
     * Holds a boolean value whether the user is authenticated or not
     *
     * @var authenticated boolean
     * @access public
     */
    var $authenticated = FALSE;

    /**
     * Constructor
     *
     * @param string $name The type of the response
     * @since 1.0.0
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Returns an instance of the authentication class
     * 
     * @staticvar self $instance
     * @param array $splash
     * @property-write string $email
     * @property-write string $fullname
     * @property-write string $language
     * @property-write string $password
     * @property-write string $timezone
     * @property-write string $userid
     * @property-write string $type
     * @property-read object $instance 
     * @property-write object $instance 
     * @return self 
     */
    public static function getInstance($splash = array()) {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        foreach ($splash as $property => $value) {
            $instance->$property = $value;
        }
        return $instance;
    }

}
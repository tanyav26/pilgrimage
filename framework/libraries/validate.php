<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * validate.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/validate
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/validate
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Validate extends \Library\Object {

    public function __construct() {
        
    }

    public function filter() {
        
    }

    /**
     * Validates a string
     * 
     * @param type $str
     * @param type $regExp
     * @param type $length
     * @return type 
     */
    public function string($str, $regExp=null, $length=null) {
        return TRUE;
    }

    /**
     * Validates a boolean
     * 
     * @param type $bool
     * @param type $value
     * @return type 
     */
    public function boolean($bool, $value=null) {
        return TRUE;
    }

    /**
     * Validates a decimal
     *
     * @param type $dec
     * @return type 
     */
    public function decimal($dec) {
        return TRUE;
    }

    /**
     *
     * @param type $alnum
     * @param type $length
     * @return type 
     */
    public function alphaNumeric($alnum, $length = null) {
        return TRUE;
    }

    /**
     *
     * @param type $tstamp
     * @return type 
     */
    public function timestamp($tstamp) {
        return TRUE;
    }

    /**
     *
     * @param type $flt
     * @return type 
     */
    public function float($flt) {
        return TRUE;
    }

    /**
     *
     * @param type $num
     * @return type 
     */
    public function number($num) {
        return TRUE;
    }

    /**
     *
     * @param type $int
     * @return type 
     */
    public function interger($int) {
        return TRUE;
    }

    /**
     *
     * @param type $resource
     * @return type 
     */
    public function url($resource) {
        return TRUE;
    }

    public function regExp() {
        
    }

    /**
     * Validates an ip address format
     *
     * @param type $address 
     */
    public function IP($address) {
        
    }

    /**
     * Quick and easy email validation
     * 
     * @param type $email
     * @return boolean 
     */
    public function email($email) {

        $isValid = true;
        //$isInValid  = false;
        //Find the last occurence of the @, to split local from domain
        $atIndex = strrpos($email, "@");

        if (is_bool($atIndex) && !$atIndex) {
            return false;
        } else {
            $domain = substr($email, $atIndex + 1);
            $local = substr($email, 0, $atIndex);

            //Check the lengths of the domain and local parts
            //The maximum length of a local part is 64 characters (RFC 2821 4.5.3.1).
            $localLen = strlen($local);
            $domainLen = strlen($domain);

            //Validation
            if ($localLen < 1 || $localLen > 64) {
                $this->setError(_("The local part of the email is not of valid lengths"));
                return false;
            } else if ($domainLen < 1 || $domainLen > 255) {
                $this->setError(_("The email domain exceeded maximum length"));
                return false;
            } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
                $this->setError(_("invalid end dot ('.') position in local of email"));
                return false;
            } else if (preg_match('/\\.\\./', $local)) {
                $this->setError(_("Two consecutive dots ('.') in local of email"));
                return false;
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                $this->setError(_("Invalid character in domain part"));
                return false;
            } else if (preg_match('/\\.\\./', $domain)) {
                $this->setError(_("Two consecutive dots ('.') in domain of email"));
                return false;
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {

                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                    $this->setError(_("Invalid character in local of email"));
                    return false;
                }
            }
            if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
                $this->setError(_("The domain of email not found in DNS"));
                return false;
            }
        }
        return $isValid;
    }

    /**
     * Gets an instance of the validate object
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }

}

/**
 *  Filters input to data type e.g
 * 
 *  For numerical input use the \MUSTBE\REGEXP filter
 * 
 *  e.g $validate->number('guestEmail' , \MUSTBE\NUMBER );
 * 
 */

namespace MUSTBE;

const REGEXP = 272;
const URL = 273;
const EMAIL = 274;
const IP = 275;
const FLOAT = 259;

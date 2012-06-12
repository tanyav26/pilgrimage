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

    /**
     * Construct the Validate class
     * @return void 
     */
    public function __construct() {
        //Silence is golden
    }

    /**
     * Validates a string
     * 
     * @param type $str
     * @param type $regExp
     * @param type $length
     * @return type 
     */
    public static function string($str, $regExp=null, $length=null) {
        
        //Validate its a string;
        if(!is_string($str)){
            return FALSE;
        }
        //Patterns
        if(!empty($regExp)){
        $return = preg_match($regExp, $str);
            if(!(bool)$return){
                return FALSE;
            }
        }
        //Validate length;
        if(!empty($length) && static::interger( $length )){
            $length     = (int)$length;
            $_length    = strlen( $str );
            //If the intergers don't match;
            if($length <> $_length){
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     * Validates a boolean
     * 
     * @param type $bool
     * @param type $value
     * @return type 
     */
    public static function boolean($bool, $value=null) {
        return is_bool($bool);
    }

    /**
     * Validates a decimal
     *
     * @param type $dec
     * @return type 
     */
    public static function decimal( $decimal ) {
        
        $regEx  = '/^\s*[+\-]?(?:\d+(?:\.\d*)?|\.\d+)\s*$/';
        $return = preg_match($regex, $decimal);
        
        return ((int)$return > 0) ? TRUE : FALSE;
    }

    /**
     * Validates a character is alphanumeric
     * 
     * @param type $alnum
     * @param type $length
     * @return type 
     */
    public static function alphaNumeric($alnum, $length = null) {
        
        //Regular Expression
        $regEx = '/^[A-Za-z0-9_]+$/';
        
        //Validate the string;
        return static::string($alnum , $regEx , $length );
    }

    /**
     * Checks that a string is a timestamp
     * 
     * @param type $tstamp
     * @return type 
     */
    public static function timestamp($tstamp) {
        return ((string)(int)$tstamp === $tstamp) 
        && ($tstamp <= PHP_INT_MAX)
        && ($tstamp >= ~PHP_INT_MAX);
    }

    /**
     * Validate if a string is a flt
     * 
     * @param type $flt
     * @return type 
     */
    public static function float($flt) {
        return is_int($flt);
    }

    /**
     *
     * @param type $num
     * @return type 
     */
    public static function number($num) {
        return is_int($num);
    }

    /**
     * Validates an interger
     * 
     * @param type $int
     * @return type 
     */
    public static function interger($int) {
        return is_int($int);
    }


    /**
     * Validates an ip address format
     *
     * @param type $address 
     */
    public static function IP( $address ) {
        
        //Split the IP address of the form  into parts
        $parts = explode('.', $address);
        //=4 parts
        if(sizeof($parts)!=4){
            return FALSE;
        }
        foreach($parts as $part):
            if(empty($part) || !static::number($part) || $part > 255 ){
                return FALSE;
            }
        endforeach;
        return TRUE;
    }

    /**
     * Quick and easy email validation
     * 
     * @param type $email
     * @return boolean 
     */
    public static function email($email) {

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
                static::setError(_("The local part of the email is not of valid lengths"));
                return false;
            } else if ($domainLen < 1 || $domainLen > 255) {
                static::setError(_("The email domain exceeded maximum length"));
                return false;
            } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
                static::setError(_("invalid end dot ('.') position in local of email"));
                return false;
            } else if (preg_match('/\\.\\./', $local)) {
                static::setError(_("Two consecutive dots ('.') in local of email"));
                return false;
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                static::setError(_("Invalid character in domain part"));
                return false;
            } else if (preg_match('/\\.\\./', $domain)) {
                static::setError(_("Two consecutive dots ('.') in domain of email"));
                return false;
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {

                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                    static::setError(_("Invalid character in local of email"));
                    return false;
                }
            }
            if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
                static::setError(_("The domain of email not found in DNS"));
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



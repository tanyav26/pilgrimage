<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * input.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/input
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace IS;

const INTERGER = 257;
const BOOLEAN = 258;
const STRING = 513;
const STRIPPED = 513;
const ENCODED = 514;
const SPECIAL_CHARS=515;
const RAW = 516;
const EMAIL = 517;
const URL = 518;
const NUMBER = 519;
const DECIMAL = 520;
const ESCAPED = 521;
const CUSTOM = 1024;
const FLOAT = 259;


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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/input
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Input extends Object {

    /**
     *
     * @var type 
     */
    protected $server = array();

    /**
     *
     * @var array 
     */
    protected $request = array();

    /**
     *
     * @var array 
     */
    protected $data = array();

    /**
     *
     * @var array 
     */
    protected $get = array();

    /**
     *
     * @var array 
     */
    protected $post = array();

    /**
     *
     * @var array 
     */
    protected $cookie = array();

    /**
     *
     * @var array 
     */
    protected $session;

    /**
     *
     * @var array 
     */
    protected $env = array();

    /**
     *
     * @var array 
     */
    protected $file = array();

    /**
     *
     * @var array 
     */
    protected $sanitized = array();

    /**
     * The Library\Validate Object
     * 
     * @var object 
     */
    protected $validate;

    /**
     * Constructor for the Input class
     * 
     * @return void
     */
    public function __construct() {

        $this->unRegisterGlobals();

        $this->data = array_merge($this->data, $_REQUEST);
        $this->request = $this->data;
        $this->get = array_merge($this->get, $_GET);
        $this->post = array_merge($this->post, $_POST);
        $this->cookie = array_merge($this->cookie, $_COOKIE);
        $this->env = array_merge($this->env, $_ENV);
        $this->server = array_merge($this->server, $_SERVER);
        $this->system = Session::getNamespace();

        //Temp
        $this->files = array_merge($this->file, $_FILES);

        //Returns an instance of the validate object
        $this->validate = Validate::getInstance();
        $this->router = Router::getInstance(); //Used to back trace the request
        
        //autosanitize;
        $this->sanitize();
    }

    /**
     *
     * @param type $verb
     * @param type $filter
     * @param type $flags
     * @param type $options
     * @return type 
     */
    public function data($verb= 'get', $filter = array(), $flags=array(), $options = array()) {

        //filter_input_array();
        if (!isset($this->$verb)) {
            return false;
        }
        $data = $this->$verb;

        //print_R($data);
        return $data;
    }

    /**
     * Returns unsafe input! *as is*
     * 
     * @param string $verb 
     */
    public function getRaw($verb = 'get') {
        //FILTER_UNSAFE_RAW
    }
    
    /**
     * Gets the contents of a cookie by name
     * 
     * @param type $name
     * @return type 
     */
    public function getCookie($name) {

        $encryptor = Encrypt::getInstance();
        $filter = $default = '';

        if (empty($this->cookie)) {
            return false;
        }

        $cookie = $this->getVar($name, $filter, $default, "cookie");

        //@TODO cookie before return
        return empty($cookie) ? false : $cookie;
    }

    /**
     * Unserializes a string
     * 
     * @param type $string
     * @return type 
     */
    public function unserialize($string) {
        return unserialize(gzuncompress(base64_decode($string)));
    }

    /**
     * Serializes an array or object
     * 
     * @param string $data
     * @return string 
     */
    public function serialize($data) {
        return Output::serialize($data);
    }

    /**
     * Checks and removes registered globals
     * 
     * @return void
     */
    public function unRegisterGlobals() {
        if (ini_get('register_globals')) {
            $SUPER_GLOBALS = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($SUPER_GLOBALS as $UNSAFE) {
                foreach ($GLOBALS[$UNSAFE] as $key => $var) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }

    /**
     * Magic Quotes, StripSlashes
     * 
     * @param string $name
     * @param string $verb
     */
    public function getEscapedVar($name, $default='', $verb='request', $options=array()) {
        //FILTER_SANITIZE_MAGIC_QUOTES
        //FILTER_SANITIZE_SPECIAL_CHARS
        $filter = \IS\ESCAPED; //FILTER_SANITIZE_NUMBER_INT

        $escaped = $this->getVar($name, $filter, $default, $verb, $options);

        //@TODO validate is interger before return
        return $escaped;
    }

    /**
     * Gets the input method (verb)
     * 
     * POST, GET
     * 
     * @return string; 
     */
    public static function getMethod() {

        $verb = Input::getVerb();
        $method = strtoupper($verb);
        return $method;
    }

    /**
     * Determines if the input method is of type POST or GET
     * 
     * @param string $verb
     * @return boolean 
     */
    public static function methodIs($verb) {

        $method = static::getVerb();

        $return = ($method === strtolower($verb)) ? true : false;

        return $return;
    }

    /**
     * Gets an input variable. Attempts to determine what its type is
     * and returns a sanitized type
     *
     * @param string    $name
     * @param interger  $filter     
     * @param string    $verb
     * @param interger  $flags
     * @param array     $options 
     */
    public function getVar($name, $filter='', $default='', $verb='request', $options=array()) {

        if (strtolower($verb) == 'request') {
            $verb = $this->getVerb();
        }

        //just form casting
        $verb = strtolower($verb);
        $input = $this->$verb;


        //Undefined
        if (empty($name) || !isset($input) || !isset($input[$name])) {
            if (isset($default) && !empty($default)) {
                return $default;
            } else {
                return null; //nothing for that name;
            }
        }

        //Do we have a filter;
        if (!isset($filter) || !is_int($filter)) {
            //PHP warns against using gettype to get type,
            //but its much easier than running every is_* to determine type
            //so fo now we go with gettype;
            $type = gettype($input[$name]);

            switch ($type) {
                case "interger":
                    $filter = \IS\INTERGER;
                    break;
                case "float":
                case "double":
                    $filter = \IS\FLOAT;
                    $options = array(
                        "flags" => FILTER_FLAG_ALLOW_SCIENTIFIC | FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND,
                        "options" => $options
                    );
                    break;
                case "string":
                    $filter = \IS\STRING;
                    $options = array(
                        "flags" => FILTER_FLAG_STRIP_LOW,
                        "options" => $options
                    );
                    break;
                case "array":
                    $filter = \IS\RAW;
                    $options = array(
                        "flags" => FILTER_FLAG_STRIP_LOW,
                        "options" => $options
                    );
                    break;
                case "object": //@TODO, 
                case "resource":
                case "NULL":
                case "unknown type":
                default:
                    $filter = \IS\RAW;
                    $options = array(
                        "flags" => FILTER_FLAG_STRIP_LOW,
                        "options" => $options
                    );
                    break;
            }
        }
        //uhhhnrrr...
        $variable = $input[$name];

        //Pre treat;
        if (get_magic_quotes_gpc() && ($input[$name] != $default) && ($verb != 'files')) {
            $variable = stripslashes($input[$name]); //??
        }

        return $this->filter($variable, $filter, $options);
    }

    /**
     * Returns the verb curresponding to the 
     * current request method
     * 
     * @return string 
     */
    public function getVerb() {

        $verb = strtolower($_SERVER['REQUEST_METHOD']);

        return (string) $verb;
    }

    /**
     *  Sanitizes all verbs in the input
     * 
     *  @return void;
     */
    private function sanitize() {

        //
    }

    /**
     * Remove all characters except digits, plus and minus sign.
     * 
     * @param type $name
     * @param type $verb 
     */
    public function getInt($name, $default='', $verb='request', $options=array()) {

        $filter = \IS\INTERGER; //FILTER_SANITIZE_NUMBER_INT

        $interger = $this->getVar($name, $filter, $default, $verb, $options);

        //@TODO validate is interger before return
        return (int) $interger;
    }

    /**
     *
     * @param type $name
     * @param type $default
     * @param type $verb
     * @param type $options
     * @return type 
     */
    public function getNumber($name, $default='', $verb='request', $decimal=false, $options=array()) {

        $filter = ($decimal) ? \IS\FLOAT : \IS\NUMBER; //FILTER_SANITIZE_NUMBER_INT

        $number = $this->getVar($name, $filter, $default, $verb, $options);

        //@TODO validate is interger or double before return

        return (empty($number)) ? (int) '0' : (int) $number;
    }

    /**
     * Strip tags, and encodes special characters.
     * 
     * @param string    $name
     * @param string    $verb
     * @param boolean   $allowhtml
     * @param array      $tags 
     */
    public function getString($name, $default='', $verb='request', $allowhtml = false, $tags = array()) {
        //FILTER_SANITIZE_STRING
        //FILTER_SANITIZE_STRIPPED
        //\IS\HTML;

        $filter = (!(bool) $allowhtml) ? \IS\STRING : \IS\SPECIAL_CHARS;
        $options = array(
            "flags" => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH,
            "options" => array()
        );

        //if (is_array($html)) $str = strip_tags($str, implode('', $html));
        //elseif (preg_match('|<([a-z]+)>|i', $html)) $str = strip_tags($str, $html);
        //elseif ($html !== true) $str = strip_tags($str);
        $string = $this->getVar($name, $filter, $default, $verb, $options);

        //Sub processing for HTML and all that?

        return (string) trim($string);
    }

    /**
     * Returns a cleaned Array
     * 
     * @param string $name
     * @param string $verb
     * @param array $flags 
     */
    public function getArray($name, $default = '', $verb='request', $options=array()) {
        
    }

    /**
     * Remove all characters except digits, +- and optionally .,eE.
     * 
     * @param string $name
     * @param string $verb
     * @param array $flags 
     */
    public function getFloat($name, $default='', $verb='request', $options=array()) {

        //FILTER_SANITIZE_NUMBER_FLOAT
        //FILTER_SANITIZE_NUMBER_FLOAT
        $filter = \IS\FLOAT;
        $options = array(
            "flags" => FILTER_FLAG_ALLOW_SCIENTIFIC | FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND,
            "options" => $options
        );

        $float = $this->getVar($name, $filter, $default, $verb, $options);

        //@TODO valid is float before return

        return (float) $float;
    }

    /**
     * Remove all characters except digits 0 and 1.
     * Transforms into Boolean true or false, where 0=false and 1=true
     * 
     * @param string $name
     * @param string $verb
     */
    public function getBoolean($name, $default='', $verb='request', $options=array()) {
        //FILTER_SANITIZE_NUMBER_INT
        $filter = \IS\BOOLEAN;
        $options = array(
            "options" => $options
        );

        $boolean = $this->getVar($name, $filter, $default, $verb, $options);

        //@TODO valid is float before return

        return (boolean) $boolean;
    }

    /**
     * Returns the first word a santized string
     * Strip tags, optionally strip or encode special characters.
     * 
     * @param string $name
     * @param string $verb
     * @param array $flags 
     */
    public function getWord($name, $default='', $verb='request', $options=array()) {
        //First word in a sanitized string
        $sentence = $this->getString($name, $default, false);

        //@TODO validate string before breaking into words;
        //Requires php5.3!!
        return (string) strstr($sentence, ' ', true);
    }

    /**
     * Remove all characters except letters, digits and !#$%&'*+-/=?^_`{|}~@.[].
     * 
     * @param string $name
     * @param string $verb 
     */
    public function getEmail($name, $default='', $verb='request', $options=array()) {
        //FILTER_SANITIZE_EMAIL

        $filter = \IS\EMAIL;
        $options = array(
            "options" => $options
        );
        $email = $this->getVar($name, $filter, $default, $verb, $options);

        //@TODO valid is email with $this->validate before return;
        return (string) $email;
    }

    /**
     * Sets an Input variable after routing
     * 
     * @param string $name
     * @param mixed $value
     * @param string $verb 
     */
    public function setVar($name, $value, $verb='post') {
        
    }

    /**
     * Filters an Input variable
     * 
     * @param interger  $type
     * @param mixed     $variablename
     * @param interger  $filter 
     */
    private function filter($var, $filter, $options = null) {

        //gets a specific external variable and filter it
        //determine what variable name is being used here;
        $vname = null;

        //@TODO To trust or not to trust?
        return filter_var($var, $filter, $options);
    }

    /**
     * Filters an Array recursively
     * 
     * @param type $array 
     */
    private function filterArray($array) {
        //
    }

    /**
     * Gets an instance of the Input Object
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
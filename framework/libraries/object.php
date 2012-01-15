<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * object.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/object
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/object
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
abstract class Object {

    /**
     * An error of object messages
     *
     * @var array
     */
    protected static $errors = array();
    
    /**
     * This method prevents object cloning
     * 
     * @return void;
     */
    final private function  __clone() { }
    
    /**
     * Creates an instance of the object
     * 
     * @return void
     */
    public function Object() {
        $args = func_get_args();
        call_user_func_array(array(&$this, '__construct'), $args);
    }

    /**
     * Get a protected object property 
     * 
     * @param string $property
     * @param mixed $default
     * @return mixed 
     */
    public function get($property, $default=null) {

        //if its an array of properties;
        if (is_array($property)) {
            $values = array();

            foreach ($property as $key => $prop) {
                if (isset($this->$prop)) {
                    $values[$prop] = $this->$prop;
                }
            }
            return (!empty($values)) ? $values : $default;
        }

        if (isset($this->$property)) {
            return $this->$property;
        }
        return $default;
    }

    
    /**
     * Aborts the execution of the script
     * 
     * @return void 
     */
    final public function abort() {
        return exit();
    }
    
    /**
     * Returns a referenced error
     * 
     * @param type $i
     * @param type $toString
     * @return type 
     */
    final public static function getError($i = null, $toString = true) {

        // Find the error
        if ($i === null) {
            // Default, return the last message
            $error = end(self::$errors);
        } else
        if (!array_key_exists($i, self::$errors)) {
            // If $i has been specified but does not exist, return false
            return false;
        } else {
            $error = self::$errors[$i];
        }

        return $error;
    }

    /**
     * Returns all the errors
     * 
     * @return type 
     */
    final public static function getErrors() {
        return self::$errors;
    }
    
    /**
     * Returns the error string
     * 
     * @return type 
     */
    final public static function getErrorString(){
        
        $errors = self::getErrors();
        $string = '<ul>';
        foreach($errors as $error){
            $string .= '<li>'.$error.'</li>';
        }
        
        //An ordered lists of all errors;
        return $string.'</ul>';
    }

    /**
     * Sets an object property
     * 
     * @param type $property
     * @param type $value
     * @return type 
     */
    public function set($property, $value = null) {
        
        $previous = isset($this->$property) ? $this->$property : null;
        
        $this->$property = $value;
        
        return $previous;
    }

    /**
     * Set multiple object properties
     *     
     * @param type $properties
     * @return type 
     */
    final public function setProperties($properties) {
        $properties = (array) $properties; //cast to an array

        if (is_array($properties)) {
            foreach ($properties as $k => $v) {
                $this->$k = $v;
            }

            return true;
        }
        return false;
    }
    
    /**
     * Sets an error
     * 
     * @param type $error 
     */
    final public static function setError($error) {

        array_push(self::$errors, $error);
    }

    /**
     * 
     * @return type 
     */
    final public function toString() {
        return get_class($this);
    }


}

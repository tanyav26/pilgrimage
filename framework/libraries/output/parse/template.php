<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * template.php
 *
 * Requires PHP version 5.3
 *
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/template
 * @since      Class available since Release 1.0.0 Jan 28, 2012 2:03:47 PM
 *
 */

namespace Library\Output\Parse;

use Library;
use Library\Output;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Libraries
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/template
 * @since      Class available since Release 1.0.0 Jan 28, 2012 2:03:47 PM
 */
abstract class Template extends Output\Parse {
    /*
     * @var object
     */

    static $instance;

    /**
     * Loaded and imported layouts
     * @var type
     */
    static $layouts = array();

    /**
     * Already parsed
     * @var type
     */
    static $parsed;
    static $output = array();
    static $variables = array();
    static $writer;
    static $imports = array();
    //Tell the getdata method we are loop
    static $looping = false;
    //Specify a loopid for the pvariables
    static $currentloopid = null;

    /**
     * Persisten variables
     * @var type 
     */
    static $pvariables = array();

    /**
     *
     * @param type $path
     * @param type $default
     * @return type 
     */
    final public static function getPersistentData($path, $default = "") {

        $id = explode('.', $path);
        $value = isset(static::$currentloopid) ? static::$pvariables[static::$currentloopid] : array();
        
        //From string representation to array;	 
        foreach ($id as $i => $index) {
            if (!isset($value[$index])) {
                //If we can't find the element, return the default value;
                return $default;
                break;
            };
            $value = $value[$index];
        }

        return (!empty($value) ) ? $value : $default;
    }

    /**
     *
     * @param type $path
     * @param type $default
     * @return type 
     */
    final public static function getData($path, $default = "") {

        //Get an instance of the Output Document class. 
        //We will need this for templates?
        static::$output = Library\Output::getInstance();
        static::$variables = static::$output->getVariables();
     
        $id = explode('.', $path);
        $value = static::$variables;
        
        //if trying to access parent data from within a loop element, the first element 
        //in the path should be _ e.g _.blah.blah.
        $first = reset($id);
        if (static::$looping && $first<>"_"){ 
            return self::getPersistentData($path, $default);
        }
        
        //From string representation to array;	 
        foreach ($id as $i => $index) {
            if (!isset($value[$index])) {
                
                //If we can't find the element, return the default value;
                return $default;
                break;
            };
            $value = $value[$index];
        }
        
        //Parse  here?
        //$value = Template::_( $value );

        return (!empty($value) ) ? $value : $default;
    }

    final public static function getLayout() {
        
    }

    final public static function getImport() {
        
    }

    abstract public static function execute($parser, $element, $writer);

    /**
     * Returns and instantiated Instance of the template class
     *
     * NOTE: As of PHP5.3 it is vital that you include constructors in your class
     * especially if they are defined under a namespace. A method with the same
     * name as the class is no longer considered to be its constructor
     *
     * @staticvar object $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance
     * @return object template
     */
    public static function getInstance() {

        if (is_object(static::$instance) && is_a(static::$instance, 'template'))
            return static::$instance;

        static::$instance = new self();

        return static::$instance;
    }

}


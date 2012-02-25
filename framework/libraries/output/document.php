<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * document.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/output/document
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 *
 */

namespace Library\Output;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/output/document
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
abstract class Document extends Library\Object {

    protected static $_prepared = false;
    protected static $_functions = null;
    protected static $_source = null;
    protected static $_path = "/";

    /**
     * Parses the output document
     * @param type $output
     * @param null $object an instance of the document class
     * 
     * @return string output 
     */
    final public function parse($output, $object=null) {
        //parses the document output buffer
        //1. Set the output as source
        static::$_source = $output;
        
        //2. Parse layouts
        static::$_prepared = Parse::_(static::$_source, $object);


        //4. Return source;
        return static::$_prepared;
    }

    /**
     * Constructor for the class;
     *
     * @return void
     */
    final public function __construct() {

        $classes = array(
            'config' => 'Library\Config',
            'output' => 'Library\Output'
        );

        foreach ($classes as $var => $class) {
            $this->$var = $class::getInstance();
        }
    }

    /**
     * For active record querying ONLY
     *
     * @param string $method
     * @param mixed $args
     * @return mixed
     */
    final public function __call($method, $args) {

        //Get the AR class;
        $output = $this->output;

        if (!\method_exists($this, $method)) {

            if (!\method_exists($output, $method)) {
                $this->setError(_('Method does not exists'));
                return false;
            }

            //Call the Method;
            return @\call_user_func_array(array($output, $method), $args);
        }
    }
    
        /**
     * Output Magic variable Getter
     *
     * @param type $name
     * @return type
     */
    final public function __get($name) {

        //If is property?
        if (isset($this->$name)) {
            return $this->$name;
        }

        //Else check return in output variables;
        return $this->output->get($name);
    }

    /**
     * Returns the processed output and displays to the browser
     * Final method cannot and should not be overidden
     *
     * @param string $format
     *
     */
    abstract public function render();

    /**
     * Gets an instance of the registry element
     *
     * @staticvar self $instance
     * @param type $name
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
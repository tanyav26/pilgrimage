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

use Platform;

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
     * A bunch of hooks to run at various stages during parsing
     *
     * @var type
     */
    protected static $hooks = array();

    /**
     * This method prevents object cloning
     *
     * @return void;
     */
    final private function __clone() {

    }

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
     * Determines if an event/hook is defined
     *
     * @param string $event (required) a global group of event e.g onShutdown
     * @param string $hook (optional) use if looking for a specific hook
     * @return boolean True or False Depending on whether the even if found
     */
    final public static function isDefined($event) {

        //checks if the event is defined in static hook
        if (isset(static::$hooks[$event]) && sizeof(static::$hooks[$event]) > 0) {

            //will also have to check for at least more than one callback
            //so to prevent triggering undefined events

            return true;
        }

        return false;
    }

    /**
     * Registers an Event, to be executed when triggered
     *
     * @param string $name (required)
     * @param mixed  $callback (required)
     * @param mixed  $arguments [args1, args2, ....] or as an array
     * @return type
     */
    final public static function register() {

        // get func args
        $event = func_get_args(); //eventName, callBack, callbackargs
        $hook = array(
            'args' => null
        );
        if (isset($event[0]) && is_string($event[0])) {
            //even name is
            $name = trim($event[0]); //@TODO Possible naming conflicts!
            //Prepare for storage
            if (!static::isDefined($name)) {
                static::$hooks[$name] = array();
            }

            if (isset($event[1]) && is_callable($event[1])) {
                //the call back
                $hook['callback'] = $event[1];

                //any arguments
                //@TODO all extra indices above 2 pass as args
                if (isset($event[2])) {
                    $hook['args'] = $event[2];
                }

                //Now store the event;
                array_unshift(static::$hooks[$name], $hook);
            } else {
                return false; //no callback defined;
            }
        } else {
            return false; //Event can't be stored
        }
    }

    /**
     * Triggers a registered Event, and returns results
     *
     * @param type $event
     * @param type $data
     * @return false if undefined, results from callback hooks
     *
     */
    final public static function trigger() { //$event, [$data = '', ]...

        //Just arbitrary context so we know who is calling
        $context = (!isset(static::$eventContext)) ? _("system events") : static::$eventContext ;
         
        // get func args
        $args = func_get_args(); //eventName, [callBackargs, ]
        
        //First argument must be a string with the name of the event
        if (!is_array($args) || !isset($args[0]) || !is_string($args[0]))  return false;
        
        $event = array_shift($args);  //remove it once we know the event; 
        $data  = $args; //rest of the arguments;
        $time   = \microtime( true );
        //if the event is defined
        if (static::isDefined($event)) {
            //for each even execute callback

            //echo $event;
            
            //print_R($data);

            $events = static::$hooks[$event];
            $results = array();
            

            //triggering the event;
            foreach ($events as $i => $hook) {

                $callback = $hook['callback'];
                $arguments = $hook['args'];

                if (is_callable($callback)) {

                    // Log in the console
                    \Platform\Debugger::log(sprintf(_("[{$time}] Calling %s() at %2s in %3s context"), $callback, $event, $context), $event, "success");

                    //@TODO Determine Method Name from
                    //CallBack directive to use as indices in results array
                    $results[] = call_user_func_array($callback, $data );
                }
            }
            //print_R($events);
            return $results;
        } else {
            //There are no events to trigger
            //\Platform\Debugger::log(sprintf(_("[{$time}] No events triggered for %s in %2s context"), $event, $context), $event, "info");

            return false;
        }
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
        exit();
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
    final public static function getErrorString() {

        $errors = self::getErrors();
        $string = '<ul>';
        foreach ($errors as $error) {
            $string .= '<li>' . $error . '</li>';
        }

        //An ordered lists of all errors;
        return $string . '</ul>';
    }

    /**
     * Sets an object property
     *
     * @param type $property
     * @param type $value
     * @return type
     */
    public function set($property, $value = null, $overwrite=false) {

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
        \Platform\Debugger::log($error);
    }

    /**
     *
     * @return type
     */
    final public function toString() {
        return get_class($this);
    }

}

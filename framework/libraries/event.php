<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * event.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/event
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/event
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Event extends \Library\Object {

    /**
     * Stores all registered Event hooks
     * @var array 
     */
    protected static $hooks = array();

    /**
     * Determines if an event/hook is defined
     * 
     * @param string $event (required) a global group of event e.g onShutdown
     * @param string $hook (optional) use if looking for a specific hook 
     * @return boolean True or False Depending on whether the even if found 
     */
    private static function isDefined($event) {

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
    public static function register() {

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
    public static function trigger($event, $data = '') {

        //if the event is defined
        if (static::isDefined($event)) {
            //for each even execute callback

            $events = static::$hooks[$event];
            $results = array();

            //triggering the event;
            foreach ($events as $i => $hook) {

                $callback = $hook['callback'];
                $arguments = $hook['args'];

                if (is_callable($callback)) {

                    // Log in the console 
                    \Platform\Debugger::log(sprintf(_("Calling %s() at %2s"), $callback, $event));

                    //@TODO Determine Method Name from 
                    //CallBack directive to use as indices in results array
                    $results[] = call_user_func($callback, $arguments, $data);
                }
            }
            //print_R($events);
            return $results;
        } else {
            //There are no events to trigger
            \Platform\Debugger::log(sprintf(_("No events triggered for %s"), $event));

            return false;
        }
    }

    /**
     * Gets an instance of the Library\Exception Object
     * 
     * @static self $instance
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


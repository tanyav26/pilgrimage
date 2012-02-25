<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * loop.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/layout
 * @since      Class available since Release 1.0.0 Feb 5, 2012 10:15:29 PM
 *
 */

namespace Library\Output\Parse\Template;

use Library;
use Library\Output; 
use Library\Output\Parse;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/layout
 * @since      Class available since Release 1.0.0 Feb 5, 2012 10:15:29 PM
 */
class Loop extends Parse\Template {
    /*
     * @var object
     */

    static $instance;
    

    /**
     * Execute the layout
     * 
     * @param type $parser
     * @param type $tag
     * @return type
     */
    public static function execute($parser, $tag, $writer) {

        //print_R($tag['CHILDREN']);
        //First we get the data, and check it is an array or object
        //Get the data;
        if (!isset($tag['DATA'])) return null;
        $id = isset($tag['ID'])? $tag['ID'] : strval($tag['DATA']);
        
        $element   = null;
        $_elements = array();
        
        $data = self::getData($tag['DATA'], array()); //echo $data;
        
        static::$looping = true;
        $existing = static::$currentloopid; //get the current loop id we will replace this at the end
        $current  = static::$currentloopid = $id; //tell the parser what loop we are working with now
        
        //'looping method call';
        foreach( $data as $item){
          
            //Reset the pvariable param;
            static::$pvariables[$id] = $item;
            
            //Now multiply the tag in $_elements;
            Library\Folder\Files\Xml\Parser::writeXML($writer, $tag['CHILDREN']);
            
        };
        
        //When we are done with the loop;
        static::$pvariables = array();
        static::$looping = false;
        static::$currentloopid = $existing;
        
        //Always return the modified element
        return null;
    }

    /**
     * Returns and instantiated Instance of the layout class
     *
     * NOTE: As of PHP5.3 it is vital that you include constructors in your class
     * especially if they are defined under a namespace. A method with the same
     * name as the class is no longer considered to be its constructor
     *
     * @staticvar object $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance
     * @return object layout
     */
    public static function getInstance() {

        if (is_object(static::$instance) && is_a(static::$instance, 'Loop'))
            return static::$instance;

        static::$instance = new self();

        return static::$instance;
    }

}


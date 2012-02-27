<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * element.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/element
 * @since      Class available since Release 1.0.0 Jan 28, 2012 2:06:49 PM
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/element
 * @since      Class available since Release 1.0.0 Jan 28, 2012 2:06:49 PM
 */
class Element extends Parse\Template {
    /*
     * @var object
     */

    static $instance;

    /**
     * Defines the class constructor
     * Used to preload pre-requisites for the element class
     *
     * @return object element
     */
    public function __constructor() {
        
    }
    
    /**
     * Writes out the attribute element
     * 
     * @param type $attribute
     * @param type $content
     * @param type $writer
     * @return boolean 
     */
    public static function attribute($attribute, $content, $writer) {

        //echo($attribute);
        $writer->startAttribute(strtolower($attribute));
        
        //Search for (?<=\$\{)([a-zA-Z]+)(?=\}) and replace with data
        if( preg_match_all('/(?:(?<=\$\{)).*?(?=\})/i', $content, $matches) ){
              
            $searches= array();
            $replace = array(); 
            
            $placemarkers = (is_array($matches) && isset($matches[0])) ? $matches[0] : array();
            
            foreach($placemarkers as $k=>$dataid){
                $replace[] = self::getData( strval($dataid) ); //default is null 
                $searches[]= '${'.$dataid.'}';
            }
            //Replace with data;
            $content = str_ireplace($searches, $replace, $content);     
        }
        
        $writer->text($content);
        $writer->endAttribute();

        return true;
    }
    
    /**
     * Writes out CDATA
     * 
     * @param type $text
     * @param type $writer 
     */
    public static function content($text, $writer) {
        
        $writer->writeRaw(trim($text));
        
    }

    /**
     * Renders a text element
     * 
     * @param type $tag
     * @return null 
     */
    private static function text($tag) {

        //Get the data;
        if (isset($tag['DATA'])):
            $tag['_DEFAULT'] = isset($tag['CDATA'])?$tag['CDATA']:null;
            $data = self::getData($tag['DATA'], $tag['_DEFAULT']); //echo $data;
            //if formatting
            if (isset($tag['FORMATTING']) && in_array($tag['FORMATTING'], array("sprintf", "vsprintf"))):
                $text = call_user_func($tag['FORMATTING'], $tag['_DEFAULT'], $data);

                //Replace the CDATA;
                $data = $text;
            endif;



            $tag['CDATA'] = $data;
            //If we do not have a default empty it
            if (is_null($tag['_DEFAULT']))
                unset($tag['_DEFAULT']);
        //die;
        endif;

        //Get the layout name; and save it!
        if (isset($tag['CDATA']) && is_a(static::$writer, "XMLWriter")):
            static::$writer->writeRaw($tag['CDATA']);
        endif;

        return null; //Removes the element from the tree but returns the text;
    }

    /**
     * Renders and reparses a layout element 
     * 
     * @param type $tag 
     */
    private static function layout($tag) {

        $element = null;

        //Get the layout name; 
        if (isset($tag['NAME']) && isset(static::$layouts[$tag['NAME']])):
            //Check if we have the element previously parsed
            $element = static::$layouts[$tag['NAME']];

        endif;

        return $element; //Returns the previously parsed element;
    }

    /**
     * Executes the tpl:element method
     * 
     * @param type $parser
     * @param type $tag
     * @param type $writer
     * @return type 
     */
    public static function execute($parser, $tag, $writer) {

        static::$writer = $writer;

        //If no type is defined return null. !We need a type
        if (isset($tag['TYPE'])):
            //@TODO Sad that i have to instantiate this calss 
            //To check if it exists. I need a better way of doing this
            $submethods = array("text", "layout");
            //To spare some more memory
            if (method_exists(self::getInstance(), $tag['TYPE']) && in_array(strtolower($tag['TYPE']) , $submethods) ) :
                $tag = static::$tag['TYPE']($tag);
            endif;
        endif;

        return $tag;
    }

    /**
     * Returns and instantiated Instance of the element class
     *
     * NOTE: As of PHP5.3 it is vital that you include constructors in your class
     * especially if they are defined under a namespace. A method with the same
     * name as the class is no longer considered to be its constructor
     *
     * @staticvar object $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance
     * @return object element
     */
    public static function getInstance() {

        if (is_object(static::$instance) && is_a(static::$instance, 'element'))
            return static::$instance;

        static::$instance = new self();

        return static::$instance;
    }

}


<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * parser.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files/xml/parser
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library\Folder\Files\Xml;

use Library\Folder;
use Library\Folder\Files as Files;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files/xml/parser
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Parser extends \Library\Object {

    /**
     *
     * @var type 
     */
    public static $xml;
    
    /**
     *
     * @var type 
     */
    public static $document;
    
    /**
     *
     * @var type 
     */
    public static $parser;
    
    /**
     *
     * @var type 
     */
    public static $tree = array();
    
    /**
     *
     * @var type 
     */
    public static $stack = array();
    
    /**
     *
     * @var type 
     */
    public static $level;
    
    /**
     *
     * @var type 
     */
    public static $elements;
    
    /*
     *  The document ROOT
     */
    public static $ROOT ;

    /**
     *
     * @param type $xml
     * @param type $autorun
     * @return type 
     */
    public function __construct($xml ='', $autorun = false) {

        //Pre-requisites
        self::$xml = $xml;
        self::$parser = xml_parser_create();

        //self::$tree[0] = array();
        self::$stack[count(self::$stack)] = &self::$tree;

        self::$document = Document::getInstance();
        
        static::$document->ROOT->CHILDREN = &self::$tree['CHILDREN'];

        //Parser Tag, Object, character handlers
        xml_set_object(self::$parser, self::$document);

        //Elements
        xml_set_element_handler(
                self::$parser, "start", "end"
        );
        xml_set_character_data_handler(
                self::$parser, "cdata"
        );

        //if autorun
        if ($autorun) {
            return self::run();
        }
    }

    /**
     * Runs the XML parser
     * 
     * @return void
     */
    final public static function run() {

        //If we can't parse the element
        if (!xml_parse(self::$parser, self::$xml)) {
            $error = "[Error:" . xml_get_error_code(self::$parser)
                    . "|line:" . xml_get_current_line_number(self::$parser)
                    . "|column:" . xml_get_current_column_number(self::$parser) . "] "
                    . xml_error_string(xml_get_error_code(self::$parser))
            ;
            //Set the error      
            self::setError($error);
        }

        // print_R(self::getErrors());
        //print_R(self::$tree);
    }

    /**
     * 
     * @param type $parser
     * @param type $name
     * @param array $attribs 
     */
    final public static function start($parser, $name, array $attribs) {
        //die;
        $tag = array();
        $tag['ELEMENT'] = strtolower($name);
        $tag['CHILDREN'] = array();
        
        //Document object
        $_doc  = &self::$document;
        
        foreach ($attribs as $key => $value) {
            //echo $key."=".$value;
            $tag[$key] = $value;
        }
        
        //print_R($_tag);
        
        //Add the element to the tree;
        $last = &self::$stack[count(self::$stack) - 1];
        $last['CHILDREN'][] = &$tag;

        if(empty($tag['CHILDREN'])){
            unset($tag['CHILDREN']);
        }  
        
        //Add the tag to the stack
        self::$stack[count(self::$stack)] = &$tag;
        //$_doc->appendTag( $_last);

        //Up the level on step 1
        self::$level++;
    }

    /**
     *
     * @param type $parser
     * @param type $name 
     */
    final public static function end($parser, $name) {

        //Update the xml tree;
        array_pop(self::$stack);

        //Reset the level, if we've hit the end of the tag
        self::$level--;
    }

    /**
     * Returns the parser resource id
     * 
     * @return type 
     */
    public static function getParser() {
        return self::$parser;
    }
   
    /**
     *
     * @return type 
     */
    public static function getDocument() {
        return self::$document;
    }
    

    /**
     * Character Data Handler #CDATA
     * 
     * @param type $parser
     * @param type $data 
     */
    public static function cdata($parser, $data) {

        //Data Handler
    }
    
    /**
     * Character Data Handler #CDATA
     * 
     * @param type $parser
     * @param type $data 
     */
    public static function pcdata($parser, $data) {

        //Data Handler
    }

    /**
     * Gets an Instance of the XML parser
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
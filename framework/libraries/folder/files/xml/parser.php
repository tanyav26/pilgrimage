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

use Library;
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
    public static $ROOT;

    /**
     * A bunch of hooks to run at various stages during parsing
     * 
     * @var type 
     */
    static $hooks = array();
    static $eventContext;

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
        self::$document = null;
        self::$tree = array();
        self::$stack = array();
        self::$level = null;
        self::$elements = null;
        self::$ROOT = null;
        self::$eventContext = _("XML Parser Events");

        //self::$tree[0] = array();
        self::$stack[count(self::$stack)] = &self::$tree;

        self::$document = new Document();

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
     * @return void
     */
    public function generateXML($ROOT="", $version='1.0', $encoding="UTF-8") {

        //Use a user supplied root, or try using our root
        $ROOT = !empty($ROOT) ? $ROOT :
                (isset(self::$tree['CHILDREN'][0])) ? self::$tree['CHILDREN'][0] : null ;

        //For now just arrays! will look to handle objects later
        if (!isset($ROOT) || !is_array($ROOT)) {
            $this->setError(_("The document root is invalid"));
            return false;
        }

        //print_R($ROOT);
        //Using the XMLwriter PHP library;
        $xmlWriter = new \XMLWriter;
        $xmlWriter->openMemory();
        $xmlWriter->startDocument($version, $encoding);
        $xmlWriter->setIndent(true);

        //$xmlWriter->startElement("ROOT");
        //Recursively write out the xml;
        static::writeXML($xmlWriter, $ROOT);

        return $xmlWriter->outputMemory(true);
    }

    /**
     * Recursively converst an array to xml
     * 
     * @param \XMLWriter $xml
     * @param type $data 
     */
    final private static function writeXML(\XMLWriter $xmlWriter, $root) {

        $tag = null;
        $content = null;
        $key = null;
        $iterator = 0;
        $children = sizeof($root);

        foreach ($root as $element => $data) {

            //If it is a child element
            if (is_array($data)) {
                $key = $element;
                static::writeXML($xmlWriter, $data);
                //$xmlWriter->endElement();
            }
            //If the element is not array
            switch ($element):
                case "ELEMENT": //We found an element tag;
                    $tag = strtolower($data);
                    $xmlWriter->startElement($tag);
                    //continue;
                    break;
                case "CDATA":
                    //$xmlWriter->startCdata( );
                    $xmlWriter->text(trim($data));
                    //$xmlWriter->endCdata();
                    //continue;
                    break;
                default:
                    if (!is_array($data)):
                        $xmlWriter->startAttribute(strtolower($element));
                        $xmlWriter->text($data);
                        $xmlWriter->endAttribute();
                    //continue;
                    endif;
                    //continue;
                    break;
            endswitch;
            //@TODO: WHERE DO WE CLOSE THE TAG
            //This is a very hackish way of determining if we are at the end of 
            //an element. But it works.
            if ($iterator + 1 == $children) {
                if (empty($key) && !empty($tag) || ($key == 'CHILDREN') && !empty($tag)) {

                    //script etc
                    switch ($tag):
                        case "script":
                            $xmlWriter->text("");
                            break;
                        default:

                            break;
                    endswitch;

                    $xmlWriter->endElement();
                }
            }
            $iterator++;
        }
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
        $_doc = &self::$document;

        foreach ($attribs as $key => $value) {
            //echo $key."=".$value;
            $tag[$key] = $value;
        }

        //print_R($_tag);
        //Add the element to the tree;
        $last = &self::$stack[count(self::$stack) - 1];
        $last['CHILDREN'][] = &$tag;

        if (empty($tag['CHILDREN'])) {
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
        $data = trim($data);
        static $children = 0;

        //Add the data to the tree;
        $last = &self::$stack[count(self::$stack) - 1];
        if (!empty($data)) {
            //Where there are tabs or new lines in cdata, the cdata function
            //is called several times. As such if you just push to the same
            //variable all you will see is the last line. To overcome this,
            //we check if content has previous been set, and just append to existing
            //Make sure we concatenate;
            $old = isset($last['CDATA']) && !empty($last['CDATA']) ? $last['CDATA'] : null;

            //We also search for embeded tags in cdata sections to and make sure that we can work something
            if (isset($last['CHILDREN'])) {

                $howmany = sizeof($last['CHILDREN']);

                for ($i = 0; $i < ($howmany - ($children - 1)); $i++) {
                    $key = $children + 1; //Have to add i in case we are dealing with consecutive tags;
                    $old .= " %\${$key}s";
                    $children = $children + 1;
                }
            }
            $last['CDATA'] = $old . " " . $data;

            $section++;
        }
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
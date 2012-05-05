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
use Library\Folder\Files;

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
class Parser extends Files\Xml {

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
    public static $nsDeclaration = array();

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
     * Methods are called when a namespaced element is found matching
     * a method name in that namespace.
     *
     * @var array $method e.g when <tpl:layout> run array(
     *   "tpl"=>array(
     *       "layout" => \Parse\Template\Layout::execute
     *   )
     * )
     *
     */
    static $methods = array();
    static $eventContext;

    /**
     *
     * @param type $xml
     * @param type $autorun
     * @return type
     */
    public function __construct($xml = '', $autorun = false, $namespaced = true, $methods = array()) {

        //Pre-requisites
        self::$xml = $xml;
        self::$parser = $namespaced ? xml_parser_create_ns("UTF-8", ":") : xml_parser_create("UTF-8");
        self::$methods = $methods;
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

        //We do not need the default handler, as this in PHP5 does not get CDATA
        //Its mainly for PHP4 guys!
        //xml_set_default_handler();
        //Parser Tag, Object, character handlers
        xml_set_object(self::$parser, self::$document);
        xml_set_element_handler(self::$parser, "start", "end");
        xml_set_character_data_handler(self::$parser, "cdata");

        xml_set_start_namespace_decl_handler(self::$parser, "namespacedStart");
        xml_set_end_namespace_decl_handler(self::$parser, "namespacedEnd");
        xml_set_external_entity_ref_handler(self::$parser, "externalEntity");
        xml_set_processing_instruction_handler(self::$parser, "processingInstruction");
        xml_set_notation_decl_handler(self::$parser, "notation");
        xml_set_unparsed_entity_decl_handler(self::$parser, "unparsedEntity");

        //if autorun
        if ($autorun) {
            return self::run();
        }
    }

    /**
     * A namespaced start tag,
     * This is called before the start method for a namespaced tag
     * Therefore use this method to tell self::start that we are processing a
     * namespaced tag;
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $prefix
     * @param type $uri
     */
    final public static function namespacedStart($parser, $prefix, $uri) {

        //http://www.w3.org/1999/xhtml

        static::$nsDeclaration = array($prefix, $uri);

        return true;
    }

    /**
     * A namespaced end tag
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $prefix
     */
    final public static function namespacedEnd($parser, $prefix) {

        return true;
    }

    /**
     * An external entity
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $openEntityNames
     * @param type $base
     * @param type $systemId
     * @param type $publicId
     */
    final public static function externalEntity($parser, $openEntityNames, $base, $systemId, $publicId) {

        //die;

        if ($systemId) {
            if (!list($parser, $fp) = new_xml_parser($systemId)) {
                self::setError("Could not open entity %s at %s\n", $openEntityNames, $systemId);
                return false;
            }
            while ($data = fread($fp, 4096)) {
                if (!xml_parse($parser, $data, feof($fp))) {
                    self::setError("XML error: %s at line %d while parsing entity %s\n", xml_error_string(xml_get_error_code($parser)), xml_get_current_line_number($parser), $openEntityNames);
                    xml_parser_free($parser);
                    return false;
                }
            }
            xml_parser_free($parser);
            return true;
        }
        return false;
    }

    /**
     * Unparsed Entity handler
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $entityName
     * @param type $base
     * @param type $systemId
     * @param type $publicId
     * @param type $notationName
     */
    final public static function unparsedEntity($parser, $entityName, $base, $systemId, $publicId, $notationName) {
        
    }

    /**
     * Processing Instruction (PI) Handler
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $target
     * @param type $data
     */
    final public static function processingInstruction($parser, $target, $data) {
        
    }

    /**
     * Notation handler
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $notationName
     * @param type $base
     * @param type $systemId
     * @param type $publicId
     */
    final public static function notation($parser, $notationMame, $base, $systemId, $publicId) {
        
    }

    /**
     * Sets an option to the parser
     *
     * @param type $option
     * @param type $value
     * @return type
     */
    final public static function setOption($option, $value) {
        return xml_parser_set_option(self::$parser, $option, $value);
    }

    /**
     * Returns a parser option
     *
     * @param type $option
     * @return type
     */
    final public static function getOption($option) {
        return xml_parser_get_option(self::$parser, $option);
    }

    /**
     * Runs the XML parser
     *
     * @return void
     */
    final public static function run($xml=null, $reverse = FALSE) {

        static $literal2NumericEntity;
        
        $xml = !empty($xml) ? $xml : self::$xml ;

        if (empty($literal2NumericEntity)) {
            $transTbl = get_html_translation_table(HTML_ENTITIES);
            foreach ($transTbl as $char => $entity) {
                if (strpos('&"<>', $char) !== FALSE)
                    continue;
                $literal2NumericEntity[$entity] = '&#' . ord($char) . ';';
            }
        }
        if ($reverse) {
            $xml = strtr($xml, array_flip($literal2NumericEntity));
        } else {
            $xml = strtr($xml, $literal2NumericEntity);
        }

        //If we can't parse the element
        if (!xml_parse(self::$parser, $xml)) {
            $error = "[Error:" . xml_get_error_code(self::$parser)
                    . "|line:" . xml_get_current_line_number(self::$parser)
                    . "|column:" . xml_get_current_column_number(self::$parser) . "] "
                    . xml_error_string(xml_get_error_code(self::$parser))
            ;
            //Set the error
            self::setError($error);
        }
    }

    /**
     * Converts a previously parsed document from an array to XML
     *
     * usage: $DOCUMENT->toXML();
     *
     * @param type $ROOT
     * @param type $version
     * @param type $encoding
     * @param type $hooks
     * @return type
     */
    final public function toXML($ROOT = "", $version = '1.0', $encoding = "UTF-8", $readonly = array()) {


        //Use a user supplied root, or try using our root
        $ROOT = !empty($ROOT) ? $ROOT :  ((isset(self::$tree['CHILDREN'][0])) ? self::$tree['CHILDREN'][0] : null );

        //For now just arrays! will look to handle objects later
        if (!isset($ROOT) || !is_array($ROOT)) {
            //print_R($ROOT);
            $this->setError(_("The document root is invalid"));
            return false;
        }

        //Using the XMLwriter PHP library;
        $xmlWriter = new \XMLWriter;
        $xmlWriter->openMemory();
        $xmlWriter->startDocument($version, $encoding);
        //$xmlWriter->setIndent(true);
        //$xmlWriter->startElement("ROOT");
        //Recursively write out the xml;
        static::writeXML($xmlWriter, $ROOT, $readonly);

        $xmlWriter->endDocument();
        
        return $xmlWriter->outputMemory(true);
    }

    /**
     * Recursively converst an array to xml
     *
     * @param \XMLWriter $xml
     * @param type $data
     */
    final public static function writeXML(\XMLWriter $xmlWriter, $root, $readonly = array()) {

        $tag = null;
        $content = null;
        $key = null;
        $iterator = 0;
        $children = sizeof($root);

        $root = self::callback($root, $xmlWriter, $readonly);
        
        if(!is_array($root)) return ;

        foreach ($root as $element => $data) {

            //If it is a child element
            if (is_array($data) && $element !== 'NAMESPACE') {
                $key = $element;
                static::writeXML($xmlWriter, $data);
         
                //$xmlWriter->endElement();$tag
            }
            //If the element is not array
            switch ((string)$element):
                case "ELEMENT": //We found an element tag;
                    $tag = $data;
                    if (!empty($tag)):
                        $tag = strtolower($tag);
                        $xmlWriter->startElement($tag);
                    //\Platform\Debugger::log($tag);
                    endif;
                    //continue;
                    break;
                case "CDATA":
                    //$xmlWriter->startCdata( );
                    Library\Event::trigger("_XMLContentCallback", $data, $xmlWriter);
                    if (!Library\Event::isDefined("_XMLContentCallback")) {
                        $xmlWriter->writeRaw(trim($data));
                    }
                    //$xmlWriter->endCdata();
                    //continue;
                    break;
                default:
                    if (!is_array($data)):

                        //Else
                        //@TODO Deal with namespaced attributes
                        //@TODO trigger Last
                        //echo $element;                 
                        Library\Event::trigger("_XMLAttributeCallback", $element, $data, $xmlWriter);
                        //If no default callback is defined
                        if (!Library\Event::isDefined("_XMLAttributeCallback")) {
                            $xmlWriter->writeAttribute($element, $data);
                            //$xmlWriter->startAttribute(strtolower($element));
                            //$xmlWriter->text($data);
                            //$xmlWriter->endAttribute();
                        }


                    endif;
                    //continue;
                    break;
            endswitch;
            //@TODO: WHERE DO WE CLOSE THE TAG
            //This is a very hackish way of determining if we are at the end of
            //an element. But it works.
            if ($iterator + 1 == $children) {
                if (empty($key) && !empty($tag) || ($key == 'CHILDREN') && !empty($tag)) {

                    //empty tags e.g script etc
                    switch ($tag):
                        case "script":
                        case "textarea":
                        case "span":
                            $xmlWriter->fullEndElement();
                            break;
                        default:
                            $xmlWriter->endElement();
                            break;
                    endswitch;
                    //if (!empty($tag)):
                    //endif;
                }
            }
            $iterator++;
        }
    }

    /**
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $name
     * @param array $attribs
     */
    final public static function start($parser, $name, array $attribs) {
        //die;
        $tag = array();
        $tag['ELEMENT'] = $name = strtolower($name);
        $tag['CHILDREN'] = array();
        $tag['NAMESPACE'] = $namespace = static::$nsDeclaration;

        //print_r($namespace);
        //Namespaces and Methods
        if (is_array($namespace) && !empty($namespace)) {
            $uri = end($namespace);
            $name = str_replace($uri, "", $name);
            $parts = explode(":", $name);

            //echo $tag['ELEMENT']."\n";
            if (sizeof($parts) > 1) {
                //$tag['NAMESPACE'][0] = current($parts); //The first bit before the url
                $tag['ELEMENT'] = end($parts);
            }
        }

        //Document object
        $_doc = &self::$document;

        foreach ($attribs as $key => $value) {
            //echo $key."=".$value;
            //echo "$key<br />";
            $tag[$key] = $value;
        }

        //print_R($_tag);
        //Add the element to the tree;
        $last = &self::$stack[count(self::$stack) - 1];
        $last['CHILDREN'][] = &$tag;

        if (empty($tag['CHILDREN'])) {
            unset($tag['CHILDREN']);
        }
        //static::$nsDeclaration = array(0=>'',1=>'http://www.w3.org/1999/xhtml');
        //Add the tag to the stack
        self::$stack[count(self::$stack)] = &$tag;
        //$_doc->appendTag( $_last);
        //Up the level on step 1
        self::$level++;
    }

    /**
     *
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $name
     */
    final public static function end($parser, $name) {

        //Update the xml tree;
        array_pop(self::$stack);

        ////Check if we already have a CDATA in the parent of this tag
        //Check if the element name is a method in the namespaced and call it
        //Reset the level, if we've hit the end of the tag
        self::$level--;
    }

    /**
     * @param array readonly An inclusive of the only callback methods to run
     * @param type $element
     * @return type
     */
    final protected function callback($element, \XMLWriter $xmlWriter) {

        if (isset($element['NAMESPACE'])) {
            reset($element['NAMESPACE']);

            $prefix = current($element['NAMESPACE']);

            //Empty namespace, return element as is;
            if (empty($prefix)) {
                return $element;
            }

            $uri = end($element['NAMESPACE']);
            $method = $element['ELEMENT'];

            if (array_key_exists($prefix, static::$methods)){
                
                $class  = static::$methods[$prefix].ucfirst($method); 

                if(!method_exists($class, "execute")) return $element;
   
                return call_user_func("$class::execute", static::$parser, $element, $xmlWriter);
            }
        }
        return $element;
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
     * @param Parser $parser reference to the XML parser calling the handler.
     * @param type $data
     */
    public static function cdata($parser, $data) {

        //Data Handler
        $data = trim($data);
        $data = preg_replace('/^([a-z]+;)/', '&\1', $data);
        $data = preg_replace('/^(#[0-9]+;)/', '&\1', $data);

        $children = 0;

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
                //Tell the end tag that wee need to sprintf

                $howmany = sizeof($last['CHILDREN']);

                for ($i = 0; $i < ($howmany - ($children - 1)); $i++) {
                    //Have to add i in case we are dealing with consecutive tags;
                    $key = $children + 1;
                    //?no need for this really
                    //Rather than using a key, lets just flatten the children to xml
                    if (isset($last['CHILDREN'][$children])) {
                        $old .= self::flatten($last['CHILDREN'][$children]);
                        //unset( $last['CHILDREN'][$children] );
                    }
                    //$old .= " %\${$key}s";
                    $children = $children + 1;
                    //return;
                    if (($i + 1) == $howmany) {
                        unset($last['CHILDREN']);
                    }
                }
            }
            //cocatenate
            $last['CDATA'] = $old . $data;

            //$section++;
        }
    }

    /**
     * Flatten array to XML
     *
     * @staticvar string $tag
     * @param type $array
     * @param type $wrap
     */
    private static function flatten($array, $wrap = "") {

        $xml = '';
        static $tag = '';

        if (!empty($wrap)) {
            $xml .= "<$wrap>";
        }
        foreach ($array as $key => $value) {
            switch (strtoupper($key)):
                case "ELEMENT" :
                    $tag = strtolower($value);
                    $xml .=" <$tag";
                    break;
                default :
                    if (!is_array($value) && $key != 'CDATA') {
                        $attribute = ' ' . strtolower($key) . '="' . $value . '"';
                        $xml .=$attribute;
                    }
                    break;
            endswitch;
        }
        //close the tab
        $xml .= ">";
        if (isset($array['CDATA']) && !empty($array['CDATA'])) {
            $xml.= trim($array['CDATA']);
        }
        $xml .="</$tag>\n";
        if (!empty($wrap)) {
            $xml .= "</$wrap>";
        }
        return $xml;
    }

    /**
     * Character Data Handler #CDATA
     *
     * @param Parser $parser reference to the XML parser calling the handler.
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
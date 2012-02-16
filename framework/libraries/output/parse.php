<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * parse.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/parse
 * @since      Class available since Release 1.0.0 Feb 8, 2012 5:40:16 AM
 *
 */

namespace Library\Output;

use Library;
use Library\Folder\Files\Xml as Xml;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/Parse
 * @since      Class available since Release 1.0.0 Jan 28, 2012 2:19:55 PM
 */
class Parse extends Library\Object {
    /*
     * @var object
     */

    static $instance;
    protected static $document;
    protected static $methods = array(
        "tpl" => array(
            "layout" => "\Library\Output\Parse\Template\Layout::execute",
            "element" => "\Library\Output\Parse\Template\Element::execute",
            "import" => "\Library\Output\Parse\Template\Import::execute",
        )
    );

    /**
     *
     * Parses the output buffer
     * 
     * @param type $buffer
     * @param type $document
     * @return type 
     */
    public static function _($buffer = null, $document = null) {

        //Just give the parser the document
        static::$document = $document;
        
        
        $xhtml = $buffer;
        $XmlParser = new Xml\Parser($xhtml, true, true, static::$methods);

        $DOCUMENT = $XmlParser::getDocument();
        $XML = $DOCUMENT->toXML("", "1.0", "UTF-8");

        return $XML;
    }

    /**
     * Loads all defined filters
     *
     * @return void
     */
    final public static function loadFilters() {
        
    }

    /**
     * Returns and instantiated Instance of the Parse class
     *
     * NOTE: As of PHP5.3 it is vital that you include constructors in your class
     * especially if they are defined under a namespace. A method with the same
     * name as the class is no longer considered to be its constructor
     *
     * @staticvar object $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance
     * @return object Parse
     */
    public static function getInstance($buffer = null) {

        if (is_object(static::$instance) && is_a(static::$instance, 'Parse'))
            return static::$instance;

        static::$instance = new self($buffer);

        return static::$instance;
    }

}


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
class Document extends Parser {

    /**
     * @return void
     */
    public function __construct() {
        //Needs to have its own contructor
        //to prevent reconstructing the xml handlers
        $this->ROOT = new Tag();
    }

    /**
     * @return string
     */
    public function getLevel() {
        
    }

    /**
     * Returns the document ROOT. 
     * This is NOT the first tag of the document
     * 
     * @return type 
     */
    public function getRoot() {
        return $this->ROOT;
    }

    /**
     * Return a tag
     * 
     * @return 
     */
    public function getTag() {
        
    }

    /**
     * Returns the last element in document root;
     * 
     * @return type 
     */
    public function getLastTag() {

        //For the first last element;
        if (empty($this->ROOT->CHILDREN)) {
            return new Tag();
        }

        //Last element
        if (!empty($this->ROOT->CHILDREN)) {
            return $this->ROOT->CHILDREN[count($this->ROOT->CHILDREN) - 1];
        }

        //@TODO return an object of the actual last tag! for testing purposes just return new Tag()
        return false;
    }

    public function getFirstTag() {
        
    }

    /**
     * Adds a tag to the end of the document tags array
     * 
     * @param Tag $tag 
     */
    public function appendTag(Tag $tag) {

        //Just add the tag to the children    
        $this->ROOT->CHILDREN[] = $tag;
    }

    public static function prependTag(Tag $tag) {
        
    }

    /**
     * Returns the current pointer in the XML document
     * 
     * @return type 
     */
    public function pointer() {

        return end(self::$tags);
    }

    /**
     * Checks if the document has any elements
     * 
     * @return type 
     */
    public function hasElements() {
        return (count(self::$tags) > 0) ? true : false;
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
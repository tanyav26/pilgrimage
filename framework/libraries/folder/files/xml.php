<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * xml.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files/xml
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 *
 */

namespace Library\Folder\Files;

use Library\Folder;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files/xml
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Xml extends \Library\Folder\Files {

    /**
     * Converts a valid XML string to an array
     *
     * @param type $xml
     */
    public function toArray($xml = null) {
        //I. checks if the $xml string is
        $xml = $this->validate($xml);

        //II. Convert the xml to array
        //III. Return the array
        return '';
    }

    /**
     * Converts an array to XML
     *
     * @param type $array
     */
    public function fromArray($array) {
        //converts an array to xml

        return '';
    }

    /**
     * Converts an Object to XML
     *
     * @param type $xml
     */
    public function toObject($xml = null) {

        return '';
    }

    /**
     * Generates XML string from a non-serialized PHP Object
     *
     * @param type $object
     */
    public function fromObject($object) {
        //converts an object to XML

        return '';
    }

    /**
     * Validates an XML strings
     *
     * @param type $xml
     */
    public function validated($xml = null) {

        //a. valid xml file i.e $this->isFile() //parent method,
        //a.1 get the file stream if is valid file
        //a.2 validate the filestream i.e
        //b. valid xml string
        //b.1 validate the xml string

        return true;
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

        $instance = new self;

        return $instance;
    }
}
<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * config.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/config
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/config
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Config {

    /**
     * @var mixed 
     */
    private static $items;

    /**
     * Constructor for the cofig library
     * 
     * @return void;
     */
    public function __construct() {
        
        $this->validate = Validate::getInstance();
        
    }

    /**
     * Returns a config Item, from config files
     * 
     * @param string $name
     * @param string $default
     * @param string $group
     * @return mixed 
     */
    public static function get($name, $default='', $group='system') {

        //validate item before using
        $config = (!isset($this) || !is_a($this, "Library\Config")) ? self::getInstance() : $this;

        if (empty($group) && isset($config->items[$name])) {
            return $config->items[$name];
        }
        //Attempt to get from the database?
        $items = $config->group( $group );

        //If we have a group;
        if (is_array($items) && isset($items[$name])) {
            return $items[$name];
        }
        //Empty
        return $default;
    }

    /**
     * Returns a config group element
     * 
     * @param string $groupname
     * @return mixed 
     */
    public static function group($groupname) {

        //Instantiate
        $config = (!isset($this) || !is_a($this, "Library\Config")) ? self::getInstance() : $this;

        if (isset($config->items[$groupname])) {
            return $config->items[$groupname];
            //we already have it;
        }
        //OR else go get it!
        $cfgGroup = $config->items[$groupname] = \Platform\Shared::config($groupname);

        return $cfgGroup;
    }

    /**
     * Parses a config definition file
     * 
     * @param string $xml
     * @param string $type 
     * @return boolean false if no config found or config object if found
     */
    public static function getDefinition($xml, $type) {

        //@TODO; Replaces the entire parameters class and function suite 
        $XmlParser = new \Library\Folder\Files\Xml\Parser($xml, true);

        $DOCUMENT = $XmlParser::getDocument();
        $CONFIG = $DOCUMENT->ROOT->config;

        if ($CONFIG) {
            //Check that there is an attribute typ;
            $CONFIG;

            return $CONFIG;
        }

        return false;
    }
    
    public function getIni(){}
    public function getDatabasee(){}
    public function getArray(){}
    public function getXML(){}
    

    /**
     * Gets an instance of the config element
     * @property-read object $instance 
     * @property-write object $instance 
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
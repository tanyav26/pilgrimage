<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * database.php
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

namespace Library\Config;

use Library;
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
final class Ini extends \Library\Object {

    public static $file = array();

    /**
     * Parses an INI configuration file
     * 
     * @param type $filename
     * @return boolean 
     */
    public function readParams($filename) {

        //We will only parse the file if it has not already been parsed!;
        if (!array_key_exists($filename, static::$file)) {
            if (file_exists($filename)) {
                if ((static::$file[$filename] = parse_ini_file($filename, true)) === FALSE) {
                    $this->setError(_("Could not Parse the ini file"));
                    return false;
                } else {
                    //Add the iniParams to $this->params;
                    return $this;
                }
            } else {
                $this->setError(_("The configuration file ({$filename}) does not exists"));
                return false;
            }
        }
    }

    /**
     * Returns the read ini file parameters
     * 
     * @param type $filename
     * @return type 
     */
    public static function getParams($filename = "") {

        if (empty($filename)) {
            return static::$file;
        } elseif (!empty($filename) && isset(static::$file[$filename])) {
            return static::$file[$filename];
        }
    }

    /**
     * Save configuration param section or sections to an ini file
     * 
     * @param type $file
     * @param type $sections 
     */
    public function saveParams($file = "", $sections = array()) {

        $config = \Library\Config::getInstance();

        $_content = '';
        $_sections = '';
        $_globals = '';
        $_linebreak = "\n";

        if (!is_array($sections)) {
            //@TODO throw an error;
            return false;
        }

        foreach ($sections as $section):
            
            $sectionsarray = $config->getParamSection( $section );
            
            if (!empty($sectionsarray) && is_array($sectionsarray)) {
                // 2 loops to write `globals' on top, alternative: buffer
                $content .= "\n[" . $section . "]\n";
                
                foreach ($sectionsarray as $param => $value) {
                    if (!is_array($value)) {
                        $value = static::normalizeValue( $value );
                        $_globals .= $section . ' = ' . $value . $_linebreak;
                    }
                }
                
                $content .= $globals;
                foreach ($sectionsarray as $section => $item) {
                    if (is_array($item)) {
                        $sections .= "\n[" . $section . "]\n";
                        foreach ($item as $key => $value) {
                            if (is_array($value)) {
                                foreach ($value as $arrkey => $arrvalue) {
                                    $arrvalue = $this->normalizeValue($arrvalue);
                                    $arrkey = $key . '[' . $arrkey . ']';
                                    $sections .= $arrkey . ' = ' . $arrvalue
                                            . $this->linebreak;
                                }
                            } else {
                                $value = $this->normalizeValue($value);
                                $sections .= $key . ' = ' . $value . $this->linebreak;
                            }
                        }
                    }
                }
                $content .= $sections;
            }
        endforeach;
        
        return $content;
    }

        /**
     * normalize a Value by determining the Type
     *
     * @param string $value value
     *
     * @return string
     */
    protected static function normalizeValue( $value ) 
    {
        if (is_bool($value)) {
            $value = (bool)$value;
            return $value;
        } elseif (is_numeric($value)) {
            return (int)$value;
        }
        return $value;
    }
    
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
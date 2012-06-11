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

    /**
     * Config file params
     * 
     * @var type 
     */
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
                    static::setError(_("Could not Parse the ini file"));
                    return false;
                } else {
                    //Add the iniParams to $this->params;
                    return;
                }
            } else {
                static::setError(_("The configuration file ({$filename}) does not exists"));
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
     * Converts a config array of elements to an ini string
     * 
     * @param type $params
     * @param type $section
     * @return string
     */
    public static function toIniString($params = array(), $section = NULL) {
        
        $_br = "\n";
        $_tab = NULL; //Use "\t" to indent;
        $_globals = !empty($section)? "\n[" . $section . "]\n" : '';

        foreach ($params as $param => $value) {
            if (!is_array($value)) {
                $value = static::normalizeValue($value);
                $_globals .= $_tab . $param . ' = ' . $value . $_br;
            }
        }
        return $_globals;
    }

    /**
     * Save configuration param section or sections to an ini file
     * 
     * @param type $file
     * @param type $sections 
     */
    public static function saveParams($filename, $sections = array()) {

        $config = \Library\Config::getInstance();
        $configfile = \Library\Folder::getFile();
        $configdir = FSPATH . 'config' . DS;

        $permission = $configfile::getPermission($configdir);

        $_globals = '; the setup configuration file';
        $_br = "\n";
        $_tab = NULL; //Use "\t" to indent;
        //We can only deal with arrays
        if (!is_array($sections) || empty($filename)) {
            //@TODO throw an error;
            return false;
        }
        foreach ($sections as $section):

            $sectionsarray = $config::getParamSection($section);

            if (!empty($sectionsarray) && is_array($sectionsarray)) {
                // 2 loops to write `globals' on top, alternative: buffer
                $_globals .= static::toIniString($sectionsarray, $section);
            }
        endforeach;

        //Temporarily chmode the file;
        //$configfile::chmod($configdir, 755);

        if (!($setupini = $configfile::create($configdir . $filename) )) {
            $config->setError("Could not create the setup configuration file. Please check $configdir folder permissions");
            return false;
        }
        //Now write to file
        if (!$configfile::write($configdir . $filename, $_globals)) {
            $config->setError("Could not write out to the configuration file");
            return false;
        }

        //Reset  chmode the file;
        //$configfile::chmod($configdir, $permission);

        return true;
    }

    /**
     * normalize a Value by determining the Type
     *
     * @param string $value value
     *
     * @return string
     */
    protected static function normalizeValue($value) {
        if (is_bool($value)) {
            $value = (bool) $value;
            return $value;
        } elseif (is_numeric($value)) {
            return (int) $value;
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
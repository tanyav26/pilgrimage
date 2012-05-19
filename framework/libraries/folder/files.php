<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * files.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library\Folder;

use Library;
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Files extends \Library\Folder {

    protected static $file = NULL;
    protected static $pathinfo = array();

    public static function getModifiedDate($path) {
        
    }

    public static function getSize($file) {
        
    }

    /**
     *
     * @param type $file
     * @param type $default
     * @return type 
     */
    public function getName($file="", $default="") {
        
        $file = ( empty($file) && isset(static::$file) ) ? static::$file : $file;

        if (empty($file)) {
            return $default;
        }
        
        //Determine the file extension
        if(!isset(static::$pathinfo[$file]["filename"])){
           static::$pathinfo[$file] = pathinfo($file);
        }
        return static::$pathinfo[$file]["filename"];
    }

    /**
     * Gets the file extension;
     * 
     * @param type $file
     * @param type $default
     * @return string 
     */
    public static function getExtension($file = "", $default = NULL) {

        $file = ( empty($file) && isset(static::$file) ) ? static::$file : $file;

        if (empty($file)) {
            return $default;
        }
        
        //Determine the file extension
        if(!isset(static::$pathinfo[$file]["extension"])){
           static::$pathinfo[$file] = pathinfo($file);
        }
        return static::$pathinfo[$file]["extension"];
    }

    
    /**
     * Reads the contents of a file;
     * 
     * @param type $file
     * @return type 
     */
    public static function read($file) {
        //@TODO Rewrite; 
        return file_get_contents($file);
    }

    public static function getFileStream($path) {
        
    }

    public static function getMimeType() {
        
    }

    public static function create($path) {
        
    }

    public static function move($path, $toPath, $replace = TRUE) {
        
    }

    public static function delete($path, $backup = FALSE) {
        
    }

    public static function hasBackup($path) {
        
    }

    /**
     * Validates file of type, or just isFile;
     * 
     * @param string $file full file path
     * @param string $type if the file type is specified validates against this file type
     * @todo Will fail on files greater than 2GB see PHP is_file docs
     * @return boolean 
     */
    public static function isFile($file = '', $type = NULL) {

        $file = ( empty($file) && isset(static::$file) ) ? static::$file : $file;

        //If we sitill can't decide what file it is, return false;
        if (empty($file)) {
            return FALSE;
        }
        //If the file does not exists, return false;
        if (!file_exists($file)) {
            return false;
        }
        return is_file($file);
    }

    public static function restoreBackup($path) {
        
    }

    public static function getPermission($path) {
        
    }

    public static function setPermission($path, $permission) {
        return $this;
    }

    /**
     * Sets the file for execution
     * 
     * @param string $file
     * @return object An instance of the file class
     */
    public static function setFile( $file ) {

        //Return false if file does not exists;
        if (!static::isFile($file)) {
            return false;
        }
        //Get the file info
        static::$file = $file;
        static::$pathinfo[$file] = pathinfo($file);
        
        //Return an instance of the file object;
        return static::getInstance();
    }

    public static function pack($path, $type = 'tar.gz') {
        
    }

    public static function unpack($path, $type = 'tar.gz') {
        
    }

    /**
     * Returns an instance of the Files class
     * 
     * @staticvar array $instance
     * @param type $type
     * @param type $file
     * @return type 
     */
    public static function getInstance($type = '') {

        static $instance;

        if (!empty($type)):
            //If the class was already instantiated, just return it
            if (isset($instance[$type]))
                return $instance[$type];

            $class = "\Library\Folder\Files\\" . ucfirst($type);
            $instance[$type] = $class::getInstance();
        else:
            if (isset($instance["file"]))
                return $instance["file"];
            $type = "file";
            $instance[$type] = new self();

        endif;

        return $instance[$type];
    }

}
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

    /**
     * Path to the file current being processed
     * @var type 
     */
    protected static $file = NULL;

    /**
     * File Path Info
     * @var type 
     */
    protected static $pathinfo = array();

    /**
     * Get File Name
     * 
     * @param type $file
     * @param type $default
     * @return type 
     */
    public function getName($file = "", $default = "") {

        $file = ( empty($file) && isset(static::$file) ) ? static::$file : $file;

        if (empty($file)) {
            return $default;
        }

        //Determine the file extension
        if (!isset(static::$pathinfo[$file]["filename"])) {
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
        if (!isset(static::$pathinfo[$file]["extension"])) {
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

    /**
     *  Write File
     * 
     * @param type $file
     * @param type $content 
     */
    public static function write($file, $content = "") {

        $stream = static::getFileStream($file);

        //Write the contents
        fwrite($handle, $content);
        fclose($handle);
    }

    /**
     * Get the file stream
     * 
     * @param type $file
     * @param type $mode
     * @return boolean 
     */
    public static function getFileStream($file, $mode = "w+") {

        //This has to be a file
        if (!static::isFile($file)) {
            if (!static::create($file)) {
                return false;
            }
        }
        //Throw some errors
        if (($handle = fopen($file, $mode)) === FALSE) { //this fopen with w will attempt to create the file
            //@Throw error
            return false;
        }
        return $handle;
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

    /**
     * Sets the file for execution
     * 
     * @param string $file
     * @return object An instance of the file class
     */
    public static function setFile($file) {

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

    /**
     * Packs a file into an archive
     * 
     * @param type $path
     * @param type $type
     */
    public static function pack($path, $type = 'tar.gz') {
        
    }

    /**
     * Unpacks and archived file
     * 
     * @param type $path
     * @param type $type
     */
    public static function unpack($path, $type = 'tar.gz') {
        
    }

    /**
     * Restores a backed up file
     * 
     * @param type $path
     */
    public static function restoreBackup($path) {
        
    }

    /**
     * Gets file permissions
     * 
     * @param type $path
     */
    public static function getPermission($path) {
        
    }
    
    /**
     * Sets file permission
     * 
     * @param type $path
     * @param type $permission
     * @return \Library\Folder\Files
     */
    public static function setPermission($path, $permission) {
        return $this;
    }

    /**
     * Get File MIME Type
     */
    public static function getMimeType() {
        
    }

    /**
     * Creates a new file
     * 
     * @param type $path
     */
    public static function create($path) {
        
    }

    /**
     * Move file to a different location
     * @param type $path
     * @param type $toPath
     * @param type $replace
     */
    public static function move($path, $toPath, $replace = TRUE) {
        
    }

    /**
     * Delete a file from the file system
     * 
     * @param type $path
     * @param type $backup
     */
    public static function delete($path, $backup = FALSE) {
        
    }

    /**
     * Check if a file has been backedup
     * 
     * @param type $path
     */
    public static function hasBackup($path) {
        
    }

    /**
     * Get file last modified Date
     * 
     * @param type $path
     */
    public static function getModifiedDate($path) {
        
    }

    /**
     * Get file size
     * @param type $file
     */
    public static function getSize($file) {
        
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
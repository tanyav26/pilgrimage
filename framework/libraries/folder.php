<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * folder.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library;

use Library\Folder;
use Library\Folder\Files;

/**
 * Folder handling methods
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Folder extends \Library\Object {

    /**
     * Returns the UNIX timestamp representation
     * of the last time the folder was modified
     * 
     * @param string $path 
     */
    public function getModifiedDate($path) {
        
    }

    /**
     * Returns in int representation of the file size in bytes
     * 
     * @param string $path 
     */
    public function getSize($path) {
        
    }

    /**
     * Gets the name of the folder
     * 
     * @param string $path 
     */
    public function getName($path) {
        
    }

    /**
     * Create a folder
     * 
     * @param string $path 
     */
    public function create($path) {
        
    }

    /**
     * Moves the folder to a new location
     * 
     * @param type $path
     * @param type $toPath
     * @param type $replace 
     */
    public function move($path, $toPath, $replace=TRUE) {
        
    }

    /**
     * Deletes a folder
     * 
     * @param type $path
     * @param type $backup 
     */
    public function remove($path, $backup=FALSE) {
        
    }

    /**
     * Check if a folder has a backup
     * 
     * @param type $path 
     */
    public function hasBackup($path) {
        
    }

    /**
     * Restore backup
     * 
     * @param type $path 
     */
    public function restoreBackup($path) {
        
    }

    /**
     *
     * @param type $path 
     */
    public function getPermission($path) {
        
    }

    /**
     *
     * @param type $path
     * @param type $permission 
     */
    public function setPermission($path, $permission) {
        
    }

    /**
     *
     * @param type $path
     * @param type $type 
     */
    public function pack($path, $type='zip') {
        
    }

    /**
     * Lists all the files in a directory
     * 
     * @param string $path the compound path being searched and listed
     * @param array $exclude a list of folders, files or fileTypes to exclude from the list
     * @param boolean $recursive Determines whether to search subdirectories if found
     * @param interger $recursivelimit The number of deep subfolder levels to search
     * @param boolean $showfiles Include Files contained in each folder to the array
     * @param boolean $sort Sort folder/files in alphabetical order
     * @param boolean $long returns size, permission, datemodified in list if true, Slow!!
     * 
     * @return array $list = array(
          "path/to/folder" => array(
          "name" => '',
          "parent" => '', //only in long
          "size" => '', //only in long
          "modified" => '', //only in long
          "permission" => '',
          "files" => array(
              "path/to/file" => array(
                  "name" => '',
                  "size" => '', //only in long
                  "modified" => '', //only in long
                  "permission" => '',
                  "extension"  => '',
                  "mimetype"   => ''//only in long
              )
          ),
          "children" => array(
              //Contains a list of all sub folders,
              //*recursion*
            )
          )
        );
     */
    final public function itemize($path, $exclude=array(""), $recursive=FALSE, $recursivelimit=0, $showfiles=FALSE, $sort=TRUE, $long=FALSE) {

        echo "itemize";
    }

    /**
     * Finds and return the folder list matching $name in $inPath.
     * Use $limit to define how many occurences to return if found, default is 1
     * Method will therefore stop once the number of found response is = $limit, use $limit = 0 to find all
     * 
     * @param string $name
     * @param string $inPath
     * @param interger $limit
     * @param boolean $recursive
     * @param interger $recursiveLimit
     * @param boolean $showfiles
     * @param boolean $sort
     * @param boolean $long 
     */
    final public function itemizeFind($name, $inPath, $limit=1, $recursive=FALSE, $recursiveLimit=0, $showfiles=FALSE, $sort=TRUE, $long=FALSE) {

        //1. Search $name as a folder or as a file 
        if (!self::is($inPath)) { //if in path is a directory
            return array();
        }

        $dirh = @opendir($inPath); //directory handler
        //$recursion  = 0;
        $found = array();

        if ($dirh) {
            while (false !== ($file = readdir($dirh))) {
                // remove '.' and '..'
                if ($file == '.' || $file == '..')
                    continue;

                $recursion = 0;
                $newPath = $inPath . $file . DS;

                if (self::is($newPath) && $recursive && ($recursion < $recursiveLimit )) {
                    //echo self::is($newPath)."<br />"; 
                    //echo $newPath."<br />";

                    $newRecursiveLimit = ((int) $recursiveLimit > 0) ? ((int) $recursiveLimit - 1) : 0;
                    $items = self::itemizeFind($name, $newPath, $recursive, $newRecursiveLimit);
                    $found = array_merge($items, $found);
                }

                if (\strtolower($name) == \strtolower($file)) {
                    $found[] = $newPath;
                }
            }
            closedir($dirh);
        }
        //@TODO if long, get additional info for each path;

        return $found;
    }

    /**
     * Determines if a path links to a folder or file
     * 
     * @param string $path
     * @param boolean $folder, value to return if is folder
     *  
     */
    final public function is($path, $folder=TRUE) {

        $return = is_dir($path) ? $folder : !$folder;

        return (bool) $return;
    }

    /**
     * Determines if a path is credible
     * 
     * @param type $path 
     */
    final public function exists($path) {
        
    }

    /**
     * Returns an instance of the folder object
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

    /**
     * Returns an instance of the file object
     * 
     * @return File Class Pdf | Image | Xml
     */
    final public static function getFile( $type ) {

        return \Library\Folder\Files::getInstance($type);
    }

    /**
     * Returns an instance of the archiver object
     * 
     * @param type $type
     * @return type 
     */
    final public static function getPacker($type = '') {

        return \Library\Folder\Pack::getInstance($type);
    }

}
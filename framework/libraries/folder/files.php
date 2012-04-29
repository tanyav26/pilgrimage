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

namespace Library\Folder ;

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
class Files extends \Library\Folder{
    
    protected static $file = '/';
    
    public function getModifiedDate($path){}
    
    public function getSize($path){}
    
    public function getName($path){}
    
    public function getExtension(){}
    
    public function read( $file ){
        //@TODO Rewrite; 
        return file_get_contents( $file );
    }
    
    public function getFileStream( $path ){}
    
    public function getMimeType(){}

    public function create($path){}
    
    public function move($path, $toPath, $replace=TRUE){}
    
    public function delete($path, $backup=FALSE){}
    
    public function hasBackup($path){}
    
    /**
     * validates file of type, or just isFile;
     *
     * @param type $type 
     * @return boolean
     * 
     */
    public function isFile( $type=''){}
    
    public function restoreBackup($path){}
    
    public function getPermission($path){}
    
    public function setPermission($path, $permission){
        return $this;
    }
      
    public function setFile( $path ){
        return $this;
    }
    
    public function pack($path, $type='tar.gz'){}
    
    public function unpack($path, $type='tar.gz'){}
    
    /**
     * Returns an instance of the Files class
     * 
     * @staticvar array $instance
     * @param type $type
     * @param type $file
     * @return type 
     */
    public static function getInstance( $type='', $file = NULL){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance[$type]))
            return $instance[$type];

        $class = "\Library\Folder\Files\\".ucfirst($type);
        $instance[$type] = $class::getInstance();

        return $instance[$type];
    }
    
}
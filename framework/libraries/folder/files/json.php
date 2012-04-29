<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * json.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files/json
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/folder/files/json
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Json extends \Library\Folder\Files {
    
    
    public function toObject( $data = null){}
    
    public function toArray( $data = null){}
    
    public function fromArray( $data = null ){
        //return $this->encode();
    }
    
    public function fromObject( $data = null ){
        
        //
        
    }
    
    public function encode( $data = null ){
        //check if the string passed is a filepath
        //pull the filestream;
        $data = $this->preTreat( $data );
        
        
        return json_encode( $data );
    }
    
    
    public function decode( $data = null){
        //check if the string passed is a file path
        //pull the filestream
    }

    protected function preTreat( $data ){
        
        //will check data is valid object or array
        //Will convert all htmlchars to entities
        //Will escape all unknowns;
        
        //Work Recursively!
        return $data;
    }
    
    
    
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }

}
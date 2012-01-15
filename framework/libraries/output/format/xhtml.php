<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * xhtml.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/output/format/xhtml
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library\Output\Format;

use Library;
use Library\Output;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/output/format/xhtml
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class xHtml extends \Library\Output\Document {


    final public static function hr(){
       //Outputs a horizontal rule 
    }
    
    final public static function a(){
        //Outputs an anchor
    }
    
    final public static function p(){
        //Outputs a paragraph
    }
    
    final public static function tag(){
        //call method
    }
    
    final public static function module( $modulename ){
        //Loads an instance of a module e.g form module
    }
    
    final public static function image(){
        //Loads the image module,
        //Outputs an image
        //Add Resizing capability to the image
    }
    
    
    final public function render($httpCode=null){
        
        
        //The response code, default is 200;
        if(isset($httpCode)&&!is_null($httpCode)){
            $this->setResponseCode( (int) $httpCode );
        }
        
        $this->headers();
             

        //3.Determine which format of the index we are using
        $index = FSPATH . 'public' . DS . $this->output->template . DS . 'index'. EXT;

        //4. Include the main index file
        include_once $index;

        //print_R(self::$positions);
        //parse the set layout as the final output;
        //5. Close and Flush buffer
        $display = ob_get_contents();
        
        //echo "somethingwong";
        
        
        ob_flush();
        ob_end_flush();
        
        return $this;
    }


    /**
     * Gets an instance of the registry element
     * 
     * @staticvar self $instance
     * @param type $name
     * @return self 
     */
    final public static function getInstance() {

                static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }

}
<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * framework.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/framework
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Platform;

use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/framework
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Framework extends Library\Object {

    /**
     *
     * @var array 
     */
    static $object = array();
    
    /*
     * The class constructor
     * @return void
     */
    public function __construct(){}

    /**
     * Gets an instance of the Framework Class
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance() {
        //Check if the platform is installed
        $vConfig = APPPATH . DS . 'system' . DS . 'config.php' ;
        $dConfig = ''; //also check for the presence of directive file
        
        if (!file_exists($vConfig)) {
            //
            $allowed    = array("installation", "install");
            $Uri        = Library\Uri::getInstance();
            $path       = $Uri->getPath();
            $segments   = explode("/", $path);
            
            //echo $segments[1];
            
            if(!in_array($segments[1], $allowed)){
               //header('Location: /install/step1');  
               //exit();
            }
        }   
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * model.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/model
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/model
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
abstract class Model extends \Library\Object {

    /**
     * Data access objects
     * 
     * @var type 
     */
    protected $dao;
    
    
    /**
     * Class constructor,
     * Instantiates helper classes
     * 
     * return void
     */
    public function __construct() {

        $classes = array(
            'config' => 'Library\Config',
            'input' => 'Library\Input',
            'load' => 'Platform\Loader',
            'user'  => 'Platform\User',
            'validate' => 'Library\Validate',
            'output' => 'Library\Output',
            'database'=> 'Library\Database'
        );

        foreach ($classes as $var => $class) {
            $this->$var = $class::getInstance();
        }
    }
    
    /**
     * Sets the model table
     * 
     * @param type $table 
     */
    final public function setTable( $table ){
        
    }
    
    /**
     * Gets table representation
     */
    final public function getTable(){}

    /**
     * Sets an output
     * 
     * @param type $name
     * @param type $value 
     */
    final public function set($name, $value) {

        //Determine all other auto set vars; 
        $this->output->set($name, $value);
    }

    final public function get($name, $default='', $format='') {
        //Determine all other auto set vars;
        return $this->output->get($name, $default = '', $format = '');
    }

    /**
     * The default method for each controller
     * 
     * @return void
     */
    abstract public function display();

    /**
     * Instantiate the child controller
     * 
     * @return object
     */
    abstract public static function getInstance();

    /**
     * Displays the output for the request;
     * 
     * @return  
     */
    final public function __destruct() {
        
    }

}


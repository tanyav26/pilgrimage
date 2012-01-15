<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * view.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/view
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/view
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
abstract class View extends \Library\Object {

    var $output;

    /**
     * Just the constructor
     * 
     * @return void
     */
    public function __construct() {

        $this->output = \Library\Output::getInstance();
        
        $authenticated  = \Platform\User::getAuthenticated();
        $this->output->set("authenticated", $authenticated );
        
        //Static Elements
        self::menu();
        
    }

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

    /**
     * Gets a stored output variable
     *
     * @param string $name 
     * @param string $default 
     * @param string $format 
     * @return mixed
     */
    final public function get($name, $default='', $format='') {
        //Determine all other auto set vars;
        return $this->output->get($name, $default = '', $format = '');
    }


    final public static function menu() {
        
        static $loaded = false;
        
        
        if($loaded) return;
        
        $output         = Library\Output::getInstance();

        $pageid = $output->get("pageid");

        //@TODO Also only display if this is a raw html output
        Navigator::menu();

        $menu = $output->layout("menu", "system");
        
        $output->set('menu', $menu);

        $navigator = $output->layout("navigator", "system");
        
        $output->addToPosition("toolbar", $navigator);
        
        $loaded = true;

    }

    /**
     * The default method for each controller
     * 
     * @return void
     */
    abstract public function display();
}


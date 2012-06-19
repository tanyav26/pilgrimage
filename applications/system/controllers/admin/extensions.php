<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * extensions.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\System\Controllers\Admin;

use Platform;
use Library;
use Application\System\Views as View;
use Application\System\Controllers as System;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
class Extensions extends System\Admin {

    /**
     * The Extension Update worflow
     * 
     * @return void
     */
    public function update() {

        $view = $this->load->view('extensions');
        $this->set("user2", "livingstone");

        $view->updateExtensions(); //sample call;        
        //$this->output();
    }
    

    public function add() {

        $view = $this->load->view('extensions');
        $this->set("user2", "livingstone");

        $view->installExtensions(); //sample call;        
        //$this->output();
    }

    public function installed() {

        $view = $this->load->view('extensions');
        $this->set("user2", "livingstone");

        $view->lists(); //sample call;        
        //$this->output();
    }

    public function repositories() {

        $view = $this->load->view('extensions');
        $this->set("user2", "livingstone");

        $view->repositories(); //sample call;        
        //$this->output(); 
    }
    
    /**
     * Returns and instance of the extension class
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

}


<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * manage.php
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
class Manage extends System\Admin {

    public function info() {
        $view = $this->load->view('manager');


        $view->information(); //sample call;        
        //$this->output();
    }

    public function categories() {
        $view = $this->load->view('manager');

        //die;
        //$view->information(); //sample call;        
        //$this->output();
    }

    public function groups() {
        $view = $this->load->view('manager');

        //die;
        //$view->information(); //sample call;        
        //$this->output();
    }


    public function fields() {
        $view = $this->load->view('manager');


        $view->fields(); //sample call;        
        //$this->output();
    }

    public function activity() {
        $view = $this->load->view('manager');


        $view->queue(); //sample call;        
        //$this->output();
    }

    public function emails() {
        
        $view = $this->load->view('manager');


        $view->emails(); //sample call;        
        //$this->output();
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


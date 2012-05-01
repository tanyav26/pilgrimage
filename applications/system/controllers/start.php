<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * start.php
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

namespace Application\System\Controllers;

use Platform;
use Library;
use Application\System\Views as View;

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
 */
class Start extends Platform\Controller {

    /**
     * The system dashboard, 
     * @ return false;
     */
    public function dashboard() {

        //Get the view;
        $view = $this->load->view('index');
        
        $user = \Platform\User::getInstance();

        \Library\Authorize::getAuthroityTree();

        $this->set("user", $user);
        $view->dashboard(); //sample call;        
        //$this->output();
    }
    
    public function explore(){
        //To set the pate title use
        
        $this->output->setLayout("explorer");
        $this->output->setPageTitle("Explore");
        
        $form  = $this->output->layout("explorer");
       

        $this->output->addToPosition("body" , $form); 
    }

    /**
     * The default page, consider this the homepage
     * of the application, You can change this to anything else in the config/routes.php 
     * 
     * @return type 
     */
    public function index() {
        
        //Loads the index view
        $view = $this->load->view('index');
        
        //echo "the index page";
        
        $view->index();
    }

    /**
     * Gets an instance of the start controller
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


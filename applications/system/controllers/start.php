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
    
     public function featured(){
        //To set the pate title use
        $this->output->setPageTitle("Featured");
        
        $form  = "Featured Content";
       

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
     * Returns and instantiated Instance of the __CLASS__ class
     * 
     * NOTE: As of PHP5.3 it is vital that you include constructors in your class
     * especially if they are defined under a namespace. A method with the same
     * name as the class is no longer considered to be its constructor
     * 
     * @staticvar object $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance 
     * @return object i18n
     */
    public static function getInstance() {

        $class = __CLASS__;

        if (is_object(static::$instance) && is_a(static::$instance, $class))
            return static::$instance;

        static::$instance = new $class;

        return static::$instance;
    }
}


<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * install.php
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
namespace Application\Setup\Controllers;

use Platform;
use Library;
use Application\Install\Views as View;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Controller
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Install extends Platform\Controller {
    
    static $instance;
    
    public function index(){
        return $this->step1();
    }
    
    public function step1(){
       
        $view = $this->load->view('process') ;
    
        //this is step 1;
        $this->set("step", "1");
        $view->index() ; //sample call;
        
        //To set the page title use
        $this->output->setPageTitle("Installation | EULA");
        
        //@TODO, Reference other Licences at the bottom of this page
        
        return;
        
    }
    
    public function step2(){
        
        //Processes step 1
        $view   = $this->load->view('process') ;
        $model  = $this->load->model('requirements');
         
        $this->set("checker" , $model );
        $this->set("step", "2");
        
        //If we have not accepted the terms and conditions.
        //Redirect back and explain
        if(!$this->input->getBoolean("eula_accept")){
            $this->alert(_('You must read and accept the End User License Agreement (EULA) to proceed with installation'),'','error');
            $this->redirect("/install/step1");
        }
        
        //Get Requirements
        //$requirements = $this->config->getParam("requirements", array(), "install");
        require_once(APPPATH . 'setup'.DS. 'requirements.inc' );
        
        $this->set("requirements", $requirements);
       
        $view->index() ; //sample call;
        $this->output->setPageTitle("Installation | Requirements");
        
    }
    
    public function step3(){
        
        $view = $this->load->view('process') ;
        
        //this is step 1;
        $this->set("step", "3");
        
        //To set the pate title use
        $this->output->setPageTitle("Installation | Database Config Settings");
        $view->index() ; //sample call;
        
    }
    
    public function step4(){
        
        $view       = $this->load->view('process') ;
        $install    = $this->load->model('install') ;
        
        if (!$this->input->methodIs("post")) {
            $this->alert("No user data recieved",'Something went wrong','error' );
            $this->redirect("/install/step3");
        }

        //Check we have all the information we need!
        if(!$install->run()){
            $this->alert(_($install->getError()),'Something went wrong','error');
            $this->redirect("/install/step3");
        }
        $this->alert( "Awesome! Your database is all setup and ready. Now complete the details below to create a master user account. Please use a valid email address","","info");
        //sample call; this is step 1;
        $this->set("step", "4");
        
        $this->output->setPageTitle("Installation | Final Things");
        $view->index() ; 
        
    }
    
    public function step5(){
        
        $view       = $this->load->view('process') ;
        $install    = $this->load->model('install') ;
        
        if (!$this->input->methodIs("post")) {
            $this->alert("No user data recieved",'Something went wrong','error' );
            $this->redirect("/install/step3");
        }

        //Check we have all the information we need!
        if(!$install->superadmin()){
            $this->alert(_($install->getError()),'Something went wrong','error');
            $this->set("step", "4");
            $view->index() ; 
            return $this->output->setPageTitle("Installation | Final Things");
        }
        $this->alert( "Fantastico. All systems ready to go. Please make a note of the information below. If possible print this screen and keep it for your records","","success");
        
        //Return the install report as launch
        $this->output->setPageTitle("Installation Complete");
        
        return $view->readme();
    }
    

    public static function  getInstance() {
        
        static::$instance;
        //If the class was already instantiated, just return it
        if (isset(static::$instance) ) return static::$instance ;

        static::$instance =  new self;

        return static::$instance;   
    }
}


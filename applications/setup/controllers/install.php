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
        $requirements = $this->config->get("requirements", array(), "install");
        $this->set("requirements", $requirements);
       
        
        
        $view->index() ; //sample call;
        $this->output->setPageTitle("Installation | Requirements");
        
    }
    
    public function step3(){
        
        $view = $this->load->view('process') ;
        
        //this is step 1;
        $this->set("step", "3");
        
        
        $view->index() ; //sample call;
        
        //To set the pate title use
        $this->output->setPageTitle("Installation | Config Settings");
        
    }
    
    public function step4(){
        
        $view = $this->load->view('process') ;
        
        //this is step 1;
        $this->set("step", "4");
        
        
        $view->index() ; //sample call;
        
        //To set the pate title use
        $this->output->setPageTitle("Installation | Confirmation");
        
    }
    
    public function step5(){
        return $this->launch();
    }
    
    public function launch(){
        
        //proceses step 4
        //checks for updates
        
        echo "Lauches the application";
        
        //Sets a redirect;
        
    }
    
    public function update(){
        
        //Performs the update process
        
    }
    
    public function checkUpdates(){
        
        //Checks for available updates
        
    }
    

    public static function  getInstance() {
        
        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self;

        return $instance;   
    }
}


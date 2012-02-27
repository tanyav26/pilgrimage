<?php

namespace Application\System\Views;

use Platform;
use Library;

/**
 * Do Framework
 *
 * for PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the GPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt.  If you did not receive a copy of
 * the GPLv3 License and are unable to obtain it through the web, please
 * send a note to license@tuiyo.co.uk so we can mail you a copy immediately.
 *
 * @category   Do
 * @package    DoController
 * @author     Original Author <livingstonefultang@gmail.com>
 * @copyright  2011 Stonyhills LLC
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    SVN: $Id$
 *
 */
class Settings extends Platform\View {

    public function configurationForm() {
        
        $this->output->setPageTitle(_("System Settings"));
        
        
        $panel = $this->output->layout('Settings/configuration'); 


        return $this->display($panel);
        
    }
    
    public function privacyConfigForm() {
        
        //1. The page Title
        $this->output->setPageTitle(_("Permissions & Privacy Settings"));
        
        //2. Load Model
        $model = $this->load->model("privacy");
        
        //3. Get the authorities list
        $authorities = $model->getAuthorities();
        
        //4. Set Properties
        $this->set( "authorities" , $authorities );
        
        //5. The layout
        $panel = $this->output->layout('settings/permissions'); 


        //6. Display
        return $this->display($panel);
        
    }
    
    
    public function appearanceConfigForm() {
        
        $this->output->setPageTitle(_("Appearance Settings"));
        
        $panel = $this->output->layout('settings/appearance'); 


        return $this->display($panel);
        
    }
    
    
        public function moderationConfigForm() {
        
        $this->output->setPageTitle(_("Moderation Settings"));
        
        $panel = $this->output->layout('settings/moderation'); 


        return $this->display($panel);
        
    }
    
        public function inputConfigForm() {
        
        $this->output->setPageTitle(_("Input Settings"));
        
        $panel = $this->output->layout('settings/input'); 


        return $this->display($panel);
        
    }
    
   public function maintenanceConfigForm() {
        
        $this->output->setPageTitle(_("Input Settings"));
        
        $panel = $this->output->layout('settings/maintenance'); 


        return $this->display($panel);
        
    }
    
    
    public function display( $panel ="" ){
        
        return $this->output->addToPosition("body", $panel);
       
    }

    final static function getInstance() {

        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
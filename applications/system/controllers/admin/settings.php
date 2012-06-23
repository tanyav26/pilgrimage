<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * settings.php
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
class Settings extends System\Admin {
    

    public function configuration() {

        $form = $this->load->view('settings');

        $form->configurationForm();
    }

    public function appearance() {

        $form = $this->load->view('settings');

        $form->appearanceConfigForm();
    }

    public function privacy($edit = "") {

        $form   = $this->load->view('settings');
        $params = $this->getRequestArgs();
        
        //1. Load the model
        $privacy = $this->load->model("privacy");
        
        //2. If we are editing the authority, save
        if ($this->input->methodIs("post")):
            if(!$privacy->store( $edit , $params)){
                $errors = $this->getErrorString();
                $this->alert($errors, null , "error");
            }  $this->alert(_("Changes have been saved successfully"), "", "success");        
            $this->redirect( $this->output->link("/system/admin/settings/privacy") );
        endif;
      
        $form->privacyConfigForm();
    }

    public function moderation() {

        $form = $this->load->view('settings');

        $form->moderationConfigForm();
    }
    
    public function save(){
        
        $referer    = $this->input->getReferer();
        $view       = $this->load->view('settings') ;
        $options    = $this->load->model('options') ;
        
        //Check that we have post data;
        if (!$this->input->methodIs("post")) {
            $this->alert("No configuration data recieved",'Something went wrong','error' );
            $this->redirect( $referer );
            return false;
        }
        //Get the data;
        if(($data = $this->input->getArray("options", array(), "post") ) == FALSE ){
            $this->alert("No input data recieved",'Something went wrong','error' );
            $this->redirect( $referer );
            return false; //useless
        }

        //Check we have all the information we need!
        if(!$options->save( $data )){
            $this->alert(_($options->getError()),'Something went wrong','error');
            $this->redirect( $referer );
            return false;
        }
       
        $this->alert( "Your configuration settings have now been saved","","success");
        $this->setredirect( $referer ); //Redirect back to the page sending in the data;
        
        return true;
    }

    public function input() {

        $form = $this->load->view('settings');

        $form->inputConfigForm();
    }

    public function maintenance() {

        $form = $this->load->view('settings');

        $form->maintenanceConfigForm();
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


<?php

namespace Application\Member\Views;

use Platform;
use Library;

class Index extends \Platform\View {
    
        
    final public function display(){
        //The default method
    }
    
      final public function notifications(){
        //The default method
    }  
    
    
    final public function settings(){
                
        $this->output->setPageTitle("Account Settings");
        
        
        $sidebar    = $this->output->layout("index_sidebar" , "system" );
        $body       = $this->output->layout('settings');
        
        $this->output->addToPosition("body",$body);
        $this->output->addToPosition("left",    $sidebar);
        
    }
    
    public function userLoginForm(){
        
        $this->output->setPageTitle("Login to account");
        
        //parse Layout Demo;
        $sidebar    = $this->output->layout( "index_sidebar", "system");
        $body       = $this->output->layout( "default_form_login" );

        
        //The default installation box;
        $this->output->setFormat("raw");
        $this->output->setLayout("signin");
        
        //$this->output->addToPosition("body",   $body);
        
    }
    
    public function newUserAccountForm(){
                //To set the pate title use
        $this->output->setPageTitle("Create a new Account");
        
        //parse Layout Demo;
        $sidebar    = $this->output->layout( "index_sidebar", "system");
        $body       = $this->output->layout( "default_form_create" );

        
        //The default installation box;
        $this->output->setFormat("raw");
        $this->output->setLayout("signup");
        
    }

    public static function getInstance() {
        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}


<?php

namespace Application\Member\Views;

use Platform;
use Library;

class Profile extends \Platform\View {
    
        
    final public function display(){
        //The default method
    }
    
    public function profilePage(){
         //To set the pate title use
                        //To set the pate title use
        $this->output->setPageTitle("Profile Page");
        
        
        $timelinebar= $this->output->layout("timelinebar");
        $profile       = $this->output->layout("profile" );
        $widgetbox  = $this->output->layout("timeline", "post");
       

        $this->output->addToPosition("body" , $profile);
        //The default installation box;
        
        ////$this->output->addToPosition("topsection", $timelinebar)
                     //->addToPosition("widgetbox", $widgetbox);

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


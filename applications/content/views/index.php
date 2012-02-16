<?php


namespace Application\Content\Views;

use Platform;
use Library;


class Index extends \Platform\View{
    
    
    final public function display(){
        //The default method
    }
    
    final public function listItems(){
        
        //To set the pate title use
        $this->output->setPageTitle("Streams | User Full Name");
        
        //To specify a layout, else default will be used
        //$this->setLayout("page");
        
        //To get a previously set property;
        //echo $this->get("user2");
        
        //to add some js file
        $this->output->addScript("some.js");
        
        //to add some js file
        $this->output->addStyle("some.css");
        
        //to output just the layout use
        //$this->output->raw();
        
        //to output just the xml use
        //$this->output->xml();
        
        //to output as json use
        //$this->output->json();
        
        //parse Layout Demo;
        $sidebar    = $this->output->layout( "index_sidebar" , "system");
        $input      = $this->output->layout( "input" , "system" );
        $dashboard  = "Right";//$this->output->layout( "index" );
        $stream     = $this->output->layout( "stream"  );

        
        //The default installation box;
        //$this->output->addToPosition("left",    $sidebar);
        //$this->output->addToPosition("right",   $dashboard);
        //$this->output->addToPosition("body",    $input);
        $this->output->addToPosition("body",  $stream);
        
    } 
    
    final static function getInstance(){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self();

        return $instance;
    }
}


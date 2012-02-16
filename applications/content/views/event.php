<?php

/**
 * Provides database query result caching. Uses the SQL query as ID
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the GPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt.  If you did not receive a copy of
 * the GPLv3 License and are unable to obtain it through the web, please
 * send a note to license@tuiyo.co.uk so we can mail you a copy immediately.
 *
 * 
 * 
 */

namespace Application\Content\Views;

use Platform;
use Library;


final class Event extends \Platform\View{
    
    public function __construct(){
        
        //Construct the parent
        parent::__construct();
        
        $this->output->setPageTitle("Events");
        
    }
    
    public function display(){}
    
    public function streams(){}
    
    
    /**
     * The new article create form
     * 
     */
    public function createform(){
        
        //Page Title
         $this->output->setPageTitle("Events | Create new Event");
                 
        //form
        $form  = $this->output->layout( "events/form" );
        
        //The default installation box;
        //$this->output->addToPosition("left",    $sidebar);
        
        $this->output->addToPosition("body",   $form);
        
        
        
        return true;
    }
    
    public static function getInstance(){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self();

        return $instance;
    }
}



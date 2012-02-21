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

namespace Application\Member\Views;

use Platform;
use Library;


final class Page extends \Platform\View{
   
    public function __construct(){
        
        //Construct the parent
        parent::__construct();
        
        $this->output->setPageTitle("Pages");
        
    }
    
    public function display(){}
    
    public static function getInstance(){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self();

        return $instance;
    }
}
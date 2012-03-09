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
class Index extends Platform\View {

    public function dashboard(){
        
        //you can add stuff you want displayed;
        $user = $this->get('user');
        
        return $this->display();
        
    }
    
    
    public function index(){
        
        $indexpage  = $this->output->layout("welcome");
        $indexpage2 = "Side panel";
        
        $this->output->addToPosition("body", $indexpage,  "index panel 1");
        $this->output->addToPosition("side", $indexpage2, "index panel 2");
    }
 
    public function display(){
        
        //To specify a layout, else default will be used
        //$this->setLayout("page");
        
        //To get a previously set property;
        //echo $this->get("user2");

        //To set the pate title use
        $this->output->setPageTitle("Welcome to diddat");
        
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
        //$sidebar    = $this->output->layout( "index_sidebar" );
        $dashboard  = $this->output->layout( "dashboard" );
        //$titlebar   = $this->output->layout( "titlebar"  );
        //
        //The default installation box;
        //$this->output->addToPosition("left",    $sidebar);
        //$this->output->addToPosition("topsection",   $titlebar);
        $this->output->addToPosition("body",    $dashboard);
        
    }
    
   
   final static function getInstance(){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self();

        return $instance;
    }
    
}
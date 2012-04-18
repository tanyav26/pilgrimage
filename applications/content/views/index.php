<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * index.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\Content\Views;

use Platform;
use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   View
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
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


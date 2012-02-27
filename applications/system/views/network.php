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
class Network extends Platform\View {
    

    public function addNetworkMember() {
        
        $this->output->setPageTitle(_("Administrator | Add Network Member"));
        
        
        $panel = $this->output->layout('network/add'); 


        return $this->display($panel);
        
    }
    
    public function listNetworkMembers() {
        
        $this->output->setPageTitle(_("Administrator | Network Members Lists"));
        
        
        $panel = $this->output->layout('network/lists'); 


        return $this->display($panel);
        
    }
 
    public function analytics(){
         
        $this->output->setPageTitle(_("Administrator | Network Analytics"));
        
        
        $panel = $this->output->layout('network/analytics'); 


        return $this->display($panel);
        
    }
      
    
    public function display( $panel = ""){
        
        return $this->output->addToPosition("body", $panel);  
        
    }
    
   
   final static function getInstance(){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self();

        return $instance;
    }
    
}
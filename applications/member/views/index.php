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
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\Member\Views;

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
class Index extends \Platform\View {
    
        
    final public function display(){
        //The default method
    }
    
    
    public function userLoginForm(){
        
        $this->output->setPageTitle("Login to account");
        
        //parse Layout Demo;
        $sidebar    = $this->output->layout( "index_sidebar", "system");
        $body       = $this->output->layout( "default_form_login" );

        
        //The default installation box;
        //$this->output->setFormat("raw");
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
        //$this->output->setFormat("raw");
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


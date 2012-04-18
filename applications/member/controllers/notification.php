<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * notification.php
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
namespace Application\Member\Controllers;

use Platform;
use Library;
use Application\Member\Views as View;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Controller
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Notification extends \Platform\Controller {

    //put your code here
    // domain.com/user/account/1934353
    // domain.com/user/account/johndoe
    // domain.com/account/1934353
    // domain.com/account/johndoe
    public function index() {
        
        $this->output->setPageTitle( _("Task and Notifications") );
        $view = $this->load->view("index");
        
        $body       = $this->output->layout('notifications');

        
        $this->output->addToPosition("body", $body);

    }

    //domain.com/user/account/create
    public function create() {
        
        $view = $this->load->view("index");
        $view->newUserAccountForm();
        
    }


    // alias to index
    public function view() {
        
        echo "viewing account";
        
    }
    
    //domain.com/user/account/edit/1934353/
    public function edit(){
        
    }
    
    public function settings(){
        
    }

    //domain.com/user/account/delete/1934353/
    public function delete() {
        
    }
    
    public function lists(){
        return $this->index();
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

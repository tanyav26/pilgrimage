<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * event.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Controller
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\Content\Controllers;

use Platform;
use Library;
use Application\Content\Views as View;

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
final class Event extends \Platform\Controller {

    //put your code here
    public function index() {
        return $this->read();
    }

    public function create() {
        
        $view = $this->load->view('event');
        return $view->createForm();
        
    }
    // domain.com/post/item/update/1902480-Born-in-the-USA/
    public function update() {
        
    }
    
    //domain.com/post/item/edit/1902480-Born-in-the-USA/
    public function edit(){
        
    }

    // domain.com/post/item/1902480-Born-in-the-USA/
    public function read() {
         $view = $this->load->view('event');
    }

    // domain.com/post/item/delete/1902480-Born-in-the-USA/
    public function delete() {
        
    }
    
    /**
     * Returns and instance of this class
     * 
     * @staticvar self $instance
     * @return \Application\Content\Controllers\self 
     */
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }

}

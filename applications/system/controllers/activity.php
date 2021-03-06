<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * activity.php
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

namespace Application\System\Controllers;

use Platform;
use Library;
use Application\System\Views as View;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Activity extends Platform\Controller {


    /**
     * The default page, consider this the homepage
     * of the application, You can change this to anything else in the config/routes.php 
     * 
     * @return type 
     */
    public function index() {
        
        $activity   = $this->output->layout("timeline");
        $tips       = $this->output->layout("recommendations");
        
        $this->output->addToPosition("side", $tips);
        $this->output->addToPosition("body", $activity);
    }
    
    /**
     * Creates a new activity feed $post
     * 
     * @return array $post 
     */
    public function create(){
        
        //Is the user authenticated?
        $this->requireAuthentication();
        
        $postid = null;
        //Is the input method submitted via POST;
        if ($this->input->methodIs("post")) {
            
            //@1 Check where the form is comming from
            //@2 Validate the user permission
            if(! $this->user->can("system/activity/create") ){
               
            }
            //@3 Privacy settings, If posting to wall can the user post to the wall
           
            //@4 Add the post;
            if(( $post = $this->load->model("activity")->add() ) == FALSE){              
                $this->alert( _("Could not add your post"), null, "error" );
            }else{         
                $this->alert( _("You activity post has been saved and publised"), null, "success"); 
            }
            //Return the user to a post page
            $postid = $post->post_id;
        }
       
        $this->redirect("/system/activity/read/$postid");
        
        return true;
    }
    
    /**
     * Alias for listing all activity posts;
     * @TODO If params, read individual items;
     * 
     * @return type 
     */
    public function read(){
        
        return $this->index();
    } 
    
    /**
     * Updates an existing activity posts;
     * 
     * @return void; 
     */
    public function update(){
        
        
    }
    
    
    /**
     * Deletes an activity posts;
     *  
     * @return void;
     */
    public function delete(){
        
        $this->alert( _("Could not delete your post."), _("There seems to be a problem with authenticating this session"), "error");
        
        return $this->read();
    }

    /**
     * Gets an instance of the start controller
     * 
     * @staticvar self $instance
     * @return self 
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


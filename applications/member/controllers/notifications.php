<?php

namespace Application\Member\Controllers;

use Platform;
use Library;
use Application\Member\Views as View;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author livingstonefultang
 */
final class Notifications extends \Platform\Controller {

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

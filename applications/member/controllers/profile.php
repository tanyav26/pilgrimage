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
final class Profile extends \Platform\Controller {

    //put your code here
    // domain.com/user/account/1934353
    // domain.com/user/account/johndoe
    // domain.com/account/1934353
    // domain.com/account/johndoe
    public function index() {
        return $this->view();
    }

    //domain.com/user/account/create
    public function create() {
        
    }
    
    //domain.com/user/account/update/1934353
    public function update() {
        
    }

    // alias to index
    public function view() {
        /**View Profile**/
        
        $username = $this->router->getMethod();
        $view     = $this->load->view('profile');
        
        
        //echo "view profile";
        
        $view->profilePage();
    }
    
    
    final public function __call($name, $arguments) {
        
        //check if this is a valid userid or usernameid
            //If it is a valid user, show the view page,
            return $this->view( );
            //If its is NOT a valid user, return the 404 not found page
        
    }
    
    //domain.com/user/account/edit/1934353/
    public function edit(){
        
    }

    //domain.com/user/account/delete/1934353/
    public function delete() {
        
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

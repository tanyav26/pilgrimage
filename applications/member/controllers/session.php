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
final class Session extends \Platform\Controller {

    //put your code here
    // domain.com/user/account/1934353
    // domain.com/user/account/johndoe
    // domain.com/account/1934353
    // domain.com/account/johndoe
    public function index() {
        return $this->view();
    }
    
    public function stop(){
        $this->logout();
    }

    //domain.com/user/account/create
    public function start() {
        return $this->login();
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

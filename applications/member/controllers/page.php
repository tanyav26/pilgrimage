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
final class Page extends \Platform\Controller {

    //put your code here
    public function index() {
        return $this->read();
    }

    // domain.com/page/item/create/
    public function create() {
        
        $view = $this->load->view("page");
        
        
        $view->form();
        
    }
    // domain.com/page/item/update/1902480-Born-in-the-USA/
    public function update() {
        
    }
    
    //domain.com/page/item/edit/1902480-Born-in-the-USA/
    public function edit(){
        
    }

    // domain.com/page/item/1902480-Born-in-the-USA/
    public function read() {
        $view = $this->load->view('page');
    }

    // domain.com/page/item/delete/1902480-Born-in-the-USA/
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

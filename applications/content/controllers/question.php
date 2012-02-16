<?php

namespace Application\Content\Controllers;

use Platform;
use Library;
use Application\Content\Views as View;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author livingstonefultang
 */
final class Question extends \Platform\Controller {

    //put your code here
    public function index() {
        return $this->read();
    }

    // domain.com/post/item/create/
    public function create() {
        
        $view = $this->load->view('question');
        
        $view->createform();
        
        return true;
    }
    // domain.com/post/item/update/1902480-Born-in-the-USA/
    public function update() {
        
    }
    
    //domain.com/post/item/edit/1902480-Born-in-the-USA/
    public function edit(){
        
    }

    // domain.com/post/item/1902480-Born-in-the-USA/
    public function read() {
        $view = $this->load->view('question');
    }

    // domain.com/post/item/delete/1902480-Born-in-the-USA/
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

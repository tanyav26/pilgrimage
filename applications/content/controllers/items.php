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
final class Items extends \Platform\Controller {

    //put your code here
    public function index() {
        ///return $this->read();
    }

    // domain.com/post/item/create/
    public function lists() {
        
        return $this->read();
    }

    
    // domain.com/post/items/index/
    public function read() {
        
        $view = $this->load->view('index') ;
        

        
        $view->listItems() ; //sample call;
        
    }

    // domain.com/post/item/delete/1902480-Born-in-the-USA/
    public function favourites() {
        
        $view = $this->load->view('index') ;
        

        
        $view->listItems() ; //sample call;
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

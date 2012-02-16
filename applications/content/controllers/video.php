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
final class Video extends \Platform\Controller {

    //put your code here
    public function index() {
        $view = $this->load->view('video');
    }

    public function create() {
        
        $view = $this->load->view('video');
        
                
        $view->createform();
        
        
        return true;
    }

    public function update( $videoid = null) {
        
        //There many ways to get the arguents passed here
        $args1 = func_get_args();
        $args  = $this->getRequestArgs();
        
        //print_R($args); print_r($args1); echo $videoid;
        
    }

    public function read() {
        
        echo $this->router->getView()."<br />";
        echo $this->router->getFormat();
        
    }

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

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
final class Photo extends \Platform\Controller {

    //put your code here
    public function index() {
        return false;
    }

    // domain.com/photo/item/create/
    public function create() {
      
        $view       = $this->load->view('photo');
        
        $view->createform();
        
        
        return true;
        
    }
    
    // domain.com/photo/item/update/1902480-Born-in-the-USA/
    public function update() {
        
    }
    
    //domain.com/photo/item/edit/1902480-Born-in-the-USA/
    public function edit(){
        
    }

    // domain.com/photo/item/view/1902480-Born-in-the-USA/
    public function gallery() {
        
        $view       = $this->load->view('index');
        $this->output->setPageTitle( _("Photo - Born in the USA") );

        $body       = $this->output->layout('photo');
        //$right      = _("Notifications filter");
        
        $this->output->addToPosition("body", $body);
        //$this->output->addToPosition("right", $right );
    }

    // domain.com/photo/item/delete/1902480-Born-in-the-USA/
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

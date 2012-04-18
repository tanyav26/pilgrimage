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
final class Groups extends \Platform\Controller {

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
        
        $view = $this->load->view("index");
        
        
        $view->newUserAccountForm();
        
    }
    
    public function lists(){
        
        $view = $this->load->view("index");
        //$navigator  = $this->output->layout( "navigator" , "system" );
        
        
        $this->output->setPageTitle("Groups");
        //$this->output->addToPosition("topsection",  $navigator );
    }
    
    //domain.com/user/account/update/1934353
    public function update() {
        
        //1. Load the model
        $account = $this->load->model("account");
        $encrypt = \Library\Encrypt::getInstance();
        

        //2. Prevalidate passwords and other stuff;
        $username   = $this->input->getString("user_name",  "", FALSE, array(), "post");
        $usernameid = $this->input->getString("user_name_id", "", FALSE, array(), "post");
        $userpass   = $this->input->getString("user_password", "", FALSE, array(), "post");
        $userpass2  = $this->input->getString("user_password_2", "", FALSE, array(), "post");
        //3. Encrypt validated password if new users!
        //4. If not new user, check user has update permission on this user
        //5. MailOut
        
        if(empty($userpass)||empty($username)||empty($usernameid)){
            //Display a message telling them what can't be empty
           // return $this->create();
        }
        
        
        //6. Store the user
        $account->store( $this->input->data("post") );
        
        //7. Browser Messages
        
        //Return to index
        return $this->view();
        
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

    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }

}

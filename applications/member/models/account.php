<?php

namespace Application\Member\Models;

use Platform;
use Library;


class Account extends Platform\Model {
    //put your code here
    
    public function display(){}
    
    public function store( $data ){
        
        $encrypt    = \Library\Encrypt::getInstance();
        $table      = $this->load->table("?users");
        
        //echo $data['user_password'];
        
        $data['user_password'] = $encrypt->hash( $data['user_password'] );
       
        if(!$table->bindData( $data )){  
            //print_R($table->getErrors());
            throw new \Platform\Exception( $table->getError() );
            return false;
        }
        
        
        
        if(!$table->save()){
            echo $this->getError();
        }
    }
    
    public function load(){}
    
    public function delete(){}
    
    public function validate(){}
    
    public function getToken(){}
    
    public static function getInstance(){
        
        static $instance;
        
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance =  new self;

        return $instance;
    }
    
}



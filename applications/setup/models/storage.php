<?php

namespace Application\Install\Models;

use Platform;
use Library;

class Storage extends Platform\Model {

    //put your code here

    public function display() {}
    
    public function testConnection(){}
    
    public function testDatabase(){}
    
    public function testDatabaseVersion(){}
    
    public function commit(){
        //Stores all user information in the database;
    }
    
    public function generateKey(){}


    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;
        return $instance;
    }

}


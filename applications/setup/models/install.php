<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * storage.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\Setup\Models;

use Platform;
use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Model
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Install extends Platform\Model {

    static $instance;

    public function display(){ return false; }
    
    public function superadmin(){
        
        $config     = \Library\Config::getInstance();
        //$database   = \Library\Database::getInstance();
        
        //@TODO create master user account
        //1. Load the model
        $account = $this->load->model("account", "member");
        $encrypt = \Library\Encrypt::getInstance();
        

        //2. Prevalidate passwords and other stuff;
        $username   = $this->input->getString("user_name",  "","post", FALSE, array()); $this->set("adminFullName", $username );
        $usernameid = $this->input->getString("user_name_id", "","post",FALSE, array()); $this->set("adminUserName", $usernameid );
        $userpass   = $this->input->getString("user_password", "", "post", FALSE, array()); 
        $userpass2  = $this->input->getString("user_password_2", "", "post", FALSE, array());
        $useremail  = $this->input->getString("user_email", "", "post", FALSE, array()); $this->set("adminEmail", $useremail );
        //3. Encrypt validated password if new users!
        //4. If not new user, check user has update permission on this user
        //5. MailOut
        
        if(empty($userpass)||empty($username)||empty($usernameid)||empty($useremail)){
            //Display a message telling them what can't be empty
            $this->setError( _('Please provide at least a Name, Username, E-mail and Password') );
            return false;
        }
        
        //Validate the passwords
        if($userpass <> $userpass2){
            $this->setError( _('The user passwords do not match') );
            return false;
        }
        
        //6. Store the user
        if(!$account->store( $this->input->data("post"))){
            //Display a message telling them what can't be empty
            $this->setError( _('Could not store the admin user account')  );
            return false;
        }
        //@TODO Empty the setup/sessions folder
        \Library\Folder::deleteContents( APPPATH."setup".DS."sessions" ); //No need to through an error
        
        //Completes installation
        $config::setParam("installed", TRUE , "database");
        
        //Now save the config file;
        $configini = $config::$ini;
        $setupconf = array("database","session","encrypt");
        if($configini::saveParams( "setup.ini", $setupconf)==FALSE){
            $this->setError( $config->getError() );
            return false;
        } 
        return true;
    }
    
    
    public function run(){
             
        $config     = \Library\Config::getInstance();

        //Stores all user information in the database;
        $dbName = $this->input->getString("dbname");
        $dbPass = $this->input->getString("dbpassword");
        $dbHost = $this->input->getString("dbhost");
        $dbPref = $this->input->getString("dbtableprefix");         
        $dbUser = $this->input->getString("dbusername");
        $dbDriver = $this->input->getString("dbdriver","MySQLi");
        
        if(empty($dbName)){
            $this->setError("Database Name is required to proceed.");
            return false;
        }
        if(empty($dbDriver)){
            $this->setError("Database Driver Type is required to proceed.");
            return false;
        }
        if(empty($dbUser)){
            $this->setError("Database username is required to proceed");
            return false;
        }
        if(empty($dbHost)){
            $this->setError("Please provide a link to your database host. If using SQLite, provide a path to the SQLite database as host");
            return false;
        }
        $config::setParam("host", $dbHost , "database");
        $config::setParam("prefix", $dbPref , "database");
        $config::setParam("user", $dbUser , "database");
        $config::setParam("password", $dbPass , "database");
        $config::setParam("name", $dbName , "database");
        $config::setParam("driver", $dbDriver , "database");
        
        
        if(($database = \Library\Database::getInstance( $config::getParamSection("database") , true)) !== FALSE && is_object($database)){ 
            $database->close();
            if(!$database->connect($dbHost, $dbUser, $dbPass, $dbName , $dbPref, TRUE)){
                 $database->close();
                 $database = \Library\Database::getInstance(array(), TRUE); //
                 //print_R($database);
                 $this->setError( "Could not connect to the database" );
                 return false;
             }
             //We have probles with out database
        }else{
            $this->setError("Could not connect to the database");
            return false;
        }
        //@TODO run the install.sql script on the connected database
         $schema = $this->load->model("schema","setup");
         //print_r($schema::$database);
        if(!$schema::createTables()){
            $this->setError( $schema::getError() );
            return false;
        }
        
        //set session handler to database if database is connectable
        $config::setParam("store", "database" , "session");

        //generate encryption key
        $encryptor  = Library\Encrypt::getInstance();
        $encryptKey = $encryptor->generateKey(time());
        $config::setParam("key", $encryptKey, "encrypt");
        //Now save the config file;
        $configini = $config::$ini;
        $setupconf = array("database","session","encrypt");
        if($configini::saveParams( "setup.ini", $setupconf)==FALSE){
            $this->setError( $config->getError() );
            return false;
        } 
        return true;
    }
    

    public static function getInstance() {

        //If the class was already instantiated, just return it
        if (isset(static::$instance))
            return static::$instance;

        static::$instance = new self;
        
        return static::$instance;
    }

}


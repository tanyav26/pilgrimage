<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * user.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/user
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Platform;

use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/user
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class User extends Library\Object {

    protected $authenticated;
    
    protected $authority;

    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

    /**
     * Returns the user object with the current use loaded
     * 
     * @param type $id 
     */
    public static function _($userid = NULL) {}
    
    
    /**
     * Method to determine if the user is authenticated;
     * 
     * @return type 
     */
    public function isAuthenticated(){
        
        return (bool)$this->authenticated;
        
    }
    
    /**
     * Determins if a user is authenticated
     * 
     * @return type 
     */
    public static function getAuthenticated(){
        
        $authenticated = Library\Session::isAuthenticated();
        
        if($authenticated){
           return Library\Session::getInstance()->get("handler", "auth");
        }
        
        else return false;
    }

    public function __construct($userid = null) {
        //@TODO Rework the userid, use case, if user id is not provided or is null
        //Get the authenticated user
        //Also load some user data from the user database table, some basic info
        $this->authenticated = false;

        //Authenticate
        $authenticate = Library\Session::getInstance()->get("handler", "auth");

        if (is_a($authenticate, "Library\Authenticate")) {
            if ($authenticate->authenticated) {
                $this->authenticated = true;
                if (empty($userid) || $userid === (int) $authenticate->get("userid")) {
                    $data = $authenticate->get(array("userid", "email", "fullname", "username", "language", "timezone"));
                    foreach ($data as $property => $value) {
                        $this->$property = $value;
                    }
                }
                $this->userid   = $authenticate->get("userid");
                $this->email    = $authenticate->get("email"); 
                $this->isauthenticated = $this->authenticated;
            }
            //get authority;
            $this->authority = Library\Session::getInstance()->getAuthority();    
        }
        
    }
    
    //Checks a user permission
    public function can(){
        
        //Example permisison definition
        //$this->authority->can("access", "user/section");
        
    }

    public function __destruct() {}

}
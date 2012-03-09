<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * dbauth.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/authenticate/dbauth
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library\Authenticate;

use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/authenticate/dbauth
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class DbAuth extends \Library\Authenticate {

    /**
     * Attest that the username and password are valid
     * 
     * @param array $credentials
     * @return boolean true or false; 
     */
    public function attest($credentials) {

        //Pre-requisites;
        $database = Library\Database::getInstance();
        $encrypt = Library\Encrypt::getInstance();
        $validate = Library\Validate::getInstance();

        //If not credentials
        if (empty($credentials) || !array_key_exists("usernameid", $credentials) || !array_key_exists("usernamepass", $credentials)) {
            $this->setError(_('Must specify a valid usernameid and password'));
            return false;
        }

        //We don't want empty passwords or usernames;
        if (empty($credentials['usernamepass']) || empty($credentials['usernamepass'])) {
            $this->setError(_('Must specify a valid usernameid and password'));
            return false;
        }

        //If usernameid an email 
        $usernameid = $database->quote($credentials['usernameid']);

        //$database->table('?users');

        if ($validate->email($credentials['usernameid'])) {
            //treat as user_email, 
            $statement = $database->select()->from('?users')->where("user_email", $usernameid)->prepare();
        } else {
            //use as user_name_id
            $statement = $database->select()->from('?users')->where("user_name_id", $usernameid)->prepare();
        }

        $result = $statement->execute();

        //If we did not find any user with this id or password;
        if ((int) $result->getAffectedRows() < 1) {
            return false;
        }

        //Get the user object;
        $userobject = $result->fetchObject();
        $passparts = explode(":", $userobject->user_password);
  
        $passhash = $encrypt->hash( $credentials['usernamepass'], $passparts[1]);

        //Are the passhashes similar?
        if ($passhash !== $userobject->user_password) {
            $this->setError(_('Could not authenticate the user with the credentials supplied'));
            return false;
        }

        //Gets an instance of the session object
        $session = Library\Session::getInstance();
        $authenticate = Library\Authenticate::getInstance();

        //Destroy this session
        //$session->gc($session->getId());

        $authenticate->authenticated = true;
        $authenticate->type = 'dbauth';
        $authenticate->userid = $userobject->user_id;
        $authenticate->username = $userobject->user_name_id;
        $authenticate->email = $userobject->user_email;
        $authenticate->fullname = $userobject->user_name;

        //Update
        $session->set("handler", $authenticate, "auth");
        $session->lock("auth");
        $session->update($session->getId());

        return true;
    }

    /**
     * Returns an instance of the authenticate DBAuth class
     * 
     * @staticvar self $instance
     * @param type $id
     * @return self 
     */
    public static function getInstance($id=null) {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
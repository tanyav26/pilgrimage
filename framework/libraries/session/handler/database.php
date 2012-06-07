<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * database.php
 *
 * Requires PHP version 5.4
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/i18n
 * @since      Class available since Release 1.0.0 June 6, 2012 9:09:41 AM
 * 
 */

namespace Library\Session\Handler;

use \Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Libraries
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/i18n
 * @since      Class available since Release 1.0.0 Jan 15, 2012 3:09:41 AM
 */
final class Database extends \Library\Object {

    /**
     * Read the session from the database
     * 
     * @param type $splash
     * @param type $session
     * @param type $sessionId
     * @return boolean
     */
    public static function read($splash, $session, $sessionId) {

        $database = \Library\Database::getInstance();
        //$token = (string) $input->getCookie($sessId);
        $statement =
                        $database->where("session_agent", $database->quote($splash['agent']))
                        ->where("session_ip", $database->quote($splash['ip']))
                        ->where("session_host", $database->quote($splash['domain']))
                        ->where("session_key", $database->quote($sessionId))
                        ->select("*")->from($session->table)->prepare();

        $result = $statement->execute();

        //Do we have a session that fits this criteria in the db? if not destroy
        if ((int) $result->rowCount() < 1) {

            $session::destroy($sessionId);
            return false; //will lead to re-creation
        }

        $object = $result->fetchObject();

        return $object;
    }

    /**
     * 
     * @param type $userdata
     * @param type $session
     * @param type $sessionId
     */
    public static function update($update, $session, $sessionId) {

        $database = \Library\Database::getInstance();
        if(isset($update["session_registry"])){
            $update["session_registry"] = $database->quote($update["session_registry"]);
        }

        //now update the session;
        $database->update($session->table, $update, array("session_key" => $database->quote($sessionId)));

        return true;
    }

    /**
     * 
     * @param type $where
     * @param type $session
     * @return boolean
     */
    public static function delete($where, $session) {
        
        $database = \Library\Database::getInstance();
        if(isset($where["session_key"])){
            $where["session_key"] = $database->quote($where["session_key"]);
        }
        $database->delete($session->table, $where);
        
        return true;
    }

    /**
     * 
     * @param type $userdata
     * @param type $splash
     * @param type $session
     * @param type $sessionId
     * @param type $expiry
     */
    public static function write($userdata, $splash, $session, $sessionId, $expiry) {
        
        $database = \Library\Database::getInstance();
                
        $database->insert($session->table, array(
            "session_key" => $database->quote($sessionId),
            "session_ip" => $database->quote($splash['ip']),
            "session_host" => $database->quote($splash['domain']),
            "session_agent" => $database->quote($splash['agent']),
            "session_token" => $database->quote($splash['token']),
            "session_expires" => $expiry,
            "session_lastactive" => time(),
            "session_registry" => $database->quote($userdata)
        ));
    }

}


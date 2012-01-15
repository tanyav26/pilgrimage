<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * authorize.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/authorize
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/authorize
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Authorize extends \Library\Object {

    /**
     * The user ID, whose authority and permission is being evaluated
     * @var string $userid
     */
    public $userid;

    /**
     * The currently authenticated users authority
     * @var string contstant
     */
    public $impliedAuthority = AUTHROITY_IMPLIED_ANONYMOUS;

    /**
     * The directly awarded authority permission of current user
     * @var array
     */
    public $permissions = array();

    /**
     * The implied authorities/permissions
     * @var areas
     */
    public $areas = array();

    /**
     * Sets the current user's authority
     * 
     * @param type $implied 
     * @property-write string $impliedAuthority
     * @return void
     */
    final public function setAuthority($implied) {

        $this->impliedAuthority = $implied;
    }

    /**
     * Determines the current user (in session) 's authority or that of a specified user id
     * 
     * @param string $userid
     * @property-read string $impliedAuthority
     * @return string The implied Authority of the user 
     */
    final public function getAuthority($userid) {
        
    }

    /**
     * Returns the authority tree
     * 
     * @uses Library\Datbase To get the user authority tree
     * @return Array;
     */
    final public static function getAuthroityTree() {

        $database = Database::getInstance();

        $statement = $database->select()->from('?authority')->between("lft", '1', '6')->prepare();
        $results = $statement->execute();

        $right = array();
    }

    /**
     * Gets the permissions givent to the authenticated users
     *
     * @param object $authenticated
     * @uses \Library\Authorize\Permission to determin execute permissions
     * @return object Permission 
     */
    final public function getPermissions($authenticated) {

        //$authority      = $this;
        $this->userid = (int) $authenticated->get("userid");

        //Authenticated?
        if ($authenticated->authenticated && !empty($this->userid)) {
            //At least we know the user is authenticated
            $this->setAuthority(AUTHROITY_IMPLIED_AUTHENTICATED);
        }

        // print_R($this);
        // print_R($this->userid);
        // echo AUTHROITY_IMPLIED_ANONYMOUS;
        // Now try to get direct permissions
        //
        // Reads all the user permissions!
        // Note that a non defined permission implies a fail
        $execute = \Library\Authorize\Permission::execute($this, array());


        //print_R($this);


        return $execute;
    }

    /**
     * Sets the object permission
     * 
     * @param type $object
     * @param type $permission 
     */
    final public function setPermission($object, $permission = 777) {
        
    }

    /**
     *
     * Checks that the modifier (user/or even machine) defined (definition)
     * has the right authority (group) and that the authority (group) has the 
     * right permission (read/write/execute) defined (in definition) to the 
     * interact with the action 
     * 
     * DEFINITIONS
     *
     * Authority can "perform task"
     * 
     * @param string $permission
     * @param string $object URI reference 
     * @return void
     */
    final public function can($permission="access", $object) {
        
    }

    /**
     * Authorize constructor. Checks if authenticated and store authenticated 
     * 
     * @param type $definition 
     */
    final public function __construct() {

        //Check if authenticated and store authenticated;
    }

    /**
     * Get's an instance of the authority class
     * 
     * @staticvar self $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance 
     * @param type $definition
     * @return self 
     */
    final public static function getInstance($definition = null) {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        //@TODO. Look into the possibility of implied authorities
        $instance = new self();

        return $instance;
    }

}
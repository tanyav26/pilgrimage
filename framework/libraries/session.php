<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * session.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/session
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library;

use Library\Session;
use Platform;

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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/session
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Session extends Object {

    /**
     *
     * @var type 
     */
    protected $id;

    /**
     *
     * @var array 
     */
    protected $registry = array();

    /**
     * Constructs the session Object
     * 
     * @param type $namespace 
     */
    public function __construct($id = '') {

        //Need to destroy any existing sessions started with session.auto_start
        if (session_id()) {
            session_unset();
            session_destroy();
        }

        $config = Config::getParamSection("session");

        //Config Vars  
        foreach ($config as $var => $value) {
            $this->$var = $value;
        }

        $this->registry['default'] = \Library\Session\Registry::getInstance("default");

        ini_set('session.use_trans_sid', '0');
        //Libraries
    }

    /**
     * Writes session data and ends the session
     * 
     * @return void
     */
    public function close() {
        session_write_close();
    }

    /**
     * Starts a session
     * 
     * @param type $killPrevious 
     * @return void
     */
    final public static function start($killPrevious = FALSE) {

        //starts this session if not creates a new one      
        //$self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        //@TODO Check if there is an existing session!
        //If there is any previous and killprevious is false, 
        //simply do a garbage collection and return;
        //if we can't read the session
        if (( $session = static::read()) !== FALSE) {
            static::update($session);
        } else {
            static::create();
        }
        //Carbage collection
        static::gc();
    }

    /**
     * Gets session parameters and develop a 'splash'
     * 
     * @return type 
     */
    final public function getSplash() {

        $input = Input::getInstance();
        //$output = Output::getInstance();
        $uri = Uri::getInstance();

        $userIp = md5($input->serialize($input->getVar('REMOTE_ADDR', \IS\STRING, '', 'server')));
        $userAgent = md5($input->serialize($input->getVar('HTTP_USER_AGENT', \IS\STRING, '', 'server')));
        $userDomain = md5($input->serialize((string) $uri->getHost()));

        //throw in a token for specific id of browser,
        $token = (string) self::generateToken();

        $splash = array(
            "ip" => $userIp,
            "agent" => $userAgent,
            "domain" => $userDomain,
            "token" => $token
        );

        return $splash;
    }

    /**
     * Creates a new session.
     * 
     * Will only create a session if none is found
     * The 'default' and 'auth' namespaces are also added
     * The 'auth' namespace is locked and unwrittable, 
     * 
     * @return void
     */
    final public static function create() {

        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;

        $splash = $self->getSplash();
        $sessId = self::generateId($splash);

        session_id($sessId); //Must be called before the sesion start to generate the Id
        session_cache_limiter('none');

        session_name(md5($self->cookie . $splash['agent'] . $splash['ip'] . $splash['domain']));

        session_start();

        //Create the default namespace; affix to splash;
        //The default namespace will contain vars such as -request count, - last session start time, -last session response time, etc
        //The dfault namespace will also contain, instantiated objects?
        //
        $defaultReg = \Library\Session\Registry::getInstance("default");
        $self->registry['default'] = $defaultReg;

        //update the cookie with the expiry time
        //Create the authenticated namespace and lock it!
        $authenticate = Authenticate::getInstance($splash);

        $self->set("handler", $authenticate, "auth");

        self::write($sessId, $splash);
    }

    /**
     * Reads the authenticated user's right,
     *
     * @return Authority
     */
    final public function getAuthority() {

        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        $auth = $self->get("handler", "auth");

        $authority = \Library\Authorize::getInstance();

        if (is_a($auth, "Library\Authenticate")) {
            if (isset($auth->authenticated)) {
                //Read Rights if we have a userId
                $self->authority = $authority->getPermissions($auth);
            }
        }

        return $self->authority;
    }

    /**
     * Determines whether a user has been
     * Authenticated to this browser;
     * 
     * @return boolean True or false depending on auth status
     */
    final public static function isAuthenticated() {

        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        $auth = $self->get("handler", "auth");

        if (is_a($auth, "Library\Authenticate")) {
            if (isset($auth->authenticated)) {
                return (bool) $auth->authenticated;
            }
        }

        return false;
    }

    /**
     * Generates a random token
     * 
     * @return type 
     */
    final public function generateToken() {
        $code = md5(uniqid(rand(), true));
        return substr($code, 0, 32);
    }

    /**
     * Gets a namespaced session registry
     * 
     * @param type $name
     * @return type 
     */
    final public static function getNamespace($name = 'default') {
        //Returns the Registry object corresponding to the
        //namespace $name from $this->registry
        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;

        return $self->registry[$name];
    }

    /**
     * Generates the session Id
     *
     * @param type $splash
     * @return type 
     */
    final public static function generateId($splash) {

        $encryptor = Encrypt::getInstance();
        $input = Input::getInstance();
        $sessId = md5($encryptor->getKey() . $input->serialize($splash));

        return $sessId;
    }

    /**
     * Reads session data from session stores
     *
     * @param string $id
     * @return Boolean False on failed and session ID on success 
     */
    final public static function read($id = Null) {

        $self = (!isset($this) || !is_a($this, "Library\Session")) ? static::getInstance() : $this;

        $input = Input::getInstance();
        $uri = Uri::getInstance();
        //$dbo = Database::getInstance();

        $splash = $self->getSplash();

        //Do we have a cookie?
        $sessCookie = md5($self->cookie . $splash['agent'] . $splash['ip'] . $splash['domain']);

        $sessId = $input->getCookie($sessCookie);

        if (empty($sessId) || !$sessId) {
            //we will have to create a new session
            return false;
        }

        $userIp = md5($input->serialize($input->getVar('REMOTE_ADDR', \IS\STRING, '', 'server')));
        $userAgent = md5($input->serialize($input->getVar('HTTP_USER_AGENT', \IS\STRING, '', 'server')));
        $userDomain = md5($input->serialize((string) $uri->getHost()));

        //Read the session
        $_handler = ucfirst($self->store);
        $handler = "\Library\Session\Handler\\" . $_handler;
        $object = $handler::read($splash, $self, $sessId);
        
        //If this is not an object then we have a problem
        if(!is_object($object)) return false;

        //Redecorate 
        $splash = array(
            "ip" => $userIp,
            "agent" => $userAgent,
            "domain" => $userDomain,
            "token" => $object->session_token
        );

        $testId = $self::generateId($splash);

        if ($testId <> $sessId) {
            self::destroy($sessId);
            return false; //will lead to re-creation
        }

        //check if expired
        $now = time();
        if ($object->session_expires < $now) {
            self::destroy($sessId);
            return false; //Will lead to re-creation of a new one
        }

        $self->ip = $object->session_ip;
        $self->agent = $object->session_agent;
        $self->token = $object->session_token;
        $self->id = $sessId;

        //@TODO Restore the registry
        //which hopefully should contain auth and other serialized info in namespsaces 
        $registry = \Library\Session\Registry::getInstance();

        //Validate?
        if (!empty($object->session_registry)) {
            //First get an instance of the registry, just to be sure its loaded  
            $registry = $input->unserialize($object->session_registry);
            $self->registry = $registry;
        } else {
            //just re-create a default registry
            //Because we can't restore
            $self->registry['default'] = $registry;
        }
        //Update total requests in the default namespace;
        $reqCount = $self->get("totalRequests");
        $newCount = $reqCount + 1;

        //Set a total Requests Count
        $self->set("totalRequests", $newCount);

        //Return the session Id, to pass to self::update
        return $sessId;
    }

    /**
     * Updates a user session store on state change
     *
     * @param type $sessId
     * @param type $userdata
     * @return type 
     */
    final public function update($sessId, $userdata = array()) {

        if (empty($sessId)) {
            return false;
        }

        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        $output = Output::getInstance();
        //updates a started session for exp time
        //stores data for the registry
        $now = time();
        $newExpires = $now + $self->life;

        $update = array(
            "session_lastactive" => $now,
            "session_expires" => $newExpires
        );
        $self->id = $sessId;

        //If isset registry and is not empty, store userdata;
        if (isset($self->registry) && is_array($self->registry)) {
            $userdata = $output->serialize($self->registry);
            $update["session_registry"] = $userdata;
        }
        //Read the session
        $_handler = ucfirst($self->store);
        $handler = "\Library\Session\Handler\\" . $_handler;

        if (!$handler::update($update, $self, $self->id)) {
            return false;
        }

        return true;
    }

    /**
     * Destroys any previous session and starts a new one
     * Hopefully
     * 
     * @return void
     */
    final public function restart() {

        $id = Session::getId();

        Session::destroy($id);
        Session::create();
        Session::gc();
    }

    /**
     * Destroys a redundant session
     * 
     * @param type $id
     * @param type $restart 
     */
    final public static function destroy($id = "") {

        //stops a session
        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;

        $id = !empty($id) ? $id : Session::getId();
        $now = time();

        if (empty($id)) {
            return false;
        }

        setcookie(session_name(), '', $now - 42000, '/');

        if (session_id()) {
            session_unset();
            session_destroy();
        }

        //Delete from db;  
        //Do a garbage collection
        self::gc($id);
    }

    /**
     * Writes data to session stores
     *
     * @param type $data
     * @param type $sessId
     * @return type 
     */
    final public static function write($sessId, $data = array()) {

        //Writes user data to the db;
        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        $output = Output::getInstance();

        //expires 
        $expires = time() + $self->life;

        //Sets the cookie
        //$output->setCookie($self->cookie, $sessId."0".$data['token'], $expires);
        //$output->setCookie($sessId, $data['token'], $expires);
        $cookie = session_get_cookie_params();

        //Cookie parameters
        session_set_cookie_params($expires, $cookie['path'], $cookie['domain'], true);

        $self->id = session_id();
        $userdata = $output->serialize($self->registry);

        //last modified = now;
        //expires = now + life ;
        $_handler = ucfirst($self->store);
        $handler = "\Library\Session\Handler\\" . $_handler;

        if (!$handler::write($userdata, $data, $self, $sessId, $expires)) {
            return false;
        }

        return true;
    }

    /**
     * Sets session options
     * 
     * @param type $options 
     */
    final public static function setOptions($options = array()) {
        //sets session options
    }

    /**
     * Sets the maximum time for sessin to expire
     * Expires the session id in x time
     * If x is = zero, set expire time to 50 days from now (60*60*24*50*1);
     * 
     * @return void
     */
    final public static function maxTimeToExpire() {
        //Expires the session id in x time
        //If x is = zero, set expire time to 50 days from now (60*60*24*50*1);
    }

    /**
     * Sets the session maximum number of rrequests allowed
     * Expires the session id in x Requests
     * if x is = zero, allow unlimited requests
     * 
     * @return void;
     */
    final public static function maxRequestToExpire() {
        //Expires the session id in x Requests
        //if x is = zero, allow unlimited requests
    }

    /**
     * Returns the total requests made in this session
     * 
     * @return interger
     */
    final public static function getRequestCount() {
        //Returns the total requests made in this session
    }

    /**
     * Garbage collection
     *
     * @param type $forceDelete 
     * @return void
     */
    final private static function gc($forceDelete = '') {

        $self = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        $output = Output::getInstance();

        $_handler = ucfirst($self->store);
        $handler = "\Library\Session\Handler\\" . $_handler;

        //Force to expire!
        $now = time();

        $output->setCookie($forceDelete, "", $now - 7600);
        $output->setCookie($self->cookie, "", $now - 7600);

        //Delete Specific session if specified
        if (isset($forceDelete) && !empty($forceDelete)) {
            $where = array("session_key" => $forceDelete);
            //Two queries won't hurt?
            if (!$handler::delete($where, $self)) {
                return false;
            }
        }

        //Delete all expired sessions
        $where = array(
            "session_expires < " => $now
        );
        //clean database store;
        if (!$handler::delete($where, $self)) {
            return false;
        }
    }

    /**
     * Locks a namespaced registry to prevent further edits
     *
     * @param type $namespace
     * @return type 
     */
    final public static function lock($namespace) {
        //locks a namespace in this session to prevent editing
        if (empty($namespace)) {
            //@TODO throw an exception, 
            //we don't know what namespace this is
            return false;
        }
        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        //unlocks a namespace
        if (isset($session->registry[$namespace]) && !$session->isLocked($namespace)) {
            $session->registry[$namespace]->lock();
            return true;
        }

        return false;
    }

    /**
     * Determines whether a namespaced registry is locked
     * 
     * @param type $namespace
     * @return type 
     */
    final public function isLocked($namespace) {

        if (empty($namespace)) {

            return true; //just say its locked
        }
        //checks if a namespace in this session is locked
        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        //unlocks a namespace
        if (isset($session->registry[$namespace])) {
            return $session->registry[$namespace]->isLocked();
        }

        return false;
    }

    /**
     * Unlocks a registry.
     * 
     * BEWARE: Some registry items are locked for better performance. Do not
     * Unlock unless you absolutely need to, better still if you really need 
     * flexibility, create your own namespaced registry
     *
     * @param type $namespace
     * @return type 
     */
    final public static function unlock($namespace) {

        if (empty($namespace)) {
            //@TODO throw an exception, 
            //we don't know what namespace this is
            return false;
        }
        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        //unlocks a namespace
        if (isset($session->registry[$namespace]) && $session->isLocked($namespace)) {
            $session->registry[$namespace]->unlock();
            return true;
        }

        return false;
    }

    /**
     * Retuns the session Id
     *
     * @return type 
     */
    final public static function getId() {

        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;
        return isset($session->id) ? $session->id : false;
    }

    /**
     * Gets a namespaced registry value, stored in the session
     *
     * @param type $varname
     * @param type $namespace
     * @return type 
     */
    final public function get($varname, $namespace = 'default') {
        //gets a registry var, stored in a namespace of this session id
        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;

        if (!isset($namespace) || empty($namespace)) {
            //@TODO Throw an exception, we need a name or use the default;
            return false;
        }

        //@TODO, check if the regitry is not locked before adding
        $registry = $session->getNamespace($namespace);

        return $registry->get($varname);
    }

    /**
     * Sets a value for storage in a namespaced registry
     * 
     * @param type $varname
     * @param type $value
     * @param type $namespace
     * @return Session 
     */
    final public function set($varname, $value = NULL, $namespace = 'default') {
        //stores a value to a varname in a namespace of this session
        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;

        if (!isset($namespace) || empty($namespace)) {
            //@TODO Throw an exception, we need a name or use the default;
            return false;
        }

        //If we don't have a registry to that namespace;
        if (!isset($session->registry[$namespace])) {
            //Create it;
            $registry = \Library\Session\Registry::getInstance($namespace);
            $session->registry[$namespace] = $registry;
        }

        //echo $namespace;
        //@TODO, check if the regitry is not locked before adding
        if (!$session->isLocked($namespace)) {

            $registry = $session->getNamespace($namespace);
            $registry->set($varname, $value);
        }
        //If auth is locked

        return $session;
    }

    /**
     * Removes a value from the session registry
     * 
     * @param type $varname
     * @param type $value
     * @param type $namespace 
     */
    final public static function remove($varname = '', $namespace = 'default') {
        //if the registry is empty and the namespace is not default
        //delete the registry;
        //stores a value to a varname in a namespace of this session
        $session = (!isset($this) || !is_a($this, "Library\Session")) ? self::getInstance() : $this;


        //echo $namespace;
        //@TODO, check if the regitry is not locked before adding
        if (!$session->isLocked($namespace)) {

            $registry = $session->getNamespace($namespace);
            $registry->delete($varname);
        }
        //If auth is locked

        return $session;
    }

    /**
     * Gets an instance of the session Object
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance($id = null) {

        //die;

        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance) && is_a($instance, "Library\Session")) {
            return $instance;
        }

        $instance = new self();
        return $instance;
    }

    /**
     * A destructor method for the session class
     * 
     * @return void
     */
    public function __destruct() {

        //You'd BREAK (a lot of) things if you change this!
        $this->update($this->getId());
        $this->gc();
        $this->close();
    }

}
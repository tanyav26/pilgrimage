<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * controller.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/controller
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/controller
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
abstract class Controller extends \Library\Object {

    /**
     * Stores the application/module currently being executed
     * @var string
     */
    private $application;

    /**
     * The controller defined in the route mapp
     * @var string
     */
    protected $controller;

    /**
     * The method (task/action) to be executed by the dispatcher
     * @var string
     */
    protected $method;

    /**
     * Determines whether the output has been displayed or not
     * 
     * @var boolean 
     */
    static $displayed = false;

    /**
     * Sets for redirect
     * 
     * @var string 
     */
    public $redirect = NULL;

    /**
     * Constructor for the application controller
     * Must be called from child controller, getInstance
     * 
     * @void
     */
    public function __construct() {

        $classes = array(
            'config' => 'Library\Config',
            'input' => 'Library\Input',
            'uri' => 'Library\Uri',
            'lang' => 'Library\i18n',
            'router' => 'Library\Router',
            'load' => 'Platform\Loader',
            'user'  => 'Platform\User',
            'validate' => 'Library\Validate',
            'output' => 'Library\Output'
        );

        foreach ($classes as $var => $class) {
            $this->$var = $class::getInstance();
        }

        //testing: throw new Exception("We could not deal with the heat" );

        $this->application = $this->router->getApplication();
        $this->controller = $this->router->getController();
        $this->method = $this->router->getMethod();
        $this->authority = $this->getAuthority();
        $this->authhandler = "dbauth";
    }

    /**
     * 
     */
    final public function getMethod() {
        return $this->method;
    }

    /**
     * 
     */
    final public function getController() {
        return $this->controller;
    }

    /**
     * 
     */
    final public function getApplication() {
        return $this->application;
    }

    /**
     * Displays messages on output
     * 
     * @param type $message
     * @param type $type | information, error, success, attention, note etc.
     */
    final public function alert($message, $title='', $type='info') {

        //Set the message variables;
        $this->set("alerts", array( array("alertType"=>$type, "alertBody"=>$message,"alertTitle"=>$title )  ));
        
        return $this;
    }

    /**
     * Returns the arguments defined in the URL
     * 
     * @return array 
     */
    final public function getRequestArgs() {
        return $this->router->getParameter("arguments", array());
    }

    /**
     * Sets a output property for later use.
     * 
     * @param string $name
     * @param mixed $value 
     */
    final public function set($name, $value) {
        //Determine all other auto set vars; 
        $this->output->set($name, $value);
    }
    
    /**
     * Determines the current user authority
     * 
     * 
     */
    final public function getAuthority() {

        //Authorizes the application;
        if (!\Library\Session::getInstance()->isAuthenticated()) {
            $action = $this->router->getMethod();
            $task = $this->router->getController();

            if (strtolower($action) <> "start" || strtolower($task) <> "session") {
                //$this->alert("You must be logged in to proceed", "Login Required", "attention");
                //$this->setRedirect("/user/session/start");
            }
        }
    }

    /**
     * Redirects only after the action is completely executed
     * 
     * @param type $url 
     */
    final public function setredirect($url='') {

        //@TODO: resolve this URL
        $this->redirect = trim($url);
    }

    /**
     * Stops executing the action and redirects 
     * 
     * @param type $url 
     */
    final public function redirect($url = '', $code=302, $message='') {

        //$this->setredirect($url)
        static::$displayed = true; //Just so it does not send any furthre output before redirect
        $dispatcher = Dispatcher::getInstance();
        $dispatcher->redirect($url, $code, $message);
    }

    /**
     * The login action
     * 
     */
    final public function login() {
        
        //@TODO Kill any logged in session
        //@TODO If already logged in, redirect to homepage or somewhere else;
        //$this->redirect( '/index.php' );
        //login and authorize
        if ($this->input->methodIs("post")) {

            //1. Check that we have a valid username and password
            $credentials = array();

            $credentials['usernameid'] = $this->input->getString('user_name_id','','post');
            $credentials['usernamepass'] = $this->input->getString('user_password','','post');


            //authentication;
            $authhandler = $this->input->getString('auth_handler');
            $authenticate = "Library\Authenticate\\" . $authhandler;

            //failure
            $failure = _("The password or username you provided did not match any user");

            $authhandler = (empty($authhandler)) ? "dbauth" : $authhandler;
            $authenticate = (!class_exists($authenticate) || !method_exists($authenticate, "attest")) ? 'Library\Authenticate\DbAuth' : $authenticate;

            //If we have the handler
            if (class_exists($authenticate)) {
                if (method_exists($authenticate, "attest")) {

                    //2. Verify the username and the password
                    $authenticate = $authenticate::getInstance();

                    if ($authenticate->attest($credentials)) {
                        //get the user data
                        $this->user = User::getInstance();

                        $this->alert( _('Welcome on board') , sprintf(_('Howdy %s!!'), $this->user->fullname), "success");
                        $this->redirect( $this->output->link( "/system/start/dashboard") );
                        
                    } else {
                        //if not show the form...with messages maybe?;
                        $this->alert($failure, _("We were unable to log you in"), "error");
                    }
                }
            }
        }

        $view = $this->load->view("index", "member");

        $view->userLoginForm();

        //$this->abort();
    }

    final public function logout() {
        
        $session = \Library\Session::getInstance();
        $session->destroy();
        
        $return = $this->uri->getURL('signin');
        
        //echo $return;
        
        //Send back to homepage
        $this->alert(_("You have been logged out"), "", "info");
        //$this->redirect("/");
        $this->redirect($this->uri->getURL('signin'));
    }

    final public function output($layout = null) {
        
        static::$displayed = false;
        
        if(static::$displayed) return false;
        
        $this->output->display();
        //return self::__destruct();

        static::$displayed = true;
    }

    /**
     * This is the default method for undispatchable action=>tasks
     * Iterim search for the possibility that the path is virtual 
     * 
     * @return redirect to start page
     * 
     */
    public function index() {

        //@TODO Check Vanity URLS like
        //http://domain.com/tangstone
        //Redirect=> http://domain.com/profile/tangstone...
        //@TODO check if the URL is a command!
        //@TODO Check that the user is logged in!


        $this->redirect($this->uri->getURL('index'));
    }

    /**
     * Instantiate the child controller
     * 
     * @return object
     */
    abstract public static function getInstance();

    /**
     * Displays the output for the request;
     * 
     * @return  
     */
    final public function __destruct() {
        
        //Determine Variables that have not been set
        //Set
        if (!static::$displayed) {
            return $this->output();
        }
    }

}


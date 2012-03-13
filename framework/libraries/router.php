<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * router.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/router
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/router
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Router extends Object {

    /**
     * The intact or reconstructured path
     * @var string
     */
    private $path;

    /**
     * @var string 
     */
    protected $view;

    /**
     * @var string 
     */
    protected $format = 'xhtml';

    /**
     * The name of the application this route refers to
     * @var string
     */
    private $application;

    /**
     * The controller in the application to which the action is mapped
     * @var string
     */
    private $controller;

    /**
     * The action to be executed by the dispatcher once a route is found
     * @var string
     */
    private $method;

    /**
     * The left over arguments at the end of the path
     * @var string
     */
    private $routeMap;

    /**
     * Any dynamically mapped elements in the path
     * @var array
     */
    private $elements = array();

    /**
     * Holds all the predefined Routes
     * @var array
     */
    public static $routes = array();

    /**
     * Changes to true when successfully mapped
     * @var boolean
     */
    protected $resolved = False;

    /**
     *
     * @var type 
     */
    protected $parameters = array();
    protected $uri;

    /**
     * Constructs the Router class
     * @param string $path
     */
    public function __construct($path = null) {

        //Adds a router path
        $this->setPath($path);
        $this->uri = Uri::getInstance();
        $this->validate = Validate::getInstance();
    }

    /**
     * Returns the Application
     * 
     * @return string
     */
    public function getApplication() {
        return $this->application;
    }

    /**
     * Returns the router maps
     * 
     * @return array
     */
    public function getMap() {
        return $this->routeMap;
    }

    /**
     * Returns the called controller
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * Returns the called method
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * To prevent confusion and to simplify
     * This method is an alias of the getController method
     * 
     * @return type 
     */
    public function getAction() {
        return $this->getController();
    }

    /**
     * Alias of the getMethod 
     * 
     * @return type 
     */
    public function getCommand() {
        return $this->getMethod();
    }

    /**
     * Determines the view from the request, Passes to the dispatcher
     * 
     * 
     * The default view is index, automatically loaded
     * to the controller and can be access by $this->view ;
     * 
     * e.g domain.com/user/profile/read/19432/feed.json => the view is 'feed' the format is 'json'
     * e.g domain.com/index.php => The view is 'index' and the format 'php' will resolve to php
     * 
     * @return string name of the view
     */
    public function getView() {
        return $this->view;
    }

    /**
     * Sets the view defined in the request
     * 
     * @param type $name
     * @return Router 
     */
    public function setView($name) {
        $this->view = $name;
        return $this;
    }

    /**
     * Determines the Format of the current
     * Request
     * 
     * @return string format
     */
    public function getFormat() {
        return $this->format;
    }

    /**
     * Sets the Format defined in the request
     * 
     * @param type $type
     * @return Router 
     */
    public function setFormat($type='xhtml') {
        $this->format = $type;
        return $this;
    }

    /**
     * Returns a stored parameter
     * 
     * @param string $name
     * @param mixed $default
     * @return mixed 
     */
    public function getParameter($name, $default='') {

        $return = $default;
        if (isset($this->parameters[$name])) {
            $return = $this->parameters[$name];
        }
        return $return;
    }

    /**
     * Sets the parameter array
     *
     * @param type $paramArray 
     */
    public function setParameters($paramArray) {

        $this->parameters = $paramArray;

        return $this;
    }

    /**
     * Set an value to a request parameter
     * 
     * @param type $name
     * @param type $value 
     */
    public function setParameter($name, $value) {

        if (isset($this->parameters[$name])) {
            $default = $this->getParameter($name);
            $this->parameters[$name] = $value;
        }

        return $this;
    }

    /**
     * Determines what route to follow
     * 
     * @param type $query
     * @return type 
     */
    public function findRoute($query) {

        // echo $query;

        $segmentCount = 0;
        $segments = explode('/', $query);
        $request = null;
        $params = null;
        $path = null;

        foreach ($segments as $key => $segment) {
            if (( stripos($segment, "=") ) !== FALSE) {
                $params = $segments[$key];
                unset($segments[$key]);
            }

            if (empty($segment)) {
                unset($segments[$key]);
            }
        }
        $segmentCount = count($segments);


        //reconstruct
        $this->path = implode("/", $segments);

        return $this->whatRoute($this->path, $segments, $segmentCount);
    }

    /**
     * A private method to return what route is
     * being used for the present request;
     *
     * @param string $path
     */
    private function whatRoute($path ="", $segments = array(), $segCount = 0) {

        $application = null;
        $class = null;
        $method = null;
        $arguements = null;

        Event::trigger('onBeforeRoute', $path);

        // Load the routes.php file.
        @include(FSPATH . 'config/routes' . EXT);

        $routers = Folder::itemizeFind("routes.php", APPPATH, 0, TRUE, 1);

        //print_R($routers);
        foreach ($routers as $i => $routesFile) {
            if (!Folder::is($routesFile)) {
                //include the individual app routes
                @include rtrim($routesFile, DS);
            }
        }

        $this->routes = (!isset($route) OR !is_array($route)) ? array() : $route;

        unset($route); //will need this later at some point;
        //echo $this->path;

        $thisRequestPath = preg_replace('/^\//', '', rtrim($this->path, "/"));
        $thisRequestSegments = explode("/", $this->path);
        $thisRequestSegCount = count($thisRequestSegments);

        //Determine the view;
        $view = "index";
        $format = $this->format;
        $lastSegmentInRequest = $thisRequestSegments[$thisRequestSegCount - 1];

        $lastSegmentParts = explode(".", $lastSegmentInRequest);
        $lastSegmentPartsCount = count($lastSegmentParts);

        $validFormats = array("php", "json", "xml", "raw", "pdf", "xhtml");

        if (($lastSegmentPartsCount > 1) && in_array($lastSegmentParts[$lastSegmentPartsCount - 1], $validFormats)) {

            if (isset($lastSegmentParts[$lastSegmentPartsCount - 1]))

            //The last element is the format always
                $format = $lastSegmentParts[$lastSegmentPartsCount - 1];

            //Just in case you have things like index.page.xml in url; Unlikely but just incase
            unset($lastSegmentParts[$lastSegmentPartsCount - 1]);

            //stick them back together;
            $task = implode(".", $lastSegmentParts);

            //Add the last segement back to the task;
            $thisRequestSegments[$thisRequestSegCount - 1] = $task;

            //remove the last segment from the RequestPath //WHY??;
            //unset($thisRequestSegments[$thisRequestSegCount - 1]);
            //$thisRequestSegCount = $thisRequestSegCount - 1;
            //$thisRequestPath = implode("/", $thisRequestSegments);
        }

        //die;

        $thisMapSegments = array();

        foreach ($this->routes as $rkey => $route) {

            //print_r($route);

            $thisMapPath = preg_replace('/^\//', '', rtrim($route['path'], "/")); //echo $thisMapPath;
            $thisMapSegments = explode("/", $thisMapPath);
            $thisMapSegCount = count($thisMapSegments);



            if ($thisMapPath == $thisRequestPath) {
                //So if the paths match
                //$route=$route
            } else {
                //unset($this->routes[$rkey]);
                if ($thisRequestSegCount > 2) { //$thisMapSegCount
                    //use the standard route if larger than max, all additional segments as params
                    $route = $this->routes["task"];

                    //If we have a matching segment count?
                    //What if the paths are the same!!    
                } elseif ($thisMapSegCount !== $thisRequestSegCount) {
                    continue;
                } elseif ($thisMapSegCount === $thisRequestSegCount) {

                    //disqualify if not dynamic and paths dont match;
                    if (!isset($route['dynamic'])) {
                        continue;
                    }

                    //if is dynamic search for sub paths, e.g action maps using segment 1
                    if (isset($thisMapSegments[0]) && !empty($thisMapSegments[0])) {
                        $segment0 = $thisMapSegments[0];
                        if (isset($route[$segment0])) {
                            $route = $route[$segment0];
                        }
                    }
                }
            }

            $mappedString = '';
            $dynamicKeys = array();

            foreach ($thisMapSegments as $key => $segment) {

                //check if we have that segment represented in the route
                if (preg_match('/^:/', $segment)) {
                    
                }

                //subroute
                //$subroute = $route;

                for ($i = 0; $i < $thisRequestSegCount; $i++) {
                    if (isset($thisRequestSegments[$i]) && isset($route[$thisRequestSegments[$i]])) {
                        $route = $route[$thisRequestSegments[$i]];
                    }
                }

                //static segments;
                if ($segment === $thisRequestSegments[$key]) {
                    $route[$segment] = $thisRequestSegments[$key];
                    $mappedString .= '/' . $thisRequestSegments[$key];
                }

                //dynamic elements;
                if (isset($route['dynamic'])) {

                    //dynamic segment
                    if (isset($route['dynamic'][$segment])) {
                        if ($route['dynamic'][$segment] === $segment) {
                            $route['dynamic'][$segment] = $thisRequestSegments[$key];
                            $mappedString .= '/' . $thisRequestSegments[$key];
                        }

                        //Regular expression matching of dynamic elements;
                        $regExp = '/' . $route['dynamic'][$segment] . '/';
                        if (preg_match($regExp, $thisRequestSegments[$key]) > 0) {
                            
                        }
                    }
                }
            }

            //dynamic application, controller or method?
            if (!isset($route['application']) && isset($route['dynamic'][':application'])) {
                $route['application'] = $route['dynamic'][':application'];
                //unset( $route['dynamic'][':application'] );
            }
            if (!isset($route['controller']) && isset($route['dynamic'][':controller'])) {
                $route['controller'] = $route['dynamic'][':controller'];
            }
            if (!isset($route['method']) && isset($route['dynamic'][':method'])) {
                $route['method'] = $route['dynamic'][':method'];
            }

            //Store Params;
            $pCount = 0;
            $params = array();
            //$thisRequestSegments = array_merge($thisRequestSegments, explode("/", $mappedString));

            foreach ($thisRequestSegments as $key => $segment) {
                $args = array();
                $pName = (isset($thisMapSegments[$key])) ? ltrim($thisMapSegments[$key], ":") : null;

                $pCount++;
                if (!empty($pName)) {
                    $params[$pName] = $segment;
                } else {
                    $params["arguments"][] = $segment;
                }
            }

            //URL
            $route['url'] = $mappedString;

            //External Access
            $this->setController($route['controller'])
                    ->setMethod($route['method'])
                    ->setApplication($route['application'])
                    ->setPath($route['path'])
                    ->setUrl($route['url'])
                    ->setParameters($params)
                    ->setView($view)
                    ->setFormat($format);

            Event::trigger('onAfterRoute', $this);

            $this->routeMap = $route;
            $this->resolved = true;

            unset($route);
            //unset($this->routes);

            return $this;
        }

        //Final check;
        if (!$this->resolved) {

            //default route
            $route = $this->routes["index"];
            //External Access
            $this->setController($route['controller'])
                    ->setMethod($route['method'])
                    ->setApplication($route['application'])
                    ->setPath($route['path'])
                    ->setUrl($this->path);

            $this->routeMap = $route;
            $this->resolved = true;

            unset($this->routes);

            return $this;
        }
    }

    /**
     * Sets the requests' universal resource link
     * 
     * @param type $url
     * @return Router 
     */
    public function setUrl($url) {

        $this->url = $url;

        return $this;
    }

    /**
     * Adds a dynamical element to the map
     * @param string $element
     * @param string $value
     * @return Router
     */
    public function setDynamicElement($element, $value) {

        $this->elements[$element] = $value;

        return $this;
    }

    /**
     * Returns an id specific route map
     * 
     * @param type $routeid
     * @return type 
     */
    public function getRoute($routeid) {
        $route = false;

        //if routeid exist, return, simple
        if (isset($this->routes[$routeid])) {
            $route = $this->routes[$routeid];

            //Straight forward
            return $route;
        }

        //Accessing subroutes requires a diff type of id
        //e.g to access the user profile route it will be $this->getRoute("action.profile")
        //SubRoute map id
        $indirect = explode(".", $routeid);
        $depths = sizeof($indirect);
        $route = $this->routes;

        //Go Deep
        if ((int) $depths > 1) {
            for ($i = 0; $i < $depths; $i++) {
                if (isset($route[$indirect[$i]])) {
                    $route = $route[$indirect[$i]];
                }
            }
        }
        return $route;
    }

    /**
     * Returns all loaded routes
     * 
     * @return type 
     */
    public function getRoutes() {

        return $this->routes;
    }

    /**
     * Reassembles a URL from params
     * 
     * @param string $routeid
     * @param array $params 
     */
    public function getURL($routeid, $params=array()) {

        //routeid can't be empty
        if (empty($routeid)) {
            return '/';
        }

        //Check if the routerid exists;
        if (isset($this->routes[$routeid])) {
            print_R($this->routes[$routeid]);
        } else {
            $url = $routeid;
        }

        //if routeid is a valid url
    }

    /**
     * stores the controller to be mapped to
     * @param string $controller
     * @return Router
     */
    public function setController($controller) {

        $this->controller = $controller;

        return $this;
    }

    /**
     * The default router mapping path
     * @param string $path
     * @return Router
     */
    public function setPath($path) {

        $this->path = $path;

        return $this;
    }

    /**
     * Sets the routed application for dispatching
     * 
     * @param type $application
     * @return Router 
     */
    public function setApplication($application) {

        $this->application = $application;

        return $this;
    }

    /**
     * Sets the routed method for dispatching
     *
     * @param type $method
     * @return Router 
     */
    public function setMethod($method) {

        $method = rtrim($method);
        $this->method = !empty($method) ? $method : "index";

        return $this;
    }

    /**
     * Executes post dispatch redirect
     * 
     * @param type $url
     * @param type $code
     * @param type $message 
     */
    public function redirect($url, $code=302, $message='') {

        //echo $url;
        $output = Output::getInstance();
        $session = Session::getInstance();

        //Get all messages before redirect
        if (!empty($message)): $output->addMessage($message);
        endif;

        $alerts = $output->get("alerts");

        //Exceptional: Store alerts for future display
        $session->set("alerts", $alerts);
        
        //We now start a new buffer, to deal with the template!
        $output->restartBuffer();
        
        //print_R($alerts);
        header("HTTP/1.1 $code Moved Permanently");
        header("Location: ".$output->link($url) );

        $this->abort();
    }

    /**
     * Returns an instance of the router class
     * 
     * @staticvar Router $instance
     * @return Router 
     */
    public static function getInstance() {
        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $route = new Router();

        $instance = $route;

        return $route;
    }
}
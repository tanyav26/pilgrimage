<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * uri.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/uri
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
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/uri
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Uri {

    /**  
     * @var string 
     */
    private $host;
    
    /**
     * @var type 
     */
    private $scheme = "http";
    
    /**
     * @var type 
     */
    private $path = "/";
    
    /**
     * @var type 
     */
    private $file = "index.php";
    
    /**
     * @var type 
     */
    private $resource;
    
    /**
     * @var type 
     */
    private $credentials;
    
    /**
     * @var type 
     */
    private $parts;
    
    /**
     * @var type 
     */
    private $fragment;
    
    /**
     * @var type 
     */
    private static $routes;

    /**
     * Constructor for the URI Library Object
     * 
     * @return void
     */
    public function __construct($parts=array()) {

        if (!empty($parts) && isset($parts['host'])) {
            //Set the URI ;
            $this->resource = $this->compile($parts);
            $this->parts = $parts;

            //Just a few things we migth need;
            $this->file = $this->parts["file"];
            $this->path = $this->parts["path"];
            $this->host = $this->parts["host"];
            $this->scheme = $this->parts["scheme"];

            if (isset($this->parts["fragment"])) {
                $this->fragment = $this->parts["fragment"];
            }

            if (isset($this->parts["userinfo"])) {
                $encrypt = Encrypt::getInstance();
                $this->credentials["userinfo"] = $encrypt->encode($this->parts["userinfo"]);
                if (isset($this->parts['authority'])) {
                    $this->credentials["authority"] = $encrypt->encode($this->parts["authority"]);
                }
            }
        }
    }

    /**
     * Builds a parsable query string from the request
     * 
     * @return type 
     */
    private function buildQueryString() {

        //Standard Segment based?
        if (is_array($_GET) && count($_GET) == 1 && trim(key($_GET), '/') != '') {
            return $queryString = key($_GET);
        }
        // Is there a PATH_INFO variable?
        // Note: some servers seem to have trouble with getenv() so we'll test it two ways
        $path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : @getenv('PATH_INFO');
        if (trim($path, '/') != '' && $path != "/" . SELF) {
            return $queryString = $path;
        }

        // No PATH_INFO?... What about QUERY_STRING?
        $path = (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : @getenv('QUERY_STRING');
        if (trim($path, '/') != '') {

            $url = urldecode($_SERVER['REQUEST_URI']);
            $query = explode("&", $_SERVER['QUERY_STRING']);

            return $queryString = $path;
        }

        // No QUERY_STRING?... Maybe the ORIG_PATH_INFO variable exists?
        $path = str_replace($_SERVER['SCRIPT_NAME'], '', (isset($_SERVER['ORIG_PATH_INFO'])) ? $_SERVER['ORIG_PATH_INFO'] : @getenv('ORIG_PATH_INFO'));
        if (trim($path, '/') != '' && $path != "/" . SELF) {
            // remove path and script information so we have good URI data
            return $queryString = $path;
        }

        // We've exhausted all our options...
        $queryString = '/';

        return $queryString;
    }

    /**
     * Uses a route map ti compile a query?
     * 
     * @param type $partsArray 
     * @return type string
     */
    public function compile($partsArray) {
        
    }

    /**
     * An alias for the internal pointer
     * 
     * @param string $url
     * @return string 
     */
    public static function _($url) {
        return self::internal($url);
    }

    /**
     * Resolves a url adds path if missing
     * 
     * @param string $uri
     * @return string 
     */
    public static function internal($url ='') {

        //Are we dealing with an array of parts?
        if (is_array($url)) {
            $url = implode('/', $url);
        }

        //@TODO make sure that this url does not have the scheme
        //@TODO make sure that this url does not have the host already
        //@TODO make sure we are internalizing a path and nothing else
        //die;

        //Do we have the path info included?
        $sPath = Config::getParam("path", "/", "system");
        
        if (!empty($url)) {

            $parts = explode("/", $sPath);
            $segments = explode("/", $url);
            
            //Remove all empty elements
            $segments = array_filter($segments, 'strlen');
            $parts    = array_filter($parts, 'strlen');
            //die;
            
            //This is in case we have a system deep in multiple supdirectories
            array_unshift($parts, null);
            $fragment = implode("/", $parts);
            
            if (is_array($segments)) {   
               
                array_unshift($segments, null); //Adds the / to the start of the url
                $url = implode("/", $segments);
                
                //now look for $fragment at the start of $url
                $pos = strpos($url, $fragment);
                if( $pos!==0 || $pos===FALSE){
                    $url = $fragment.$url;
                }
            }
        }
        return $url;
    }

    /**
     * 
     * 
     * @param string $paramname
     * @param mixed $default
     * @return boolean false if not found, credential if found
     */
    public function getCredentials($paramname="userinfo", $default='', $decode=false) {

        $param = false;

        if (isset($this->credentials[$paramname])) {
            $encrypt = Encrypt::getInstance();
            $param = $this->credentials[$paramname];
            $param = ($decode) ? $param : $ $encrypt->decode($param);
        }

        return $param;
    }

    /**
     * Gets the query string
     * 
     * @return type 
     */
    public function getQuery() {
        return $this->path;
    }

    /**
     * Returns the request host
     * 
     * @return string
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * Get path from uri
     * 
     * @return type 
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Reassembles a URL from params
     * 
     * @param string $routeid
     * @param array $params 
     */
    public function getURL($routeid='index', $params=array()) {

        //routeid can't be empty
        if (empty($routeid)) {
            $routeid = 'index';
        }
        

        //Get the routeMap;
        $router = Router::getInstance();
        $route = $router->getRoute($routeid);

        $path = $route['path'];

        if (is_array($route)) {
            if (isset($route['dynamic'])) {
                
                $dynamic = $route['dynamic'];
                
                foreach ($dynamic as $ph => $segment) {

                    if (is_array($params) && isset($params[$segment])) {
                        $value = $params[$segment];
                        //return $value;
                        $path = str_ireplace($segment, $value, $path);
                    }
                }
            }
        }
        
        return self::internal( $path );
        //if routeid is a valid url
    }

    /**
     *
     * @return type 
     */
    public function getScheme() {
        return $this->scheme;
    }

    /**
     *
     * @param type $path 
     * 
     */
    private function setPath($path) {
        $this->path = $path;
    }

    /**
     *
     * @return type 
     */
    public function getFragment() {
        return $this->fragment;
    }

    /**
     * Returns the script name
     * 
     * @return type 
     */
    public function getScriptName() {

        //Will always be index.php because
        //the .htaccess file will always redirect here! NOT necessarily
        return $this->script;
    }

    /**
     * Gets an instance of the URI Library object
     * 
     * @staticvar Uri $instance
     * @return Uri 
     */
    public static function getInstance($resource=null) {

        static $instance;

        $validate = Validate::getInstance();
        $link = array();

        if (empty($resource) || !$validate->url($resource)) {

            //@TODO check to see how behaves with IIS
            $path = self::buildQueryString();

            //echo $path;
            //If the class was already instantiated, just return it
            if (isset($instance[$path])) {
                return $instance[$path];
            }

            //Calculate the URL; [scheme]://[user]:[pass]@[host]/[path]?[query]#[fragment]
            //1. The [scheme] //@TODO force schemes?
            $scheme = $link['scheme'] = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) ? "https" : "http";

            //2. The [host]/[file][path]
            $host = $link['host'] = $_SERVER['HTTP_HOST'] = Config::getParam("host", "localhost", "server");

            //print_R($_SERVER);

            if (!empty($_SERVER['PHP_SELF']) && !empty($_SERVER['REQUEST_URI'])) {
                //IIS does not have request_uri variable in server
                if (isset($_SERVER['REQUEST_URI'])) {
                    //The file is included in the request query if appended
                    $file = null; //"/".basename($_SERVER['SCRIPT_FILENAME']);
                } elseif ($_SERVER['SCRIPT_NAME']) {
                    $file = "/" . basename($_SERVER['SCRIPT_NAME']);
                }
            }

            $file = $link['file'] = empty($file) ? "/index.php" : $file;

            //3. The [query]#[fragment]
            $path = $link['path'] = empty($path) ? "/" : $path;


            //4. The username and password;
            //5. Compile the resource
            $resource = $scheme . "://" . $host . $path;

            //6. A Joomla style clean up
            $halt = 0;
            while (true) {
                $last = $resource;
                $resource = urldecode($resource);

                // Check whether the last decode is equal to the first.
                if ($resource == $last) {
                    // Break out of the while if the URI is stable.
                    break;
                } else if (++$halt > 10) {
                    // Runaway check. URI has been seriously compromised.
                    throw new Library\Exception(_("Invalid Resource Link"));
                }
            }

            $resource = str_replace('"', '&quot;', $resource);
            $resource = str_replace('<', '&lt;', $resource);
            $resource = str_replace('>', '&gt;', $resource);
            $resource = preg_replace('/eval\((.*)\)/', '', $resource);
            $resource = preg_replace('/[\\\"\\\'][\\s]*javascript:(.*)[\\\"\\\']/', '""', $resource);

            //@TODO, leave this to the router
            //We can also check to get the view and format out of the request?
        } else {
            $link = parse_url($resource);
        }

        //If the class was already instantiated, just return it
        if (isset($instance[$link['path']])) {
            return $instance[$link['path']];
        }

        $instance[$link['path']] = new self($link);

        return $instance[$link['path']];
    }
}
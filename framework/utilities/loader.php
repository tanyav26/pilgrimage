<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * loader.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/loader
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/loader
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Loader{
    
    /*
     * 
     */
    static $objects = array();
    
    /**
     * 
     */
    const  GLOBAL_NAMESPACE = "";

    /**
     *
     * @var type 
     */
    protected $application;

    /**
     *
     * @var type 
     */
    protected $paths;

    /**
     *
     * @var type 
     */
    protected $namespace;

    /**
     *
     * @param type $namespace
     * @param type $path 
     */
    public function __construct($namespace, $path ){

        $this->namespace = ltrim($namespace, "\\");
        $this->path = $path;
        
    }

    /**
     *
     * @param type $model
     * @return type 
     */
    public function model( $model , $app='' ){
        
        //Get the Router to determine what application we are in;
        $Router     = Library\Router::getInstance();

        //Set the Application
        $this->application = $Router->getApplication();
        
        //2nd Search ini the application specific layout folder;
        $application = (!empty($app))? $app : $this->application ;

        //Specifics
        $class      = "Application\\".$application."\models\\".$model ;
        $file       = "";
        
        $model = $class::getInstance();

       return $model;
    }

    /**
     *
     * @param type $table
     * @return type 
     */
    public function table( $table , $primayId = NULL ){
        
        $dbparams = Library\Config::group("database");
        
        $options = array(
            "driver" => preg_replace('/[^A-Z0-9_\.-]/i', '', $dbparams['driver']),
            "dbo"    => Library\Database::getInstance(),
            "table"  => $table
        ); 
        
        $Table   = Library\Database\Table::getInstance( $options );
        
        return $Table;
        
    }

    /**
     *
     * @param type $controller 
     */
    public function controller( $controller , $app=''){}

    /**
     * Loads the view from within an application!
     * 
     * @param string $view
     * @param array $vars
     * @param boolean $return
     * @param string $namespace
     * @return object Page
     */
    public function view( $view, $app='', $vars = array(), $return = FALSE , $namespace = ""){

        //Get the Router to determine what application we are in;
        $Router     = Library\Router::getInstance();

        //Set the Application
        $this->application = $Router->getApplication();
        
        //2nd Search ini the application specific layout folder;
        $application = (!empty($app))?$app : $this->application ;

        //Specifics
        $class          = "Application\\".$application."\Views\\".$view ;
        $file           = "";
        
        //Gets an instance of the output classs
        $output         = Library\Output::getInstance();
        $view           = $class::getInstance( $vars );
        
        //Add a few properties, bad way to do it but works!
        $view->output   = $output ;
        $view->load     = $this; 


       return $view;

    }
    
    /**
     * Gets a layout
     * 
     * @param type $layout
     * @param type $vars
     * @param type $return if false returns the url
     */
    public function layout($layout,  $app='', $ext='.php',$include= FALSE){
        
                
        //Set the Application
        $this->application = Library\Router::getInstance()->getApplication();
        
        //1st Search in the default layout folder?
            //This is the current templates layout folder;
        
        //2nd Search ini the application specific layout folder;
        $application = (!empty($app))?$app : $this->application ;
        
        //The file path
        $path   = FSPATH."applications".DS.$application.DS."layouts".DS.$layout.$ext ;
        
        if(!file_exists($path)){
            return null; //@TODO throw an exception..! say error
        }
        
        //include once the file if include, else return the resource link;
        if($include){
            include_once $path;
        }
        
        return $path;
    }

    /**
     *
     * @param type $library
     * @return type 
     */
    public function library( $library , $app =''){

        //Get the Router to determine what application we are in;
        $Router     = Library\Router::getInstance();

        //Set the Application
        $this->application = $Router->getApplication();

        //2nd Search ini the application specific layout folder;
        $application = (!empty($app))? $app : $this->application ;
        
        //Specifics
        $class      = "Application\\".$application."\libraries\\".$library ;
        $file       = "";
        
        $view = $class::getInstance();

        return $view;
       
    }

    /**
     *
     * @param type $helper
     * @return type 
     */
    public function helper( $helper , $app=''){

        //Get the Router to determine what application we are in;
        $Router     = Library\Router::getInstance();

        //Set the Application
        $this->application = $Router->getApplication();
        
        //2nd Search ini the application specific layout folder;
        $application = (!empty($app))? $app : $this->application ;

        //Specifics
        $class      = "Application\\".$application."\helpers\\".$helper ;
        $file       = "";
        
        $view       = $class::getInstance();
     

        return $view;
        
    }

    /**
     * 
     */
    public function setApplication(){}

    /**
     * 
     */
    public function addSearchPath(){}

    /**
     *
     * @staticvar Loader $instance
     * @param type $namespace
     * @param type $dir
     * @return Loader 
     */
    public static function getInstance( $namespace='', $dir=''){

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance) ) return $instance ;

        $instance = new Loader($namespace, $dir);

        return $instance; 
    
    }

    /**
     * 
     * @param type $class 
     */
    public function __invoke( $class ){

        $class = strtr(ltrim($class, "\\"), "\\", DS);

        if ($this->namespace === "" || strpos($class, $this->namespace) === 0) {
            if ($this->namespace !== self::GLOBAL_NAMESPACE) {
                $class = substr($class, strlen($this->namespace) + strlen(DS));
            }
            $file = strtolower( $this->path . DS . $class . EXT );
            
            if (is_readable($file)) {
                require_once( $file );
            }
        }
    }
}
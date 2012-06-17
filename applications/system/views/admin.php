<?php

namespace Application\System\Views;

use Platform;
use Library;

/**
 * Do Framework
 *
 * for PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the GPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt.  If you did not receive a copy of
 * the GPLv3 License and are unable to obtain it through the web, please
 * send a note to license@tuiyo.co.uk so we can mail you a copy immediately.
 *
 * @category   Do
 * @package    DoController
 * @author     Original Author <livingstonefultang@gmail.com>
 * @copyright  2011 Stonyhills LLC
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    SVN: $Id$
 *
 */
final class Admin extends Platform\View {

    public function __construct() {

        parent::__construct();
        
        //To set the pate title use
        $this->output->setPageTitle("Administrator Panel");
        $this->output->setLayout("admin");
        
        //Draw the table at the end when all the parameters have been entered!
        //register_shutdown_function( array('Application\System\Views\Admin' , 'drawAdminPage'));
        //\Library\Event::register("onShutdown", "Application\System\Views\Admin::drawAdminPage" );
      
    }
    
    
    public function dashboard(){
        
        //you can add stuff you want displayed;
        $user = $this->get('user');
        
        $dashpanel  = $this->output->layout("dashpanel");
        $dashbanner = $this->output->layout("dashbanner");
        
        $this->output->addToPosition("banner" , $dashbanner );
        $this->output->addToPosition("body" , $dashpanel );
        
    }



    public function installExtensions() {

        //To set the pate title use
        $this->output->setPageTitle("Dasboard > Extend");


        $sidebar = $this->output->layout("index_sidebar");
        $dashboard = $this->output->layout("extensions_install");

        //The default installation box;
        $this->output->addToPosition("left", $sidebar);

        $this->output->addToPosition("body", $dashboard);
    }

    public function updateExtensions() {

        //To set the pate title use
        $this->output->setPageTitle("Dasboard > Update Extensions");


        $sidebar = $this->output->layout("index_sidebar");
        $dashboard = $this->output->layout("extensions_updates");

        //The default installation box;
        $this->output->addToPosition("left", $sidebar);

        $this->output->addToPosition("body", $dashboard);
    }

    /**
     * The admin dashboard master table & widgetboard
     * 
     */
    public static function drawAdminPage() {

        $output = Library\Output::getInstance();
        $router = \Library\Router::getInstance();
        
        //The default installation box;
        //$toolbar = $output->layout("admin_toolbar");
        //$board = $output->layout("admin", "system");
        //Add admin Toolbar
        //$output->addToPosition('topsection', $toolbar);
        //$output->addToPosition('body', $board);
        
        //because this method runs at shutdown, it overwrites the output format
        //so json and others will always return raw, which is not what we want
        //therefore we lock these formats and prevent them from being overidden
        $format = $router->getFormat();
        $lock   = array("json","pdf","xml"); 
        
        if(!in_array($format, $lock)){ $output->setFormat("raw"); }
                      
        //$output->setFormat("raw");
        $output->setLayout("admin");
        
    }

    public function listExtensions() {

        //To set the pate title use
        $this->output->setPageTitle("Dasboard > Installed Extensions");


        $sidebar = $this->output->layout("index_sidebar");
        $dashboard = $this->output->layout("extensions_lists");

        //The default installation box;
        $this->output->addToPosition("left", $sidebar);
        $this->output->addToPosition("body", $dashboard);
    }

    public function addContent() {

        //To set the pate title use
        $this->output->setPageTitle("Dasboard");

        //to add some js file
        $this->output->addScript("some.js");

        //to add some js file
        $this->output->addStyle("some.css");

        //to output just the layout use
        //$this->output->raw();
        //to output just the xml use
        //$this->output->xml();
        //to output as json use
        //$this->output->json();
        //parse Layout Demo;

        $sidebar = $this->output->layout("index_sidebar");
        $mainbody = $this->output->layout("content_input");


        //$poster     = $this->output->layout( "content_input" );
        //$this->set("inputform" , $poster );
        //The default installation box;
        $this->output->addToPosition("left", $sidebar);

        $this->output->addToPosition("body", $mainbody);
    }

    public function display() {

        //To specify a layout, else default will be used
        //$this->setLayout("page");
        //To get a previously set property;
        //echo $this->get("user2");
        //To set the pate title use
        $this->output->setPageTitle("Welcome to diddat");

        //to add some js file
        $this->output->addScript("some.js");

        //to add some js file
        $this->output->addStyle("some.css");

        //to output just the layout use
        //$this->output->raw();
        //to output just the xml use
        //$this->output->xml();
        //to output as json use
        //$this->output->json();
        //parse Layout Demo;
        //$sidebar    = $this->output->layout( "index_sidebar" );
        $dashboard = $this->output->layout("index");
        // $sideroll   = $this->output->layout( "dashroll"  );
        //The default installation box;
        $this->output->addToPosition("left", $sidebar);
        $this->output->addToPosition("right", $sideroll);
        $this->output->addToPosition("body", $dashboard);
    }

    final static function getInstance() {

        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
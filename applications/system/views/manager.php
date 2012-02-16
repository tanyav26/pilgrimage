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
class Manager extends Platform\View {

    public function lists() {

        //To set the pate title use
        $this->output->setPageTitle("Administrator | Tasks & To-Do lists");

        $dashboard = $this->output->layout("manager/lists");


        $this->display($dashboard);
    }

    public function announcements() {

        //To set the pate title use
        $this->output->setPageTitle("Administrator | Extension Repositories");

        $dashboard = $this->output->layout("manager/announcements");


        $this->display($dashboard);
    }

    public function information() {

        //To set the pate title use
        $this->output->setPageTitle("Administrator | System information");

        $dashboard = $this->output->layout("manager/info");


        $this->display($dashboard);
    }

    public function queue() {

        //To set the pate title use
        $this->output->setPageTitle("Administrator | Moderation Queue");

        $dashboard = $this->output->layout("manager/moderation");


        $this->display($dashboard);
    }

    public function activity() {

        //To set the pate title use
        $this->output->setPageTitle("Administrator | Activity Log");

        $dashboard = $this->output->layout("manager/log");


        $this->display($dashboard);
    }

    public function display($panel = "") {

        return $this->output->addToPosition("admin:panel", $panel);
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
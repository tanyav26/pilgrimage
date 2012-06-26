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
class Network extends Platform\View {

    public function addNetworkMember() {

        $this->output->setPageTitle(_("Administrator | Add Network Member"));


        $panel = $this->output->layout('network/add');


        return $this->display($panel);
    }

    public function listNetworkMembers() {

        $this->output->setPageTitle(_("Network Members"));


        $panel = $this->output->layout('network/lists');


        return $this->display($panel);
    }

    public function analytics() {

        $this->output->setPageTitle(_("Network Analytics"));


        $panel = $this->output->layout('network/analytics');


        return $this->display($panel);
    }

    public function accessControl() {

        //1. The page Title
        $this->output->setPageTitle(_("Access control settings"));

        //2. Load Model
        $model = $this->load->model("authority");

        //3. Get the authorities list
        $authorities = $model->getAuthorities();

        //4. Set Properties
        $this->set("authorities", $authorities);

        //5. The layout
        $panel = $this->output->layout('network/permissions');


        //6. Display
        return $this->display($panel);
    }

    public function relationships() {

        $this->output->setPageTitle(_("Network Graph"));


        $panel = $this->output->layout('network/relationships');


        return $this->display($panel);
    }

    public function display($panel = "") {

        return $this->output->addToPosition("body", $panel);
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
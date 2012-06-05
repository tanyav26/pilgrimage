<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * navigator.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/navigator
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Platform;

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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/navigator
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Navigator extends Model {

    /**
     * The current state or possition in the system
     * @var static $state 
     */
    static $state;

    /**
     * The current total in a navigable record set
     * @var static total
     */
    static $total;

    /**
     * The current state of the pages menu
     * @var static pagination
     */
    static $pagination;

    /**
     * Instantiate the cnavigator
     * 
     * @return object
     */
    public static function getInstance() {

        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

    /**
     * Automatically generates a menu, based on the page
     * 
     * @return type 
     */
    public static function menu($uniqueId = "mainmenu") {

        $self = static::getInstance();

        //1. Get all menu items for this menu id from the table
        $statement = $self->database->select("m.*")->from("?menu m")->join("?menu_group g", "m.menu_group_id=g.menu_group_id", "LEFT")->where("g.menu_group_uid=", $self->database->quote($uniqueId, false))->orderBy("m.lft", "ASC")->prepare();
        $results = $statement->execute();

        $nodes = array();
        $right = array();


        while($menu = $results->fetchArray()) {
            //while($authority = $results->fetchAssoc()){
            $menu['children'] = array();
            $menu['indent'] = 0;

            //Now indent
            if (sizeof($right) > 0) {
                $lastrgt = end($right);
                $largestrgt = max($right);

                if ($menu['rgt'] > $lastrgt) {
                    array_pop($right);
                }
                if ($menu['rgt'] > $largestrgt) {
                    $right = array();
                }
            }
            $menu['indent'] = sizeof($right);
            $right[]        = $menu['rgt'];

            $parent         = $menu['menu_parent_id'];
            $id             = $menu['menu_id'];

            if (array_key_exists($parent, $nodes)) {
                $nodes[$parent]["children"][$id] = $menu;
            } else {
                $nodes[$id] = $menu;
            }
        }
        return $nodes;
    }

    public static function sitemap() {
        //@TODO: Renders a site map for the website;
        return self::display();
    }

    public static function link() {
        //@TODO: Renders a navigational link
        return self::display();
    }

    public static function pathway() {
        //@TODO: Renders the pathway or current location of the site

        return self::display();
    }

    /**
     * a.k.a pagination
     * 
     * @return type 
     */
    public static function pages() {
        //@TODO: Calculates the pages from a recordset or an array of results
        //Get the current page state from the request;
        $limit = self::getState();
        $start = self::getState();

        // In case limit has been changed, adjust it
        self::setState('limit', $limit);
        self::setState('limitstart', $limitstart);


        return self::display();
    }

    public function display() {
        //@TODO: Renders the display data, as per other models
    }

    /**
     * 
     * Generic method to add, a page to the navigation
     * Generic method to add, an item at the end or start of the pathway
     * 
     * e.g Navigator::add( array("type"=>"menu" , "uid"=>"mainmenu" , "label"=>"Main Menu", "link"=>array() ) )
     * 
     */
    public static function add() {
        
    }

    private static function getState() {
        
    }

    private static function setState() {
        
    }

}


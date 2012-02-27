<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * loop.php
 *
 * Requires PHP version 5.3
 *
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/layout
 * @since      Class available since Release 1.0.0 Feb 5, 2012 10:15:29 PM
 *
 */

namespace Library\Output\Parse\Template;

use Library;
use Library\Output;
use Library\Output\Parse;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Libraries
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/layout
 * @since      Class available since Release 1.0.0 Feb 5, 2012 10:15:29 PM
 */
class Menu extends Parse\Template {
    /*
     * @var object
     */

    static $instance;

    /**
     * Execute the layout
     * 
     * @param type $parser
     * @param type $tag
     * @return type
     */
    public static function execute($parser, $tag, $writer) {

        //We must have the menu id
        if (!isset($tag['ID']))
            return null;

        $database = Library\Database::getInstance();
        $uniqueId = $tag['ID'];

        //1. Get all menu items for this menu id from the table
        $menuItems = \Platform\Navigator::menu($uniqueId);
   
        if(empty($menuItems)) return null;

        //print_R($menuItems);
        unset($tag['NAMESPACE']);
        
        $tag['ELEMENT'] = 'ul';
        $tag['CLASS'] = 'nav';
        $tag['CHILDREN'] = static::element( (array)$menuItems );
        
        //print_R($tag);
     
        //Always return the modified element
        return $tag;
    }
    
    /**
     * Create element
     * 
     * @param type $menuItems
     * @return type 
     */
    private static function element( $menuItems ) {
        
        $li = array();
        
        foreach ($menuItems as $item) {

            //link
           
            $link = array(
                "ELEMENT" => 'li',
                "CLASS"=> (isset($item['menu_classes'])&&!empty($item['menu_classes'])) ?  $item['menu_classes'] : "link",
                "CHILDREN" => array(
                    array(
                        "ELEMENT" => "a",                          
                        "HREF" => static::$document->link( $item['menu_url']),
                        "CDATA" => $item['menu_title']
                    )
                )
            );      
            
            //@TODO build a tag
            $id     = $item['menu_id'];
            $parent = $item['menu_parent_id'];
            
            //Count children
            if(isset($item['children']) && count($item['children'])>0){
                $link['CHILDREN'][] = array(
                    "ELEMENT"   =>'ul',
                    "CLASS"     =>'slidedown-menu',
                    "CHILDREN"  =>static::element( $item['children'] )
                ); 
            }
            
            $li[] = $link;
        }
        return $li;
    }

    /**
     * Returns and instantiated Instance of the layout class
     *
     * NOTE: As of PHP5.3 it is vital that you include constructors in your class
     * especially if they are defined under a namespace. A method with the same
     * name as the class is no longer considered to be its constructor
     *
     * @staticvar object $instance
     * @property-read object $instance To determine if class was previously instantiated
     * @property-write object $instance
     * @return object layout
     */
    public static function getInstance() {

        if (is_object(static::$instance) && is_a(static::$instance, 'Menu'))
            return static::$instance;

        static::$instance = new self();

        return static::$instance;
    }

}


<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * layout.php
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
class Import extends Parse\Template {
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
        
        //print_R(static::$layouts);
        //If there is a name we will save this layout to static::$layouts
        $loader     = \Platform\Shared::loader();

        $document   = static::$document;
        $path       = isset($tag['LAYOUT']) ? $tag['LAYOUT'] : null;
        $layout     = $loader->layout($path, null, ".tpl", FALSE);
        
        //Save the layout
        if (!empty($layout) && !isset(static::$imports[$layout])): //Unique layout names
            //static::$imports[$href] = $tag;
            //$path = str_replace(array('/','\\'), DS , $path);
            //$layout = FSPATH . 'public' . DS . $document->template . DS . $path;
            
           
            if(file_exists($layout)):
                //TODO@ file get contents might not be the best method here 
                //to import and parse the file
                $contents = file_get_contents( $layout );
                $layout   = self::_($contents, $document ); //read only
                //@TODO for lack of a better way to remove the XML declaration 
                static::$imports[$path] = $layout = str_replace('<?xml version="1.0" encoding="UTF-8"?>', "" , $layout);
                
                //print_R($layout);
                $writer->writeRaw( $layout );
                //print_R(static::$document );
            endif;
            
        //So we import only ounce
        elseif(isset(static::$imports[$path])):
            $writer->writeRaw( static::$imports[$path] );
        endif;

        //Always return the modified element
        return null;
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

        if (is_object(static::$instance) && is_a(static::$instance, 'Import'))
            return static::$instance;

        static::$instance = new self();

        return static::$instance;
    }

}


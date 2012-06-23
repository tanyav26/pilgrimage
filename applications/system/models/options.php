<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * options.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */
namespace Application\System\Models;

use Platform;
use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Model
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/controller
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Options extends Platform\Model {

    /**
     * Default display method for every model 
     */
    public function display(){ return false; }
    
    
    /**
     * Saves options to the database, inserting if none exists or updating on duplicate key
     * 
     * @param type $options
     * @param type $group
     * @return boolean
     */
    public function save( $options , $group = null ){    
        
        if(!is_array($options)||empty($options)){
            $this->setError( "No options passed to be saved");
            return false;
        }
        //Inser the data if not exists, or update if it does exists;
        $table      = $this->load->table( "?options" );      
        $shortgun   = "REPLACE INTO ?options (`option_group_id`,`option_name`,`option_value`)\t";
        //$this->database->startTransaction();
        $values     = array();
        foreach($options as $option=>$value):
            
            $binder     = "( ".$this->database->quote($group).",".$this->database->quote($option).",".$this->database->quote($value).")";
            $values[]   = $binder;
            
            //$table->insert($binder, T);
        endforeach;
        $primaryKey  = $table->keys();
        $shortgunval = implode(',',$values);
        $shortgun   .= "VALUES\t".$shortgunval;
        //$shortgun   .= "\tON DUPLICATE KEY UPDATE ".$primaryKey->Field."=VALUES(`option_group_id`)+VALUES(`option_name`)+VALUES(`option_value`)";

        
        //echo $shortgun; die;
        
        //Run the query directly
        if(!$this->database->exec($shortgun)){
            $this->setError( $this->database->getError() );
            return false;
        }
        return true;
    }
    

    /**
     * Get's an instance of the activity model
     * 
     * @staticvar self $instance
     * @return \Application\System\Models\self 
     */
    public static function getInstance() {

        static $instance;

        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self;

        return $instance;
    }
}



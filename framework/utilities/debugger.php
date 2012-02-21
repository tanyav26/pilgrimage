<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * debugger.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Utiltities
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/graph
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 *
 */

namespace Platform ;

use Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Utitlities
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/debugger
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Debugger extends \Library\Log{

    static $time;

    static $memory;

    public function getCallStackDump(){}


    public static function getInstance(){
        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

    /**
     * Records the debugger and system start time
     *
     * @return void
     */
    public static function start(){
        
        static::$time   = microtime( true );
        static::$memory = memory_get_usage( true );
	
        self::log(  static::$time , _("Start execution time") , "notice" );       
    }

    /**
     * Records the debugger stop and stystem stop time
     * Ideally the last method to be called before the output is sent to the server
     *
     * @return void
     */
    public static function stop(){

        //Get usage data
        $now    = microtime( true );
        $speed  = number_format(1000*($now-static::$time), 2);
        $_memory= memory_get_usage( );
        $units  = array('Bytes','KB','MB','GB','TB','PB');
        $memory = @round($_memory/pow(1024,($i=floor(log($_memory,1024)))),2).' '.$units[$i];

        //Get Query usage
        $database = \Library\Database::getInstance();
        $queries  = $database->getTotalQueryCount();

        //Set the debugger output
        $output = \Library\Output::getInstance();
        $output->set("debug", array("start"=>static::$time ) );
        $output->set("debug", array("stop"=>$now ) );
        $output->set("debug", array("speed"=>$speed ) );
        $output->set("debug", array("memory"=> $memory ) );
        $output->set("debug", array("queries"=>$queries ) );
        $output->set("debug", array("log"=>static::$log ) );

        //Library\Date::difference($now, $speed);
        //print_R(static::getInstance());

        //Log usage
        self::log( $now , _("Stop execution time") , "notice"  );
    }

    public function __construct(){}

    public function __desstruct(){}
}
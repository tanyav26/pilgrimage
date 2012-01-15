<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * error.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/error
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/error
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Error extends \Library\Object {
    
    
    const APPLICATION_ERROR = 9033;

    const PLATFORM_ERROR = 9032;

    const LIBRARY_ERROR = 9031;

    /**
     * Raises an error
     * 
     * @param type $errorCode
     * @param type $errorMsg 
     */
    final static function raise($errorCode, $errorMsg) {
        
    }

    /**
     * Log's an Error, usually notices and warnings to file,
     *
     * @param type $errNo
     * @param type $errMsg
     * @param type $file
     * @param type $line 
     */
    final static function log($errNo, $errMsg, $file, $line) {
        
    }

    final static function shutdown() {

        $shutdownable = array(E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR);
        $latest = error_get_last();

        if (in_array($latest['type'], $shutdownable)) {
            // fatal error
            self::handler(E_ERROR, $latest['message'], $latest['file'], $latest['line']);
        }
    }

    /**
     * Displays an Error to the front user
     * 
     * @param type $errNo
     * @param type $errMsg
     * @param type $file
     * @param type $line
     * @return type 
     */
    final static function handler($errNo, $errMsg, $file, $line, $trace = array()) {

        if (!($errNo && error_reporting())) {
            return;
        }

        //Dump the buffer, and halt dispatcher ***or maybe not yet!!;
        //$printed = $output->restartBuffer();
        //print_r($printed);
        //Error Types;
        $errType = array(
            1 => "Php Error", //Stop the dispatcher! Immediately! At any stage in which its found!!
            2 => "Php Warning",
            4 => "Parsing Error", //Stop 
            8 => "Php Notice",
            16 => "Core Error", //Stop
            32 => "Core Warning",
            64 => "Compile Error", //Stop 
            128 => "Compile Warning",
            256 => "Php User Error", //Stop 
            512 => "Php User Warning",
            1024 => "Php User Notice",
            //2048 => "Php Strict Error",//**ignore**
            9031 => "Library Error", //Stop
            9032 => "Platform Error", //Stop
            9033 => "Application Error", //Stop
        );
        $info = array();

        if (!array_key_exists($errNo, $errType))
            return false;

        if (($errNo & E_USER_ERROR) && is_array($arr = @unserialize($errMsg))) {
            foreach ($arr as $k => $v) {
                $info[$k] = $v;
            }
        }
        $trace = array();

        //@TODO use magic methods for this instead
        if (function_exists('debug_backtrace')) {
            $trace = debug_backtrace();
            array_shift($trace);
        }

        $output = \Library\Output::getInstance();

        //Restart the buffer
        //$printed  = $output->restartBuffer();

        $load = Loader::getInstance();
        //$error      = $load->view( "error" , "system" );
        //Determine the error display level, and whether to show
        //a. Page not found to Guest User; in "Production Mode"
        //a.1 If production mode with "debug" on, 
        //-> log the additional error details to log file
        //-> NEVER! show the debug console in production mode
        //b. System Error to Known User in "Test Mode"
        //b.1 If production mode with "debug" on, 
        //-> log the additional error details, 
        //-> show the debug console at the end of the page
        //-> show the error/warning in debug console
        //c. System Error with greater detail (backtrace) to 'Known', Skilled User; in "Developer Mode";
        //c.1 If in developer mode with "debug" on
        //-> log the additional error details
        //-> show the dbug console at the end of the page
        //-> show all errors even warnings and notices
        //$error->set( "errorMsg" , $errMsg );
        //$error->set( "errorType", $errType );
        //$error->set( "errorFile", $file );
        //$error->Set( "errorLine", $file );
        //print_R( $errMsg );
        //Add to content position;
        //$output->addToPosition("do:console");
        //Display a parsed error;
        //$output->displayError();

        $log = "<span class='log-code e$errNo'>{$errType[$errNo]}</span><span style='display:inline; padding-left: 5px'> $errMsg ({$errNo})</span>\t\tOn line <b><a href=\"#\">$line</a></b> of file <span style='display:inline'>$file</span>";

        //echo $log; 

        Debugger::log($log);

        $shutdownable = array(1, 4, 16, 64, 256, 9031, 9032, 9033);

        //shutdown and display error;
        if (in_array($errNo, $shutdownable)) {
            return $output->displayError();
        }
    }

    /**
     * Handles a cauth Exception
     * 
     * @param type $exception 
     */
    final static function exception($exception) {

        // print_R( $exception );
        //@TODO Determine Gravity of the Error?
        //All exceptions are E_USER_ERRORs,
        //Call handler

        $errNo = (is_a($exception, '\Library\Exception')) ? self::LIBRARY_ERROR : (is_a($exception, '\Platform\Exception')) ? self::PLATFORM_ERROR : self::APPLICATION_ERROR ;
        $line = $exception->getLine();
        $errMsg = $exception->getMessage();
        $file = $exception->getFile();
        $trace = $exception->getTrace();

        return self::handler($errNo, $errMsg, $file, $line, $trace);
    }
}


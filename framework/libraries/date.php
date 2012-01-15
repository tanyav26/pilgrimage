<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * date.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU/GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/date
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

namespace Library;

/**
 * What is the purpose of this class, in one sentence?
 *
 * How does this class achieve the desired purpose?
 *
 * @category   Library
 * @author     Livingstone Fultang <livingstone.fultang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/date
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
class Date extends Object {
    /*
     * @var string
     */

    protected static $timestamp;

    /**
     * Returns todays date timestamp
     * 
     * @return string
     */
    public static function today() {
        
    }

    /**
     * Returns yesterdays date
     * 
     * @return string
     */
    public static function yesterday() {
        
    }

    /**
     * Translated from string to date
     * 
     * @param string $timestring
     * @return string A well formated date 
     */
    public static function translate($timestring) {
        //toggles between a valid timestamp and a string
        //attempts to create a timestamp from a string
        return strtotime($timestring);
    }

    /**
     * Get time difference between 2 times
     * 
     * @param string $time
     * @param string $now
     * @param array $options
     * @return string 
     */
    public static function difference($time, $now = NULL, $options=array()) {
        //calculates the difference between two times
        //could be a string, or language
        //default now is NULL
        //Solve the 4 decades issue
        if (date('Y-m-d H:i:s', $time) == "0000-00-00 00:00:00" || empty($time)) {
            return _('Never');
        }

        $defOptions = array(
            'to' => 0,
            'parts' => 1,
            'precision' => 'sec',
            'distance' => true,
            'separator' => ', '
        );
        $opt = array_merge($defOptions, $opt);
        
        (!$opt['to']) && ($opt['to'] = time());
        $str = '';
        $diff = ($opt['to'] > $time) ? $opt['to'] - $time : $time - $opt['to'];
        $periods = array(
            'decade' => 315569260,
            'year' => 31556926,
            'month' => 2629744,
            'week' => 604800,
            'day' => 86400,
            'hour' => 3600,
            'min' => 60,
            'sec' => 1);

        if ($opt['precision'] != 'second') {
            $diff = round(($diff / $periods[$opt['precision']])) * $periods[$opt['precision']];
        }
        (0 == $diff) && ($str = 'less than 1 ' . $opt['precision']);
        foreach ($periods as $label => $value) {
            (($x = floor($diff / $value)) && $opt['parts']--) && $str .= ( $str ? $opt['separator'] :
                            '') . ($x . ' ' . $label . ($x > 1 ? 's' : ''));
            if ($opt['parts'] == 0 || $label == $opt['precision']) {
                break;
            }
            $diff -= $x * $value;
        }
        $opt['distance'] && $str .= ( $str && $opt['to'] > $time) ? ' ago' : ' ago'; //($str && $opt['to'] > $time) ? ' ago' : ' away';

        return $str;
    }

    /**
     * Returns the timestamp for the current date
     * 
     * @return string
     */
    public static function getTime() {
        //returns the timestamp for the current date
    }

    /**
     * Get's an instance of the Date time object
     * 
     * @staticvar self $instance
     * @return self 
     */
    public static function getInstance() {

        static $instance;
        //If the class was already instantiated, just return it
        if (isset($instance))
            return $instance;

        $instance = new self();

        return $instance;
    }

}
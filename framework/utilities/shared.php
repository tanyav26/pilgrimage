<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * shared.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/shared
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/shared
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 */
final class Shared {


    /**
     * Loads a config by groupname
     * 
     * @staticvar array $objects
     * @param type $groupname
     * @return type 
     */
    public static function config($groupname) {

        static $objects = array();

        //2. Search in apps/<appname>/config/*
        //1. search in apps/config/*

        if (!isset($objects[$groupname])) {
            $config = static::getConfig();

            if (!isset($config[$groupname])) {
                return FALSE;
            }
            $objects[$groupname] = $config[$groupname];
        }

        return $objects[$groupname];
    }

    public static function getConfig() {

        static $configarray;

        if (!isset($configarray)) {
            if (!file_exists(FSPATH . 'config/config' . EXT)) {
                exit('The configuration file config' . EXT . ' does not exist.');
            }

            require(FSPATH . 'config/config' . EXT );


            $configs = \Library\Folder::itemizeFind("config.php", APPPATH, 0, TRUE, 1);

            //print_R($routers);
            foreach ($configs as $i => $configFile) {
                if (!\Library\Folder::is($configFile)) {
                    //include the individual app routes
                    @include rtrim($configFile, DS);
                }
            }

            if (!isset($config) OR !is_array($config)) {
                exit('Your config file does not appear to be formatted correctly.');
            }

            $configarray = & $config;
        }
        return $configarray;
    }

    public static function loader() {

        return \Platform\Loader::getInstance();
    }



    public static function load() {

        static $objects = array();

        //If the class was already instantiated, just return it
        if (isset($objects[$class])) {
            return $objects[$class];
        }

        //2. Search in apps/<appname>/libs/*
        //1. search in apps/libs/*
        if (file_exists(FSPATH . 'libs' . DS . 'do' . DS . strtolower($class) . EXT)) {
            require_once( FSPATH . 'libs' . DS . 'do' . DS . strtolower($class) . EXT );
        }

        //If we want to instantiate then run
        if ($run && class_exists($class)) {

            $objects[$class] = run($class::getInstance());
        } else {

            $objects[$class] = FALSE; //boolean
            //Throw exception
        }

        return $objects[$class];
    }

    /**
     * @TODO Runs a class
     * 
     * @param type $class
     * @return type 
     */
    public static function run($class) {
        return $class;
    }

    /**
     *
     * @param type $url
     * @return type 
     */
    public static function pointer($url) {
        return Library\Uri::internal($url);
    }

}

<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * version.php
 *
 * Requires PHP version 5.3
 *
 * LICENSE: This source file is subject to version 3.01 of the GNU GPL License 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/gpl.txt  If you did not receive a copy of
 * the GNU/GPL License and are unable to obtain it through the web, please
 * send a note to support@stonyhillshq.com so we can mail you a copy immediately.
 *
 * @category   Libraries
 * @package    Library
 * @author     Livingstone Fultang <livingstone.futlang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/version
 * @since      Class available since Release 1.0.0
 * 
 */

namespace Platform;

use Library;

/**
 * Handles versioning
 *
 * The version class is preferabbly used as static. Methods include those for
 * returning the system version number in either long or short formats. 
 * The long format will return information about the current build number, release
 * date, status, codename, and license information.  
 * The Short format returns just the system version number in conventational formats
 * And should be used when comparing system version.
 *
 * @category   Utility
 * @author     Livingstone Fultang <livingstone.futlang@stonyhillshq.com>
 * @copyright  1997-2012 Stonyhills HQ
 * @license    http://www.gnu.org/licenses/gpl.txt.  GNU GPL License 3.01
 * @version    Release: 1.0.0
 * @link       http://stonyhillshq/documents/index/carbon4/libraries/version
 * @since      Class available since Release 1.0.0
 */
class Version extends \Library\Object  {

    /**
     *  *  * @var string Product */
    static $PRODUCT = 'Pilgrimage';
    /**
     *  *  * @var int Main Release Level */
    static $RELEASE = '1.0';
    /**
     *  *  * @var string Development Status */
    static $DEV_STATUS = 'a2';
    /**
     *  *  * @var int Sub Release Level */
    static $DEV_LEVEL = '0';
    /**
     *  *  * @var int build Number */
    static $BUILD = '0';
    /**
     *  *  * @var string Codename */
    static $CODENAME = 'Zanya';
    /**
     *  *  * @var string Date */
    static $RELDATE = '27-July-2011';
    /**
     *  *  * @var string Time */
    static $RELTIME = '00:00';
    /**
     *  *  * @var string Revision */
    static $REVISION = '';
    /**
     *  *  * @var string Timezone */
    static $RELTZ = 'GMT';
    /**
     *  *  * @var string Copyright Text */
    static $COPYRIGHT = 'Copyright (C) 2011 StonyhillsHQ LLC. All rights reserved.';
    /**
     *  *  * @var string URL */
    static $URL = '';
    /**
     *  *  * @var string Email to bug tracker */
    static $DEV_BUG = 'bugs@stonyhillshq.com';

    /**
     *
     *
     * @return string Long format version
     */
    public static function getLongVersion() {
        $product    = static::$PRODUCT;
        $reslease   = static::$RELEASE;
        $return     = static::$PRODUCT . ' ' . static::$RELEASE . '.' . static::$DEV_LEVEL . ' ' . static::$DEV_STATUS .' build ' . static::$BUILD . ' [ ' . static::$CODENAME . ' ] ' . static::$RELDATE . ' ' . static::$RELTIME . ' ' . static::$RELTZ;
        
    }

    /**
     *
     *
     * @return string Short version format
     */
    public static function getShortVersion() {
        return static::$RELEASE . '.' . static::$DEV_LEVEL . '.' . static::$DEV_STATUS;
    }

    /**
     * @return string Short version format
     * 
     * 
     */
    public static function getShortVersionBuild() {
        return static::$RELEASE . '.' . static::$DEV_LEVEL . '.' . static::$BUILD;
    }

    /**
     * Compares two "A PHP standardized" version number against the current Joomla! version
     * @return boolean
     * @see http://www.php.net/version_compare
     */
    public static function isCompatible($minimum) {
        $current = static::getShortVersion();

        return (version_compare($current, $minimum, 'eq') == 1);
    }

    /**
     * TuiyoVersion::isOutDated()
     * Checks if the current version of Tuiyo is out of date
     * @param mixed $latest
     * @return
     */
    public static function isOutDated($latest) {
        $current = static::getShortVersion();

        return (version_compare($current, $latest, '<') == 1);
    }

    /**
     * Gets an instance of the version class
     * 
     * @staticvar self $instance
     * @return self 
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
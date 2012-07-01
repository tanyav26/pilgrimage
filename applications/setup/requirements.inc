<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * config.php
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
 * @link       http://stonyhillshq/documents/index/carbon4/utilities/application
 * @since      Class available since Release 1.0.0 Jan 14, 2012 4:54:37 PM
 * 
 */

$requirements = array(
    "modules" => array(
        "gd" => array(
            "title" => _('Image Manipultation'),
            "installed" => true,
            "loaded" => true
        ),
        "mcrypt" => array(
            "title" => _('Cryptography Handling'),
            "installed" => true,
            "loaded" => true
        ),
        "gettext" => array(
            "title" => _('Localization'),
            "installed" => true,
            "loaded" => true
        ),
        "tokenizer" => array(
            "title" => _('Rokenizer'),
            "installed" => true,
            "loaded" => true
        ),    
        "pcre" => array(
            "title" => _('Perl Compatible RegEx'),
            "installed" => true,
            "loaded" => true
        ),
        "json" => array(
            "title" => _('javaScript Object Notation'),
            "installed" => true,
            "loaded" => true
        ),
        "iconv" => array(
            "title" => _('IconV Character-Set Conversion'),
            "installed" => true,
            "loaded" => true
        ),
        "imap" => array(
            "title" => _('IMAP extension'),
            "installed" => true,
            "loaded" => true
        ),
        "mbstring" => array(
            "title" => _('Multibyte Strings'),
            "installed" => true,
            "loaded" => true
        ),
        "ctype" => array(
            "title" => _('Character-Type checking'),
            "installed" => true,
            "loaded" => true
        ),
        "libxml" => array(
            "title" => _('XML Manipulation'),
            "installed" => true,
            "loaded" => true
        ),
        "mysqli" => array(
            "title" => _('Database Management with MySQLi'),
            "installed" => true,
            "loaded" => true,
            "alternate" => array(
                "mysql" => array(
                    "installed" => true,
                    "loaded" => true,
                    "title" => _('MySQL Library'),
                    "alternate" => array(
                        "sqlite3" => array(
                            "title" => _('sQLite3 Library'),
                            "installed" => true,
                            "loaded"    => true,
                          //"terminal"  => true || If we get tot his stage, then the error is terminal
                      )
                   )
                )
            )
        ),
    ),
    "directives" => array(
        "safe_mode" => array(
            "status" => false,
            "terminal" => true,
        ),
        "display_errors" => array(
            "status" => false,
            "terminal" => false,
        ),
        "magic_quotes_sybase" => array(
            "status" => false,
            "terminal" => true,
        ),
        "session.auto_start" => array(
            "status" => false,
            "terminal" => false,
        ),
        "register_globals" => array(
            "status" => false,
            "terminal" => true,
        ),
        "file_uploads" => array(
            "status" => true,
            "terminal" => true,
        )
    ),
    "server" => array(
        "PHP" => array(
            "version" => "5.3.0",
            "minimal" => ">=",
            "terminal" => true,
            "current" => PHP_VERSION
        )
    ),
    "directories" => array(
        "config" => array(
            "title" => "Configuration folder",
            "writable" => true,
            "path" => FSPATH."config",
            "terminal" => true,
        ),
        "session" => array(
            "title" => "Sessions folder",
            "writable" => true,
            "path" => APPPATH."setup".DS.'sessions',
            "terminal" => true,
        )
    )
);
<?php

$config["install"]["requirements"] = array(
    "modules" => array(
        "gd" => array(
            "title" => _('Image Manipultation'),
            "installed" => true,
            "loaded" => true
        ),
        "mcrypt" => array(
            "title" => _('Encryption Handling'),
            "installed" => true,
            "loaded" => true
        ),
        "gettext" => array(
            "title" => _('Localization'),
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
                          //"terminal"  => true
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
    )
);
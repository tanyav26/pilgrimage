<?php


$route["action"]["install"] = array(
    "path" => '/install/:method/',
    "application" =>'install',
    "controller" => 'installation',
    "dynamic" => array(
        ":method" => ':method'
    )
);
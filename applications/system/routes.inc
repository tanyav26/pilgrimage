<?php

//Subroutes must have the same id as the first segment 
$route["action"]["execute"] = array(
    "path" => '/execute/:method/',
    "application" => 'system',
    "controller" => 'commands',
    "dynamic" => array(
        ":method" => ':method'
    )
);

$route["dashboard"] = array(
    "path" => '/dashboard/',
    "application" => 'system',
    "controller" => 'start',
    "method" => 'dashboard'
);

$route["search"] = array(
    "path" => '/search/',
    "application" => 'system',
    "controller" => 'commands',
    "method" => 'search'
);

<?php

//Subroutes must have the same id as the static first segment

$route["action"]["profile"] = array(
    "path" => '/profile/:method/',
    "application" =>'member',
    "controller" => 'profile',
    "dynamic" => array(
        ":method" => ':method'
    )
);

$route["profile"] = array(
    "path" => '/profile/',
    "application" => 'member',
    "controller" => 'profile',
    "method" => 'view'
);

$route["signin"] = array(
    "path" => '/sign-in/',
    "application" => 'member',
    "controller" => 'session',
    "method" => 'start'
);

$route["signout"] = array(
    "path" => '/sign-out/',
    "application" => 'member',
    "controller" => 'session',
    "method" => 'stop'
);


$route["signup"] = array(
    "path" => '/sign-up/',
    "application" => 'member',
    "controller" => 'account',
    "method" => 'create'
);

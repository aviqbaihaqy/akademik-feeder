<?php

return [

    'defaultController' => 'Dashboard',

    // Just put null value if you has enable .htaccess file
    'indexFile' => null,

    'module' => [
        'path' => APP,
        'domainMapping' => [],
    ],

    'vendor' => [
        'path' => GEAR.'vendors/'
    ],

    /*'alias' => [
    'controller' => [
    'class' => 'Home',
    'method' => 'index'
    ),
    'method' => 'alias'
    ),*/

    'alias' => [
        'controller' => [
            // 'class' => 'Pux',
            'class' => 'Alias',
            'method' => 'index',
        ],
    ],
];

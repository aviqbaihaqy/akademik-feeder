<?php

return array(

    'default' => array(
        'driver' => 'mysqli',
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'database' => 'feeder_ti',
        'tablePrefix' => '',
        'charset' => 'utf8',
        'collate' => 'utf8_general_ci',
        'persistent' => true,
    ),
    'test' => array(
        'driver' => 'mysqli',
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'database' => 'test',
        'tablePrefix' => '',
        'charset' => 'utf8',
        'collate' => 'utf8_general_ci',
        'persistent' => true,
    ),
    'test_remote' => array(
        'driver' => 'mysqli',
        'host' => '192.168.1.113',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'database' => 'test',
        'tablePrefix' => '',
        'charset' => 'utf8',
        'collate' => 'utf8_general_ci',
        'persistent' => true,
    ),

);

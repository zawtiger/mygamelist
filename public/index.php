<?php

//Error Reporting
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('error_log', '../logs/error.log');
ini_set('log_errors', 'On');      // log to file (yes)
ini_set('display_errors', 'Off'); // log to screen (no)

//Session can conveniently start with every page
session_start();

require __DIR__ . '/vendor/autoload.php';

//Autoload classes using the Standard PHP Library function for classes, controllers, views, and model
spl_autoload_register(function($class) {
    include '../classes/' . $class . '.php';
});

spl_autoload_register(function($class) {
    include '../Controllers/' . $class . '.php';
});

spl_autoload_register(function($class) {
    include '../Views/' . $class . '.php';
});

spl_autoload_register(function($class) {
    include '../Model/' . $class . '.php';
});

spl_autoload_register(function($class) {
    include '../Ajax/' . $class . '.php';
});

//Include routes
require_once('Routes.php');

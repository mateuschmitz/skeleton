<?php

define('DS', DIRECTORY_SEPARATOR);
define('CONFIG_PATH', 'app' . DS . 'Site' . DS . 'config');

//change directory
chdir(dirname(__DIR__));

require('vendor' . DS . 'autoload.php');

//start application
Site\Controller\FrontController::startAppAction();
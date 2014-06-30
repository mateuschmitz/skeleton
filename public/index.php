<?php

//change directory
chdir(dirname(__DIR__));

require('bootstrap.php');
require('vendor' . DS . 'autoload.php');

//start application
Site\Controller\FrontController::startAppAction();
<?php

/**
 * @author  Mateus Schmitz <matteuschmitz@gmail.com>
 * @license undefined
 */

//change directory
chdir(dirname(__DIR__));

require('bootstrap.php');
require('vendor' . DS . 'autoload.php');

//start application
// App\Controller\FrontController::startAppAction();
M2S\Application\Application::startApplication();
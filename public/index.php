<?php

/**
 * @author  Mateus Schmitz <matteuschmitz@gmail.com>
 * @license undefined
 */

//altera o diretório relativo
chdir(dirname(__DIR__));

require('bootstrap.php');
$loader = require('vendor' . DS . 'autoload.php');
$loader->add('M2S\\', 'lib/src/');
// $loader->register();

//start application
// App\Controller\FrontController::startAppAction();
// M2S\Application\Application::startApplication();
echo "<pre>" . print_r($loader, 1);
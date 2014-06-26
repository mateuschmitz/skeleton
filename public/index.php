<?php

//change directory
chdir(dirname(__DIR__));

require('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

//start application
Site\Controller\FrontController::indexAction();
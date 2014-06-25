<?php

chdir(dirname(__DIR__));

require('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

$return = require('_bootstrap.php');

$controller = ucfirst($return['module']) . '\Controller\FrontController';

$controller = new $controller;
$controller->indexAction();
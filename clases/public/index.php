<?php

require '../autoload.php';

$config=require('../config/config.php');
$route = Utils\Model\Router::Route($_SERVER['REQUEST_URI'], $config);

    
$dispatch = Utils\Model\Dispatch::run($route);
echo Utils\Model\Render::Render($route, $dispatch);











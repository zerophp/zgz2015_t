<?php


chdir('..');
define ('APPLICATION_PATH', getcwd());
require 'autoload.php';


$config = Utils\Model\Config::getConfig();
// echo "<pre>";
// print_r($config);
// echo "</pre>";
// die;
// $config 


$route = Utils\Model\Router::Route($_SERVER['REQUEST_URI'], $config);

    
$dispatch = Utils\Model\Dispatch::run($route, $config);
echo Utils\Model\View::RenderLayout($route, $dispatch);











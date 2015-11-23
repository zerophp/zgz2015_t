<?php

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

echo $_SERVER['REQUEST_URI'];



include('../modules/Utils/src/Utils/Model/Router.php');
$route = Router($_SERVER['REQUEST_URI']);

echo "<pre>route:";
print_r($route);
echo "</pre>";




include('../modules/'.
        ucfirst($route['module']).
        '/src/'.
        ucfirst($route['module']).
        '/Controller/'.
        ucfirst($route['controller']).'.php'
    );








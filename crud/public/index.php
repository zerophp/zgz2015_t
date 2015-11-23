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

die;

if(isset($_GET['controller']))
    $controller=$_GET['controller'];
    else
        $controller='user';

switch ($controller)
{
    case 'user':
        include('../modules/Application/src/Application/Controller/ControllerUser.php');
        break;
}

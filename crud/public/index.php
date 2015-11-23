<?php

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

echo $_SERVER['REQUEST_URI'];

$url = explode('/', $_SERVER['REQUEST_URI']);


$route = Router($url);

$route = array('controller'=>'',
                'action'=>''
                'params'=>array('p1'=>'v1','p2'=>'v2')
)

echo "<pre>";
print_r($url);
echo "</pre>";

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

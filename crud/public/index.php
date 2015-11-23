<?php
$config=require('../config/config.php');
include('../modules/Utils/src/Utils/Model/Router.php');

$route = Router($_SERVER['REQUEST_URI'], $config);

include('../modules/'.
        ucfirst($route['module']).
        '/src/'.
        ucfirst($route['module']).
        '/Controller/'.
        ucfirst($route['controller']).'.php'
    );








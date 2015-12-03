<?php
$config=require('../config/config.php');
include('../modules/Utils/src/Utils/Model/Router.php');

$route = Router($_SERVER['REQUEST_URI'], $config);


$s = curl_init();
curl_setopt($s,CURLOPT_URL,'http://clases.local');
curl_setopt($s,CURLOPT_HTTPHEADER,array('Accept:application/json'));
$head = curl_exec($s);
$httpCode = curl_getinfo($s, CURLINFO_HTTP_CODE);

echo "<pre>";
print_r($httpCode);
echo "</pre>";
die;
include('../modules/'.
        ucfirst($route['module']).
        '/src/'.
        ucfirst($route['module']).
        '/Controller/'.
        ucfirst($route['controller']).'.php'
    );








<?php

include ("../modules/Utils/src/Utils/View/RenderView.php");
switch($route['action'])
{
    case '_404':
        $content = RenderView($route, array());
    break;
}

include('../modules/Application/views/layout/error.phtml');


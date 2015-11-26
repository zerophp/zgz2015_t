<?php

function RenderView($route, $viewParams)
{
    ob_start();
        include('../modules/'.$route['module'].'/views/'.
                              $route['controller'].'/'.
                              $route['action'].'.phtml');
        $view = ob_get_contents();
    ob_end_clean();
    
    return $view;
}
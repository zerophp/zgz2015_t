<?php
/**
 * Form html form tag
 * @param string $accion
 * @param string $method[GET|POST]
 * @param boolean $withFile
 */

function FormTag($accion,  $method, $withFile){
    if ($method == GET)
        $method = "get";
    else
        $method = "post";
    if ($withFile == true){
        $html = "<form action =\"".$accion."\" "."method=\"".$method."\" "." enctype = \"multipart/form-data\">";
    }
    else
        $html = "<form action =\"".$accion."\" "."method=\"".$method."\">";
    
    return $html;
    
}
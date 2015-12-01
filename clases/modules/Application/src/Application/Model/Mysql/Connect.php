<?php

function Connect($config)
{
    $link =mysqli_connect($config['host'],
        $config['user'],
        $config['password']
        );
    
    
    
    
    mysqli_select_db($link, $config['database']);
    
    return $link;
}
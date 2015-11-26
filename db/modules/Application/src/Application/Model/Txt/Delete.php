<?php

function Delete($filename, $id)
{
    // Borar y saltar                   
    $users = file_get_contents($filename);
    $users = explode("\n", $users);
    unset($users[$id]);
    $users=implode("\n", $users);
    file_put_contents($filename, $users);
    
    return ;
}
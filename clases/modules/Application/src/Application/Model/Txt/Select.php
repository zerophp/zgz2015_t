<?php

function Select($filename)
{
    // Leer el archivo de texto en un string
    $users = file_get_contents($filename);
    
    // separar por saltos de linea en una array
    $users = explode("\n", $users);
    // recorrer el array de usuario
    
    foreach ($users as $key => $user)
    {
        $rows[] = explode("|", $user);
        $rows[$key]['name']=$user[6];
        $rows[$key]['iduser']=$key;
    }
    
    return $rows;
}

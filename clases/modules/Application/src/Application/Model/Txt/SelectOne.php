<?php

function SelectOne($filename, $id)
{
    // Leer el archivo de texto en un string
    $users = file_get_contents($filename);
    
    // separar por saltos de linea en una array
    $users = explode("\n", $users);
    // recorrer el array de usuario
    $user = explode("|", $users[$id]);
    $user['name']=$user[6];
    $user['iduser']=$id;
    
    return $user;
    
    
}

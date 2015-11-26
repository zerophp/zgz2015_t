<?php


function DeleteUser($config, $id)
{
    switch($config['adapter'])
    {
        case 'Mysql':
            include ("../modules/Application/src/Application/Model/Mysql/Connect.php");
            include ("../modules/Application/src/Application/Model/Mysql/Execute.php");
            
            $master = $config['dbmaster'];
            $slave = $config['dbslave'];
            
            $link = Connect($master);
            $query = "DELETE FROM user WHERE iduser='".$id."'";

            $data = Execute($query, $link);
           
        break;
            
        case 'Txt':
            include ("../modules/Application/src/Application/Model/Txt/Delete.php");
            $data=Delete($config['filename'], $id);
           
        break;
    }
    
    return $data;
}

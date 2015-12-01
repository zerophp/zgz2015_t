<?php


function GetUser($config, $id)
{
    switch($config['adapter'])
    {
        case 'Mysql':
            include ("../modules/Application/src/Application/Model/Mysql/Connect.php");
            include ("../modules/Application/src/Application/Model/Mysql/Select.php");
            
            $master = $config['dbmaster'];
            $slave = $config['dbslave'];
            
            $link = Connect($master);
            $query = "SELECT * FROM user WHERE iduser='".$id."'";

            $data = Select($query, $link);
            $data = $data[0];
        break;
            
        case 'Txt':
            include ("../modules/Application/src/Application/Model/Txt/SelectOne.php");
            $data=SelectOne($config['filename'], $id);
           
        break;
    }
    
    return $data;
}

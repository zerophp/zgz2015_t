<?php


function GetUsers($config)
{
    switch($config['adapter'])
    {
        case 'Mysql':
            include ("../modules/Application/src/Application/Model/Mysql/Connect.php");
            include ("../modules/Application/src/Application/Model/Mysql/Select.php");
            
            $master = $config['dbmaster'];
            $slave = $config['dbslave'];
            
            $link = Connect($master);
            
            
            $query = "SELECT * FROM user";
            $data = Select($query, $link);
        break;
            
        case 'Txt':
            include ("../modules/Application/src/Application/Model/Txt/Select.php");
            $data=Select($config['filename']);
        break;
    }
    
    return $data;
}

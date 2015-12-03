<?php
namespace Application\Mapper;

use Application\Resource\UserEntity;
use Application\Resource\UserCollection;

class UserMapper 
{
    public function GetUsers($options)
    {
        
        $gatewayName = '\Application\Gateway\\'.
                        $options->adapter.'Gateway';
        $gateway = new $gatewayName();
        
        $data = $gateway->getAll($options);
        
        $entity = new UserEntity();
        $collection = new UserCollection();
        foreach ($data as $key => $value)
        {
            $entity = new UserEntity();
            $entity = $entity->Hydrate($value, $entity);
            $collection->$key=$entity;
        }
        
//         echo "<pre>";
//         print_r($collection);
//         echo "</pre>";
        
        

        
        return $collection;
    }
    public function DeleteUser($config, $id)
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
    
    public function GetUser($config, $id)
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
}
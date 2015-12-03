<?php
namespace Application\Gateway;

class MysqlGateway
{
    public function getAll($options)
    {
//         $adapterClass = $options->adapter.'Adapter';
        $adapterclass = '\Utils\Adapter\\'.$options->adapter.'Adapter'; 
        $adapter = new $adapterclass($options->dbmaster);
        
        $query = "SELECT * FROM user";
        $data = $adapter->Select($query);
        return $data;
    }
}
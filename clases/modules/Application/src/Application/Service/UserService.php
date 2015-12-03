<?php
namespace Application\Service;

use Application\Mapper\UserMapper;

class UserService
{
    public function GetUsers($options)
    {
        $userMapper = new UserMapper();
        $users = $userMapper->GetUsers($options);
        
        // Send email
        
        return $users;
    }
    
}
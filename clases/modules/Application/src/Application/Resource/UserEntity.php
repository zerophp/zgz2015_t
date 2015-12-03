<?php
namespace Application\Resource;

use Utils\Hydrator\ClassHydrator;
class UserEntity extends ClassHydrator
{
    public $iduser;
    public $name;
    public $email;
    public $password;
    public $description;
    public $city_idcity;
    public $gender_idgender;
    public $photo;
    public $bdate;
    

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    
    
}
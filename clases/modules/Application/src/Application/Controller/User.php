<?php 
namespace Application\Controller;

use Application\Config;

class User
{
    public $layout = "dashboard";
    public $content;
    
    public function indexAction()
    {
        $config=array('defaultController'=>'user',
            'defaultAction'=>'index',
            'dbmaster'=>array('host'=>'192.168.2.1',
                'user'=>'php',
                'password'=>'1234',
                'database'=>'crud'
            ),
            'dbslave'=>array('host'=>'192.168.2.1',
                'user'=>'phpread',
                'password'=>'1234',
                'database'=>'crud'
            ),
            'adapter'=>'Mysql',
            'filename' => '../data/user.txt',
        
        );
        
        $route=array
        (
            'module' => 'Application',
            'controller' => 'User',
            'action' => 'index',
            'params' => Array
            (
                )
        
            );
            
        include ("../modules/Application/src/Application/Mapper/User/GetUsers.php");
        include ("../vendor/Utils/src/Utils/View/RenderView.php");
        
        $config = Config::getInstance();
        
        
        echo "<pre>";
        print_r($config);
        echo "</pre>";
    die;
        $users = GetUsers($config);
        $this->content = RenderView($route, array('users'=>$users));
        return $this->content;
    }
    
    public function selectAction()
    {
        echo "Select";
    }
    
    public function insertAction()
    {
        echo "Insert";
    }
    
    public function updateAction()
    {
        echo "Update";
    }
    
    public function deleteAction()
    {
        echo "Delete";
    }
    

    
}
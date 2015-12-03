<?php 
namespace Application\Controller;

use Utils\Model\View;
use Application\Service\UserService;

class User
{
    public $layout = "dashboard";
    public $content;
    private $router;
    
    public function __construct($router, $options)
    {
        $this->router = $router;      
        $this->options = $options;
    }
    
    public function indexAction()
    {   
        $userService = new UserService();
        $users = $userService->GetUsers($this->options);
        $this->content = View::RenderView($this->router, array('users'=>$users));
        
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
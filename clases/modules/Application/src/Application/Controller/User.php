<?php 
namespace Application\Controller;

use Utils\Model\View;
use Application\Service\UserService;
use Utils\Interfaces\OptionsAwareInterface;
use Utils\Traits\Options;

class User implements OptionsAwareInterface
{
    public $layout = "dashboard";
    public $content;
    private $router;
    
    use Options;
    
    
    
    public function __construct($router)
    {
        $this->router = $router;     
    }
    
    public function indexAction()
    {   
        $userService = new UserService();
        $users = $userService->GetUsers($this->options);
        
        $data = json_encode($users);
        return $data;
        
        die;
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        /** API */
        
        $users = json_decode($data);
        
        echo "<pre>";
        print_r($users);
        echo "</pre>";
        
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
<?php
include ("../modules/Application/src/Application/View/Helper/Form.php");
include ("../modules/Application/src/Application/View/Helper/FormUpdate.php");

include ("../modules/Application/src/Application/Mapper/User/GetUsers.php");
include ("../modules/Application/src/Application/Mapper/User/GetUser.php");
include ("../modules/Application/src/Application/Mapper/User/DeleteUser.php");
include ("../modules/Utils/src/Utils/View/RenderView.php");
$formdef = "../modules/Application/src/Application/Forms/register.json";



        

    
switch($route['action'])
{
    case 'index':
    case 'select':
        $users = GetUsers($config);
        $content = RenderView($route, array('users'=>$users));
        
    break;
    case 'insert':        
        if($_POST)
        {           
            include('../modules/Utils/src/Utils/Form/FilterData.php');
            $formdef="../modules/Application/src/Application/Forms/register.json";
            $data = FilterData($_POST, $formdef);        
            
            $validate = ValidateData($data, $formdef);

            if($validate['result']===true)
            {
                    // Write to repo
                    $array= $_POST;
                    $array['photo']=$_FILES['photo']['name'];
                    Save($array, $filename);
                    header("Location: /user/select");
            }
            else
            {
                    echo "<pre>";
                    print_r($valid);
                    echo "</pre>";
            }
            
            
        }
        else
        {   
            $form = file_get_contents($formdef);
            include('../modules/Application/views/user/insert.phtml');
        }
    break;
    case 'update':
        if($_POST)
        {     
            $array= $_POST;
            $array['photo']=$_FILES['photo']['name'];
            Update($array, $filename);
            header("Location: /user/select");
        }
        else
        {             
            $users = file_get_contents($filename);
            $users = explode("\n", $users);
            $user = explode("|", $users[$route['params']['id']]);
            //echo $user[4];
            $form = file_get_contents($formdef);
            include('../modules/Application/views/user/update.phtml');
        }
    break;
    case 'delete':        
            if($_POST)
            {
                if($_POST['submit']=='Si')
                {
                    DeleteUser($config, $_POST['id']);
                }                
                header("Location: /user/select");
            }
            else 
            {
                // Formulario si/no       
                $user = GetUser($config, $route['params']['id']);
                $content = RenderView($route, array('user'=>$user));
            }
    break;
}

// $content = "kaka";
include('../modules/Application/views/layout/dashboard.phtml');








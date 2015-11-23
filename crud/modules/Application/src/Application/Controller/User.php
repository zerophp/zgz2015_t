<?php
include ("../modules/Application/src/Application/View/Helper/Form.php");
include ("../modules/Application/src/Application/View/Helper/FormUpdate.php");
include ("../modules/Application/src/Application/Model/Txt/Save.php");
include ("../modules/Application/src/Application/Model/Txt/Update.php");
$formdef = "../modules/Application/src/Application/Forms/register.json";

if(isset($_GET['action']))
    $action=$_GET['action'];
else
    $action='select';
        
$filename = '../data/user.txt';
    
switch($action)
{
    case 'select':
        
        // Leer el archivo de texto en un string
        $users = file_get_contents($filename);
        
        // separar por saltos de linea en una array
        $users = explode("\n", $users);
        // recorrer el array de usuario
        include('../modules/Application/views/user/select.phtml');
    break;
    case 'insert':        
        if($_POST)
        {
            $array= $_POST;
            $array['photo']=$_FILES['photo']['name'];
            Save($array, $filename);
            header("Location: /ControllerUser.php?action=select");
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
            header("Location: ./ControllerUser.php?action=select");
        }
        else
        {             
            $users = file_get_contents($filename);
            $users = explode("\n", $users);
            $user = explode("|", $users[$_GET ['id']]);
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
                    // Borar y saltar                   
                    $users = file_get_contents($filename);
                    $users = explode("\n", $users);
                    unset( $users[$_POST['id']]);
                    $users=implode("\n", $users);
                    file_put_contents($filename, $users);
                }                
                header("Location: /ControllerUser.php?action=select");
            }
            else 
            {
                // Formulario si/no       
                $users = file_get_contents($filename);
                $users = explode("\n", $users);
                $user = explode("|", $users[$_GET ['id']]);
                include('../modules/Application/views/user/delete.phtml');
            }
    break;
}
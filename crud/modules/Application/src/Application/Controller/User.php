<?php
include ("../modules/Application/src/Application/View/Helper/Form.php");
include ("../modules/Application/src/Application/View/Helper/FormUpdate.php");
include ("../modules/Application/src/Application/Model/Txt/Save.php");
include ("../modules/Application/src/Application/Model/Txt/Update.php");

include ("../modules/Utils/src/Utils/Model/ValidateData.php");

$formdef = "../modules/Application/src/Application/Forms/register.json";



        
$filename = '../data/user.txt';
    
switch($route['action'])
{
    case 'index':
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
            // Filtrar
//             $data = FilterData($_POST);
            // Validar 
//             $valid = ValidateData($_POST, $formdef);
            // if validar ok
//                 if($valid['result'])
//                 {
                    // Write to repo
                    $array= $_POST;
                    $array['photo']=$_FILES['photo']['name'];
                    Save($array, $filename);
                    header("Location: /user/select");
//                 }
//                 else
//                 {
//                     echo "<pre>";
//                     print_r($valid);
//                     echo "</pre>";
//                 }
            
            
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
                    // Borar y saltar                   
                    $users = file_get_contents($filename);
                    $users = explode("\n", $users);
                    unset( $users[$_POST['id']]);
                    $users=implode("\n", $users);
                    file_put_contents($filename, $users);
                }                
                header("Location: /user/select");
            }
            else 
            {
                // Formulario si/no       
                $users = file_get_contents($filename);
                $users = explode("\n", $users);
                $user = explode("|", $users[$route['params']['id']]);
                include('../modules/Application/views/user/delete.phtml');
            }
    break;
}
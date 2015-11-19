<?php
include ("../modules/Application/src/Application/View/Helper/Form.php");
include ("../modules/Application/src/Application/Model/Txt/Save.php");
$formdef = "../modules/Application/src/Application/Forms/register.json";

if(isset($_GET['action']))
    $action=$_GET['action'];
else
    $action='select';
        
$fileName = 'user.txt';

    
switch($action)
{
    case 'select':
        
        // Leer el archivo de texto en un string
        $users = file_get_contents($fileName);
        
        // separar por saltos de linea en una array
        $users = explode("\n", $users);
        // recorrer el array de usuario
        echo "<a href=\"ControllerUser.php?action=insert\">Insert</a>";
        echo "<table border=1>";
        foreach ($users as $key => $user)
        {
            // Para cada usuario una fila
            // Para cada elemento una columna
            $user = explode("|", $user);
            echo "<tr>";
            foreach ($user as $value)
            {
                echo "<td>";
                echo $value;
                echo "</td>";
            }
            // Concatenar opcioens
                echo "<td>";
                echo "update | <a href=\"ControllerUser.php?action=delete&id=".$key."\">delete</a>";
                echo "</td>";
            echo "</tr>";
                    
            
        }
        echo "</table>";
    break;
    case 'insert':        
        if($_POST)
        {
            $array= $_POST;
            $array['photo']=$_FILES['photo']['name'];
            Save($array, $fileName);
            header("Location: /ControllerUser.php?action=select");
        }
        else
        {   
            $form = file_get_contents($formdef);
            include('../modules/Application/views/user/insert.phtml');
        }
    break;
    case 'update':
        echo "Update";
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
                echo '
                    <ul><form action ="ControllerUser.php?action=delete" method="post"  enctype = "multipart/form-data">
                    <li>Seguro que quieres borar a ?'.$user[4].'
                    </li><li>
                        <INPUT TYPE=HIDDEN NAME=id VALUE='.$_GET ['id'].'>
                    <INPUT TYPE=SUBMIT NAME=submit VALUE=No>
                    </li>
                    <li>
                    <INPUT TYPE=SUBMIT NAME=submit VALUE=Si>
                    </li></form></ul>';
            }
        
        
            
    break;
    
}
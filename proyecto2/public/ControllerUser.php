<?php

if(isset($_GET['action']))
    $action=$_GET['action'];
else
    $action='select';
        

switch($action)
{
    case 'select':
        $filename = 'user.txt';
        // Leer el archivo de texto en un string
        $users = file_get_contents($filename);
        
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
            $user = '';
            // Recorrer el array de post elemento por elemento
            foreach($_POST as $key => $element)
            {
                if(is_array($element))
                {
                    // Si multiple concatenar por comas
                    $_POST[$key]=implode(',', $element);
                }
            }
            $_POST['photo']=$_FILES['photo']['name'];
            // Contacternar los elementos por |
            $user=implode('|',$_POST)."\n";
             
            
            // Crear el fichero de texto
            // Escribir la linea al archivo de texto
            file_put_contents('user.txt', $user, FILE_APPEND);
            
            header("Location: /ControllerUser.php?action=select");
        }
        else
        {
            include ("../modules/Application/src/Application/View/Helper/Form.php");
            
            $form = file_get_contents("../modules/Application/src/Application/Forms/register.json");
            echo Form($form);
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
                    $filename = 'user.txt';
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
                $filename = 'user.txt';
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
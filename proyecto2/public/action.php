<?php
echo "<pre>get: ";
print_r($_GET);
echo "</pre>";

echo "<pre>post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>file: ";
print_r($_FILES);
echo "</pre>";

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

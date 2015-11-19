<?php
$filename = 'user.txt';
// Leer el archivo de texto en un string
$users = file_get_contents($filename);

// separar por saltos de linea en una array
$users = explode("\n", $users);
// recorrer el array de usuario
echo "<a href=\"program2.php\">Insert</a>";
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
        echo "update | <a href=\"delete.php?id=".$key."\">delete</a>";
        echo "</td>";
    echo "</tr>";
            
    
}
echo "</table>";


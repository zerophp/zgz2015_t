<?php
// Conect to server

    

$link = mysqli_connect('192.168.2.1', 'php', '1234');
// Select database
mysqli_select_db($link, 'crud');

/* Lectura */
        // Query
//         $query = 'SELECT * FROM city';
        
//         // Execute query
//         $result = mysqli_query($link, $query);
        
//         // Read recordset
//         while($row = mysqli_fetch_assoc($result))
//         {
//             echo "<pre>";
//             print_r($row);
//             echo "</pre>";
//         }

/* Escritura */        
        
        // Query
//         $query = "INSERT INTO city SET city='Lisboa'";
        
        // Execute query
//         $result = mysqli_query($link, $query);
        
//         $num = mysql_affected_rows($result);

/* BORRAR */

// Query
//         $query = "DELETE FROM city WHERE idcity>10";

// // Execute query
//         $result = mysqli_query($link, $query);

/* ACTUALIZAR */

// Query
        $query = "UPDATE city SET city='Oporto' WHERE idcity=7";

// // Execute query
        $result = mysqli_query($link, $query);

        
        
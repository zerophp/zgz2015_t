<?php
/**
 * Muestra por pantalla el array
 *  - 1 dim: como separado por comas
 *  - 2 dim: como tabla
 *  
 *  @param array $array
 *  @return null
 */
function DibujarArray($array) 
{
    $rows=sizeof($array)-1;
    $columns=sizeof($array[0])-1;
     
    if (is_array($array) && count($array)>0 ) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                // Tabla multiplicar
                echo "<table border=1>";
                for ($a = 0; $a<=$columns; $a++) {
                    echo "<tr>";
                    for ($b = 0; $b<=$rows; $b++) {
                        if ($a == 0) {
                            echo "<td>". $b ."</td>";
                        } else if($b == 0) {
                            echo "<td>".$a."</td>";
                        } else {
                            echo "<td>".$a*$b."</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
                //echo "<hr />";
                break;
            } else {
                echo $v . ",";
            }
        }
    }
}

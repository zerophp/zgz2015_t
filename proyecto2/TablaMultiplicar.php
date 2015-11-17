<?php
/**
 * Tabla de multiplicar de $a, $b
 *
 * @param int $a
 * @param int $b
 * @return array $c
 */
function TablaMultiplicar($rows, $columns) {
    //array $c();
    for($a=0;$a<=$rows;$a++)
    {
        for($b=0;$b<=$columns;$b++)
        {
            if($a==0)
            {
                $c[$a][$b] = $b; 
            }
            elseif($b==0)
            {
                $c[$a][$b] = $a;
            }
            else
            {
                $c[$a][$b] = $a*$b;
            }
        }
    }
    return $c;
}
<?php
/**
 * Serie de fibonacci
 *
 * @param unknown $max
 * @return array $fibonacci
 */
function Fibonacci ($max) {
    $n0=0;
    $n1=1;
    $n2=$n0+$n1;
    $chain = array($n0);
    $chain[] = $n1;
    while ($n2<=$max)
    {
        $chain[] = $n2; 
        $n0=$n1;
        $n1=$n2;
        $n2=$n0+$n1;
    }
    
    return $chain;
};

/*
echo '<pre>';
var_dump(fibonacci(100));
echo '</pre>';
*/
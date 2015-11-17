<?php

include_once ('TablaMultiplicar.php');
include_once ('Fibonacci.php');
include_once ('DibujarArray.php');
 

$a = 9;
$b =4;
$max =35;



$arraytabla = TablaMultiplicar($a, $b);

$arrayfibo = Fibonacci($max);

DibujarArray($arraytabla);
DibujarArray($arrayfibo);
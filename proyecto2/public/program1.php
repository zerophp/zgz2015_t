<?php

include_once ('../modules/Application/src/Application/Model/TablaMultiplicar.php');
include_once ('../modules/Application/src/Application/Model/Fibonacci.php');
include_once ('../modules/Application/src/Application/Model/DibujarArray.php');
 

$a = 9;
$b =4;
$max =35;



$arraytabla = TablaMultiplicar($a, $b);

$arrayfibo = Fibonacci($max);

DibujarArray($arraytabla);
DibujarArray($arrayfibo);
<?php

$a = "Agustin";
$b = false;

var_dump($b);


echo "HOLA $a";
echo "HOLA ".$a;
echo "<hr/>";
echo 'HOLA $a';

echo "<hr/>";


var_dump($a);
var_dump($$b);

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
echo "<hr/>";
$a = "hola";
$$a = "mundo";
print "$a $hola\n";
print "$a ${$a}";
print "$a $$a";

echo "<hr/>";
echo @EMAIL;

echo 2+3/2-5+8/2;


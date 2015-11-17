<?php
$a = array ('nombre'=>'agustin',
            'apellido'=>'calderon',
            'gatos'=>4,
//             'direccion'=>array('50006',
//                                'zaragoza',
//                                'c pilar 32'),
            'ciudad'=>'madrid',
            'esto',
            'esto otro',
            '5'=>'y esto',
            'lerolero',
            7,4=>'jajaja',
            'mas cosas',
            7=>'otro siete',
            '5.5'=>'string',
            9.9=>'que ocurre',
            true=>false
);

foreach ($a as $key=>$value)
{
    echo $key.": ".$value;
    echo "<br/>";
}

foreach ($a as $value)
{
    echo $value;
    echo "<br/>";
}

echo "<pre>";
print_r($a);
echo "</pre>";

echo $a['direccion'][1];
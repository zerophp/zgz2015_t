<?php

$config=array('defaultController'=>'user',
              'defaultAction'=>'index',
              'dbmaster'=>array('host'=>'192.168.2.1',
                          'user'=>'php',
                          'password'=>'1234',
                          'database'=>'crud'
              ),
             'dbslave'=>array('host'=>'192.168.2.1',
                          'user'=>'phpread',
                          'password'=>'1234',
                          'database'=>'crud'
              ),
    'adapter'=>'Txt',
    'filename' => '../data/user.txt',
    
);


return $config;
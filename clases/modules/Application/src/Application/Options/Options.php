<?php
namespace Application\Options;

class Options
{
    public $dbmaster = array('host'=>'192.168.2.1',
            'user'=>'php',
            'password'=>'1234',
            'database'=>'crud'
        );
    public $dbslave = array('host'=>'192.168.2.1',
            'user'=>'phpread',
            'password'=>'1234',
            'database'=>'crud'
        );
    public $adapter = 'Adapter';
    public $filename = '../data/user.txt';    
}
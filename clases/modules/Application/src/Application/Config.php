<?php
namespace Application;

use Utils\Model\Configurator;

/**
 * 
 * @author cta
 *
 */
class Config extends Configurator
{
    // @var aklñsdj
    public $defaultController = 'index';
    
    // @var aslñkdjaskl
    public $defaultAction= 'index';
    
    
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
    public $adapter = 'Mysql';
    public $filename = '../data/user.txt';
    
    /**
     * sdklfjklsd
     * @param
     * @return
     */
    static public function getInstance()
    {
        // TODO: Use config.global
        $configname = __DIR__.'/../../config/config.php';
        $config=require($configname);
        $configclass = parent::getInst(__CLASS__);
        
        // Overwrite config array and config object values
        foreach ($config as $key => $value)
        {
            $configclass->$key = $config[$key];
        }
        return $configclass;
    }
    
}
<?php
function __autoload($classname)
{
    $classname = explode("\\", $classname);

    $filename = $classname[0].'/src/'.$classname[0].'/'.
        $classname[1].'/'.
        $classname[2].'.php';
        
    if(file_exists(__DIR__.'/modules/'.$filename))
    {
        include_once(__DIR__.'/modules/'.$filename);
    }
    elseif(file_exists(__DIR__.'/vendor/'.$filename))
    {
        include_once(__DIR__.'/vendor/'.$filename);
    }
    else 
        die("No encuentro la clase".$filename);
    
}
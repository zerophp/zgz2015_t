<?php
/**
 * Validate form data
 * 
 * @param string|array $data
 * @param string $formdef
 * @return array
 */
function ValidateData($data, $formdef)
{
    $formdef = file_get_contents($formdef);
    $formdef = json_decode($formdef, true);
    
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    
//     echo "<pre>";
//     print_r($formdef);
//     echo "</pre>";
    
    
    foreach ($data as $key=>$element)
    {
        $elementDef = getElement($key, $formdef['Elements']);
        $valid = validateElement($element, $elementDef);
        
        echo "<pre>Element:";
        print_r($element);
        echo "</pre>";
        
        echo "<pre>$key";
        print_r($elementDef);
        echo "</pre>";
        
        echo "<pre>$key";
        print_r($valid);
        echo "</pre>";
    }
    
    die;
    
}

function validateElement($element, $elementDef)
{
    switch($elementDef['type'])
    {
        case 'SelectTag':
            if(!in_array($element, array_keys($elementDef['params']['values'])))
                return array('message'=>'Not valid selection');
            break;
        case 'Password':
            break;
    }
    return array('message'=>null);
    
}


function getElement($elementKey, $formdef)
{
    foreach ($formdef as $key => $value)
    {
        if($value['params']['name']==$elementKey)
            return $formdef[$key];
    }
    return false;
}
<?php

function FilterData($data, $formdef)
{
    // Para cada elemento de data
    foreach ($data as $key => $element)
    {
        $data[$key]=Filter($element, getElementDef($formdef, $key));
    }    
    return $data;
   
}

function getElementDef($formdef, $name)
{
    $formdef = file_get_contents($formdef);
    $formdef = json_decode($formdef, true);
    foreach($formdef['Elements'] as $element)
    {
        if($element['params']['name']==$name)
            return $element;
    }
}

function Filter($element, $elementDef)
{
    if(isset($elementDef['filters']))
    foreach ($elementDef['filters'] as $filter)
    {
        switch ($filter)
        {
            case 'stringTrim':
                $element=trim($element);
                break;
            case 'stripTags':
                $element=strip_tags($element);
                break;
        }  
    }    
    return $element;
}


function ValidateData($data, $formdef)
{
    foreach ($data as $key => $element)
    {
        $data[$key]=Validate($key, $element, getElementDef($formdef, $key));
    }
//     echo "<pre>";
//     print_r($data);
//     echo "</pre>";
    $validation['result'] = true;
    
    foreach ($data as $validated)
    {
        if($validated['result']==='notDefined' || 
           $validated['result']===true)
        {
            $validation['result'] = $validation['result'] && true;
        }
        else
        {
            $validation['result'] = $validation['result'] && false;
            $validation['info']=$data;
        }
            
    }
    return $validation;
}

function Validate($key, $element, $elementDef)
{
    $valid=array();
    
    if(isset($elementDef['validation']))
    foreach ($elementDef['validation'] as $validate)
    {
        switch ($validate)
        {
            case 'password12':
                $valid['mes'][] = (validatePassword12($element))?true:'Password too short, min 12 characters.';
                break;
            case 'len1':
                $valid['mes'][] = (len1($element))?true:'Len too short, min 1 characters.';
                break;
        }
    }
    if(isset($valid['mes']))
    {
        foreach ($valid['mes'] as $mes)
        {
            if($mes===true)
                $valid['result']=true;
            else
            {
                $valid['result']=false;
                break;
            }                
        } 
    }
    else
        $valid['result']='notDefined';
    
    return $valid;
}

function validatePassword12($value)
{
    return (strlen($value)>=12)?true:false;
}

function len1($value)
{
    return (strlen($value)>=1)?true:false;
}






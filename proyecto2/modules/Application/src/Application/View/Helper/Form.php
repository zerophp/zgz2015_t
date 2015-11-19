<?php

include ("../modules/Application/src/Application/Forms/Helpers/FileTag.php");
include ("../modules/Application/src/Application/Forms/Helpers/FormTag.php");
include ("../modules/Application/src/Application/Forms/Helpers/MultipleTag.php");
include ("../modules/Application/src/Application/Forms/Helpers/SelectTag.php");
include ("../modules/Application/src/Application/Forms/Helpers/SubmitTag.php");
include ("../modules/Application/src/Application/Forms/Helpers/TextareaTag.php");
include ("../modules/Application/src/Application/Forms/Helpers/TextTag.php");



/**
 * Html Form
 *  
 * @param strinf $formdef json filename
 * @return string
 */
function Form($formdef)
{
    $form = json_decode($formdef, true);
    
    $html='';
    $html.= "<ul>";
    $html.= call_user_func_array('FormTag', $form['FormTag'])."\n";
    
    
    foreach ($form['Elements'] as $element)
    {
        $html.= "<li>";
        $html.= $element['label']."\n";
        $html.= call_user_func_array($element['type'], $element['params'])."\n";
        $html.= "</li>";
    }
    $html.= "</form>";
    $html.= "</ul>";
    
    return $html;
}


?>








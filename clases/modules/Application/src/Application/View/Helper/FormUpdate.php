<?php

include_once ("../modules/Application/src/Application/Forms/Helpers/FileTag.php");
include_once ("../modules/Application/src/Application/Forms/Helpers/FormTag.php");
include_once ("../modules/Application/src/Application/Forms/Helpers/MultipleTag.php");
include_once ("../modules/Application/src/Application/Forms/Helpers/SelectTag.php");
include_once ("../modules/Application/src/Application/Forms/Helpers/SubmitTag.php");
include_once ("../modules/Application/src/Application/Forms/Helpers/TextareaTag.php");
include_once ("../modules/Application/src/Application/Forms/Helpers/TextTag.php");



/**
 * Html Form
 *  
 * @param strinf $formdef json filename
 * @return string
 */
function FormUpdate($formdef,$user)
{
    $form = json_decode($formdef, true);
    //echo var_dump($user);
    $html='';
    $html.= "<ul>";
    $html.= call_user_func_array('FormTag', $form['FormTag'])."\n";
    $i=0;

    foreach ($form['Elements'] as $element)
    {
        $html.= "<li>";
        $html.= $element['label']."\n";
        if(isset($element['params']['selected'])){
            $element['params']['selected'] = $user[$i];
        }elseif(isset($element['params']['value'])){
            $element['params']['value']= $user[$i];
        }elseif(isset($element['params']['content'])){
            $element['params']['content']= $user[$i] ;
        }
        $html.= call_user_func_array($element['type'], $element['params'])."\n";
        $html.= "</li>";
        $i++;
    }
    $html.= "</form>";
    $html.= "</ul>";

    return $html;
}


?>








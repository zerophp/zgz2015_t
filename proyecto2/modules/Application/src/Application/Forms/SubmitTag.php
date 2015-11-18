<?php
/**
 * Submit | Button html form tag
 *
 * @param string $type submit | button
 * @param string $name
 * @param string $value
 * @return string;
 */
function SubmitTag($type, $name, $value)
{

    return "<INPUT TYPE=".$type." NAME=".$name." VALUE=".$value.">";
       
    
}
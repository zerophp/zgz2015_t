<?php

/**
*  TEXT|EMAIL|PASSWORD|DATE html form tag
*
* @param string $type [TEXT|EMAIL|PASSWORD|DATE]
* @param string $name
* @param string $value
* @return string
*/
function TextTag($type, $name, $value)
{
    return "<input type='".$type."' name='".$name ."' value='".$value ."' />";
}
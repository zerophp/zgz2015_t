<?php

/**
*  TEXT|EMAIL|PASSWORD|DATE|HIDDEN html form tag
*
* @param string $type [TEXT|EMAIL|PASSWORD|DATE|HIDDEN]
* @param string $name
* @param string $value
* @return string
*/
function TextTag($type, $name, $value)
{
    return "<input type='".$type."' name='".$name ."' value='".$value ."' />";
}
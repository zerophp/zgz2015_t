<?php
/**
 * Create file form input
 *
 * @param string $name
 * @return string
 */

function FileTag($name)
{
    $html = "<INPUT TYPE='file' NAME='".$name."'>";
    return $html;
}

<?php


function Execute($query, $link)
{
    $result = mysqli_query($link, $query);
    return $result;
}
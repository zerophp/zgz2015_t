<?php


function Select($query, $link)
{
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $rows[]=$row;
    }
    return $rows;
}
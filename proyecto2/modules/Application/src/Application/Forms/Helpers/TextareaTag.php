<?php
/**
 * TextArea: Recibimos un texto y devuelve un código HTML de TextArea
 *
 * @param string $name
 * @param string $content
 * @return string
 */

function TextareaTag($name,$content=null)
{
   $html='';
   if(!$content)
   {
       $html='<TEXTAREA NAME="'.$name.'">'.'</TEXTAREA>';
   }
   else 
   {
       $html='<TEXTAREA NAME="'.$name.'">'.$content.'</TEXTAREA>';
   }
       
   return $html;
}
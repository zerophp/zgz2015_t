<?php
/**
 * insert data into filename
 * @param array $data
 * @param string $fileName
 * @return null;
 */
function Save($data, $fileName)
{
    $rowData = '';
    // Recorrer el array de post elemento por elemento
    foreach($data as $key => $element)
    {
        if(is_array($element))
        {
            // Si multiple concatenar por comas
            $data[$key]=implode(',', $element);
        }
    }
    
    // Contacternar los elementos por |
    $rowData=implode('|',$data)."\n";
     
    
    // Crear el fichero de texto
    // Escribir la linea al archivo de texto
    file_put_contents($fileName, $rowData, FILE_APPEND);
    
    return null;
    
}
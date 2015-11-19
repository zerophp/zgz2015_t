<?php
/**
 * Create file form input
 *
 * @param string $name
 * @return string $html
 */
function FileTag($name){}

/**
 * Form html tag
 * 
 * @param string $action
 * @param string $method[GET|POST]
 * @param boolean $withFile
 */
function FormTag($action, $method, $withFile){}


/**
 * Submit | Button html form tag
 *
 * @param string $type SUBMIT | BUTTON
 * @param string $name
 * @param string $value
 * @return string;
 */
function SubmitTag($type, $name, $value){}

/**
 * Crea un campo de tipo select o radio a partir de un array de opciones
 *
 * @param string $name nombre del campo
 * @param array $array assoc
 * @param string $selected key from array
 * @param string $type[SELECT|RADIO]
 * @return string;
 *
 */
function SelectTag($name, $array, $selected, $type='RADIO'){}

/**
 *
* MULTIPLE | CHECKBOX html form tag
*
* @param string $type[MULTIPLE|CHECKBOX]
* @param string $name
* @param array $values assoc
* @param array $selected assoc
* @return string $html
*
*/
function MultipleTag($type, $name, $values, $selected){}

/**
 *  TEXT|EMAIL|PASSWORD|DATE|HIDDEN html form tag
*
* @param string $type [TEXT|EMAIL|PASSWORD|DATE|HIDDEN]
* @param string $name
* @param string $value
* @return string
*/

function TextTag($type, $name, $value){}

/**
 * TextArea: Recibimos un texto y devuelve un código HTML de TextArea
*
* @param string $name
* @param string $content
* @return string
*/

function TextareaTag($name,$content=null){}

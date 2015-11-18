<?php
/**
 * Create file form input
 *
 * @param string $name
 * @return string $html
 */
function CreateFileFormInput($name)

/**
 * Devuelve un formulario en formato HTML
 * @param unknown $array : array de controles que va a pintar el formulario
 */
function FormTag($array)


/**
 * Submit | Button html form tag
 *
 * @param string $type submit | button
 * @param string $name
 * @param string $value
 * @return string;
 */
function SubmitTag($type, $name, $value)

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
function createradioselect($name, $array, $selected, $type='RADIO')

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
function MultipleTag($type, $name, $values, $selected);

/**
 *  TEXT|EMAIL|PASSWORD|DATE html form tag
*
* @param string $type [TEXT|EMAIL|PASSWORD|DATE]
* @param string $name
* @param string $value
* @return string
*/

function TextTag($type, $name, $value)

/**
 * TextArea: Recibimos un texto y devuelve un código HTML de TextArea
*
* @param string $name
* @param string $content
* @return string
*/

function TextareaTag($name,$content=null);

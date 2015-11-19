<?php
/**
 * SELECT TAG
 *
 * @param string $name input name
 * @param array $array assoc
 * @param string $selected key from array
 * @param string $type [SELECT|RADIO]
 * @return string;
 */

function SelectTag ($name, $array, $selected, $type = 'RADIO') {
    $html = '';
    $sel = '';
    
    switch ($type) {
        case 'SELECT':
            $html = '<select name="'.$name.'">';
            
            foreach ($array as $key=>$value) {
                if ($key === $selected) {
                    $sel = 'selected';   
                } else {
                    $sel = '';
                }
                $html.= '<option value="'.$key.'" '.$sel.'>'.$value.'</option>';
            }
            
            $html.= '</select>';
            break;
        
        case 'RADIO':
            foreach ($array as $key=>$value) {
                
                if ($key === $selected) {
                    $sel = 'checked';
                } else {
                    $sel = '';
                }
                $html.= '<input type="radio" name="'.$name.'" value="'.$key.'" '.$sel.'/>'.$value.'<br/>';
            }
            break;
    }
    
    return $html;
};



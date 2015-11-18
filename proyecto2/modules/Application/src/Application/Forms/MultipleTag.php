<?php
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

function MultipleTag($type, $name, $values, $selected){
    $html = "";
    $sel = false;
    switch ($type){
        case "MULTIPLE":
            $html .= "<SELECT MULTIPLE NAME=\"$name\" >";
            foreach ($values as $key => $value){
                $sel = false;
                foreach ($selected as $keysel => $valsel){
                    if ($key == $keysel){
                        $sel = true;
                    };
                };
                if ($sel) $html .= "<OPTION VALUE=\"$key\" SELECTED>$value";
                else $html .= "<OPTION VALUE=\"$key\">$value";
            }
            $html .= "</SELECT>";
            break;
        case "CHECKBOX":
            foreach ($values as $key => $value){
                $sel = false;
                foreach ($selected as $keysel => $valsel){
                    if ($key == $keysel){
                        $sel = true;
                    };
                }
                if ($sel) $html .= "<INPUT TYPE=\"checkbox\" NAME=\"$name\" VALUE=\"$key\" CHECKED>$value ";
                else $html .= "<INPUT TYPE=\"checkbox\" NAME=\"$name\" VALUE=\"$key\">$value ";
            }
            break;
    }
    return $html;
};

/*
$valores = [
    "foo" => "bar",
    "bar" => "foo",
    "gato" => "gato"
];

$sel = [
    "foo" => "bar",
    "gato" => "gato"
];

echo MultipleTag("CHECKBOX", "pets", $valores, $sel);

*/
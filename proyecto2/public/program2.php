<?php

include ("../modules/Application/src/Application/View/Helper/Form.php");

$form = file_get_contents("../modules/Application/src/Application/Forms/register.json");
echo Form($form);


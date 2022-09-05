<?php

$AjaxCtr = $_POST['AjaxCtr'];
$start = new $AjaxCtr;
print $start->get_json();

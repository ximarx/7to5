<?php

$empty = array();
$a = array(1, 2, 3);
$b = array(array('a', 'b'));
$c = array('ass1' => array(1, 2, 3), 'ass2' => array('ass2.1' => 2.1));
function function_with_default_array($argument = array())
{
    return $argument;
}


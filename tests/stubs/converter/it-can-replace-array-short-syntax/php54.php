<?php

$empty = [];
$a = [1, 2, 3];
$b = [['a', 'b']];
$c = ['ass1' => [1, 2, 3], 'ass2' => ['ass2.1' => 2.1]];

function function_with_default_array($argument = []) {
    return $argument;
}

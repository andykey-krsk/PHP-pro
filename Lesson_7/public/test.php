<?php
$x = 1;
$y = 2;

if (add($x, $y) == 3) {
    echo "Ok";
} else {
    echo "Error in add()";
}


function add($x, $y) {
    return $x + $y;
}
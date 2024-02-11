<?php

    $a = 10;
    $b = 21;
    $c = 8;

    $largest = $a;

    if ($b > $largest) {
        $largest = $b;
    }
    if ($c > $largest) {
        $largest = $c;
    }

    echo "Largest among {$a}, {$b}, {$c} is {$largest}";
?>
<?php

    $nums = [1, 2, 8, 3, 9, 0, 7, 8];

    $x = 7;
    $at = -1;

    echo "Nums: ";
    for ($i = 0; $i < count($nums); $i++) {
        echo "{$nums[$i]} ";
        if ($nums[$i] == $x) {
            $at = $i;
        }
    }

    if ($at == -1) {
        echo "<br>{$x} is not found";
    } else {
        echo "<br>{$x} found at index {$at}";
    }
?>
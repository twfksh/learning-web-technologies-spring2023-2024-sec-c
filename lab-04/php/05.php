<?php

    echo "All the odd numbers between 10 to 100: ";

    for ($i = 10; $i <= 100; $i++) {
        if ($i & 1) {
            echo "{$i} ";
        }
    }
?>
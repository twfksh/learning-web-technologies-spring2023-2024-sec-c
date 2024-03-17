<?php
    echo "<table border=1>";
        echo "<tr>";
            echo "<td>";
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j <= $i; $j++) {
                    echo "* ";
                }
                echo "<br>";
            }
            echo "</td>";

            echo "<td>";
            for ($i = 3; $i >= 1; $i--) {
                for ($j = 1; $j <= $i; $j++) {
                    echo "{$j} ";
                }
                echo "<br>";
            }
            echo "</td>";

            echo "<td>";
            $char = 'A';
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j <= $i; $j++) {
                    echo $char . " ";
                    $char++;
                }
                echo "<br>";
            }
            echo "</td>";
        echo "</tr>";
    echo "</table>";
?>

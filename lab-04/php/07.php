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
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j <= $i; $j++) {
                    $ch = chr(65 + $i + $j);
                    echo "{$ch} ";
                }
                echo "<br>";
            }
            echo "</td>";
        echo "</tr>";
    echo "</table>";
?>

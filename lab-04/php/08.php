<?php

$arr = [
    [1, 2, 3, 'A'],
    [1, 2, 'B', 'C'],
    [1, 'D', 'E', 'F']
];

echo '<table border=1>';
    echo '<tr>';
        echo '<th>';
            echo 'The array to declare';
        echo '</th>';

        echo '<th>';
            echo 'Shapes to print';
        echo '</th>';
    echo '</tr>';
    echo '<tr>';
        echo '<td>';
            echo '<table border="1">';
            foreach ($arr as $row) {
                echo '<tr>';
                foreach ($row as $el) {
                    echo '<td>' . $el . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        echo '</td>';

        echo '<td>';
            echo '<table border=1>';
                echo '<tr>';
                    echo '<td>';
                        foreach ($arr as $row) {
                            foreach($row as $el) {
                                if (!($el >= 'A' && $el <= 'Z')) {
                                    echo $el;
                                }
                            }
                            echo '<br>';
                        }
                    echo '</td>';
                    echo '<td>';
                        foreach ($arr as $row) {
                            foreach($row as $el) {
                                if ($el >= 'A' && $el <= 'Z') {
                                    echo $el;
                                }
                            }
                            echo '<br>';
                        }
                    echo '</td>';
                echo '</tr>';
            echo '</table>';
        echo '</td>';
    echo '</tr>';
echo '</table>';
?>
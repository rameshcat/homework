
<?php
echo '<table>';
for ($x=1; $x<10; $x++) {
    echo '<tr>';
    for ($y=1; $y<10; $y++){
        if ($y==$x) {
            echo "<td>" . $x * $y . "</td>";
        } echo "<td>" . $x * $y . "</td>";
    }
    echo '</tr>';
}
echo '</table>';
?>

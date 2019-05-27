<?php include_once('header.php'); ?>
<?php include_once('menu.php'); ?>
<td id="main" style="background-color: aliceblue; vertical-align: top">
    <?php
    echo '<table>';
    for ($x = 1; $x < 10; $x++) {
        echo '<tr>';
        for ($y = 1; $y < 10; $y++) {
            echo "<td>" . $x * $y . "</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</td>
<?php include_once('footer.php'); ?>



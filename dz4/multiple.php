<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        ul{
            list-style: none;
        }
        a{
            text-decoration: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
<table width="100%">
    <tr>
        <td colspan="2" style="height: 200px; background-color: azure; text-align: center">Header</td>
    </tr>
    <tr style="height: 600px">
        <td width="20%" style="background-color: lightblue; text-align: center; vertical-align: top">
            <ul>
                <li><a href="../quiz/index.php">QUIZ</a></li>
            </ul>

            <ul>
                <li><a href="multiple.php">MULTIPLE</a></li>
            </ul>
        </td>
        <td style="background-color: aliceblue; vertical-align: top">
            <?php
            echo '<table>';
            for ($x = 1; $x < 10; $x++) {
                echo '<tr>';
                for ($y = 1; $y < 10; $y++) {
                    if ($y == $x) {
                        echo "<td>" . $x * $y . "</td>";
                    }
                    echo "<td>" . $x * $y . "</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="height: 100px; background-color: azure; text-align: center">Footer</td>
    </tr>
</table>
</body>
</html>


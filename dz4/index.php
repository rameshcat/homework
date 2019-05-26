<?php
$menu = 0;
if (isset($_POST['quiz'])) {
    $menu = 1;
    setcookie('menu', 1);
}
if (isset($_POST['multiple'])) {
    $menu = 2;
    setcookie('menu', 2);
}

if (isset($_COOKIE['menu'])) {
    $menu = $_COOKIE['menu'];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table width="100%">
    <tr>
        <td colspan="2" style="height: 200px; background-color: azure; text-align: center">Header</td>
    </tr>
    <tr style="height: 600px">
        <td width="20%" style="background-color: lightblue; text-align: center; vertical-align: top">
            <form action="" method="post" name="menu">
                <ul>
                    <li><input type="submit" name="quiz">QUIZ</li>
                </ul>
            </form>
            <form action="" method="post" name="multiple">
                <ul>
                    <li><input type="submit" name="multiple">MULTIPLE</li>
                </ul>
            </form>
        </td>
        <td style="background-color: aliceblue; vertical-align: top">
            <?php switch ($menu) {
                case 1:
                    include("../quiz/index.php");
                    break;
                case 2:
                    include("multiple.php");
                    break;
                default: echo 'welcome';
            }?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="height: 100px; background-color: azure; text-align: center">Footer</td>
    </tr>
</table>
<?php print_r($_POST); ?>
<?php print_r($_SESSION); ?>
</body>
</html>
<?php include_once ('bootstrap.php');?>
<?php if (!isset($_SESSION)) session_start();
define('ROOT', dirname(__FILE__));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Site</title>
    <link rel="stylesheet" href="<?= BASE_URL;?>main.css"/>
</head>
<body>
<table width="100%">
    <tr>
        <td colspan="2" style="height: 200px; background-color: azure; text-align: center">
            <ul>
                <a class="main" href="<?= BASE_URL;?>index.php">
                    <li class="mainMenu"
                        style="position: absolute;margin-left: -80px;background-color: azure; font-size: xx-large; width: fit-content">
                        MAIN PAGE
                    </li>
                </a>
                <?php if (!isset($_SESSION['user'])): ?>
                    <a class="sign" href="<?= BASE_URL;?>registration.php">
                        <li class="mainMenu" style="float: right; margin-right: 5px">
                            Sign up
                        </li>
                    </a>
                    <a class="sign" href="<?= BASE_URL;?>login.php">
                        <li class="mainMenu" style="float: right; margin-right: 5px">
                            Sign in
                        </li>
                    </a>
                <?php else: ?>
                    <a class="sign" href="<?= BASE_URL;?>logoutHandler.php">
                        <li class="mainMenu" style="float: right; margin-right: 5px">
                            Sign out
                        </li>
                    </a>
                <?php endif; ?>
            </ul>


        </td>
    </tr>
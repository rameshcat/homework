<?php
session_start();
include_once('bootstrap.php');
$email = $password = '';
if (isset($_POST['submitLogin'])) {
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $users = [];
    $file = fopen(BASE_URL.'users.txt', 'r');
    while (!feof($file)) {
        $users[] = explode('~', rtrim(fgets($file)));
    }
    foreach ($users as $user) {
        if (($user[0] == $email) && (password_verify($password, $user[1]))) {
            $_SESSION['user'] = $user[2];
            unset ($_SESSION['errors']);
            fclose($file);
            header("Location:index.php");
            break;
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['errors'] = 'Wrong E-mail/Password combination';
            header("Location:login.php");
        }
    }
    fclose($file);
}

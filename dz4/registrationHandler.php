<?php
session_start();
include_once('bootstrap.php');
$error = [];
$name = $email = $password = $confPassword = '';

if (isset($_POST['submitRegistration'])) {

    $users = [];
    $password = trim(strip_tags($_POST['password']));
    $confPassword = trim(strip_tags($_POST['confPassword']));
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));
    //name check
    if (!preg_match_all('/^([A-Z][a-z]+)+/', $name)) {
        $error[] = 'Enter your name';
    }
    //e-mail check
    if (!preg_match_all('/^[A-za-z0-9_-]+@([A-za-z0-9_-]+\.)+[A-za-z0-9_-]{2,3}$/', $email)) {
        $error[] = 'Wrong E-mail';
    }
    //password check
    if ($password !== $confPassword) {
        $error[] = 'These passwords don’t match. Please try again';
    }

    $file = fopen(BASE_DIR . '/users.txt', 'r');
    while (!feof($file)) {
        $users[] = explode('~', trim(fgets($file)));
    }
    //check e-mail on existing
    foreach ($users as $user) {
        if ($user[0] == $_POST['email']) {
            $error[] = 'This E-mail is already registered';
        }
    }
    if (empty($error)) {
        fclose($file);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $file = fopen(BASE_DIR . '/users.txt', 'a');
        $userData = trim(strip_tags($_POST['email'])) . '~' . $password . '~' . $name . "\n";
        fputs($file, $userData);
        fclose($file);
        header("Location:login.php");
    } else {
        $_SESSION['error'] = $error;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        header('Location:registration.php');
    }


}
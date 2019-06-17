<?php
session_start();
require_once('./../core/db.php');
function getComments()
{
    $query = "SELECT username, comment, comments.created_at FROM `comments` INNER JOIN users u on comments.user_id = u.id ORDER BY comments.created_at DESC";

    $result = query($query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getUser($username, $email)
{
    $query = "SELECT * FROM `users` WHERE 
        `username`= '" . escape($username) . "' AND
        `email` = '" . escape($email) . "' ";

    return fetchOne($query);
}

function addComment($userId, $comment)
{
    $query = "INSERT INTO `comments` (`user_id`,`comment`,`created_at`) VALUES (
         '" . escape($userId) . "',                              
         '" . escape($comment) . "',
         NOW()                      
    )";

    query($query);
}

function handleVariable($variable)
{
    return strip_tags(trim($variable));
}

function validation($username, $email, $comment)
{
    $error = [];

    if (!preg_match_all('/^([a-z]+)+/', $username)) {
        $error[] = 'Enter your name';
    }
    if (!preg_match_all('/^[A-za-z0-9_-]+@([A-za-z0-9_-]+\.)+[A-za-z0-9_-]{2,3}$/', $email)) {
        $error[] = 'Wrong E-mail';
    }
    if (empty($comment)) {
        $error[] = 'Enter your comment';
    }

    return $error;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? handleVariable($_POST['username']) : '';
    $email = isset($_POST['email']) ? handleVariable($_POST['email']) : '';
    $comment = isset($_POST['comment']) ? handleVariable($_POST['comment']) : '';

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['comment'] = $comment;

    $gberrors = validation($username, $email, $comment);

    if (empty($gberrors)) {
        $user = getUser($username, $email);
        if (!$user) {
            $gberrors[] = 'Such user does not exist';
        }
    }

    if (empty($gberrors)) {
        addComment($user['id'], $comment);
        //session_destroy();
        $_SESSION['username'] = '';
        $_SESSION['email'] = '';
        $_SESSION['comment'] = '';
        $_SESSION['gberrors'] = [];
        header('Location:' . SITE . '/guestbook/success.php');
        exit;
    }
    $_SESSION['gberrors'] = $gberrors;

    header('Location:' . SITE . '/guestbook/index.php');
}


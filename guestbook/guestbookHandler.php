<?php
require_once('./../core/db.php');
function getComments()
{
    $query = "SELECT username, comment, comments.created_at FROM `comments` INNER JOIN users u on comments.user_id = u.id";

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? handleVariable($_POST['username']) : '';
    $email = isset($_POST['email']) ? handleVariable($_POST['email']) : '';
    $comment = isset($_POST['comment']) ? handleVariable($_POST['comment']) : '';

    $user = getUser($username, $email);

    if ($user) {
        addComment($user['id'], $comment);
        header('Location:' . SITE . '/guestbook/success.php');
        exit;
    } else {
        header('Location:' . SITE . '/guestbook/error.php');
        exit;
    }
}




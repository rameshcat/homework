<?php
require_once ('config.php');

function getInstance()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    if (!$link) {
        echo mysqli_connect_error();
        die;
    }

    return $link;
}

function query($query)
{
    $link = getInstance();
    $result = mysqli_query($link, $query);
    if (!$result) {
        echo mysqli_error($link);
        die;
    }

    return $result;
}

function escape($variable)
{
    $link = getInstance();

    return mysqli_real_escape_string($link, $variable);
}

function fetchOne($query)
{
    $result = query($query);

    return mysqli_fetch_assoc($result);
}


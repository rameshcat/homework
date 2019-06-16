<?php
include_once('view.php');

if (isset($_GET['submit']) && (!empty($_GET['id']))) {
    $id = intval($_GET['id']);
    $link = mysqli_connect('localhost', 'roma', '', 'personal');
    $query = 'SELECT * FROM personal.workers WHERE id=' . $id;
    mysqli_query($link, "SET NAMES 'utf8'");
    $request = mysqli_query($link, $query);
    $result = mysqli_fetch_assoc($request);
    mysqli_close($link);
    include_once('result.php');
}
<?php
include_once ('view.php');

class Sql
{
    public function getConnection()
    {
        $dsn = 'mysql:host=localhost;dbname=personal';
        $db = new PDO($dsn, 'roma', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $db->exec("set names utf8");
        return $db;
    }
}

class Select
{
    public function runSelect($id)
    {
        $db = new Sql();
        $connect = $db->getConnection();
        $sql = 'select name, age, salary from workers where id =' . $id;

        $result = $connect->query($sql);

        return $result->fetch();
    }
}


if (isset($_GET['submit'])&&(!empty($_GET['id']))){
    $id = $_GET['id'];
    $result = new Select();
    $view = $result->runSelect($id);
    include_once('result.php');
}


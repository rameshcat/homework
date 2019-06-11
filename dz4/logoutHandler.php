<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 11.06.19
 * Time: 19:44
 */

session_start();
session_destroy();
header('Location:index.php');

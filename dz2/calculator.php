<?php
session_start();

$operands = ['+','-','*','/'];

if (empty($_SESSION)) {
    $result = $first = $second = $operand = '';
} else {
    $first = $_SESSION['first'];
    $second = $_SESSION['second'];
    $operand = $_SESSION['operand'];
    $result = $_SESSION['result'];
}

if (isset($_POST['submit'])) {

    $first = (float)strip_tags(trim($_POST['first']));
    $second = (float)strip_tags(trim($_POST['second']));
    $operand = strip_tags(trim($_POST['operand']));

    if (($operand=='/')&&($second==0)){
        $result = 'Division by zero is prohibited';
    }else {
        switch ($operand) {
            case '*':
                $result = $first * $second;
                break;
            case '/':
                $result = $first / $second;
                break;
            case '+':
                $result = $first + $second;
                break;
            case '-':
                $result = $first - $second;
                break;
            default:
                $result = 'Check your input data';
        }
    }
    $_SESSION['first'] = $first;
    $_SESSION['second'] = $second;
    $_SESSION['operand'] = $operand;
    $_SESSION['result'] = $result;

    header('Location:'.$_SERVER['PHP_SELF']);
    exit;
}
require_once 'calculatorView.php';
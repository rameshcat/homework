<?php

$operands = ['+','-','*','/'];
$result = $first = $second = $operand = '';


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
}

require_once 'calculatorView.php';
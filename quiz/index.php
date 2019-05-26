<?php
// открывается сессия
session_start();
// вводятся переменные под вопросы и ответы
$question = $answers = 0;
$answers = [];
// если пользователь еще не ответил на вопрос, то вероятно он еще не начал тест
if (isset($_POST['question'])) {
// получаем ответ пользователя
    $question = (int)$_POST['question'];
// проверяем, если номер ответа равен 0, то пользователь только нажал на кнопку Start.
// если больше 0, то получаем ответ по каждому вопросу
    if ($_POST['question'] > 0 && isset($_POST['answer'])) {
// подготавливаем массив с ответами
        if (empty($_SESSION['answers'])) {
            $_SESSION['answers'] = [];
        }
// сохраняем полученные ответы
        $_SESSION['answers'][$question] = $_POST['answer'];
// сохраняем ответы, чтобы сравнить их количество с количеством вопросов
        $answers = $_SESSION['answers'];
// увеличиваем счетчик с вопросами
        $question++;
    }
}
// получаем список вопросов
$questions = parse_ini_file('questions.ini', true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul{
            list-style: none;
        };
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td colspan="2" style="height: 200px; background-color: azure; text-align: center">Header</td>
    </tr>
    <tr style="height: 600px">
        <td width="20%" style="background-color: lightblue; text-align: center; vertical-align: top">
            <ul>
                <li><a href="/quiz/index.php">QUIZ</a></li>
            </ul>

            <ul>
                <li><a href="/dz4/multiple.php">MULTIPLE</a></li>
            </ul>
        </td>
        <td style="background-color: aliceblue; vertical-align: top">
            <h1>Тест</h1>
            <?php
            // сравниваем количество вопросов с количеством полученных ответов. если равны, значит пора показывать результат
            if (count($questions) == count($answers)) {
                include 'result.php';
            } elseif ($question > 0) {
                include 'question.php';
            } else {
                include 'start.php';
            } ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="height: 100px; background-color: azure; text-align: center">Footer</td>
    </tr>
</table>
</body>
</html>

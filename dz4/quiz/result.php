<?php
// подготавливаем переменную для результатов теста
$result = 0;
// проверяем, есть ли ответы пользователя в сессии
if (isset($_SESSION['answers'])) {
// получаем список правильных ответов из файла
    $answers = parse_ini_file('answers.ini');
// итерируем список ответов пользователя и сравниваем со списком правильных ответов
    foreach ($_SESSION['answers'] as $key => $value) {
// если ответ пользователя правильный, то увеличиваем счетчик
        if ($value == $answers[$key]) {
            $result++;
        }
    }
// разрываем сессию
    // session_destroy();
}
?>
<p>Your result is <?php echo $result ?> from <?php echo count($questions) ?></p>
<p><a href="index.php">Start the test again</a></p>
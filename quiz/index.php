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
<?php include_once('../dz4/header.php'); ?>
<?php include_once('../dz4/menu.php'); ?>


<td id="main" style="background-color: aliceblue; vertical-align: top">
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

<?php include_once('../dz4/footer.php'); ?>

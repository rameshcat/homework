<?php
include_once('header.php');
include_once('menu.php');
if (isset($_POST['submitRegistration'])) {
    $users = [];
    $error = '';
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/dz4/users.txt', 'r');
    while (!feof($file)) {
        $users[] = explode('/', rtrim(fgets($file)));
    }
    foreach ($users as $user) {
        if ($user[0] == $_POST['email']) {
            $error = 'This E-mail is already registered';
            break;
        }
    }
    fclose($file);
    $password = trim(strip_tags($_POST['email']));
    $password = password_hash($password, PASSWORD_BCRYPT);
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/dz4/users.txt', 'a');
    $userData = trim(strip_tags($_POST['email'])) . '/' . $password . '/' . $_POST['name'] . "\n";
    fputs($file, $userData);
    fclose($file);
    header("Location:/dz4/login.php");
}
?>
<td id="main" style="background-color: aliceblue;">
    <div style="width: fit-content; margin-left: 330px">
        <?php if (!empty($error)) echo $error; ?>
        <form method="post" action="registration.php">
            Name: <input class="textInput" type="text" name="name" placeholder="Name" required><br/>
            E-mail: <input class="textInput" type="text" name="email" placeholder="E-mail" required/><br/>
            Password: <input class="textInput" type="password" name="password" placeholder="Password" required/><br/>
            <input type="submit" class="submitButton" name="submitRegistration"/>
        </form>
    </div>
</td>
<?php include_once('footer.php'); ?>

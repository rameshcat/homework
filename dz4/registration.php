<?php
include_once('header.php');
include_once('menu.php');
$error = $name = $email = $password = '';
if (isset($_POST['submitRegistration'])) {
    $users = [];
    $password = trim(strip_tags($_POST['password']));
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/dz4/users.txt', 'r');
    while (!feof($file)) {
        $users[] = explode('~', trim(fgets($file)));
    }
    foreach ($users as $user) {
        if ($user[0] == $_POST['email']) {
            $error = 'This E-mail is already registered';
        }
    }
    if (empty($error)) {
        fclose($file);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/dz4/users.txt', 'a');
        $userData = trim(strip_tags($_POST['email'])) . '~' . $password . '~' . $name . "\n";
        fputs($file, $userData);
        fclose($file);
        header("Location:/dz4/login.php");
    }
}
?>
<td id="main" style="background-color: aliceblue;">
    <div style="width: fit-content; margin-left: 330px">
        <?php if (!empty($error)) echo $error; ?>
        <form method="post" action="registration.php">
            Name: <input class="textInput" type="text" name="name" placeholder="Name" value="<?php if(!empty($name)) echo $name;?>" required><br/>
            E-mail: <input class="textInput" type="email" name="email" placeholder="E-mail" required/><br/>
            Password: <input class="textInput" type="password" name="password" placeholder="Password" minlength="8" required/><br/>
            <input type="submit" class="submitButton" name="submitRegistration"/>
        </form>
    </div>
</td>
<?php include_once('footer.php'); ?>

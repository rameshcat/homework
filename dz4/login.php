<?php include_once('header.php'); ?>
<?php include_once('menu.php'); ?>
<?php
if (isset($_POST['submitLogin'])) {
    $users = [];
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/dz4/users.txt', 'r');
    while (!feof($file)) {
        $users[] = explode('/', rtrim(fgets($file)));
    }
    foreach ($users as $user) {
        if (($user[0] == trim(strip_tags($_POST['email']))) && (password_verify($_POST['password'], $user[1]))) {
            $_SESSION['user'] = $user[2];
            fclose($file);
            header("Location:/dz4/index.php");
        } else {
            $error = 'Wrong E-mail/Password combination';
        }
    }
    fclose($file);
}
?>
<td id="main" style="background-color: aliceblue;">
    <div style="width: fit-content; margin-left: 330px">
        <?php if (!empty($error)) echo $error; ?>
        <form method="post" action="login.php">
            E-mail: <input class="textInput" type="text" name="email" placeholder="E-mail" required/><br/><br/>
            Password: <input class="textInput" type="password" name="password" placeholder="Password"
                             required/><br/><br/>
            <input class="submitButton" type="submit" name="submitLogin"/>
        </form>
    </div>
</td>
<?php include_once('footer.php'); ?>

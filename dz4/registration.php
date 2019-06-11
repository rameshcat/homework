<?php
include_once('header.php');
include_once('menu.php');
?>
<td id="main" style="background-color: aliceblue;">
    <div style="width: fit-content; margin-left: 330px">
        <? if (!empty($_SESSION['error'])): ?>
            <? foreach ($_SESSION['error'] as $e): ?>
                <h2 style="color: darkred;">
                    <?= $e; ?>
                </h2>
            <? endforeach; ?>
        <? endif; ?>
        <form method="post" action="registrationHandler.php">
            Name: <input class="textInput" type="text" name="name" placeholder="Name"
                         value="<?php if (!empty($_SESSION['name'])) echo $_SESSION['name']; ?>" required><br/>
            E-mail: <input class="textInput" type="email" name="email" placeholder="E-mail"
                           value="<?php if (!empty($_SESSION['email'])) echo $_SESSION['email']; ?>" required/><br/>
            Password: <input class="textInput" type="password" name="password" placeholder="Password" minlength="8"
                             required/><br/>
            Confirm Password: <input class="textInput" type="password" name="confPassword" placeholder="Password"
                                     minlength="8" required/><br/>
            <input type="submit" class="submitButton" name="submitRegistration"/>
        </form>
    </div>
</td>
<?php include_once('footer.php'); ?>

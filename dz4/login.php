<?php session_start(); ?>
<?php include_once('header.php'); ?>
<?php include_once('menu.php'); ?>
<td id="main" style="background-color: aliceblue;">
    <div style="width: fit-content; margin-left: 330px">
        <?php if (!empty($_SESSION['errors'])):?>
        <h2 style="color: darkred">
            <?= $_SESSION['errors']; ?>
        </h2>
        <? endif;?>
        <form method="post" action="loginHandler.php">
            E-mail: <input class="textInput" type="email" name="email" placeholder="E-mail"
                           value="<?php if (!empty($_SESSION['email'])) echo $_SESSION['email']; ?>"
                           required/><br/><br/>
            Password: <input class="textInput" type="password" name="password" placeholder="Password" minlength="8"
                             required/><br/><br/>
            <input class="submitButton" type="submit" name="submitLogin"/>
        </form>
    </div>
</td>
<?php include_once('footer.php'); ?>

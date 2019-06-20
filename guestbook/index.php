<?php
include_once('./../autoload.php');
?>
<?php include_once('./../dz4/header.php'); ?>
<?php include_once('./../dz4/menu.php'); ?>
    <td id="main" style="background-color: aliceblue; vertical-align: top">
    <h4>GUEST BOOK</h4>
<?php if (isset($_SESSION['gberrors'])) {
    foreach ($_SESSION['gberrors'] as $error) {
        echo '<p style="color: red">' . $error . '</p>';
    }
} ?>
    <p>Leave your comment:</p>
    <form style="width: 40%" method="post" name="guestbook" action="guestbookHandler.php">
        <div>
            <label for="username">Name:</label>
            <input class="textInput" id="username" name="username"
                   value="<?php if (isset($_SESSION['username'])) echo $_SESSION['username'] ?>"/>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input class="textInput" id="email" name="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ?>"/>
        </div>
        <div>
            <label for="comment">Comment:</label>
            <textarea id="comment" cols="50" rows="7"
                      name="comment"><?php if (isset($_SESSION['comment'])) echo $_SESSION['comment'] ?></textarea>
        </div>
        <div>
            <input class="submitButton" type="submit" name="submitComment" value="Send comment"/>
        </div>
    </form>
    <div style="width: 80%; padding-top: 10px">
        <table bgcolor="white" border="1" style="border-collapse: collapse; border-color: lavender" width="100%">
            <?php $comments = getComments();
            foreach ($comments as $comment):?>
                <tr>
                    <td style="padding: 7px; border-right-color: white">From: <?= $comment['username']; ?></td>
                    <td style="padding: 7px" align="right">Date: <?= $comment['created_at']; ?></td>
                </tr>
                <tr>
                    <td style="padding: 7px" align="justify" colspan="2"><?= $comment['comment']; ?></td>
                </tr>
            <? endforeach; ?>
        </table>
    </div>
    </td>
<?php include_once('./../dz4/footer.php'); ?>
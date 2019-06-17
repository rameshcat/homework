<?php
include_once ('./../autoload.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4>GUEST BOOK</h4>
<?php if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo '<p style="color: red">'.$error.'</p>' ;
    }
}?>
<p>Leave your comment:</p>
<form method="post" name="guestbook" action="guestbookHandler.php">
    <div>
        <label for="username">Name:</label>
        <input id="username" name="username" value="<? if(isset($_SESSION['username'])) echo $_SESSION['username']?>"/>
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input id="email" name="email" value="<? if(isset($_SESSION['email'])) echo $_SESSION['email']?>"/>
    </div>
    <div>
        <label for="comment">Comment:</label>
        <textarea id="comment" cols="50" rows="7" name="comment"><? if(isset($_SESSION['comment'])) echo $_SESSION['comment']?></textarea>
    </div>
    <div>
        <input type="submit" name="submit" value="Send comment"/>
    </div>
</form>
<div>
    <table>
        <?php $comments = getComments();
        foreach ($comments as $comment):?>
            <tr>
                <td>From: <?= $comment['username']; ?></td>
                <td>Date: <?= $comment['created_at']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><?= $comment['comment']; ?></td>
            </tr>
        <? endforeach; ?>
    </table>
</div>
</body>
</html>

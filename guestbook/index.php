<?php
require_once('./../autoload.php');
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
    <p>Leave your comment:</p>
    <form method="post" name="guestbook" action="guestbookHandler.php">
        <div>
            <label for="username">Name:</label>
            <input id="username" name="username"/>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input id="email" name="email"/>
        </div>
        <div>
            <label for="comment">Comment:</label>
            <textarea id="comment" cols="50" rows="7" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" name="submit" value="Send comment"/>
        </div>
    </form>
    <div>
        <table>
            <tr>
                <th>From:</th>
                <th>Comment</th>
                <th>Date</th>
            </tr>
            <?php $comments = getComments();
            foreach ($comments as $comment):?>
            <tr>
                <td><?= $comment['username'];?></td>
                <td><?= $comment['comment'];?></td>
                <td><?= $comment['created_at'];?></td>
            </tr>
            <? endforeach;?>
        </table>
    </div>



</body>
</html>

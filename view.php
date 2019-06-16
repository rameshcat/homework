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
<form method="get" action="index.php">
    <p>Input workers ID</p>
    <label>
        <input type="text" name="id"/><br/><br/>
    </label>
    <input type="submit" name="submit"/>
</form>
<br/><br/>
<?php if (!empty($_GET['id'])): ?>
    <p>Information about worker with ID <?= $_GET['id']; ?></p>
<? endif; ?>
</body>
</html>
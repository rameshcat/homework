<?php
$visitorCount = 0;
$lastVisit = date("Y-m-d", strtotime("+3 days"));
$expireTime = strtotime("+3 days");


if (isset($_COOKIE['visitorCount'])) {
    $visitorCount = $_COOKIE['visitorCount'];


}
if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = $_COOKIE['lastVisit'];

}
setcookie('visitorCount', ++$visitorCount, $expireTime);
setcookie('lastVisit', $lastVisit, $expireTime);
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
    <?php if($visitorCount == 1):?>
        <p>Hello you are at first time!</p>
    <?php else:?>
        <p>You are at <?php echo $visitorCount;?> time. Last visit was at <?php echo $lastVisit;?></p>
    <?php endif;?>
</body>
</html>


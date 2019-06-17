<?php

include_once('header.php');
include_once('menu.php');
?>

<td id="main" style="background-color: aliceblue; vertical-align: top">
    Welcome to my site<?php if (isset($_SESSION['user'])) echo ', ' . $_SESSION['user']; ?>!
</td>

<?php include_once('footer.php'); ?>

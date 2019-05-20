<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
</head>
<body>
<div>
    <form method="post" action="calculator.php">
        <h2>Calculator</h2>
        <label for="first">
            <span>First number</span>
            <input id="first" name="first" type="text" value="<?php if (isset($first)) echo $first;?>"><br/>
        </label><br/>
        <label for="select">
            <span>Operand</span>
            <select name="operand">
                <?php if (isset($operand)):?>
                    <option><?php echo $operand;?></option>
                <?php endif;?>
                <?php foreach ($operands as $item):?>
                    <option><?php echo $item?></option>
                <?php endforeach;?>
            </select><br/>
        </label><br/>
        <label for="second">
            <span>Second number</span>
            <input id="second" name="second" type="text" value="<?php if (isset($second)) echo $second;?>"><br/>
        </label><br/>
        <input type="submit" name="submit" value="Calculate"><br/>
        <p><b>Result: </b><?php if (isset($result)) echo $result;?></p>
    </form>
</div>
</body>
</html>

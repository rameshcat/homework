<form action="index.php" method="post">
    Question: <?php echo $questions[$question]['title'] ?><br/><br/>
    Answers:<br/>
    <?php $answers = $questions[$question]['answers']; ?>
    <?php shuffle($answers) ?>
    <?php foreach ($answers as $item): ?>
        <?php echo $item ?> <input type="radio" name="answer" value="<?php echo $item ?>"><br
        />
    <?php endforeach; ?>
    <br/><br/>
    <input type="hidden" name="question" value="<?php echo $question; ?>">
    <input type="submit" class="submitButton" style="width: 300px">
</form>
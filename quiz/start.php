<p>The test contains 5 questions.</p>
<h3>Start the Quiz</h3>
<form action="index.php" method="post">
    <input type="hidden" name="question" value="<?php echo ++$question; ?>">
    <input class="submitButton" type="submit" style="width: 300px">
</form>
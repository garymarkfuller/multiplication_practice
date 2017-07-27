<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
<?php
// Clean up the post data and set it as the variable $post_data.
$post_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
// Include the class file.
require_once('class.multiplication.php');
// Define the numbers to use in the calculations.
$number_array = [0,1,2,3,4,5,6,7,8,9,10,11,12];
// Pick two random numbers for the sum.
$first_number = array_rand($number_array);
$second_number = array_rand($number_array);
// If an answer has been posted, check that it is correct.
if(isset($post_data)) {
    // Instantiate the class passing in the post data as an argument.
    $test = new randomMultiplicationChecker($post_data);
    // Call the answerCheck method and create the variables $correct and $number_correct from what it returns.
    list($correct, $number_correct, $question_number, $level_number) = $test->answerCheck();
} else {
    $question_number = 1;
    $level_number = 1;
    $number_correct = 0;
}
?>

<?php 
// If this is the first time the page has been loaded or the previous answer was correct, 
// show the form and a new question.
if(!isset($post_data) || $correct === true): ?>
<h1>Level <?php echo $level_number; ?> : Question <?php echo $question_number; ?></h1>
<p>Input your answer and click submit before you run out of time...</p>
<p>What is <?php echo $first_number ?> x <?php echo $second_number ?>?</p>
    <form id="answer" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
      <input type="text" name="sumAnswer">
      <input type="hidden" value="<?php echo $first_number ?>" name="firstNumber">
      <input type="hidden" value="<?php echo $second_number ?>" name="secondNumber">
      <input type="hidden" value="<?php echo $number_correct ?>" name="numberCorrect">
      <input type="hidden" value="<?php echo $question_number ?>" name="questionNumber">
      <input type="hidden" value="<?php echo $level_number ?>" name="levelNumber">
      <input type="submit">
    </form>
<?php else: ?>
<h1>Nice Try! You got <?php echo $number_correct; ?> correct!</h1>
<?php endif; ?>
  </body>
</html>
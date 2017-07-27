<?php


class randomMultiplicationChecker 
{
    // Define the properties (class variables) used in the class. 
    protected $starting_time_limit = 10;
    private $post_data;
    // Assign the $post_data parameter to the $post_data property. 
    public function __construct($post_data) 
    {
        $this->post_data = $post_data;
    }
    public function answerCheck()
    {
        // Assign the first number in the question to $first_number in the class method.
        $first_number = $this->post_data['firstNumber'];  
        // Assign the second number in the question to $second_number in the class method.
        $second_number = $this->post_data['secondNumber'];
        // Assign the number of correct answers to $number_correct in the class method.
        $number_correct = $this->post_data['numberCorrect'];
        // Assign the question number for this level to $question_number in the class method.
        $question_number = $this->post_data['questionNumber'];
        // Assign the level number for this level to $level_number in the class method.
        $level_number = $this->post_data['levelNumber'];
        // Reset Question number to 1 if more than five questions have been completed or increase it by one
        if($question_number == 5) {
            $question_number = 1;
            $level_number++;
        } else {
            $question_number++;
        }

        // Check the correct answer to the question.
        $sum = $first_number * $second_number;
        // If the answer in the post data is equivalent to the correct answer, increment $number_correct by one 
        // then return true and $number_correct. If it isn't correct return false and $number_correct.
        if ($sum == $this->post_data['sumAnswer']) {
            $number_correct++;
            return array(true, $number_correct, $question_number, $level_number);
        } else {
            return array(false, $number_correct, $question_number, $level_number);
        }
    }
}

// Need to countdown as well as storing the countdown length ready to shorten after the right number of questions.

// Page loads -> question is displayed -> countdown begins 
// -> if countdown ends -> page reloads with "incorrect"
// -> if answer is posted -> answer is checked 
// -> if answer is correct -> new question is loaded & countdown length is checked
// -> if countdown length needs to change it is changed
// -> if answer is incorrect -> page reloads with "incorrect"
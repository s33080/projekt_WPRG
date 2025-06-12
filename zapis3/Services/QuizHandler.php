<?php
class QuizHandler{
    public function createQuiz($quiz_name, $ownerID, $subject, $type){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "INSERT INTO quizzes (quiz_name, owner_id, subject, type) VALUES ('$quiz_name',$ownerID,'$subject','$type')";
        //$last_id = $mysqli->insert_id;
        mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
        //return $last_id;
    }
    public function getQuizID(){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT quiz_id FROM quizzes GROUP BY creation_date DESC LIMIT 1";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($result);
        return $row['quiz_id'];
    }
    public function getQuestionID(/*$quiz_id*/){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT question_id FROM questions GROUP BY creation_date DESC LIMIT 1";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($result);
        return $row['question_id'];
    }
    public function getQuestionPic($questionID){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT pic_path FROM questions WHERE question_id = '$questionID'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($result);
        return $row['pic_path'];
    }
    public function addQuestion($quiz_id, $question, $picture_path){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "INSERT INTO questions VALUES (NULL, $quiz_id,'$question','$picture_path', NULL)";
        mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
    }
    public function addAnswer($question_id, $answer, $is_correct){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "INSERT INTO answers VALUES ($question_id,'$answer','$is_correct')";
        mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
    }
    public function getAllQuizzes(): array
    {
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT * FROM quizzes";
        $result = mysqli_query($mysqli, $query);
        $i=0;
        $quizzes = array();
        while($row = mysqli_fetch_array($result)){
            $quizzes[$i][0] = $row["quiz_name"];
            $quizzes[$i][1] = $row["subject"];
            $quizzes[$i][2] = $row["type"];
            $quizzes[$i][3] = $row["quiz_id"];
            $i++;
        }
        return $quizzes;
    }
    public function getQuestionsByQuizID($quizID){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT * FROM questions WHERE quiz_id = $quizID";
        $result = mysqli_query($mysqli, $query);
        $i=0;
        $questions = array();
        while($row = mysqli_fetch_array($result)){
            $questions[$i]["question_id"] = $row["question_id"];
            $questions[$i][0] = $row["question"];
            $questions[$i][1] = $row["pic_path"];
            $i++;
        }
        return $questions;
    }
    public function getAnswersByQuestionID($questionID){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT * FROM answers WHERE question_id = '$questionID'";
        $result = mysqli_query($mysqli, $query);
        $i=0;
        $answers = array();
        while($row = mysqli_fetch_array($result)){
            $answers[$i][0] = $row["answer"];
            $answers[$i][1] = $row["is_correct"];
            $i++;
        }
        return $answers;
    }
    public function checkAnswer($questionID, $answer){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT * FROM questions
                    JOIN answers on questions.question_id=answers.question_id
                    WHERE questions.question_id = '$questionID' AND answer = '$answer'";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function getTypeByQuestionID($questionID)
    {
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT type FROM quizzes
                    JOIN questions on questions.quiz_id=quizzes.quiz_id
                    where questions.question_id = '$questionID'";
        $result = mysqli_query($mysqli, $query);
        $a = mysqli_fetch_array($result);
        if($a['type'] == 'guess_pic'){
            return 'guess_pic';
        }
        else if($a['type'] == 'single_choice'){
            return 'single_choice';
        }
        else /*if($a['type'] == 'multi_choice')*/{
            return 'multi_choice';
        }
    }
}
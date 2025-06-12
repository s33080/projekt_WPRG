<?php

class LogsHandler
{
    public function createScoreLog($quizID,$userID,$score, $max_points){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "INSERT INTO logs (quiz_id, user_id, points_earned, max_points) VALUES ($quizID,$userID,$score,$max_points)";
        mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
    }
    public function createAccountRaport($userID){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $quizzes_taken_query = "SELECT COUNT(*) FROM logs WHERE user_id = $userID";
        $quizzes_taken = mysqli_query($mysqli, $quizzes_taken_query);
        $points_earned_query = "SELECT SUM(points_earned) FROM logs WHERE user_id = '$userID'";
        $points_earned = mysqli_query($mysqli, $points_earned_query);
        $max_points = "SELECT SUM(max_points) FROM logs WHERE user_id = '$userID'";
        $success = $points_earned/$max_points*100;
        $fav = "SELECT COUNT(fav) FROM logs WHERE user_id = '$userID'";
        return
        "
        QUIZZES TAKEN: $quizzes_taken \n
        POINTS EARNED: $points_earned \n
        OVERALL POINTS: $max_points \n
        SUCCESS PERCENTAGE: $success%\n
        FAVOURITE TOPIC: \n
        ";
    }
}
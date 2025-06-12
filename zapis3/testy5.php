<?php
require_once 'Services/QuizHandler.php';
require_once "Services/LogsHandler.php";
require_once "Services/AccountHandler.php";
session_start();
$quizHandler = new QuizHandler();
$logsHandler = new LogsHandler();
$accountHandler = new AccountHandler();
if($quizHandler->checkAnswer(2,'YES')){
    echo "true";
}
else{
    echo "false";
}

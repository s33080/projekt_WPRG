<?php
require_once "Services/AccountHandler.php";
require_once "Services/PathChanger.php";
require_once "Services/PictureUploader.php";
require_once "Services/QuizHandler.php";
require_once "Services/LogsHandler.php";
session_start();
?>
    <html lang="en">
    <meta charset="UTF-8">
    <title>VivariumQuizzes</title>
    <style>
        .container{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background-color: wheat;
            border: 18px solid yellowgreen;
            width: 100%;
            height: 1000px;
            max-width: 1000px;
            margin: auto;
        }
        .box{
            border: 2px solid;
            font-size: 18pt;
            text-align: center;
            line-height: 50px;
            padding: 10px 10px 10px 10px;
            margin-top: 50px;
            margin-left: 30px;
            margin-right: 30px;
            width: auto;
        }
        .box2{
            height: 75%;
            font-size: 40px;
            padding-top: 20px;
        }
        .box3{
            border: none;
            margin-top: 5%;
        }
        #menu{
            margin-top: 20px;
        }
        .button{
            font-size: medium;
            margin-bottom: 25px;
            margin-top: 20px;
            width: 200px;
            background-color: khaki;
        }
        .scroll{
            height: 500px;
            width: 900px;
            margin-top: 50px;
        }
    </style>
    <body>
    <div class="container">
        <div class="box box1">VIVARIUM QUIZZES</div>
        <div class="box box2">
            <div id="menu">
                Please answer
            </div>
            <div>
                <div class="box box3">
                    <div class="scroll">
                        <?php
                        $score=0;
                        $quizHandler = new QuizHandler();
                        $questions = $quizHandler->getQuestionsByQuizID($_SESSION['quizID']);
                        $answers = $quizHandler->getAnswersByQuestionID($questions[0]['question_id']);
                        $user_answers = array();
                        $quizID = $_SESSION['quizID'];
                        $i=0;
                            echo "<div>";
                            $pic_source = $questions[$i][1];
                            echo "<img src='$pic_source' style='width:300px;height:300px' alt=''>";
                            echo "<br>";
                            $QuestionID = $questions[$i]['question_id'];
                            echo $questions[$i][0];
                            echo "<br>";
                            echo "
                                <form method='post'>
                                    <input type='text' name='answer' placeholder='Your answer'>
                                </form>        
                              ";
                            echo "</div>";
                            if(isset($POST['answer'])){
                                if($quizHandler->checkAnswer($questions[$i]['question_id'], $POST['answer'])){
                                    $score++;
                                }
                                $user_answers[$i] = $POST['answer'];
                                $POST['answer'] = null;
                                $i++;
                            }
                        ?>
                    </div>
                    <form method="post" action="">
                        <input type="submit" class="button" name="submit" value="Check your answers">
                    </form>
                    <?php
                    if(isset($_POST['submit'])){
                        for($i=0; $i<count($questions); $i++){
                            if($quizHandler->checkAnswer($questions[$i]['question_id'], $user_answers[$i])){
                                $score++;
                            }
                        }
                        $logsHandler = new LogsHandler();
                        $accountHandler = new AccountHandler();
                        $logsHandler->createScoreLog($_SESSION['quizID'],$accountHandler->getUserID($_SESSION['name']),$score, count($questions));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
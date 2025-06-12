<?php
session_start();
require_once "Services/AccountHandler.php";
require_once "Services/PathChanger.php";
require_once "Services/PictureUploader.php";
require_once "Services/QuizHandler.php";
?>
    <html lang="en">
    <meta charset="UTF-8">
    <title>VivariumQuizzes</title>
    <style>
        .container{
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
        #enter{
            margin-top: 10px;
            font-size: large;
        }
        #pic{
            font-size: medium;
        }
    </style>
    <body>
    <div class="container">
        <div class="box box1">VIVARIUM QUIZZES</div>
        <div class="box box2">
            <div id="menu">
                GUESS PICTURE QUIZ
            </div>
            <div>
                <div class="box box3">
                    <form method="post" enctype="multipart/form-data" >
                        Upload the picture
                        <div id="pic">
                            <input name="file_to_upload" type="file" required> <!--QUESTION PICTURE-->
                        </div>
                        <div>
                            <input name="question" id="enter" type="text" placeholder="Enter the question" required>
                        </div>
                        <div>
                            Now, correct answers:
                        </div>
                        <div>
                            <input name="correct_answer" id="enter" type="text" placeholder="Enter correct answer" required>
                        </div>
                        <div>
                            <input name="wrong_answer" id="enter" type="text" placeholder="Enter wrong answer" required>
                        </div>
                        <div>
                            <button class="button" type="submit">Add the question</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <form action="main_page.php">
                    <button class="button">Done</button>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php

if (isset($_POST['question']) and isset($_FILES['file_to_upload']) and isset($_POST['correct_answer']) and isset($_POST['wrong_answer'])){
    $userID = (new AccountHandler())->getUserID($_SESSION['name']);
    $QuizHandler = new QuizHandler();
    $quizID = $_SESSION['quizID'];
    $QuizHandler->addQuestion($quizID, $_POST['question'], (new PathChanger())->getPicturePath($_FILES["file_to_upload"]['name']));
    $questionID=$QuizHandler->getQuestionID();
    (new PictureUploader())->upload_quiz_picture();
    $QuizHandler->addAnswer($questionID, $_POST["correct_answer"], true);
    $QuizHandler->addAnswer($questionID, $_POST["wrong_answer"], false);
};
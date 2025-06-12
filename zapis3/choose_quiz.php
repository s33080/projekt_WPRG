<?php
require_once "Services/AccountHandler.php";
require_once "Services/PathChanger.php";
require_once "Services/PictureUploader.php";
require_once "Services/QuizHandler.php";
session_start();
if(isset($_POST["button"])) {
    $_SESSION['quiz_id'] = $_POST["button"];
    header("Location: display_quiz_guess.php");
    die();
}
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
        #menu{
            margin-top: 20px;
        }
        .scroll{
            height: 600px;
            width: 900px;
            margin-top: 50px;
            overflow: auto;
            display: grid;
            grid-template-columns: 25% 25% 25% 25%;
        }
        #left-scroll-box{
            display: grid;
            word-wrap: break-word;
            word-break: break-all;
            grid-column: 1/2;
            justify-content: center;
        }
        #mid-scroll-box{
            display: grid;
            word-wrap: break-word;
            word-break: break-all;
            grid-column: 2/3;
        }
        #right-scroll-box{
            display: grid;
            grid-column: 3/4;
        }
        #form_buttons{
            display: grid;
            grid-column: 4/5;
            justify-content: center;
            margin-top: 15%;
        }
        #button_type{
            border: none;
            border-radius: 10px;
            margin: 10%;
            background-color: green;
            color: white;
            height: 50px;
            width: 150px;
        }
        #button_type:hover{
            background-color: darkgreen;
            transition: 0.3s;
        }

    </style>
    <title>VivariumQuizzes</title>
    <body>
    <div class="container">
        <div class="box box1">VIVARIUM QUIZZES</div>
        <div class="box box2">
            <div id="menu">
                CHOOSE QUIZ TO TAKE
            </div>
            <div class="scroll">
                <?php
                $quizHandler = new QuizHandler();
                $array = $quizHandler->getAllQuizzes();
                for($i=0;$i<count($array);$i++){
                    $j=0;
                    echo "<div id='left-scroll-box'><p>".$array[$i][$j]."</p></div>";
                    $j++;
                    echo "<div id='mid-scroll-box'><p>".$array[$i][$j]."</p></div>";
                    $j++;
                    echo "<div id='right-scroll-box'><p>".$array[$i][$j]."</p></div>";
                    $j++;
                    $quiz_id = $array[$i][$j];
                    echo "<form method='POST' id='form_buttons'><button id='button_type' name='button' value=$quiz_id>Select Quiz</button></form>";
                }
                ?>
            </div>
        </div>
    </div>
    </body>
    </html>
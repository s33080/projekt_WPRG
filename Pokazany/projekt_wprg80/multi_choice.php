<?php
session_start();
require_once "Services/AccountHandler.php";
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
            height: 1100px;
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
        .button:hover{
            background-color: darkkhaki;
            transition: 0.5s;
        }
        #enter{
            margin-top: 10px;
            font-size: large;
        }
        #vivarium{
            text-decoration: none;
            color: black;
        }
        #vivarium:visited{
            color: black;
        }
        #vivarium:hover{
            background: -webkit-linear-gradient(white, yellowgreen);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: 0.1s;
        }
        .stopka{
            display: flex;
            width: 98%;
            justify-content: center;
            margin: 1%;
            border-radius: 10px;
            background: linear-gradient(265.27deg, #d3ff00 20.55%, #7de300 94.17%);
            justify-items: center;
        }
    </style>
    <body>
    <div class="container">
        <div class="box box1"><a href="index.php" id="vivarium">VIVARIUM QUIZZES</a></div>
        <div class="box box2">
            <div id="menu">
                SINGLE CHOICE QUIZ
            </div>
            <div>
                <div class="box box3">
                    <form method="post">
                        <div>
                            Enter quiz name
                            <div>
                                <input name="quiz_name" id="enter" type="text" placeholder="Enter quiz name" required>
                            </div>
                            Choose subject
                            <div>
                                <select name="subject" class="button">
                                    <option value='reptiles'>reptiles</option>
                                    <option value='amphibians'>amphibians</option>
                                    <option value='fish'>fish</option>
                                    <option value='other'>other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button class="button" type="submit">Create your quiz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="stopka">
            <p>&copy;Vivarium Quizzes by s33080</p>
        </div>
    </div>
    </body>
    </html>
<?php
if (isset($_POST['subject'])) {
    $ownerID = (new AccountHandler())->getUserID($_SESSION['name']);
    $QuizHandler = new QuizHandler();
    $QuizHandler->createQuiz($_POST['quiz_name'] ,$ownerID, $_POST["subject"], 'multi_choice');
    $_SESSION['quizID'] = $QuizHandler->getQuizID();
    header("Location: add_question_single.php");
    die();
}
?>
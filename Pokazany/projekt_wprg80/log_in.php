<?php
session_start();
require "Services/AccountHandler.php";
require "Services/PathChanger.php";
require "Services/PictureUploader.php";
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
        .button_login{
            font-size: medium;
            margin-bottom: 25px;
            margin-top: 20px;
            width: 200px;
            background-color: khaki;
            border-radius: 5px;
        }
        #avatar{
            border: solid 3px black;
            background-color: white;
        }
        #enter{
            margin-top: 10px;
            font-size: large;
        }
    </style>
    <body>
    <div class="container">
        <div class="box box1"><a href="index.php" id="vivarium">VIVARIUM QUIZZES</a></div>
        <div class="box box2">
            <div id="menu">
                LOG IN
            </div>
            <div>
                <div class="box box3">
                    <img id="avatar" src="pictures/avatars/default_picture.jpg" alt="">
                    <form method="post">
                        <div>
                            <input name="name" id="enter" type="text" placeholder="Enter Username" required>  <!--USERNAME-->
                        </div>
                        <div>
                            <input name="password" id="enter" type="password" placeholder="Enter Password" required> <!--PASSWORD-->
                        </div>
                        <div>
                            <button class="button_login" type="submit">Log In</button>
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
if (isset($_POST["name"]) && isset($_POST["password"])) {
    $AccountHandler = new AccountHandler();
    if($AccountHandler->nameExists($_POST["name"])){
        if($AccountHandler->passwordCorrect($AccountHandler->getUserID($_POST["name"]),$_POST["password"])){
            $_SESSION['name'] = $_POST["name"];
            $_SESSION['avatar'] = $AccountHandler->getPicturePath($AccountHandler->getUserID($_POST["name"]));
            header("Location: logged_in_page.php");
            die();
        }
    }
}
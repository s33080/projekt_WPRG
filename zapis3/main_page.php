<?php
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
        margin-top: 20%;
    }
    #menu{
        margin-top: 20px;
    }
    #button{
        font-size: large;
        margin-bottom: 10px;
        width: 200px;
        background-color: khaki;
    }
</style>
<body>
<div class="container">
    <div class="box box1">VIVARIUM QUIZZES</div>
    <div class="box box2">
        <div id="menu">
            Menu
        </div>
        <div>
            <div class="box box3">
                <form action="log_in.php"> <!--LOG IN PAGE-->
                    <div><input type="submit" id="button" name="log_in" value="log in"></div>
                </form>
                <form action="sign_in_page.php"> <!--SIGN IN PAGE-->
                    <div><input type="submit" id="button" name="sign_in" value="sign in"></div>
                </form>
                <form action="sign_in_page.php"> <!--CHOOSE QUIZ-->
                    <div><input type="submit" id="button" name="choose_quiz" value="choose quiz"></div>
                </form>
                <form action="sign_in_page.php"> <!--QUIZ OF THE DAY-->
                    <div><input type="submit" id="button" name="quiz_day" value="quiz of the day"></div>
                </form>
                <form action="arcade_page.php"> <!--ARCADE-->
                    <div><input type="submit" id="button" name="arcade" value="arcade"></div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
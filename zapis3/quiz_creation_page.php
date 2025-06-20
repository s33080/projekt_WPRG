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
        font-size: medium;
        margin-bottom: 25px;
        margin-top: 20px;
        width: 200px;
        background-color: khaki;
    }
</style>
<body>
<div class="container">
    <div class="box box1">VIVARIUM QUIZZES</div>
    <div class="box box2">
        <div id="menu">
            CHOOSE TYPE
        </div>
        <div>
            <div class="box box3">
                <form action="guess_pic.php">
                    <div><input type="submit" id="button" name="guess" value="guess picture"></div>
                </form>
                <form action="">
                    <div><input type="submit" id="button" value="single choice"></div>
                </form>
                <form action="">
                    <div><input type="submit" id="button" value="multiple choices"></div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

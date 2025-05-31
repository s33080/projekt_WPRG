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
        margin-bottom: 25px;
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
                <form method="POST">
                    <div><input type="submit" id="button" name="log_in" value="log in"></div>
                    <div><input type="submit" id="button" name="sign_in" value="sign in" onclick=location='/Accc.php'></div>
                    <div><input type="submit" id="button" name="choose_quiz" value="choose quiz"></div>
                    <div><input type="submit" id="button" name="quiz_day" value="quiz of the day"></div>
                    <div><input type="submit" id="button" name="arcade" value="arcade"></div>
                </form>
            </div>
        </div>
<!--        --><?php //if(isset($_POST['log_in']) ){ echo "SUKCES";}?>
<!--        --><?php //if(isset($_POST['sign_in']) ){
//            AccountCreationPage::constructAccountCreationPage();
//        }?>
<!--        --><?php //if(isset($_POST['choose_quiz']) ){ echo "SUKCES";}?>
<!--        --><?php //if(isset($_POST['quiz_day']) ){ echo "SUKCES";}?>
<!--        --><?php //if(isset($_POST['arcade']) ){ echo "SUKCES";}?>
    </div>
</div>
</body>
</html>

<?php
require_once "Services/AccountHandler.php";
$avatar="pictures/avatars/default_picture.jpg";
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
    #avatar{
        border: solid 3px black;
        background-color: white;
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
            Create your account
        </div>
        <div>
            <div class="box box3">
                <img id="avatar" src="<?php echo $avatar ?>" alt="">
                <form method="post">
                    Upload your profile picture
                    <div id="pic">
                        <input type="file">
                    </div>
                    <div>
                        <input name="name" id="enter" type="text" placeholder="Enter Username" required>
                    </div>
                    <div>
                        <input name="password" id="enter" type="text" placeholder="Enter Password" required>
                    </div>
                    <div>
                        <button class="button" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php

if (isset($_POST["name"]) && isset($_POST["password"])) {
    if (!(new AccountHandler)->nameExists($_POST["name"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $avatar = "path/to/avatar.png";
        (new AccountHandler)->createAccount($name, $password, $avatar);
        header("Location: main_page.php");
        die();
    }
    header("Location: sign_in_page.php");
    die();

}
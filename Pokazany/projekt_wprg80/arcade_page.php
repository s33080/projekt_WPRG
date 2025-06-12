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
    <div class="box box1"><a href="main_page.php" id="vivarium">VIVARIUM QUIZZES</a></div>
    <div class="box box2">
        <div id="menu">
            Create account
        </div>
        <div>
            <div class="box box3">
                arcade page
            </div>
        </div>
    </div>
    <div class="stopka">
        <p>&copy;Vivarium Quizzes by s33080</p>
    </div>
</div>
</body>
</html>
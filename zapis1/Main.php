<?php
require_once "Pages/Page.php";
require_once "Pages/AccountCreationPage.php";
Page::constructPage();
if(isset($_POST['log_in']) ){ echo "SUKCES";}
if(isset($_POST['sign_in']) ){
    clearstatcache();
    AccountCreationPage::constructAccountCreationPage();
}
if(isset($_POST['choose_quiz']) ){ echo "SUKCES";}
if(isset($_POST['quiz_day']) ){ echo "SUKCES";}
if(isset($_POST['arcade']) ){ echo "SUKCES";}
//if(isset($_GET($button))){
//
//}
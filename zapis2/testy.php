<?php
require_once "Services/PathChanger.php";
$_SESSION['avatar'] = "pictures/avatars/butterfly_scare.png";
echo $_SESSION['avatar'] . "<br>";
$wu = new PathChanger();
$wu->changeAvatarPath("beer.jpg");
echo $_SESSION['avatar'];
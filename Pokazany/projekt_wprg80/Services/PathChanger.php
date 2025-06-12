<?php
class PathChanger{

    function changeAvatarPath($file_name){
        $avatars = substr($_SESSION['avatar'], 0, 17);
        $_SESSION['avatar'] = "$avatars$file_name";
    }
    function getPicturePath($file_name){
        return "pictures/quiz_pictures/$file_name";
    }
}
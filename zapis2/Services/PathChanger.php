<?php

class PathChanger{

    function changeAvatarPath($file_name){
        $avatar = substr($_SESSION['avatar'], 0, 17);
        $_SESSION['avatar'] = $avatar . $file_name;
    }
}
<?php

class PictureUploader{
    public function upload_avatar_picture(){
        $target_dir = "pictures/avatars/";
        $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
            return false;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            return false;
        }
        move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file);
        return true;
    }
    public function upload_quiz_picture(){
        $target_dir = "pictures/quiz_pictures/";
        $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
            return false;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            return false;
        }
        move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file);
        return $target_file;
    }
    public function delete_quiz_file($file){
        //unlink($file);
    }
}
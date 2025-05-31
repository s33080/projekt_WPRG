<?php

class PictureHandler{
    public function upload_avatar_picture($file){
        $target_dir = "pictures/avatars/";
        $target_file = $target_dir . basename($_FILES["file_to_upload"]["avatar"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if ($uploadOk) {
            fopen($target_file, "w+");
        }
    }
    public function delete_avatar_picture($file){

    }
    public function upload_quiz_picture($file){

    }
    public function delete_quiz_file($file){
        //unlink($file);
    }
}
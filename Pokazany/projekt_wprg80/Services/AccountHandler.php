<?php

class AccountHandler{
    public function connectToDatabase(){
        $mysqli = new mysqli("szuflandia.pjwstk.edu.pl", "s33080", "Oli.Ludw", "s33080");
//        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        return $mysqli;
    }
    function getUserID($username){
        $mysqli = $this->connectToDatabase();
        //$mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "Select user_id from users where name = '$username'";
        $result = mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
        return $result->fetch_assoc()["user_id"];
    }
    function createAccount($name, $password, $avatar){
        $mysqli = $this->connectToDatabase();
        //$mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "INSERT INTO users VALUES (NULL, '$name', '$password','user', '$avatar')";
        mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
    }
    function nameExists($name): bool
    {
        $mysqli = $this->connectToDatabase();
        //$mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT name FROM users WHERE name='".$name."'";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    function passwordCorrect($user_id, $password)/*: bool*/
    {
        $mysqli = $this->connectToDatabase();
        //$mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT password FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($mysqli, $query);
        return $result->fetch_assoc()["password"];
       /* try{
            $hashed_password = $result->fetch_assoc()["password"];
            return password_verify($password, $hashed_password);
        }
        catch(Exception $e){
            return "COS POSZLO NIE TAK";
        }*/
    }
    function getPicturePath($user_id){
        $mysqli = $this->connectToDatabase();
        //$mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT avatar_path FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
        return $result->fetch_assoc()["avatar_path"];
    }
//    function deleteAccount($name){
//        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
//        $query = "DELETE FROM users WHERE name='$name'";
//        mysqli_query($mysqli, $query);
//    }
//    function changePassword($name, $password, $avatar){
//        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
//
//    }
//    function changeAvatar($name, $avatar){
//        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
//
//    }
//    function changeName($name, $newName){
//        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
//
//    }

}
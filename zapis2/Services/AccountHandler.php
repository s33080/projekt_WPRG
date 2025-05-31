<?php

class AccountHandler
{
    function createAccount($name, $password, $avatar){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "INSERT INTO users VALUES (NULL, '$name', '$password','user', '$avatar')";
        mysqli_query($mysqli, $query);
        mysqli_close($mysqli);
        //$mysqli->close();
        //exit();
    }
    function deleteAccount($name){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "DELETE FROM users WHERE name='$name'";
        mysqli_query($mysqli, $query);
        //$mysqli->close();
    }
    function nameExists($name){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");
        $query = "SELECT name FROM users WHERE name='".$name."'";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    function changePassword($name, $password, $avatar){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");

    }
    function changeAvatar($name, $avatar){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");

    }
    function changeName($name, $newName){
        $mysqli = new mysqli("localhost", "root", "", "vivarium_quizes_database");

    }

}
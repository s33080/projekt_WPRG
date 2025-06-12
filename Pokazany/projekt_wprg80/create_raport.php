<?php
session_start();
if (isset($_SESSION['name'])) {
    $myfile = fopen("newfile.txt", "w");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    header("logged_in_php");
    die();
} else {
    echo "Must log in first.";
}


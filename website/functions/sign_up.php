<?php
include_once "dbConn.php";

if (isset($_POST["submit"])) {
    
    $rights=$_POST["accType"];
    $fullName=$_POST["fullName"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    $pwd_repeat=$_POST["pwd_repeat"];

    if (emptyInput($rights, $fullName, $email, $pwd, $pwd_repeat)) {
        header("location: ../SignUp?error=emptyInput");
        exit();
    }
    
} else {
    header("location: ../SignUp.php");
    exit();
}
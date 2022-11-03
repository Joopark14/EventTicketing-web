<?php
include_once "dbConn.php";
include "function.php";

if (isset($_POST["submit"])) {
    
    $rights=$_POST["accType"];
    $fullName=$_POST["nameFull"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    $pwd_repeat=$_POST["pwd_repeat"];


    if (emptyInput($rights, $fullName, $email, $pwd, $pwd_repeat)!==false) {
        header("location: ../SignUp.php?error=emptyInput");
        exit();
    }
    if (invalidName($fullName)!==false) {
        header("location: ../SignUp.php?error=invalidName");
        exit();
    }
    if (invalidEmail($email) !==false) {
        header("location: ../SignUp.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($pwd, $pwd_repeat) !==false) {
        header("location: ../SignUp.php?error=pwdDoNotMatch");
        exit();
    }
    if (userExists($db, $email) !==false) {
        header("location: ../SignUp.php?error=userExists");
        exit();
    }

    createUser($db, $rights, $fullName, $email, $pwd);

} else {
    header("location: ../SignUp.php");
    exit();
}
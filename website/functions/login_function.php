<?php
if(isset($_POST["submit"])){

    $email = $_POST["uid"];
    $pwdUser = $_POST["pwd"];

    require_once 'dbConn.php';
    require_once 'function.php';
    
    if (emptyInputLogin($email,$pwdUser) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }
    loginUser($db, $email, $pwdUser);

}else{
    header("location: ../login.php");
    exit(); 
}

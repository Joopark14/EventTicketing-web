<?php
if(isset($_POST["submit"])){

    $email = $_POST["uid"];
    $password = $_POST["password"];

    require_once 'dbConn.php';
    require_once 'function.php';
    
    if (emptyInputLogin($email,$password) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    

    loginUser($db, $email, $password);

}else{
    header("location: ../login.php");
    exit(); 
}

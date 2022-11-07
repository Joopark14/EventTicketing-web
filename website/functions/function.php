<?php

function emptyInput($rights, $fullName, $email, $pwd, $pwd_repeat) {
    if (empty($rights) || empty($fullName) || empty($email) || empty($pwd) || empty($pwd_repeat)) {
        return true;
    } else {
        return false;
    }
}

function invalidName($fullName) {
    if (!preg_match("/^[a-zA-Z0-9_ -]*$/", $fullName)) {
        return true;
    }
    return false;
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function pwdMatch($pwd, $pwd_repeat) {
    if ($pwd !== $pwd_repeat) {
        return true;
    }
    return false;
}

function userExists($db, $email) {
    
    if (!$stm = $db -> prepare("SELECT e_mail FROM account_table WHERE e_mail=?")) {
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    $stm -> execute([$email]);
    $result = $stm->fetchAll();

    if ($result) {
        echo $result;
        return $result;
    } else {
        return false;
    }


}

function createUser($db, $rights, $fullName, $email, $pwd) {

    if (!$stmt_create_acc = $db->prepare("INSERT INTO account_table VALUES(DEFAULT, ?, ?, ?, ?);")) {
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt_create_acc->execute([$fullName, $email, $hashedPwd, $rights]);
    header("location: ../SignUp.php?error=NONE");
    exit();
}

//login functions
function emptyInputLogin($email, $password ){
    $result = true;
    if(empty($email) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($db, $email, $password){
    $uidExists = userExists($db, $email);

    if ($uidExists === false ) {
        header("login: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $uidExists["account_password"];
    $checkPwd = password_verify($password, $passwordHashed);

    if ($checkPwd === false) {
        header("login: ../login.php?error=wronglogin");
        exit();
    }else if($checkPwd === true ){
        session_start();
        $_SESSION["account_id"] = $uidExists["account_id"];
        $_SESSION["user_name"] = $uidExists["user_name"];
        header("login: ../index.php");
        exit();
    }
}

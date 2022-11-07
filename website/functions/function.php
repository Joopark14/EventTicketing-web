<?php

function emptyInput($rights, $fullName, $email, $pwd, $pwd_repeat)
{
    if (empty($rights) || empty($fullName) || empty($email) || empty($pwd) || empty($pwd_repeat)) {
        return true;
    } else {
        return false;
    }
}

function emptyField($input)
{
    if (empty($input)) {
        return true;
    } else {
        return false;
    }
}

function invalidName($fullName)
{
    if (!preg_match("/^[a-zA-Z0-9_ -]*$/", $fullName)) {
        return true;
    }
    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function pwdMatch($pwd, $pwd_repeat)
{
    if ($pwd !== $pwd_repeat) {
        return true;
    }
    return false;
}

function userExists($email)
{
    include "./pdo.php";
    
    if (!$stm = $db->prepare("SELECT e_mail FROM account_table WHERE e_mail=?")) {
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    $stm->execute([$email]);
    $result = $stm->fetchAll();

    if ($result) {
        echo $result;
        return $result;
    } else {
        return false;
    }
}

function createUser($rights, $fullName, $email, $pwd)
{

    include "./pdo.php";
    if (!$stmt_create_acc = $db->prepare("INSERT INTO account_table VALUES(DEFAULT, ?, ?, ?, ?);")) {
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt_create_acc->execute([$fullName, $email, $hashedPwd, $rights]);
    header("location: ../SignUp.php?error=NONE");
    exit();
}

function call_everything_from_db($table)
{
    include "./pdo.php";
    $array = [];
    $sql = "SELECT * from $table";
    foreach ($db->query($sql) as $row) {
        array_push($array, $row["category_name"]);
    }

    return $array;
}

function add_category($category_name)
{
    include "./pdo.php";
    //SQL constructor
    if (!$stmt_add_category = $db->prepare("INSERT INTO category_table VALUES(DEFAULT, ?);")) {
        exit();
    }
    $stmt_add_category->execute([$category_name]);
    exit();
}

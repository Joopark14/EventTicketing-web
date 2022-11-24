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

    if (!$stm = $db->prepare("SELECT * FROM account_table WHERE e_mail=?")) {
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    $stm->execute([$email]);
    $result = $stm->fetch();

    if ($result) {
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

//login functions
function emptyInputLogin($email, $password)
{
    $result = true;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($email, $pwdUser)
{
    $uidExists = userExists($email);

    if ($uidExists === false) {
        header("location: ../login.php?error=invalidEmail");
        exit();
    }

    $passwordHashed = $uidExists[3];
    $checkPwd = password_verify($pwdUser, $passwordHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=invalidPassword");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["account_id"] = $uidExists["account_id"];
        $_SESSION["user_name"] = $uidExists["user_name"];
        $_SESSION["e_mail"] = $uidExists["e_mail"];
        $_SESSION["rights"] = $uidExists["account_access"];
        header("location: ../index.php");
        exit();
    }
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

function buy_ticket()
{

    include "./pdo.php";

    $sql = "UPDATE ticket_category_table SET quantity = quantity - 1";
    $db->query($sql);

    header("location: ../index.php");
    exit();
}

function ticket_to_cart($add_this)
{
    include "./pdo.php";
     


    $sql = "INSERT INTO cart_table values(" . $add_this . ", " . $_SESSION["account_id"] . ", 1);";
    $db->query($sql);

    header("location: ../ticket_category.php");
    exit();
}

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

function call_everything_from_db($table)
{
    include "./pdo.php";
    try {
        $array = [];
        $sql = "SELECT * from $table";
        foreach ($db->query($sql) as $row) {
            array_push($array, $row["category_name"]);
        }
    } catch (PDOException $e) {
        print('<span class="error">Not working &#128557</span>');
        print('<span>Error message</span>');
        print('<pre class="error">' . $e->getMessage() . '</pre>');
    }
    return $array;
}
<?php

function call_db($table)
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

function add_category($category_name)
{
    include "./pdo.php";
    //SQL constructor
    if (!$stmt_add_category = $db->prepare("INSERT INTO category_table VALUES(DEFAULT, ?);")) {
        header("location: ../add_category.php?error=stmtFailed");
        exit();
    }
    $stmt_add_category->execute([$category_name]);
    header("location: ../add_category.php");
    exit();
}

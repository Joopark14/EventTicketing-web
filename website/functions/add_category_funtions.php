<?php
include "function.php";

if (isset($_POST["submit"])) {
    
    $name=$_POST["category_name"];


    if (emptyField($name)!==false) {
        header("location: ../add_category.php?error=emptyInput");
        exit();

    add_category($name);

} else {
    header("location: ../add_category.php");
    exit();
}
}
<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $password = $_POST["password"];

    if(emptyInput($name, $password) !== false){
        header("location ../Login?error=emptyInput");
    }
}else {

}


?>
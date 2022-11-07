<link rel="stylesheet" href="./styles/login.css">

<body>

    <div class="form-container">
        <form action="./function/login_function.php" method="post">
            <h2>login</h2>
            <input type="text" name="uid" required placeholder="enter name">
            <input type="password" name="password" required placeholder="enter password">

            <input type="submit" name="submit">



        </form>

    </div>
    <?php

    if(isset($_GET["error"])){
        if($_GET["error" == "wronglogin"]){
            echo "<p>Incorent login information!</p>";
        }
    }
    if (emptyInput($rights, $fullName, $email, $pwd, $pwd_repeat)!==false) {
        header("location: ../SignUp.php?error=emptyInput");
        exit();
    }   
    ?>

</body>

<?php
if(isset($_POST["submit"])){

    $email = $_POST["uid"];
    $password = $_POST["pwd"];

    require_once '';
    
    if (emptyInputLogin($email,$password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($db, $email, $password);

}else{
    header("location: ../login.php");
    exit(); 
}


?>
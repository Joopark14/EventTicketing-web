<?php
include "navigation.php";

?>

<link rel="stylesheet" href="./styles/SignUp.css">

<section class="signup">
    <div class="form-container">
        <form action="./functions/login_function.php" method="post">
            <h2>Login</h2>
            <input type="text" name="uid" placeholder="Enter E-mail">
            <input type="password" name="pwd" placeholder="Enter Password">
            <button type="submit" name="submit">Login</button>
            <br>
            <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInput"){
                        echo '<p class="error">Fields have to be filled!</p>';
                    }else if($_GET["error"] == "invalidEmail"){
                        echo '<p class="error">Invalid Email!</p>';
                    }
                     else if($_GET["error"] == "invalidPassword"){
                        echo '<p class="error">Invalid Password!</p>';
                    }
                }
            ?>
        </form>

    </div>
</section>


</body>

</html>
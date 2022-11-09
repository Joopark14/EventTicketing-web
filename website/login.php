<?php
include "navigation.php";

?>

<link rel="stylesheet" href="./styles/SignUp.css">

<section class="signup">
    <div class="form-container">
        <form action="./functions/login_function.php" method="post">
            <h2>login</h2>
            <input type="text" name="uid" required placeholder="enter name">
            <input type="password" name="pwd" required placeholder="enter password">
            <button type="submit" name="submit">Sign Up</button>
        </form>

    </div>
</section>


</body>

</html>
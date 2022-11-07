<?php
    include "./navigation.php"
?>
<link rel="stylesheet" href="./styles/SignUp.css">
    <section class="signup" method="post">
        <h2>SIGN UP</h2>
        <form action="./functions/sign_up.php" method=post>
            <label>Choose account type</label>
            <select name="accType">
                <option value="organizer">As a seller</option>
                <option value="customer" selected>As customer</option>
            </select>
            <input type="text" name="nameFull" placeholder="Enter your full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwd_repeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign Up</button>
            <br>
        </form>
        <?php
            
        ?>
    </section>

</body>
</html>
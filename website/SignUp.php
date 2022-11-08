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
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput") {
                        echo '<p class="error">Fill in all the information.</p>';
                    } else if ($_GET["error"] == "invalidName") {
                        echo "<p>Please use a real name.</p>";
                    } else if ($_GET["error"] == "invalidEmail") {
                        echo "<p>This email does not exists.</p>";
                    } else if ($_GET["error"] == "pwdDoNotMatch") {
                        echo "<p>Repeat the same password twice.</p>";
                    } else if ($_GET["error"] == "userExists") {
                        echo "<p>There is already an account using this email.</p>";
                    } else if ($_GET["error"] == "stmtFailed") {
                        echo "<p>There was an unexpected error.<br>Please try again.</p>";
                    }
                }
            ?>
        </form>
    </section>


</body>
</html>
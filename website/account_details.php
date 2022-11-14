<?php
    include "./navigation.php"
?>
<head>
    <title> Account details</title>
    <link rel="stylesheet" href="./styles/account_details.css">
</head>
<body>
    <div class="account_details">
        <h1>Account details</h1>
        <form action="./functions/function.php" method="post">
            <p>Name:</p>
            <?php
                echo $_SESSION["user_name"];
            ?>
            <p>Email:</p>
            <?php
                echo $_SESSION["e_mail"]
            ?>
            <p>Account type:</p>
            <?php
                echo $_SESSION["rights"]
            ?>
            <p>Password</p>
            <!-- Password visibilty -->
            <!--<input type="password" value="FakePSW" id="myInput"> -->
            <p>Change Password</p>
            

        </form>
    </div>
</body>
</html>
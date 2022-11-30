<?php
    include "./navigation.php"
?>
 <link rel="stylesheet" href="./styles/account_details.css">
 
<head>
    <title> Account details</title>
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


        </form>
    </div>
</body>
</html>
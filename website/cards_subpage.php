<?php
include "navigation.php";

?>

<link rel="stylesheet" href="./styles/SignUp.css">

<body>
    <h1>Account details</h1>
    <form action="./functions/function.php" method="post">
        <input type="text" name="fname" placeholder="First name">
        <input type="text" name="lname" placeholder="Last name">
        <input type="number" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXXX">
        <input type="date" name="expirationdate">
        <button type="submit" name="addcard">Add card</button>

    </form>
</body>

</html>
<?php 
    session_start();
    if (!isset($_SESSION["account_id"])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickify</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- css source path -->
    <link rel="stylesheet" href="./styles/nav.css">
</head>

<body>

    <nav class="nav">
        <ul class="nav__items wrapper">
            <li class="nav__item nav__item--logo"><a href="./index.php">Tickify</a></li>
            <li class="nav__item nav__item--cart"><a href="#"><img src="../img/icons/shopping-cart.svg" alt=""></a></li>
            <li class="nav__item nav__item--user"><img src="../img/icons/user.svg" alt="">
                <ul class="nav__dropdown">
                    <li class="nav__dropdown-item"><a href="./SignUp.php">Register</a></li>
                    <li class="nav__dropdown-item"><a href="./login.php">Log in</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    
    <!-- test code  -->

<?php
    } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickify</title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- css source path -->
    <link rel="stylesheet" href="styles/nav.css">
</head>

<body>

    <nav class="nav">
        <ul class="nav__items wrapper">
            <li class="nav__item nav__item--logo"><a href="#">Tickify</a></li>
            <li class="nav__item nav__item--cart"><a href="#"><img src="../img/icons/shopping-cart.svg" alt=""></a></li>
            <li class="nav__item nav__item--user"><img src="../img/icons/user.svg" alt="">
                <ul class="nav__dropdown">
                    <li class="nav__dropdown-item"><a href="#">Settings</a></li>
                    <li class="nav__dropdown-item"><a href="#">Orders</a>
                    <li class="nav__dropdown-item"><a href="#">Cards</a>
                    <li class="nav__dropdown-item"><a href="./functions/LogOut.php">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    
    <!-- test code  -->

    <div class="" style="height: 100vh;"></div>
    <div class="" style="height: 100vh;"></div>
    <div class="" style="height: 100vh;"></div>


    <!-- test  -->


    <!-- ././  -->

    <!-- ../  -->
<?php }
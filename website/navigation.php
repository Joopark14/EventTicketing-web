<?php 
    session_start();
    $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
    $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
    if (!isset($_SESSION["account_id"])){
        if($isMob||$isTab){
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

     <!-- css fonts source -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- css source path -->
    <link rel="stylesheet" href="./styles/nav.css">
</head>

<body>

    <!-- navigation for mobile devices - not logged in users -->

    <nav class="nav nav-mobile">
        <ul class="nav__items wrapper">
            <li class="nav__item nav__item--logo"><a href="index.php">Tickify</a></li>
            <li class="nav__item nav__item--cart"><a href="#"><i class="material-icons">add_shopping_cart</i></a></li>
            <li class="nav__item nav__item--user"><i class="material-icons">person</i>
                <ul class="nav__dropdown">
                    <li class="nav__dropdown-item"><a href="SignUp.php">Register</a></li>
                    <li class="nav__dropdown-item"><a href="login.php">Log in</a></li>
                </ul>
            </li>
        </ul>
    </nav>
<?php
        }else{
?>
    <!-- navigation for desktop devices -->
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

        <!-- css fonts source -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- css source path -->
        <link rel="stylesheet" href="./styles/nav.css">
    </head>
    <nav class="nav nav-desktop">
        <ul class="nav__items wrapper">
            <li class="nav__item nav__item--logo"><a href="#"><i class="material-icons">check_circle</i><span>Tickify</span></a></li>
            <li class="nav__item nav__item--cart"><a href="#">Cart</a></li>
            <li class="nav__item nav__item--user"><a href="#">Account</a>
                <ul class="nav__dropdown">
                    <li class="nav__dropdown-item"><a href="SignUp.php">Register</a></li>
                    <li class="nav__dropdown-item"><a href="login.php">Log in</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    
    <!-- test code  -->

<?php
        }
    } else {
        if ($isMob||$isTab) {
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

        <!-- css fonts source -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- css source path -->
        <link rel="stylesheet" href="./styles/nav.css">
    </head>

    <body>
    <!-- navigation for mobile devices - logged in users  -->
    <!-- navigation for mobile devices  -->

    <nav class="nav nav-mobile">
        <ul class="nav__items wrapper">
            <li class="nav__item nav__item--logo"><a href="index.php">Tickify</a></li>
            <li class="nav__item nav__item--cart"><a href="#"><i class="material-icons">add_shopping_cart</i></a></li>
            <li class="nav__item nav__item--user"><i class="material-icons">person</i>
                <ul class="nav__dropdown">
                    <li class="nav__dropdown-item"><a href="./account_details.php">Settings</a></li>
                    <li class="nav__dropdown-item"><a href="#">Orders</a>
                    <li class="nav__dropdown-item"><a href="#">Cards</a>
                    <li class="nav__dropdown-item"><a href="./functions/LogOut.php">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- navigation for desktop devices - logged in users -->
<?php
        }else{
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

        <!-- css fonts source -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- css source path -->
        <link rel="stylesheet" href="./styles/nav.css">
    </head>

    <body>
    <nav class="nav nav-desktop">
        <ul class="nav__items wrapper">
            <li class="nav__item nav__item--logo"><a href="#"><i class="material-icons">check_circle</i><span>Tickify</span></a></li>
            <li class="nav__item nav__item--cart"><a href="#">Cart</a></li>
            <li class="nav__item nav__item--user"><a href="#">Account</a>
                <ul class="nav__dropdown">
                    <li class="nav__dropdown-item"><a href="#">Orders</a></li>
                    <li class="nav__dropdown-item"><a href="./account_details.php">Settings</a></li>
                    <li class="nav__dropdown-item"><a href="#">Cards</a></li>
                    <li class="nav__dropdown-item"><a href="./functions/LogOut.php">Log out</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    
    <!-- test code  -->



    <!-- test  -->


    <!-- ././  -->

    <!-- ../  -->
<?php
        }
    }
?>
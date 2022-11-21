<?php
    include "navigation.php";
    include "./functions/pdo.php";
?>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tickify</title>

        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

        <!-- css icon source -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- css source path -->

        <link rel="stylesheet" href="./styles/main.css">
</head>


    <header class="header">

        <div class="hero-shadow"></div>

        <div class="header__text">
         <h1 class="header__title">Welcome to <span class="header__title-span">Tickify</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus, maxime.</p>
        </div>

        <a href="#events">
            <div class="header__icon-box">
                <i class="material-icons header__icon">arrow_downward</i>
            </div>
        </a>

    </header>


    <main>
        <section class="events" id="events">
            <div class="wrapper">

                <h2 class="section-title">Events</h2>


                <div class="events__cards-box">

                <?php 
                        $sql = "SELECT * FROM category_table;";
                        $result = $db->query($sql);
                        while($row = $result->fetch()) {
                            echo "<div class='events__card'>
                                <div class='events__card-img events__card-img--first'>
    
                                    <h3 class='events__card-title'>".$row[1]."</h3>
    
                                    <a href='#'><button class='events__card-btn'>Details</button></a>
    
                                </div>
                            </div> ";
                        }
                    ?>



                </div>
            </div>

        </section>
    </main>


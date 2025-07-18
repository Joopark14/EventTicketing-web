<?php include "./functions/function.php"?>



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
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- css source  -->
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>

    <nav class="nav">
        <div class="wrapper">
            <a class="nav__logo" href="#"><i class="fa-regular fa-circle-check"></i><span
                    class="blue-text">Tickify</span></a>

            <div class="nav__items">
                <a href="#home" class="nav__item">Home</a>
                <a href="#" class="nav__item">About Us</a>
                <a href="#offers" class="nav__item">Offers</a>
                <a href="#contact" class="nav__item">Contact</a>
            </div>
        </div>
    </nav>

    <header id="home" class="header">
        <div class="hero-shadow"></div>
        <div class="header__text">
            <h1 class="header__title"> Welcome to <span class="header__span">Tickify</span></h1>
            <p class="header__subtitle">In a place where travelling becomes easier than ever.</p>
            <a href="#" class="header__btn">Explore</a>
        </div>
    </header>

    <main>

        <section id="offers" class="offers">
            <h2 class="section-titile">Our offers</h2>
            <div class="underline"></div>

            <div class="wrapper">
                <div class="offers__card-box">

                    <?php $array=call_everything_from_db("category_table"); foreach($array as $key=>$value): ?>
                            <div class="offers__card" onclick="void(0)">

                            <div class="offers__card-img offers__card-img--first">
    
                                <h3 class="offers__card-img-title"><?= $value; ?></h3>
                                <p class="offers__card-img-text">more info</p>
                            </div>
    
                            <div class="offers__card-info">
                                <h3 class="offers__card-info-title"><?= $value; ?></h3>
                                <ul class="offers__card-info-list">
                                    <li class="offers__card-info-list-item">Lorem ipsum</li>
                                    <li class="offers__card-info-list-item">Lorem ipsum</li>
                                    <li class="offers__card-info-list-item">Lorem ipsum</li>
                                    <li class="offers__card-info-list-item">Lorem ipsum</li>
                                    <li class="offers__card-info-list-item">Lorem ipsum</li>
    
                                </ul>
    
                                <a href=<?= "./" . $value . ".php"; ?>>
                                    <button class="offers__card-info-btn">Choose</button>
                                </a>;
                            </div>
    
                        </div>

                    <?php endforeach; ?>
                    

                </div>
            </div>

        </section>

        <section class="contact">
            <h2 class="section-titile">Contact us</h2>
            <div class="underline"></div>

            <div class="wrapper">

                <div class="contact__form">

                    <div class="contact__form-item">
                        <label for="" class="contact__label">Your name:</label>
                        <input type="text" class="contact__input">
                    </div>
                    <div class="contact__form-item">
                        <label for="" class="contact__label">Your e-mail:</label>
                        <input type="text" class="contact__input">
                    </div>
                    <div class="contact__form-item">
                        <label for="" class="contact__label">Your message:</label>
                        <textarea name="" id="" cols="30" rows="10" class="contact__textarea"></textarea>
                    </div>

                    <button class="contact__btn">Send</button>
                </div>
            </div>
        </section>

    </main>

    <!-- <div style="height: 100vh;"></div>
    <div style="height: 100vh;"></div> --> -->

</body>

</html>
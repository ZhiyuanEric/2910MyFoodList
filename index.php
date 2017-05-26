
<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/home.css">
    </head>

    <body class="rain">

        <?php include("include/header.inc"); ?>

        <main>
            <section class="foodbg">
                <div class="container">
                    <div class="textBox col-md-offset-8 col-md-4">
                        <h1 class="easterEggBox">Waste Less Food
                        </h1>
                        <div>
                            <p class="foodText">
                                To better determine yours and others' food preferences so you will be more aware of what others need and don't need.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dark-section">
                <div class="container">
                    <h1>Our Mission</h1><br />
                    <p>
                        <br />
                        We want to provide a way for you to know what to buy for when you are cooking for more than just yourself.
                    </p>
                </div>
            </section>

            <section class="stepBG">
                <div class="container">
                    <div class="textBox">
                        <h1>What can I do?</h1>
                        <div class="stepText">
                            <p>
                                1. Create your own lists of food preferences based on likes, dislikes, and food allergies by registering an account with us.
                            </p>
                            <p>
                                2. Combine your list with your friends' list so you can see what everyone's preferences are.
                            </p>
                            <p>
                                3. Log in to start preparing!
                            </p>
                        </div>
                    </div>
                    <div class="row endButton">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-lg btn-block registerBtn" type="button" onclick="location.href='register.php';">Register</button>
                            <button class="btn btn-secondary btn-sm btn-block haveAccBtn" style="background-color: #e3e3e3;" type="button" onclick="location.href='login.php';">Already have an account?</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </section>

            <section class="endBlock">
                <div class="container">
                    <div class="aboutUs">
                        <h2>About Us</h2>
                        <br />
                        <p>
                            We are a team of 6 developers based in <span id="easterRain">Metro Vancouver</span>. Our overall project goal is to reduce food waste. The target is reducing unwanted leftovers which makes up 20% of all food waste.
                        </p>
                        <br />
                        <p>
                            If you have any questions or comments regarding our website, please use our "Contact Us" form located at the bottom of the page to reach us.
                        </p>
                    </div>
                </div>
            </section>
        </main>

        <?php include("include/footer.inc") ?>

        <script src="js/rain.js"></script>


        <script>
            $("#easterRain").click(function(){
                $("#easterRain").text("Metro Raincouver");
                createRain();
            });
        </script>
    </body>
</html>

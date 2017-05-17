<!DOCTYPE html>
<html>
    <head>
        <title>iPicky - Home</title>
        <meta http-equiv="Content-Type" content="text/html" charset=utf-8/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- from inc file -->
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/home.css">
    </head>
    
    <body>
        <?php include("include/logged_in_header.inc"); ?>
        
        <main>
            <section class="foodbg">
                <div class="container row">
                    <div class="col-md-8"></div>
                    <div class="textBox col-md-4">
                        <h1 class="easterEggBox">
                            <span class="easterEgg">
                                <span class="easterEggFade">Waste Less</span>
                                <span class="easterEggAppear">More</span>
                            </span>
                            <span>Food</span>
                        </h1>
                        <div>
                            <p class="foodText">
                                To better determine your food preferences so that you will be more aware of what you need and what you don't need.
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
                        We want to help you reduce food waste and ultimately save money.  We also aim to bring awareness to your everyday life style of what you need to buy and what you may not need to buy.
                    </p>
                </div>
            </section>
            
            <section class="stepBG">
                <div class="container">
                    <div class="textBox">
                        <h1>What do I need to do?</h1>
                        <div class="stepText">
                            <p>
                                1. Create your very own lists of food preferences based on likes, dislikes, and any food allergies. 
                            </p>
                            <p>
                                2. Combine your list with your friends list so you can see what everyone's preferences are.
                            </p>
                            <p>
                                3. Log in or Create an account to know exactly what to parepare for when you want to cook for a group of people.
                            </p>
                        </div>
                    </div> 
                    <div class="row endButton">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-lg btn-block registerBtn" type="button">Register</button> 
                            <button class="btn btn-secondary btn-sm btn-block haveAccBtn" type="button">Already have an account?</button>
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
                            This website was created by a team of 6 developers for our Comp 2910 Projects course.  Our main goal in this project is to bring awareness to how much food one can potentially waste.  Through our web application, our intended idea is to combine several people's preferences together to see how a meal could be better prepared.
                        </p>
                        <br />
                        <p>
                            If you have any questions or comments regarding our website, please use our "Contact Us" form located at the bottom of the page to reach us.
                        </p>
                    </div>
                </div>
            </section>
        </main>
        
        <footer>
            <div class="container footerThings">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="footerBox col-md-6">
                        <p>&copy; Team 26</p>
                        <p>
                            <a href="#">Contact Us</a> | <a href="affiliated.php">Affiliate Sites</a> | <a href="index.php">Members Login</a> | <a href="register.php">Register</a>
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </footer>
    
    
    
    
    
    </body>
</html>
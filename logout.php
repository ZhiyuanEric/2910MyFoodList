<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
unset($_SESSION['username']);
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FoodDocs - Logged out</title>
        <meta http-equiv="Content-Type" content="text/html"; charset=utf-8/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="logout.css">
    </head>
    <body>
        <header>
            <div id="logo" class="container">
                <div class="col-xs-12">
                    <img src="https://raw.githubusercontent.com/ZhiyuanEric/2910MyFoodList/Login-Page/images/logo.png">
                    <h1 class="title"> FoodDoc </h1>
                </div>
            </div>
            <nav class="container">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container">
            <div class="text-center msgBlock">
                <h2> Logged out</h2>
                <h4> You'll be redirected to login</h4>
            </div>
        </main>
    </body>
</html>
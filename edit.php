<?php
    session_start();
    $_SESSION["msg"] = 'nothing';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>FoodDoc</title>
	<meta http-equiv="Content-Type" content="text/html" charset=utf-8/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
		<div style="text-align:center; margin-top:50px" class="col-xs-12" id="header">
            <img src="images/logo.png">
            <h1 style="display:inline">FoodDoc</h1>
            <hr>
        </div>
        </div>
    <form name="form" method="post" action="edit_finish.php">
        
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="name">Name:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="name">
                    Name:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="id" name="name" placeholder="Enter your name"></div>
        </div>
        
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="intro">Self Intro:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="intro">
                    Self Intro:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="id" name="bio" placeholder="Introduce your self"></div>
        </div>

        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="like">Like:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="like">
                    Like:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="id" name="likes" placeholder="foods you like"></div>
        </div>
        
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="dislike">Dislike:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="dislike">
                    Dislike:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="id" name="dislikes" placeholder="foods you dislike"></div>
        </div>
        
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="allergies">Allergies:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="allergies">
                    Allergies:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="id" name="allergies" placeholder="any allergies"></div>
        </div>

        <div class="visible-lg visible-md row">
            <div class="col-md-2 col-md-offset-3" >
                <button id= "check" value="Submit" type="submit" class="btn btn-block">submit</button>
            </div>
            <div class="col-md-2" >
                <button type="reset" value="Reset" class="btn btn-block">Reset</button>
            </div>
            <div class="col-md-2" >
                <a href="profile.php"><button type="button" class="btn btn-block">Cancel</button></a>
            </div>
        </div>
		
        <!-- mobile / tablet -->
        <div class="hidden-lg hidden-md">
            <div style="margin-top:20px" class="col-xs-12" >
                <script>
                    function EntryChecking() {
                        var msg = "true";
                        if (msg == "true")
                        document.getElementById("check").value="submit";
                    }
                </script>
                <button type="submit" value="Submit" class="btn btn-block">Submit</button>
            </div>
            <div style="margin-top:20px" class="col-xs-12" >
                <button type="reset" value="Reset" class="btn btn-block">Reset</button>
            </div>
            <div style="margin-top:20px" class="col-xs-12" >
                <a href="profile.php"><button type="button" class="btn btn-block">Cancel</button></a>
            </div>
        </div>
    </form>
    <footer class="col-xs-12">
		<hr>
		<p style="text-align:center">&copy Team 26</p>
	</footer>
    </div>
</body>
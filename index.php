<!DOCTYPE html>
<html lang="en">
<head>
	<title>FoodDoc</title>
	<meta http-equiv="Content-Type" content="text/html" charset=utf-8/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/header.css">
	
	<style>
		div div {
			margin: auto;
		}
		
	</style>
</head>
<body background="images/bg.png">
	<div class="container">
		<div id ="logo" class="row">
			<div class="col-xs-12" id="header">
                <img src="images/logo.png">
				<hr>
			</div>
		</div>
        
        <h2 style="text-align:center">Login</h2>
        
        
		<form name="form" method="post" action="connect.php">
            <div class="contentBox row">
            <div class="form-group col-md-12 row">

                <!--mobile / tablet view-->
                <div class="visible-sm visible-xs">
                <label class="col-xs-12" for="username">Username:</label>
                </div>

                <!--desktop view-->
                <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="username">Username:</label>
                </div>

                <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="user" name="user" placeholder="Enter username"></div>

            </div>

            <div class="form-group col-md-12 row">

                <!--mobile / tablet view-->
                <div class="visible-sm visible-xs">
                <label class="col-xs-12" for="password">Password:</label>
                </div>

                <!--desktop view-->
                <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="password">Password:</label>
                </div>

                <div class="col-md-6 col-xs-12">
                <input type="password" class="form-control" id="pw" name="pw" placeholder="Enter password"></div>

            </div>			
			
			<?php
			if (isset($_GET['error'])) {
				echo '<p class="red row col-xs-11 col-xs-offset-1">Please do not leave fields blank.</p>';
			}
			?>
                
            </div>

			<!-- desktop -->
			<div class="visible-lg visible-md row">
				<div class="col-md-2 col-md-offset-3" >
					<button type="submit" class="btn btn-block btn-primary">Login</button>
				</div>
				<div class="col-md-2" >
					<button type="reset" value="Reset" class="btn btn-block btn-primary">Reset</button>
				</div>
				<div class="col-md-2" >
					<a href="register.php"><button type="button" class="btn btn-block btn-primary">Create Account</button></a>
				</div>
			</div>
            
		
			<!-- mobile / tablet -->
			<div class="hidden-lg hidden-md">
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row" >
					<button type="submit" class="btn btn-block btn-primary">Login</button>
				</div>
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row" >
					<button type="reset" value="Reset" class="btn btn-block btn-primary">Reset</button>
				</div>
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row" >
					<a href="register.php"><button type="button" class="btn btn-block btn-primary">Create Account</button></a>
				</div>
			</div>
                
		</form>
			
		<footer class="col-xs-12">
			<hr>
			<p style="text-align:center">&copy Team 26</p>
		</footer>
		
	</div>
</body>
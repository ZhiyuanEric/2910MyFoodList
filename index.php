<!DOCTYPE html>
<html lang="en">
<head>
	<title>FoodDoc</title>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		a:link, a:visited, a:hover, a:active {
			text-decoration: none;
			color: black;
		}
		button {
			color: black;
		}
	</style>
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
		<form name="form" method="post" action="connect.php">

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
					<input type="text" class="form-control" id="id" name="id" placeholder="Enter username"></div>
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

			<!-- desktop -->
			<div class="visible-lg visible-md row">
				<div class="col-md-2 col-md-offset-3" >
					<button type="submit" class="btn btn-block">Login</button>
				</div>
				<div class="col-md-2" >
					<button type="reset" value="Reset" class="btn btn-block">Reset</button>
				</div>
				<div class="col-md-2" >
					<button type="button" class="btn btn-block"><a href="register.php">Create Account</a></button>
				</div>
			</div>
		
			<!-- mobile / tablet -->
			<div class="hidden-lg hidden-md">
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row" >
					<button type="submit" class="btn btn-block">Login</button>
				</div>
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row" >
					<button type="reset" value="Reset" class="btn btn-block">Reset</button>
				</div>
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row" >
					<button type="button" class="btn btn-block"><a href="register.php">Create Account</a></button>
				</div>
			</div>
		</form>
		
		<footer class="col-xs-12">
			<hr>
			<p style="text-align:center">&copy Team 26</p>
		</footer>
	</div>
</body>
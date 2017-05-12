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
    <script>
        function EntryChecking() {
            document.writeln("<h1>" + errmsg + "</h1>" );
            var check = 0;
            var id = document.getElementById("user").value;
            var pw = document.getElementById("pw").value;
            var pw2 = document.getElementById("pw2").value;
            var errmsg;
            if (pw == null) {
                errmsg = "Please create a Passward";
            } else if (pw2 == null) {
                errmsg = "Please confirm the Passward";
            } else if (id == null) {
                errmsg = "Please create an Username";
            } else if (pw != pw2) {
                errmsg = "Two passwards do not match";
            }
            
            if (check == 0) {
                document.writeln("<h1>" + errmsg + "</h1>" );
            } else {
                document.getElementById("1").type="submit";
                document.getElementById("2").type="submit";
            }
        }
    </script>
    <div class="container">
		<div class="row">
			<div style="text-align:center; margin-top:50px" class="col-xs-12" id="header">
				<img src="images/logo.png">
				<h1 style="display:inline">FoodDoc</h1>
				<hr>
			</div>
		</div>
    <form id="form" name="form" method="post" action="register_finish.php">
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="username">Username:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="username">
                    UserName:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="user" name="user" placeholder="Used for login"></div>
        </div>
        
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="password">Password:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="password">
                    Password:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="password" class="form-control" id="pw" name="pw" size="20" placeholder="Setup your password"></div>
        </div>
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="password">Comfirm Password:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="password">
                    Confirm Password:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="password" class="form-control" id="pw2" name="pw2" placeholder="Confirm your password">
<!--
                <?php
                while (!empty($_POST["pw2"])) {
                    if (!($_POST["pw2"] == $_POST["pw"])) {
                        echo $errormsg2;
                    }
                }
                ?>
-->
            </div>
        </div>
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="likes">Likes:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="likes">
                    Likes:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="likes" name="likes" placeholder="What you like"></div>
        </div>
        <div class="form-group col-md-12 row">

				<!--mobile / tablet view-->
            <div class="visible-sm visible-xs">
				<label class="col-xs-12" for="dislikes">Dislikes:</label>
            </div>

				<!--desktop view-->
            <div class="hidden-sm hidden-xs">
                <label style="text-align:right" class="col-md-4" for="dislikes">
                    Dislikes:
                </label>
            </div>
				
            <div class="col-md-6 col-xs-12">
                <input type="text" class="form-control" id="dislikes" name="dislikes" placeholder="what you dislike"></div>
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
                <input type="text" class="form-control" id="allergies" name="allergies" placeholder="Some Allergies"></div>
        </div>
        
        <!-- buttons desktop -->
			<div class="visible-lg visible-md row">
				<div class="col-md-2 col-md-offset-3" id="check" >
					<button id = "1" type="button" class="btn btn-block" onclick="EntryChecking()">Submit</button>
				</div>
				<div class="col-md-2" >
					<button type="reset" value="Reset" class="btn btn-block">Reset</button>
				</div>
				<div class="col-md-2" >
					<a href="index.php"><button type="button"  class="btn btn-block">Cancel</button></a>
				</div>
			</div>
		
			<!-- mobile / tablet -->
			<div class="hidden-lg hidden-md">
				<div style="margin-top:20px" class="col-xs-12" id="check">
					<button id="2" type="button" onclick="EntryChecking()" class="btn btn-block">Submit</button>
				</div>
                <div style="margin-top:20px" class="col-xs-12" >
					<button type="reset" value="Reset" class="btn btn-block">Reset</button>
				</div>
				<div style="margin-top:20px" class="col-xs-12" >
					<a href="index.php"><button type="button" class="btn btn-block">Cancel</button></a>
				</div>
			</div>
		</form>
    <footer class="col-xs-12">
		<hr>
		<p style="text-align:center">&copy Team 26</p>
	</footer>
    </div>
</body>
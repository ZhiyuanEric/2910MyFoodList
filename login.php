<?php
    session_start();
    //If user is already logged in
    if (isset($_SESSION['accNo'])) {
        header("Location:profile.php"); die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/footerpush.css" />
        <link rel="stylesheet" href="css/login.css" />
    </head>
<body>
	<?php include("include/header.inc"); ?>

	<div class="container">
        <div class="contentBox">
            <form name="form">

                <div class="page-header">
                    <h1>Login</h1>
                </div>
                <div class="row">
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

                    <div style="text-align:center" id="error" class="col-xs-12 row"></div>

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
        <div id='gplus' style="text-align:center; margin: 20px 0px 0px 0px" class="col-xs-12 row">
			<?php include("gplus.php"); ?>
        </div>
        </div>

	</div>
    <?php include("include/footer.inc") ?>
</body>
<script src="js/login.js"></script>

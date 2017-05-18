<!DOCTYPE html>
<html lang="en">
<?php include("include/head.inc"); session_start();?>
<body>
	<?php include("include/logged_in_header.inc"); ?>

	<div class="container">

        <h2 style="text-align:center">Login</h2>


		<form name="form" method="post" action="connect.php?reg=1">
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

		<div style="text-align:center; margin: 20px 0px 0px 0px" class="col-xs-12 row">
			<?php include("gplus.php"); ?>
        </div>
<?php include("include/footer.inc") ?>
	</div>
</body>

<?php
    session_start();
?>
<html lang="en">
<?php include("include/head.inc"); ?>

<body>

    <?php include("include/logged_in_header.inc"); ?>

	<div class="container">

        <h2 id="title" style="text-align:center">Registration</h2>

    <form name="form" method="post">

        <div class="contentBox row">

            <div id="part1">

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
                    <input type="text" class="form-control" id="user" name="user" placeholder="Used for login"></div>
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
                    <input type="password" class="form-control" id="pw" name="pw" size="20" placeholder="Setup your password"></div>
            </div>

            <div class="form-group col-md-12 row">

                    <!--mobile / tablet view-->
                <div class="visible-sm visible-xs">
                    <label class="col-xs-12" for="password">Comfirm Password:</label>
                </div>

                    <!--desktop view-->
                <div class="hidden-sm hidden-xs">
                    <label style="text-align:right" class="col-md-4" for="password">Confirm Password:</label>
                </div>

                <div class="col-md-6 col-xs-12">
                    <input type="password" class="form-control" id="pw2" name="pw2" placeholder="Confirm your password">
                </div>

            </div>

            </div>

            <div id="part2" style="display:none">

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
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name"></div>
            </div>

            <div class="form-group col-md-12 row">

                    <!--mobile / tablet view-->
                <div class="visible-sm visible-xs">
                    <label class="col-xs-12" for="intro">Introduce yourself:</label>
                </div>

                    <!--desktop view-->
                <div class="hidden-sm hidden-xs">
                    <label style="text-align:right" class="col-md-4" for="intro">
                        Introduce yourself:
                    </label>
                </div>

                <div class="col-md-6 col-xs-12">
                    <input type="text" class="form-control" id="bio" name="bio" placeholder="Introduce your self"></div>
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
                    <input type="text" class="form-control" id="dislikes" name="dislikes" placeholder="What you dislike"></div>

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
                    <input type="text" class="form-control" id="allergies" name="allergies" placeholder="List Some of your Allergies"></div>
            </div>

            </div>

            <div style="text-align:center" id="error" class="col-xs-12 row"></div>
            <div style="text-align:center" id="success" class="col-xs-12 row"></div>
		</div>

            <!-- buttons desktop -->
			<div class="visible-lg visible-md row">
				<div class="col-md-2 col-md-offset-3" >
					<button id = "1" type="submit" class="btn btn-block btn-primary" onclick="EntryChecking()">Continue</button>
				</div>
				<div class="col-md-2" >
					<button type="reset" value="Reset" class="btn btn-block btn-primary">Reset</button>
				</div>
				<div class="col-md-2" >
					<a href="index.php"><button type="button"  class="btn btn-block btn-primary">Cancel</button></a>
				</div>
			</div>

			<!-- mobile / tablet -->
			<div class="hidden-lg hidden-md">
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row">
					<button id="2" type="submit" onclick="EntryChecking()" class="btn btn-block btn-primary">Submit</button>
				</div>
                <div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row">
					<button type="reset" value="Reset" class="btn btn-block btn-primary">Reset</button>
				</div>
				<div style="margin-top:20px" class="col-xs-8 col-xs-offset-2 row">
					<a href="index.php"><button type="button" class="btn btn-block btn-primary">Cancel</button></a>
				</div>
			</div>
		</form>

    </div>

    <?php include("include/footer.inc") ?>

</body>
<script src="js/register.js"></script>

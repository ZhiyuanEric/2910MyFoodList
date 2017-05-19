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
                <script>
                    function userNameChecking() {
                        var un = document.getElementById("user");
                        var pw = document.getElementById("pw");
                        var cpw = document.getElementById("pw2");
                        var submit = document.getElementsByClassName("continue");
                        var p2 = document.getElementsByClassName("p2");
//                        var check = 1;
//                        for (var i = 0; i < p2.length; i++) {
//                            if (p2[i] == "") {
//                                check = 0;
//                            }
//                        }
                        if (un.value == "") {
                            UnMsg.innerHTML = "please create a Username";
                        } else if (un.value != "" && pw.value == "") {
                            UnMsg.innerHTML = "";
                            PwMsg.innerHTML = "please enter the password";
                        } else if (un.value != "" && pw.value != "" && pw2.value == "") {
                            UnMsg.innerHTML = "";
                            PwMsg.innerHTML = "";
                            pwNotSame.innerHTML = "please confirm your password";
                        } else if (un.value != "" && pw.value != "" && pw2.value != "") { //&& check == 0) {
                            submit[0].type = "submit";
                            submit[1].type = "submit";
//                            check = 1;
                        }
//                        else if (check == 1) {
//                            submit[0].type = "submit";
//                            submit[1].type = "submit";
//                        } else if (check == 0) {
//                            submit[0].type = "button";
//                            submit[1].type = "button";
//                        }

                    }
                    
                    function confirmPassword() {
                        var pw = document.getElementById("pw");
                        var cpw = document.getElementById("pw2");
                        var Diff = document.getElementById("pwNotSame")
                        if (pw.value == "" && cpw.value == "") {
                            ;
                        } else if (pw.value != "" && cpw.value != pw.value) {
                            Diff.innerHTML = "passwords don't match."
                        } else if (pw.value == cpw.value) {
                            Diff.innerHTML = "";
                        }
                    }
                    
                    function checkPassword() {
                        var pw = document.getElementById("pw");
                        if (pw.value == "") {
                            PwMsg.innerHTML = "please enter the password";
                        } else if (pw.value != "") {
                            PwMsg.innerHTML = "";
                        }
                    }
                    
                </script>


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
                
                <div class="col-md-6 col-xs-12" id="UnMsg" style="color: red;"></div>
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
                    <input oninput="checkPassword()" type="password" class="form-control" id="pw" name="pw" size="20" placeholder="Setup your password"></div>
                <div class="col-md-6 col-xs-12" id="PwMsg" style="color: red;"></div>
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
                    <input oninput="confirmPassword()" type="password" class="form-control" id="pw2" name="pw2" placeholder="Confirm your password">
                </div>

                <div id="pwNotSame" class="col-md-6 col-xs-12" style="color: red;"></div>
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
                    <input type="text" class="form-control p2" id="name" name="name" placeholder="Enter your full name"></div>
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
                    <input type="text" class="form-control p2" id="bio" name="bio" placeholder="Introduce your self"></div>
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
                    <input type="text" class="form-control p2" id="likes" name="likes" placeholder="What you like"></div>

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
                    <input type="text" class="form-control p2" id="dislikes" name="dislikes" placeholder="What you dislike"></div>

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
		</div>

            <!-- buttons desktop -->
			<div class="visible-lg visible-md row">
				<div class="col-md-2 col-md-offset-3" >
					<button id = "1" type="button" class="btn btn-block btn-primary continue" onclick="userNameChecking()">Continue</button>
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
					<button id="2" type="button" onclick="userNameChecking()" class="btn btn-block btn-primary continue">Continue</button>
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
</html>
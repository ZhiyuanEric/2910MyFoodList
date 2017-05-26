<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/footerpush.css" />
    </head>
    <body>
		<?php include("include/header.inc"); ?>

        <main class="container">
            <section class="userInfo">
                <div class="row contentBox">

                    <div class="col-xs-2 pull-left">
                        <a target="_blank" href="http://ecoders-grocerybuddy.firebaseapp.com"><img class="img-responsive profileImg" src="images/grocery.png" width=128 height=128/></a>
                    </div>
                    <div class="col-xs-10">
                        <a target="_blank" href="http://ecoders-grocerybuddy.firebaseapp.com"><h2>Grocery Buddy</h2></a>
                    
                        <p>Grocery Buddy tracks your shopping list and keeps track of how many food items you have. The food item's current shelf life is represented as an expiration bar.</p>
                    </div>

                </div>
            </section>


            <section class="userInfo">
                <div class="row contentBox">

                    <div class="col-xs-2 pull-left">
                        <a target="_blank" href="http://wnwn.herokuapp.com"><img class="img-responsive profileImg" src="images/waste.png" width=128 height=128 /></a>
                    </div>
                    <div class="col-xs-10">
                        <a target="_blank" href="http://wnwn.herokuapp.com"><h2>WasteNot WantNot</h2></a>
                        <p>A meal planner app that is designed to help users reduce the amount of food they waste.  This is achieved by using portion sizes and a statistics tracker graph for excess amounts food.</p>
                    </div>
                </div>
            </section>


            <section class="userInfo">
                <div class="row contentBox">

                    <div class="col-xs-2 pull-left">
                        <a target="_blank" href="https://overcooked.ca"><img class="img-responsive profileImg" src="images/overcooked.png" width=128 height=128 /></a>
                    </div>
                    <div class="col-xs-10">
                        <a target="_blank" href="https://overcooked.ca"><h2>Overcooked.ca</h2></a>
                        <p>An app so that business owners, farmers, grocery store executives, or anyone can post their surplus foods. This will help bridge a connection between charities and hungry mouths.</p>
                    </div>

                </div>
            </section>
        </main>

		<script>
			$(document).ready(function(){
				$(".nav li:nth-child(3)").addClass("active");
			});
		</script>

        <?php include("include/footer.inc") ?>
    </body>
</html>

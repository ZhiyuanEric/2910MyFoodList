<!DOCTYPE html> 
<html lang="en">
<?php include("include/head.inc"); ?>
    <body> 
		<?php include("include/logged_in_header.inc"); ?>
		
        <main class="container">
            <section class="userInfo">
                <div class="row contentBox">

                    <div class="col-xs-2 pull-left">
                        <img class="img-responsive profileImg" src="images/grocery.png" width=128 height=128/>
                    </div>
                    <div class="col-xs-10">
                        <p class="titles" >Grocery Buddy</p>
                        <hr/>
                        <p>Grocery Buddy tracks your shopping list and keeps track of how much of a food product you have, and the item's current shelf life represented as an expiration bar</p>
                    </div>

                </div>
            </section>
            
            
            <section class="userInfo">
                <div class="row contentBox">

                    <div class="col-xs-2 pull-left">
                        <img class="img-responsive profileImg" src="images/waste.png" width=128 height=128/>
                    </div>
                    <div class="col-xs-10">
                        <p class="titles" >WasteNot WantNot</p>
                        <hr/>
                        <p>Meal planner app designed to help users reduce the amount they waste by helping them with portion sizes and a stat tracker graph for wasted amounts</p>
                    </div>     
                </div>
            </section>
            
            
            <section class="userInfo">
                <div class="row contentBox">

                    <div class="col-xs-2 pull-left">
                        <a target="_blank" href="https://overcooked.ca"><img class="img-responsive profileImg" src="images/overcooked.png" width=128 height=128/></a>
                    </div>
                    <div class="col-xs-10">
                        <p class="titles" href="www.Overcooked.ca">Overcooked.ca</p>
                        <hr/>
                        <p>An app for businesses, farmers, grocery stores, or anyone to post their surplus foods to help connect charities and hungry mouths.</p>
                    </div>

                </div>
            </section>
        </main>

		<script>
			$(document).ready(function(){
				$(".nav li:nth-child(3)").addClass("active");
			});
		</script>
    </body> 
</html>
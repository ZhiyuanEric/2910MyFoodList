<header>
	<!-- nav bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="index.php" class="logo">
                        <img src="images/logoOnlyCropped.png" width="50px" height="40px" class="logoItem" />
                        <span class="logoWord logoItem"> iPicky</span>
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="merge.php">Group Listing</a></li>
                </ul>
                <?php

                if(isset($_SESSION['accNo'])) {
                    echo '<form class="navbar-form navbar-left" name="form" method="get" action="result.php">
                             <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" name="user">
                                </div>
                                <!--<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>-->
                             </div>
                         </form>';
                }
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!isset($_SESSION['accNo'])) {
                        echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    } else {
                        echo '<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
                              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

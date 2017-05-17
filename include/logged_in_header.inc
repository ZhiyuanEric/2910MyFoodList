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
                    <a href="home.php" class="logo">
                        <img src="images/logoOnlyCropped.png" width="50px" height="40px" class="logoItem" />
                        <span class="logoWord logoItem"> iPicky</span>
                        <!-- <img src="images/logoWordOnly.png" height="40px" class="logo logoWord" /> -->
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#">Group Listing</a></li>
                </ul>
                <?php
                if(isset($_SESSION['accNo'])) {
                    echo '<form class="navbar-form navbar-left" name="form" method="get" action="profile.php">
                             <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Search" name="user">
                             </div>
                             <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>  </button>
                         </form>';
                }
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(!isset($_SESSION['accNo'])) {
                        echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                              <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
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
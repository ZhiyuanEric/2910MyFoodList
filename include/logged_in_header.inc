<header>
	<!-- logo -->
	<div class="container">
		<div id="logo" class="container">
			<div class="col-xs-12">
				<img src="images/logo.png">
			</div>
		</div>
	</div>

	<!-- nav bar -->
	<nav class="navbar">
		<div class="container">
			<div class="container-fluid">
				<ul class="nav navbar-nav row">
					<li class="col-sm-2"><a href="profile.php">Profile</a></li>
					<li class="col-sm-2"><a href="#">Group List</a></li>
					<li class="col-sm-2"><a href="affiliated.php">Affiliated Sites</a></li>
                    <li class="searchBar col-sm-5">
                        <form class="navbar-form" name="form" method="get" action="profile.php">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search user" name="user" /> 
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </div>
                        </form>
                    </li>
					<li class="logout col-sm-1"><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
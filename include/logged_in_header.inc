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
				<ul class="nav navbar-nav">
					<li><a href="profile.php">Profile</a></li>
					<li><a href="#">Group List</a></li>
					<li><a href="affiliated.php">Affiliated Sites</a></li>
                    <li class="searchBar">
                        <div>
                            <form name="form" method="get" action="profile.php">
                                <input class="searchField" type="text" name="user" /> 
                                <input class="searchBtn" type="submit" value="Search" />
                            </form>
                        </div>
                    </li>
					<li class="logout"><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div>
				<h1>VT-Web Various</h1>
				</div>
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone" id="membership">
							<?php 
							if(isset($_SESSION['logged_in'])){
								if($_SESSION['logged_in']!=null){
									echo $_SESSION['logged_in'];
								}
							}
							else{
								echo 'Membership';
							}
							?>
						</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li id="li1">
							<?php 
							if(isset($_SESSION['logged_in'])){
								if($_SESSION['logged_in']!=null){
									echo '<a href="profile.php"><i class="icon-cog"></i> Profile</a>';
								}
							}
							else{
								echo '<a href="login.php"> Login </a>';
							}
							?>
						</li>
						<li class="divider"></li>
						<li id="li2">
							<?php 
							if(isset($_SESSION['logged_in'])){
								if($_SESSION['logged_in']!=null){
									echo '<a href="logout.php"><i class="icon-off"></i> Logout</a>';
								}
							}
							else{
								echo '<a href="register.php"> Register </a>';
							}
							?>
						</li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<!-- language starts -->
				
				<!-- language ends -->

				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
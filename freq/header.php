	<!-- header -->
	<div class="header" id="home">
		<div class="content white">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.php">
							<h1><img src="design/images/1.png" style="height: 50px;width: 50px;" alt="">ARCHIVE</h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="active"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="archive.php">Archive</a></li>
								
								<?php  
									if (!isset($_SESSION['id'])) {
										
									
								?>
								<li><a href="signin.php">Sign In</a></li>
								<li><a href="signup.php">Sign Up</a></li>
								<?php }else{ ?>

								<li><a href="dashboard" style="border: 1px solid #e1e1e1;border-radius: 30px;"><i class="fa fa-user-secret"></i> <?php echo $name ?></a></li>

								<?php } ?>
								<li style="position: relative; top: 21px;">
									<form action="search.php" method="get">
										<div class="form-group" style="position: relative;">
											<input type="text" name="search_input" id="search_input" placeholder="Search Here" class="form-control">
											<button type="submit" style="background: #ed1b2e; border: none; outline: none; position: absolute; top:  0; right: 0; width: 36px; height: 34px; color: #fff; border-radius: 5px;"><i class="fa fa-search"></i></button>
										</div>
									</form>
								</li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- //header -->
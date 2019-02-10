    <nav class="navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.html">AMS</a></h1>         
			</div>
			<div class=" border-bottom">
	        	<div class="full-left">
		        	<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
					</section>
					

	            	<div class="clearfix"> </div>
           		</div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <div class=" nav_1">
		           
                    <a href="signout.php" style="margin-top: 20px; margin-bottom: 20px; margin-right: 20px; display: block;">Sign Out</a>
                    <a href="../index.php" style="position: absolute;top: 20px; right: 125px;">Home Page</a>
		           
		        </div>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix"></div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu" style="margin-top: 5vh">
				
                    <li>
                        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-home nav_icon "></i><span class="nav-label">Home</span> </a>
                    </li>

                    <li>
                        <a href="archive_add.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">ADD ARCHIVE</span> </a>
                    </li>

                    <li>
                        <a href="archive_view.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">VIEW ARCHIVE</span> </a>
                    </li>

                    <?php 
                        if ($role == 1) {
                            # code...
                        
                     ?>

                    <li>
                        <a href="category.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">CATEGORY</span> </a>
                    </li>

                    <?php } ?>
                   
                    
                </ul>
            </div>
			</div>
    </nav>
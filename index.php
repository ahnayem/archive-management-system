<?php include 'freq/1.php'; ?>
<?php include 'freq/header.php'; ?>
	


	<!-- welcome -->
	<div class="welcome text-center"> 
		<div class="welcome-overley">
			<div class="container"> 
				<div class="col-md-12 welcome_text">
					<img src="design/images/1.png" style="height: 150px;width: 150px;" alt="">
					<h3 class="agileits-title">Archive Management System</h3>
					<h4>Donec in nisi non ipsum luctus interdi est. Cras ipsum augue, facilisis non estut, bibendum finibus.</h4>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //welcome -->
		
	<!-- Popular Archive -->
	<div class="popular_cakes">
		<div class="container">
			<h3 class="heading">Recent Archives</h3>
			<div class="cakes_grids">
				<?php  

					include 'dashboard/db/db.php';
                    $query = "SELECT * FROM archive ORDER BY archive_id DESC LIMIT 9";
                    $result = mysqli_query($con,$query);

                    if ($result) {
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result)){
                            $archive_id 	= $row['archive_id'];
                            $archive_title 	= $row['archive_title'];
                            $archive_desc 	= $row['archive_desc'];
                            $archive_file 	= $row['archive_file'];
                            $archive_image 	= $row['archive_cover_image'];
                            $archive_date 	= $row['archive_date'];
                            $archive_user_id = $row['user_id'];
                            $archive_cat 		= $row['archive_cat'];
                            


                ?>

				<div class="col-md-4">
					<div class="cakes_grid1" scroll="no" style="overflow: hidden;">
						<!-- <iframe src="dashboard/<?php echo $archive_file ?>" width="100%" scroll="no" style="overflow: hidden; margin-top: -55px; height: 200px;"></iframe> -->
						<?php 
							if (empty($archive_image)) {
								
						?>
						<h3 class="text-center"><i class="fa fa-file"  style="font-size: 100px;"></i></h3>
					<?php }else{ ?>
						<img src="dashboard/<?php echo $archive_image  ?>" style="height: 123px;" alt="">
					<?php } ?>
						<h3><a href="details.php?id=<?php echo $archive_id ?>"><?php echo $archive_title ?></a></h3>
						<p><?php echo substr($archive_desc, 0,20) ?></p>
					</div>
				</div>

				<?php }} ?>

			</div>
		</div> 
	</div>
	<!-- Popular Archive -->


<?php include 'freq/footer.php'; ?>
<?php include 'freq/2.php'; ?>
<?php include 'freq/1.php'; ?>
<?php include 'freq/header.php'; ?>



<!-- innerpages_banner -->
	<div class="innerpages_banner">
		<h2>Archive Gallery</h2>
	</div>
<!-- //innerpages_banner -->


	<!-- Popular Archive -->
	<div class="popular_cakes">
		<div class="container">
			<div class="cakes_grids">
				<div class="row">
					<div class="col-md-8">
					<?php  

						include 'dashboard/db/db.php';
	                    $query = "SELECT * FROM archive ORDER BY archive_id DESC";
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
	                            $archive_user_id 		= $row['user_id'];
	                            $archive_cat 		= $row['archive_cat'];
	                            


	                ?>

					<div class="col-md-4" style="padding: 10px 15px;">
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
					<div class="col-md-4">
						<div class="cakes_grid1">
							<h3 style="padding: 10px 35px; display: block; text-align: left;">Archive Category* </h3>
							<ul style="margin: 0; padding: 10px 35px; list-style-type: none;">
							<?php  
								$query = "SELECT * FROM category ORDER BY cat_id DESC";
								$result = mysqli_query($con,$query);

								if ($result == true) {
								 	while ($row = mysqli_fetch_assoc($result)) {
								 		$cat_name = $row['cat_name'];
							?>
								<li><a href="<?php echo $cat_name; ?>" style="padding: 7px 10px; margin-bottom: 15px; display: block;   color: #000;"> <i class="fa fa-tag"></i> <?php echo $cat_name; ?></a></li>
						<?php }} ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
	<!-- Popular Archive -->



<?php include 'freq/footer.php'; ?>
<?php include 'freq/2.php'; ?>
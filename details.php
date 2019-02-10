<?php include 'freq/1.php'; ?>
<?php include 'freq/header.php'; ?>

<?php  

	$id = $_GET['id'];
	include 'dashboard/db/db.php';
    $query = "SELECT * FROM archive WHERE archive_id = $id";
    $result = mysqli_query($con,$query);

    if ($result) {
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
            $archive_id 	= $row['archive_id'];
            $archive_title 	= $row['archive_title'];
            $archive_desc 	= $row['archive_desc'];
            $archive_file 	= $row['archive_file'];
            $archive_cover_image 	= $row['archive_cover_image'];
            $archive_date 	= $row['archive_date'];
            $archive_user_id 		= $row['user_id'];
            $archive_cat 		= $row['archive_cat'];
            


?>

<!-- innerpages_banner -->
	<div class="innerpages_banner">
		<h2><?php echo $archive_title ?></h2>
	</div>
<!-- //innerpages_banner -->


	<!-- Popular Archive -->
	<div class="popular_cakes">
		<div class="container">
			<div class="cakes_grids">
				

				<div class="col-md-4">
						<img src="dashboard/<?php echo $archive_cover_image; ?>" style="width: 100%;" alt="IMG">	
						<button class="btn btn-danger btn=-lg btn-block"><a href="dashboard/<?php echo $archive_file ?>" target="_blank"><span style="color: white;">View File</span></a></button>
				</div>
				<div class="col-md-8">
					<div class="cakes_grid1" scroll="no" style="overflow: hidden; text-align: left !important;">
						<h3><?php echo $archive_title ?></h3>
						<p><?php echo $archive_desc ?></p>
						<p>Uploaded By : 

						<?php 
							$query = "SELECT * FROM user WHERE id = '$archive_user_id'";
						    $result = mysqli_query($con,$query);

						    if ($result) {
						        $i = 1;
						        while($row = mysqli_fetch_assoc($result)){
						            $id 	= $row['id'];
						            echo $name 	= $row['name'].'<br>';
						            $email 	= $row['email'];
						            $role 	= $row['role'];
						        }
						    }

						    
						    echo "Date: ".date("d-m-y",strtotime($archive_date)).'<br>';

						    $query = "SELECT * FROM category WHERE cat_id = '$archive_cat'";
						    $result = mysqli_query($con,$query);
						    $row = mysqli_fetch_assoc($result);
						    $cat_name = $row['cat_name'];

						    echo "Category: ".$cat_name;

						?>
						</p>
					</div>
				</div>

				<?php }} ?>

			</div>
		</div> 
	</div>
	<!-- Popular Archive -->



<?php include 'freq/footer.php'; ?>
<?php include 'freq/2.php'; ?>
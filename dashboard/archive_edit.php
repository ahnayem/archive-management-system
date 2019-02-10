<?php include 'freq/1.php'; ?>


<?php  

	$get_id = $_GET['id'];

    $query = "SELECT * FROM archive WHERE archive_id = '$get_id'";
    $result = mysqli_query($con,$query);


    if ($result) {
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
            $archive_id 	= $row['archive_id'];
            $archive_title 	= $row['archive_title'];
            $archive_desc 	= $row['archive_desc'];
            $archive_file 	= $row['archive_file'];
            $archive_date 	= $row['archive_date'];
            $archive_user_id 		= $row['user_id'];
            $archive_cat 	= $row['archive_cat'];
        }
    }

    $query = "SELECT * FROM category WHERE cat_id = '$archive_cat'";
    $result = mysqli_query($con,$query);


    if ($result) {
        while($row = mysqli_fetch_assoc($result)){
            $cat_name 	= $row['cat_name'];
        }
    }


?>








<div id="wrapper">

	<?php include 'freq/nav.php'; ?>
    
    <div id="page-wrapper" class="gray-bg dashbard-1">
       	<div class="content-main">
       		<!--banner-->	
		    <div class="banner">
				<h2>
					<a href="../index.php">Home</a>
					<i class="fa fa-angle-right"></i>
					<a href="index.php">Dashboard</a>
					<i class="fa fa-angle-right"></i>
					<span>Edit Archive</span>
				</h2>
		    </div>
			<!--//banner-->
			
			<div class="grid-form">
				<div class="grid-form1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span style="font-size: 30px;">Update Archive</span>
						</div>
						<div class="panel-body">
							<form action="" method="post" enctype="multipart/form-data">

							  <div class="form-group">
							    <label for="title">Title of Archive *</label>
							    <input type="text" class="form-control" id="title" name="archive_title" placeholder="Archive Title" value="<?php echo $archive_title ?>">
							  </div>

							  <div class="form-group">
							    <label for="archive_cat">Category of Archive *</label>
							    <select name="archive_cat" id="archive_cat" class="form-control">
							    	<option value="<?php echo $archive_cat ?>"><?php echo $cat_name ?></option>

							    	<?php  

                                        $query = "SELECT * FROM category ORDER BY cat_id DESC";
                                        $result = mysqli_query($con,$query);

                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)){
                                                $cat_id = $row['cat_id'];
                                                $cat_name = $row['cat_name'];
                                            
                                        

                                    ?>

                                    <option value="<?php echo $cat_id ?>"
										
										<?php  
											if ($cat_name == $archive_cat) {
												echo 'selected';
											}
										?>
										
                                    	>
                                    	<?php echo $cat_name ?>
                                    		
                                    </option>

                                    <?php }} ?>
							    </select>
							  </div>

							  <div class="form-group">
							    <label for="description">Description of Archive *</label>
							    <textarea name="archive_desc" id="description" cols="30" rows="10" class="form-control" placeholder="Archive Description"><?php echo $archive_desc ?></textarea>
							  </div>

							  <div class="form-group">
							    <label for="file">Document File *</label>
							    <input type="file" class="form-control" id="file" name="file" placeholder="Archive Title"><br>
							    <a href="<?php echo $archive_file ?>" style="height: 400px; width: 50%;" class="pull-left" target="_blank">View File</a>
							  </div>

							  <button type="submit" class="btn btn-default pull-right" name="update_archive">Update Archive</button>

							</form>
						</div>
					</div>
				</div>
			</div>

			<?php include 'freq/footer.php' ?>
 			
		</div>
	</div>
		
</div>

<?php 

	 if (isset($_POST['update_archive'])) {
	 	$archive_title 	= mysqli_real_escape_string($con, $_POST['archive_title']);
	 	$archive_cat 	= mysqli_real_escape_string($con, $_POST['archive_cat']);
	 	$archive_desc 	= mysqli_real_escape_string($con, $_POST['archive_desc']);


	    if (!empty($archive_title) || !empty($archive_desc) || !empty($archive_cat)) {
	    	
        	$filesql = "UPDATE archive SET archive_title = '$archive_title',archive_desc = '$archive_desc',archive_cat = '$archive_cat' WHERE archive_id='$get_id'";
        	$fileresult = mysqli_query($con,$filesql);

        	if($fileresult) {
                echo "<script>alert('Archive updated Successfully')</script>";
                echo "<script>window.location.href='archive_view.php'</script>";
            }else {
                echo "<script>alert('Error!!!')</script>";
            }

	    }else{
	    	echo "<script>alert('Error : Fill all the Field !')</script>";
	    }
	}

 ?>
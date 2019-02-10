<?php include 'freq/1.php'; ?>
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
					<span>Add Archive</span>
				</h2>
		    </div>
			<!--//banner-->
			
			<div class="grid-form">
				<div class="grid-form1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span style="font-size: 30px;">Add New Archive</span>
						</div>
						<div class="panel-body">
							<form action="" method="post" enctype="multipart/form-data">

							  <div class="form-group">
							    <label for="title">Title of Archive *</label>
							    <input type="text" class="form-control" id="title" name="archive_title" placeholder="Archive Title">
							  </div>

							  <div class="form-group">
							    <label for="archive_cat">Category of Archive *</label>
							    <select name="archive_cat" id="archive_cat" class="form-control">
							    	<option>Select Option</option>

							    	<?php  

                                        $query = "SELECT * FROM category ORDER BY cat_id DESC";
                                        $result = mysqli_query($con,$query);

                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)){
                                                $cat_id = $row['cat_id'];
                                                $cat_name = $row['cat_name'];
                                            
                                        

                                    ?>

                                    <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>

                                    <?php }} ?>
							    </select>
							  </div>

							  <div class="form-group">
							    <label for="description">Description of Archive *</label>
							    <textarea name="archive_desc" id="description" cols="30" rows="10" class="form-control" placeholder="Archive Description"></textarea>
							  </div>

							  <div class="form-group">
							    <label for="file">Document File *</label>
							    <input type="file" class="form-control" id="file" name="file" placeholder="Archive Title">
							  </div>

							  <div class="form-group">
							    <label for="cover_image">Cover File *</label>
							    <input type="file" class="form-control" id="cover_image" name="cover_image" >
							  </div>

							  <button type="submit" class="btn btn-default" name="add_archive">Add Archive</button>

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

	 if (isset($_POST['add_archive'])) {
	 	$archive_title 	= mysqli_real_escape_string($con, $_POST['archive_title']);
	 	$archive_cat 	= mysqli_real_escape_string($con, $_POST['archive_cat']);
	 	$archive_desc 	= mysqli_real_escape_string($con, $_POST['archive_desc']);
	 	$archive_file 	= mysqli_real_escape_string($con, $_FILES['file']['name']);
	 	$user_id 		= $_SESSION['id'];

	    $folder_path = 'file/';

	    $filename = basename($_FILES['file']['name']);
	    $filename1 = md5($filename);
	    $newname  = str_shuffle($filename1);
	    $newname  = $folder_path . $newname;

	    // $extension=end(explode(".", $archive_file));

	    $tmp = explode('.', $archive_file);
		$extension = end($tmp);

	    $newname_final  = $newname.'.'.$extension;

	    $FileType = pathinfo($newname,PATHINFO_EXTENSION);


	    /* cover Image */
	    $archive_file_cover 	= mysqli_real_escape_string($con, $_FILES['cover_image']['name']);
	    $folder_path_cover = 'file/cover/';

	    $filename_cover = basename($_FILES['cover_image']['name']);
	    $filename1_cover = md5($filename_cover);
	    $newname_cover  = str_shuffle($filename1_cover);
	    $newname_cover  = $folder_path_cover . $newname_cover;

	    // $extension=end(explode(".", $archive_file));

	    $tmp_cover = explode('.', $archive_file_cover);
		$extension_cover = end($tmp_cover);

	    $newname_final_cover  = $newname_cover.'.'.$extension_cover;

	    $FileType = pathinfo($newname_cover,PATHINFO_EXTENSION);


	    if (!empty($archive_title) || !empty($archive_desc) || !empty($archive_cat)) {
	    	$move = move_uploaded_file($_FILES['file']['tmp_name'], $newname_final);
	    	$move_cover = move_uploaded_file($_FILES['cover_image']['tmp_name'], $newname_final_cover);
	    	if (empty($archive_file_cover)) {
	    		$filesql = "INSERT INTO 
	            		archive(user_id,archive_title,archive_desc,archive_file,archive_cat) 
	            		VALUES ('$user_id','$archive_title','$archive_desc','$newname_final','$archive_cat')";
	            	$fileresult = mysqli_query($con,$filesql);

	            	if($fileresult) {
		                echo "<script>alert('Archive added Successfully')</script>";
		                echo "<script>window.location.href='archive_view.php'</script>";
		            }else {
		                echo "<script>alert('Error!!!')</script>";
		            }
	    	}else{

		    	if ($move) {
		            	$filesql = "INSERT INTO 
		            		archive(user_id,archive_title,archive_desc,archive_file,archive_cat,archive_cover_image) 
		            		VALUES ('$user_id','$archive_title','$archive_desc','$newname_final','$archive_cat','$newname_final_cover')";
		            	$fileresult = mysqli_query($con,$filesql);

		            	if($fileresult) {
			                echo "<script>alert('Archive added Successfully')</script>";
			                echo "<script>window.location.href='archive_view.php'</script>";
			            }else {
			                echo "<script>alert('Error!!!')</script>";
			            }
		        }
	    	}
	    }else{
	    	echo "<script>alert('Error : Fill all the Field !')</script>";
	    }
	}

 ?>
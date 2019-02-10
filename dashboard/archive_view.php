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
					<span>View All Archive</span>
				</h2>
		    </div>
			<!--//banner-->
			
			<div class="grid-form">
				<div class="grid-form1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span style="font-size: 30px;">View All Archive</span>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Category</th>
										<th>File</th>
										<th>Cover Image</th>
										<th>Date</th>
										<th>User</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>

								<?php  
									if ($role === '1') {
									
								?>

								<tbody>
									<?php  

				                        $query = "SELECT * FROM archive ORDER BY archive_id DESC";
				                        $result = mysqli_query($con,$query);

				                        if ($result) {
				                            $i = 1;
				                            while($row = mysqli_fetch_assoc($result)){
				                                $archive_id 	= $row['archive_id'];
				                                $archive_title 	= $row['archive_title'];
				                                $archive_desc 	= $row['archive_desc'];
				                                $archive_file 	= $row['archive_file'];
				                                $archive_cover 	= $row['archive_cover_image'];
				                                $archive_date 	= $row['archive_date'];
				                                $archive_user_id = $row['user_id'];
				                                $archive_cat 	= $row['archive_cat'];


				                                $query_cat = "SELECT * FROM category WHERE cat_id = '$archive_cat'";
											    $result_cat = mysqli_query($con,$query_cat);

											    if ($result_cat) {
											        while($row = mysqli_fetch_assoc($result_cat)){
											            $cat_name 	= $row['cat_name'];
											        }
											    }

											    $query_user = "SELECT * FROM user WHERE id = '$archive_user_id'";
											    $result_user = mysqli_query($con,$query_user);

											    if ($result_user) {
											        while($row = mysqli_fetch_assoc($result_user)){
											            $user_id 	= $row['id'];
											            $user_name 	= $row['name'];
											            $user_email 	= $row['email'];
											            $user_role 	= $row['role'];
											        }
											    }
				                                


				                    ?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td><?php echo $archive_title ?></td>

										<td>
											<?php 
												echo $cat_name;
											?>
										</td>

										<td>
											<a href="<?php echo $archive_file ?>">View File</a>
										</td>
										<td>
											<a href="<?php echo $archive_cover ?>">View Cover File</a>
										</td>
										<td><?php echo date('d F Y',strtotime($archive_date)) ?></td>
										<td>
											<?php 
												echo $user_name;
											?>
										</td>
										<td><a href="archive_edit.php?id=<?php echo $archive_id ?>">Edit</a></td>
										<td><a href="archive_delete.php?id=<?php echo $archive_id ?>">Delete</a></td>
									</tr>

									<?php }} ?>
								</tbody>
								
								<?php }else{ ?>

								
								<tbody>
									<?php  

				                        $query = "SELECT * FROM archive WHERE user_id = $user_id";
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
				                                $archive_cat 		= $row['archive_cat'];
				                                


				                    ?>
									<tr>
										<td><?php echo $i++ ?></td>
										<td><?php echo $archive_title ?></td>

										<td>
											<?php 
												$query = "SELECT * FROM category WHERE cat_id = '$archive_cat'";
											    $result = mysqli_query($con,$query);

											    if ($result) {
											        $i = 1;
											        while($row = mysqli_fetch_assoc($result)){
											            $id 	= $row['cat_id'];
											            echo $name 	= $row['cat_name'];
											        }
											    }
											?>
										</td>

										<td>
											<a href="<?php echo $archive_file ?>">View File</a>
										</td>
										<td><?php echo date('d F Y',strtotime($archive_date)) ?></td>
										<td>
											<?php 
												$query = "SELECT * FROM user WHERE id = '$archive_user_id'";
											    $result = mysqli_query($con,$query);

											    if ($result) {
											        $i = 1;
											        while($row = mysqli_fetch_assoc($result)){
											            $id 	= $row['id'];
											            echo $name 	= $row['name'];
											            $email 	= $row['email'];
											            $role 	= $row['role'];
											        }
											    }
											?>
										</td>
										<td><a href="archive_edit.php?id=<?php echo $archive_id ?>">Edit</a></td>
										<td><a href="archive_delete.php?id=<?php echo $archive_id ?>">Delete</a></td>
									</tr>

									<?php }} ?>
								</tbody>

								<?php } ?>

							</table>
						</div>
					</div>
				</div>
			</div>

			<?php include 'freq/footer.php' ?>
 			
		</div>
	</div>
		
</div>

<?php include 'freq/1.php'; ?>

<?php 

	if(isset($_SESSION['id'])){
		header("Location: dashboard");
 	}

 ?>

<?php include 'freq/header.php'; ?>
	


	<!-- Contact -->
	<div class="contact-section" id="contact">
		<div class="container">
			<h3 class="heading">SIGN IN</h3>
			

			<div class="clearfix"> </div>

			<div class="mail_grid_w3l">
				
					<div class="col-md-12 contact_left_grid">
						<form action="" method="post">

							<div class="contact-fields-w3ls">
								<input type="text" name="email" placeholder="Email" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="password" placeholder="Password" required="">
							</div>

							<input type="submit" name="signin" value="Sign In">

						</form>
					</div>

					<div class="clearfix"> </div>

			</div>
		</div>
	</div>
<!--// Contact -->


<?php include 'freq/footer.php'; ?>
<?php include 'freq/2.php'; ?>


<?php 
	
	include 'dashboard/db/db.php';

	if (isset($_POST['signin'])) {
		$myemail 	= mysqli_real_escape_string($con,$_POST['email']);
		$mypassword = mysqli_real_escape_string($con,$_POST['password']); 

		$sql 	= "SELECT id FROM user WHERE email = '$myemail' AND password = '$mypassword'";
		$result = mysqli_query($con,$sql);
		$row 	= mysqli_fetch_array($result);
		$count 	= mysqli_num_rows($result);

		if($count == 1) {
		  $_SESSION['id'] = $row['id'];
		  echo "<script>window.location.href='dashboard'</script>";
		}else {
		  echo "<script> alert('Email or Password Missmatch'); </script>";
		}
	}

?>

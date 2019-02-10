<?php include 'freq/1.php'; ?>
<?php include 'freq/header.php'; ?>
	


	<!-- Contact -->
	<div class="contact-section" id="contact">
		<div class="container">
			<h3 class="heading">REGISTER</h3>
			

			<div class="clearfix"> </div>

			<div class="mail_grid_w3l">
				
					<div class="col-md-12 contact_left_grid">
						<form action="" method="post">

							<div class="contact-fields-w3ls">
								<input type="text" name="fullname" placeholder="Full Name" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="email" placeholder="Email" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="password1" placeholder="Password" required="">
							</div>
							<div class="contact-fields-w3ls">
								<input type="password" name="password2" placeholder="Re-Enter Password" required="">
							</div><br>

							<input type="submit" name="signup" value="Register">

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

	if (isset($_POST['signup'])) {
		$myfullname 	= mysqli_real_escape_string($con,$_POST['fullname']);
		$myemail		= mysqli_real_escape_string($con,$_POST['email']); 
		$mypassword1 	= mysqli_real_escape_string($con,$_POST['password1']); 
		$mypassword2 	= mysqli_real_escape_string($con,$_POST['password2']); 

		if (!empty($myfullname) || !empty($myemail) || !empty($mypassword1) || !empty($mypassword2)) {
			if ($mypassword1 == $mypassword2) {
				$mypassword = $mypassword2;
				$sql = "INSERT INTO user(name,email,password) VALUES('$myfullname','$myemail','$mypassword')";
				$result = mysqli_query($con,$sql);

				if($result) {
					echo "<script> alert('User Successfully Inserted'); </script>";
					echo "<script> window.location.href='signin.php' </script>";
				}else {
					echo "<script> alert('User Not Inserted'); </script>";
				}
			}else{
				echo "<script> alert(Password Missmatch'); </script>";
			}			
		}else{
			echo "<script> alert('Field Empty!!!'); </script>";
		}

		
	}

?>


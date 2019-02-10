<?php  

	session_start();
	include 'db/db.php';

	if(!isset($_SESSION['id'])){
		header("Location: ../signin.php");
 	}


 	$user_id = $_SESSION['id'];

 	$query = "SELECT * FROM user WHERE id = '$user_id'";
    $result = mysqli_query($con,$query);

    if ($result) {
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
            $id 	= $row['id'];
            $name 	= $row['name'];
            $email 	= $row['email'];
            $role 	= $row['role'];
        }
    }

?>




<!DOCTYPE HTML>
<html>
<head>
	<title>AMS | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="design/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="design/css/style.css" rel='stylesheet' type='text/css' />
	<link href="design/css/font-awesome.css" rel="stylesheet"> 
	<link href="design/css/custom.css" rel="stylesheet">

	<script src="design/js/jquery.min.js"> </script>
	<script src="design/js/jquery.metisMenu.js"></script>
	<script src="design/js/jquery.slimscroll.min.js"></script>
	<script src="design/js/custom.js"></script>
	<script src="design/js/screenfull.js"></script>
	<script>
	$(function () {
		$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

		if (!screenfull.enabled) {
			return false;
		}

		$('#toggle').click(function () {
			screenfull.toggle($('#container')[0]);
		});
		
	});
	</script>

	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
</head>
<body>



	
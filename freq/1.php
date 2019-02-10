<?php  
    ob_start();
    session_start();
    include_once('dashboard/db/db.php');


 	if (isset($_SESSION['id'])) {
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
 	}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Archive Management System | By AJIMA </title>

	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
			
	<link href="design/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="design/css/font-awesome.css" rel="stylesheet">

	<link href="design/css/contact.css" rel="stylesheet" type="text/css" media="all" /><!-- contact css -->
	<link href="design/css/gallery.css" rel="stylesheet" type="text/css" media="all" /><!-- gallery css -->
	<link href="design/css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">

</head>
<body>
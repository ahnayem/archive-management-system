<?php  
	session_start();
	session_destroy();
	echo "<script>window.location.href='../signin.php'</script>";
?>
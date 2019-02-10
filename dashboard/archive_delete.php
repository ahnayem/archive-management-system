<?php include 'freq/1.php'; ?>

<?php
                                    
    if(isset($_GET["id"])) {

        $id = $_GET['id'];

        $query2 = "SELECT * FROM archive WHERE archive_id = '$id'";
        $result2 = mysqli_query($con,$query2);
        while ($row = mysqli_fetch_assoc($result2)) {
            $image = $row['archive_file'];
            $file_exists = file_exists("".$image);
            if (!$file_exists) {
                echo "<script>alert('Image Not Found')</script>";
            }else{
                $delete = unlink("$image");
                if ($delete) {
                    $query = "DELETE FROM archive WHERE archive_id = '$id'";
                    $result = mysqli_query($con,$query);
                    if ($result) {
                        echo "<script>alert('Archive DELETED Successfully')</script>";
                        echo "<script>window.location.href='archive_view.php'</script>";
                    }else{
                        echo "<script>alert('Database Delete Error')</script>";
                    }
                }else{
                    echo "<script>alert('Error')</script>";
                }
            }
            
        }
        
    }else{
    	echo "<script>window.location.href='archive_view.php'</script>";
    }
    
?>
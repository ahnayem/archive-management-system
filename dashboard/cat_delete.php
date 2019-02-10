<?php include 'freq/1.php'; ?>


<?php
                                    
    if(isset($_GET["id"])) {


        include 'db/db.php';


        $id = $_GET['id'];


        $query = "DELETE FROM category WHERE cat_id = '$id'";
        $result = mysqli_query($con,$query);
        if ($result) {

            echo "<script>alert('Category DELETED Successfully')</script>";
            echo "<script>window.location.href='category.php'</script>";

        }else{
            echo "<script>alert('ERROR!!! While DELETING Category')</script>";
        }

    }else{
    	echo "<script>window.location.href='cat.php'</script>";
    }
    
?>
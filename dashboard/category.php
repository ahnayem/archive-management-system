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
                    <span>Category</span>
                </h2>
            </div>
            <!--//banner-->
            
            <div class="grid-form" style="min-height: 70vh">
                <div class="grid-form1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="title">ADD NEW CATEGORY</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-input" placeholder="Category Name" id="cat_name" name="cat_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="add_category">ADD CATEGORY</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="title">CATEGORY LIST</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>   
                                            <th>Edit</th>   
                                            <th>Delete</th> 
                                        </tr>

                                        <?php  

                                            $i=1;
                                            include 'db/db.php';

                                            $query = "SELECT * FROM category ORDER BY cat_id DESC";
                                            $result = mysqli_query($con,$query);

                                            if ($result) {
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $id = $row['cat_id'];
                                                    $name = $row['cat_name'];
                                                
                                            


                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><a href="cat_edit.php?id=<?php echo $id; ?>">Edit</a></td>
                                            <td><a href="cat_delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                        </tr>    

                                        <?php }} ?>     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'freq/footer.php' ?>
            
        </div>
    </div>
        
</div>





<?php
                                    
    if(isset($_POST["add_category"])) {
        include 'db/db.php';
        echo $cat_name = mysqli_real_escape_string($con, $_POST['cat_name']);

        if (!empty($cat_name)) {
            $query = "INSERT INTO category(cat_name) VALUES('$cat_name')";
            $result = mysqli_query($con,$query);
            if ($result) {
                echo "<script>alert('Category Inserted Successfully')</script>";
                echo "<script>window.location.href='category.php'</script>";
            }else{
                echo "<script>alert('ERROR!!! While inserting Category')</script>";
            }

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>
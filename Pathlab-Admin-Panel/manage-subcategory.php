<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   

   $result = mysqli_query($con,"SELECT * FROM sub_category where parent_id=0");

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <title>Pathlab Manage SubCategory</title>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
     <?php include_once('includes/sidebar.php');?>

        <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage SubCategory</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-subcategory.php">Manage SubCategory</a></li>
                            <li class="active"> SubCategory</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                               <!--  <strong class="card-title">Manage SubCategory</strong> -->
                               <p style="text-align: right;"><a href="add-subcategory.php"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                <i class="fa fa-list-alt"></i>  Add SubCategory
                                </button></a></p>
                            </div>

    <div class="card-body">
    <table class="table table-striped table-bordered table-md"  id="tablepagination">
        <thead>
            <tr>
                <tr>
                 
                  <th align='center'>Category Name</th> 
                   <!-- <th>User Email</th>
                  <th>User Mobile Number</th> -->
                 <th align='center'>Action</th>
                </tr>
            </tr>
        </thead>

            <tr><td>
                <div class="form-group">
                  <label for="sel1">Category</label>
                  <select class="form-control" id="category">
                  <option value="">Select Category</option>
                    <?php
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["test_name"];?></option>
                    <?php
                    }
                    ?>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label for="sel1">Sub Category</label>
                  <select class="form-control" id="sub_category">
                    
                  </select>
                </div>
            </td>
        </tr>
                </table>
           </div> 
    
</div>
</div>
</div>

</div>
<script>
$(document).ready(function() {
    $('#category').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "get_subcat.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(dataResult){
                    $("#sub_category").html(dataResult);
                }
            });
        
        
    });
});
</script>
 <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php }?>
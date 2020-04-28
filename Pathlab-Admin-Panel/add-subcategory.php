<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['ccmsaid'];
 $subcategory=$_POST['subcategory'];
$price=$_POST['price'];
$id=$_GET['id'];
            //echo $id;die;

 $query=mysqli_query($con,"insert into sub_category(test_name,price,parent_id) value('$subcategory','$price',$id)");

    if ($query) {
    echo '<script>alert("SubCategory has been added.")</script>';
echo "<script>window.location.href ='add-subcategory.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title> Add SubCategory</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add SubTest</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-category.php">Manage Test</a></li>
                            <li><a href="view-subcategory.php">SubTest</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
         <div class="card">
                            <div class="card-header"><strong>SubTest</strong><small> Details</small></div>
                            <form name="computer" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
           <!--  <div class="card-body card-block"> -->

          
            <?php
            $id=$_GET['id'];
            //echo $id;die;
            $result = mysqli_query($con,"SELECT * FROM sub_category WHERE id='$id'");
            while($row = mysqli_fetch_array($result)) {
            ?>
               <!--  <option value="<?php //echo $row["id"];?>"><?php //echo $row["test_name"];?></option> -->
            
            
        
   <!--      </div> -->

          <div class="form-group"><label for="company" class=" form-control-label">Test Name</label><input type="text" name="test_name" value="<?php  echo $row['test_name'];?>" class="form-control" id="compname" required="true" readonly></div>

                <div class="form-group"><label for="company" class=" form-control-label">SubTest Name</label><input type="text" name="subcategory" value="" class="form-control" id="compname" required="true"></div>
                                                          
                <div class="form-group"><label for="street" class=" form-control-label"> Price</label><input type="text" name="price" value="" id="comploc" class="form-control" required="true" ></div>
                <?php
            }
            ?>
                      
        </div>
                                    
                 <div class="card-footer">
                   <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                        <i class="fa fa-dot-circle-o"></i>  Add SubTest
                    </button></p>
                    
                </div>
                </div>
                </form>
            </div>



           
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->


        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

        <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>
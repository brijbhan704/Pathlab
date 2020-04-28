<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['upid'];
$cmsaid=$_SESSION['ccmsaid'];
$test_name=$_POST['test_name'];
/*$UserAddress=$_POST['UserAddress'];
$MobileNumber=$_POST['MobileNumber'];
$Email=$_POST['Email'];
$p=$_POST['Password'];
$Password=base64_encode($p);
$roles=$_POST['roles'];
$IDProof=$_POST['IDProof'];*/

 $query=mysqli_query($con,"update  sub_category SET test_name='$test_name'where id='$eid'");

    if ($query) {
    $msg="User Detail has been update.";
    //header('location:manage-category.php');
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>  
    <title>Update User Details</title>
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
                        <h1>Update Category Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-category.php">Update Category Detail</a></li>
                            <li class="active">Update</li>
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
                            <div class="card-header"><strong>Category</strong><small> Detail</small></div>
                            <form name="package" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['upid'];
//$ret=mysqli_query($con,"select * from  tblusers where ID='$cid'");
 $ret=mysqli_query($con,"select * from sub_category where id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_assoc($ret)) {

?>                              
    <div class="form-group"><label for="company" class=" form-control-label">Category Name</label><input type="text" name="test_name" value="<?php  echo $row['test_name'];?>" class="form-control" id="compname" required="true"></div>
       
           <!--  <div class="form-group"><label for="street" class=" form-control-label">User Address</label><input type="text" name="UserAddress" value="<?php  //echo $row['UserAddress'];?>" id="comploc" class="form-control" required="true"></div>
                <div class="row form-group">
                    <div class="col-12">
                        <div class="form-group"><label for="city" class=" form-control-label">Mobile No.</label><input type="text" name="MobileNumber" id="idadd" value="<?php  //echo $row['MobileNumber'];?>" class="form-control" required="true"></div>

                            <div class="form-group"><label for="city" class=" form-control-label">E-Mail</label><input type="text" name="Email" id="idadd" value="<?php  //echo $row['Email'];?>" class="form-control" required="true"></div>


                            <div class="form-group"><label for="city" class=" form-control-label">Role</label><input type="text" name="roles" id="idadd" value="<?php  //echo $row['name'];?>" class="form-control" required="true"></div> -->

<!-- User Password -->
                           <!--  <div class="form-group"><label for="city" class=" form-control-label">Password</label><input type="text" name="Password" id="idadd" value="<?php  //$d= $row['Password'];
                            //echo base64_decode($d);?>" class="form-control" required="true"></div> -->

                            <!-- <div class="form-group"><label for="city" class=" form-control-label">Id-Proof</label><input type="text" name="IDProof" id="idadd" value="<?php  //echo $row['IDProof'];?>" class="form-control" required="true"></div>
 -->
                        </div>
                        
                        </div>
                        
                        </div>
                        <?php } ?>
                         <div class="card-footer">
                           <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Update
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
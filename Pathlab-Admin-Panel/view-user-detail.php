<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
   /* $cid=$_GET['upid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
      $outtime=$_POST['outtime'];
      $totalhrs=$_POST['totalhrs'];
      $fees=$_POST['fees'];
    
   $query=mysqli_query($con, "update  tblusers set Remark='$remark',Status='$status',Fees='$fees' where ID='$cid'");
    if ($query) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-olduser.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }*/

  
} 

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>View Patient details</title>
    

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
                        <h1>View Users</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-newusers.php">Manage Users</a></li>
                            <li class="active">Users</li>
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
                            <div class="card-header"><strong>View</strong><small> Patient</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
          echo $msg;
        }  ?> </p>
                            <div class="card-body card-block">
         <?php
         $cid=$_GET['upid'];
         //echo "select p.name,p.age,p.doctor_name,p.email,p.mobile,p.total_price,a.test_name,a.test_details from patient p INNER JOIN all_test a ON p.id=a.pt_id where p.id='$cid'";die;
         //echo $cid;die;
        $ret=mysqli_query($con,"select p.name,p.age,p.doctor_name,p.email,p.mobile,p.total_price,a.test_name,a.test_details,a.created_at from patient p INNER JOIN all_test a ON p.id=a.pt_id where p.id='$cid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>                       <table border="1" class="table table-bordered mg-b-0">
   
    <tr>
                                <th>Name</th>
                                   <td><?php  echo $row['name'];?></td>
                                   </tr>                             
    <tr>
                                <th>Email</th>
                                   <td><?php  echo $row['email'];?></td>
                                   </tr>
                                 
                                <tr>
                                <th>Mobile No.</th>
                                   <td><?php  echo $row['mobile'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Doctor Name</th>
                                      <td><?php  echo $row['doctor_name'];?></td>
                                  </tr>
                                      <tr>  
                                       <th>Age</th>
                                        <td><?php  echo $row['age'];?></td>
                                    </tr>
                              <tr>
                               <th>Test Name</th>
                                <td><?php echo $row['test_name'];
                                ;?></td>
                            </tr> 
                             <tr>
                               <th>Test detail</th>
                                <td><?php  echo $row['test_details'];?></td>
                            </tr>

                       <tr>
                       <th>Total price</th>
                         <td><?php  echo $row['total_price'];?></td>

                         </tr>                          
           
                     <tr>
       <th>In Time</th>
       <td><?php  echo $row['created_at'];?></td>
</tr>

</table>
                    </div>
      
                </div>
<?php } ?>

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

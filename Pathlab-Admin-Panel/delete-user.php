<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_GET['id']))
  {
$eid=$_GET['id'];
//echo $eid;die;
$query=mysqli_query($con,"delete FROM tblusers where ID=$eid");

    if ($query) {
    $msg="<script>alert('Data deleted');</script>";
  }
  else
    {
      $msg="<script>Something Went Wrong. Please try again</script>";
    } 
}
header('location:manage-newusers.php');
}

?>

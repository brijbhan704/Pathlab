<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>Pathlab Manage SubTest</title>
   

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
                        <h1>Manage SubTest</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-category.php">Manage Category</a></li>
                            <li class="active"> SubTest</li>
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
                            <?php 

                            $id=$_GET['id'];
                            //echo $id;die;
                            $sql=mysqli_query($con,"SELECT * FROM sub_category where id='$id'");
                            while($Results= mysqli_fetch_assoc($sql)){
                            //echo $Results['id'];die;
                            ?>
                             <div class="card-header">
                                <p style="text-align: right;"><a href="add-subcategory.php?id=<?php echo $Results['id'];?>"> 
                    <button class="btn btn-success btn-xs"><i class="fa fa-circle-o ">Add SubTest</i></button></a></p>
                                
                            </div>
                            <?php }?>
 
    <div class="card-body">
    <table class="table table-striped table-bordered table-md"  id="tablepagination">
        <thead>
            <tr>
                <tr>
                  <th align='center'>S.NO</th>
                  <th align='center'>SubTest Name</th> 
                   <!-- <th>User Email</th>
                  <th>User Mobile Number</th> -->
                 <th align='center'>Action</th>
                </tr>
            </tr>
        </thead>

 <?php
            $rowperpage = 5;
            $row = 0;

            // Previous Button
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }

            $id=$_GET['id'];
            //echo $id;die;
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM sub_category";
            $result = mysqli_query($con,$sql);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];


            // selecting rows
            $sql = "SELECT * FROM sub_category where parent_id='$id' ORDER BY ID ASC limit $row,".$rowperpage;
            $result = mysqli_query($con,$sql);
            $sno = $row + 1;
            while($fetch = mysqli_fetch_array($result)){
                $name = $fetch['test_name'];
                //echo $name;die;
               // $salary = $fetch['Email'];
                 //echo $salary;die;
                //$Mobile = $fetch['MobileNumber'];
                ?>
                <tr>
                    <td align='center'><?php echo $sno; ?></td>
                    <td align='center'><?php echo $name; ?></td>
                    <!-- <td align='center'><?php //echo $salary; ?></td>
                    <td align='center'><?php //echo $Mobile; ?></td> -->
                    <td >
                    <!-- <a href="#?upid=<?php //echo $fetch['id'];?>"><button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button></a> -->

                    <a href="edit-category-detail.php?upid=<?php echo $fetch['id'];?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>

                    <a href="delete-category.php?id=<?php echo $fetch['id'];?>"> 
                    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>

                    
                  </td>
                </tr>

            <?php
                $sno ++;
            }
 ?>

           


    <?php

    /*$result_per_page=3;
        $sql=mysqli_query($con,"select *from tblusers");
        $Results=mysqli_num_rows($sql);
        //echo $Results;die;

             
              $number_of_page=ceil($Results/$result_per_page);

             if (!isset($_GET['page'])) {
                 $page=1;
             }else{
                $page=$_GET['page'];
             }

              $first_page_results = ($page-1)*$result_per_page;

             $sql='SELECT * FROM tblusers LIMIT '. $first_page_results . ','. $result_per_page;
             $ret=mysqli_query($con,$sql);

        $cnt=1;
        while ($fetch=mysqli_fetch_array($ret)) {*/

    ?> 
   <!--  <tbody> -->
                <!-- <tr>
                  <td><?php //echo $cnt;?></td>
                  <td><?php  //echo $fetch['UserName'];?></td>
                  <td><?php  //echo $fetch['Email'];?></td>
                  <td><?php  //echo $fetch['MobileNumber'];?></td> -->
                 
                 
               <!--  </tr> -->
         <?php 
           /* $cnt=$cnt+1;
            }*/

            
            
            ?>
<!-- </tbody> -->
    </table>
   
            <?php 
            
                /*for ($page=1; $page<=$number_of_page; $page++) {
                ?>
               <div class="pagination">
                <button class="btn btn-success btn-xs" id="btn">
                <?php 
                echo '<a href="manage-newusers.php?page='. $page .'">'. $page .'</a>';
                 
                }*/
                ?>
            <!-- </button> -->
            <form method="post" action="">
            <div id="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <input type="submit" class="button" name="but_prev" value="Previous">
                <input type="submit" class="button" name="but_next" value="Next">
            </div>
        </form>
             </div>
                

            </div>
        </div>
    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php }  ?>
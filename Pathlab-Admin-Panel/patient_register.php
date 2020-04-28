
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
   
    <title>Pathlab Reports</title>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                        <h1>Make Patient Reports</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="patient_register.php">Make Patient Reports</a></li>
                            <li class="active">Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                 <div class="container">
                 <form name="bwdatesreport"  action="generate_report.php" method="post">
                  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                  echo $msg;
              }  ?> </p>
                  <div class="row">
                    
                    <div class="col-sm">
                      <label for="company" class=" form-control-label"><strong>Name</strong></label><input type="text" name="name" id="fromdate" class="form-control" required="true" placeholder="Name">
                    </div>

                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"><strong>Age</strong></label><input type="number" name="age"  class="form-control" required="true" placeholder="Age">
                    </div>

                    <div class="col-sm">
                     <label for="vat" class=" form-control-label"><strong>Mobile No.</strong></label><input type="number" name="mobile"  class="form-control" required="true" placeholder="mobile">
                    </div>

                  </div>

                  <div class="row">
                  

                    <div class="col-sm">
                      <!-- <label for="sel1">Category</label> -->
                      <select class="form-control test" id="category" name="category">
                      <option value="">Select Test</option>
                        <?php
                        $result = mysqli_query($con,"SELECT * FROM sub_category where parent_id=0");
                      while($row = mysqli_fetch_array($result)) {
                      ?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["test_name"];?></option>
                      <?php
                      }
                      ?>
                      
                      </select>
                    </div>

                    <div class="col-sm">
                    <!--  <label for="sel1">Sub Category</label> -->
                    <select class="form-control test" id="sub_category" name="sub_category">   
                    </select>

                    </div>

                   <div class="col-sm-0"> <button type="button" id="new"><i class="fa fa-plus"></i></button>
                    <table id="customers">
                          <!-- <tr>
                         <td><input type="text" name="product" value="product.."></input></td>
                        <td><input type="number" name="quantity" value="quanty.."></input></td>
                        <td><input type="number" name="price" value="price.."></input></td>
                      </tr> -->

                 </table>

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
                                //$("#sub_category").html(dataResult);
                               
                              }
                            });
                          
                          
                        });
                      });
                      
                      </script>
                      <script>

                     $(document).ready(function(){
                         
                       $("button").on("click", function(){
                         
                         

                             var row = '<div class="row" id="count"><div class="col-sm"><select class="form-control test" id="sub_category1" name="sub_category1"></select></div><div class="col-sm" id="count1"><input type="text" name="sub_result"  class="form-control" placeholder="Results" onkeyup="disableField()"/></div></div>';

                         $("#customers").append(row);
                         
                       });

                     });
                      $(document).ready(function() {
                        $('#sub_category').on('change', function() {
                            var category_id = this.value;
                            $.ajax({
                              url: "get_subcat.php",
                              type: "POST",
                              data: {
                                category_id: category_id
                              },
                              cache: false,
                              success: function(dataResult){

                                $("#sub_category1").html(dataResult);
                                //$("#sub_category1").html(dataResult);
                               
                              }
                            });
                          
                          
                        });
                      });
                      
                      </script>


                  </div>


                    <div class="col-sm"> <label for="vat" class=" form-control-label"></label><input type="text" name="result"  class="form-control" placeholder="Results" id="cantidadCopias"></div>
                </div>

<!-- <script type="text/javascript">
  function disableField() {
    var cantidadCopias = document.getElementById("cantidadCopias");
    cantidadCopias.disabled = ( val.length > 0  );
}


</script> -->
                <div class="row">
                      <div class="col-sm">
                        <select class="form-control test" name="gender">
                      <option value="">Select Gender</option>
                       <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    
                    </div>
                    <div class="col-sm">
                       <label for="vat" class=" form-control-label"></label><input type="text" name="lab"  class="form-control" required="true" placeholder="Lab Refer No.">
                    </div>
                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"></label><input type="text" name="accession"  class="form-control" required="true" placeholder="Accession No.">
                    </div>
                  </div>
<!-- lab Address -->
                   <div class="row">
                      <div class="col-sm">
                     <label for="vat" class=" form-control-label"></label><input type="text" name="labname"  class="form-control" required="true" placeholder="Lab Name">
                    </div>
                    <div class="col-sm">
                       <label for="vat" class=" form-control-label"></label><textarea name="labaddress"  class="form-control" required="true" placeholder="Lab Address." rows="1" style="resize: none;"></textarea>
                    </div>
                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"></label><input type="text" name="pincode"  class="form-control" required="true" placeholder="PinCode">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm">
                     <label for="vat" class=" form-control-label"></label><input type="number" name="labcontact"  class="form-control" required="true" placeholder="Lab Contact No.">
                    </div>
                    <div class="col-sm">
                    <label for="vat" class=" form-control-label"></label><input type="text" name="labstate"  class="form-control" required="true" placeholder="Select State">
                    </div>
                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"></label><input type="text" name="doctorname"  class="form-control" required="true" placeholder="Referred Doctor Name">
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"></label><input type="datetime-local" name="collectedon"  class="form-control" required="true" placeholder="Collected On">
                    </div>
                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"></label><textarea name="note"  class="form-control" required="true" placeholder="Write Note" rows="2" style="resize: none;"></textarea>
                    </div>
                    <div class="col-sm">
                      <label for="vat" class=" form-control-label"></label><textarea name="instruction"  class="form-control" placeholder="Write Instruction" rows="2" style="resize: none;"></textarea>
                    </div>
                  </div>
                    <div class="row">
                      
                      <div class="col-sm">
                        <label for="vat" class=" form-control-label"></label><input type="text" name="wholetestname"  class="form-control" required="true" placeholder="Whole Test Rate Name">
                      </div>
                      <div class="col-sm">
                        <label for="vat" class=" form-control-label"></label><input type="text" name="wholetest"  class="form-control"  placeholder="Whole Test Result">
                      </div>
                      <div class="col-sm">
                      </div>
                    </div>

                  </div>

                  <div class="card-footer">
                     <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                          <i class="fa fa-dot-circle-o"></i> Submit
                      </button></p>
                      
                  </div>
                    </div>                  
              </div>                                           
              </div>
                   

                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>

<?php

}  ?>
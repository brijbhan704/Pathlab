 <?php
	include('includes/dbconnection.php');
$category_id1=$_POST["category_id1"];
	//echo $category_id;die;
	$result = mysqli_query($con,"SELECT * FROM sub_category where parent_id=$category_id1");
?>
<option value="">Select SubTest</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["id"];?>"><?php echo $row["test_name"];?></option>
<?php
}
?>
<scr

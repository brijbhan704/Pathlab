<?php
$conn=mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'GET';
	
	$id =$conn->real_escape_string(@$_GET['id']);
	$query=$conn->query("SELECT test_name FROM sub_category WHERE parent_id=$id");
	while($d = mysqli_fetch_assoc($query)){
				$data[]=$d;			
			}
	exit(json_encode(array(@$data)));
	//echo $id;die;
	
	
	?>
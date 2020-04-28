<?php

$conn= mysqli_connect("localhost","root","","pathlabs");
//POST METHOD
$_SERVER['REQUEST_METHOD'] == 'POST';
	//echo "POST";

	if(isset($_POST['test_name'])){
	$testname =$conn->real_escape_string($_POST['test_name']);
	$parent_id =$conn->real_escape_string($_POST['parent_id']);
	$price = $conn->real_escape_string($_POST['price']);
	$conn->query("INSERT INTO sub_category (test_name,parent_id,price,created) VALUES ('$testname',$parent_id,$price,NOW())");
	exit(json_encode(array("status"=>'Success')));
	}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your inputs')));


	?>
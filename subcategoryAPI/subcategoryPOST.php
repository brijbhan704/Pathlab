<?php
$conn=mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'POST';
		//echo "POST";
		if(isset($_GET['id'])){
			$id = $conn->real_escape_string($_GET['id']);
			$parent_id = $conn->real_escape_string($_POST['parent_id']);
			$subcategoryname = $conn->real_escape_string($_POST['test_name']);
			
			$price = $conn->real_escape_string($_POST['price']);
			$conn->query("INSERT INTO sub_category (parent_id,test_name,price) VALUES ($parent_id,'$subcategoryname',$price)");
			exit(json_encode(array("status"=>'Success')));
		}else
		exit(json_encode(array("status"=>'Failed', "reason"=>"Check Your Input")));
	




?>
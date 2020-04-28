<?php
		$conn=mysqli_connect("localhost","root","","pathlabs");
		$_SERVER['REQUEST_METHOD'] == 'POST';
		$pt_id=$conn->real_escape_string(@$_GET['id']);

		$test_name =$conn->real_escape_string(@$_POST['test_name']);

		$test_details =$conn->real_escape_string(@$_POST['test_details']);
		$conn->query("INSERT INTO all_test (pt_id,test_name,test_details,created_at) VALUES ($pt_id,'$test_name','$test_details',NOW())");
		$data['message'] = 'Success';
		exit(json_encode($data));
?>
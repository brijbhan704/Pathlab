<?php
$conn= mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'POST';
	//echo "POST";die;
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username =$conn->real_escape_string($_POST['username']);
		$password =$conn->real_escape_string($_POST['password']);
		$conn->query("INSERT INTO user (username,password,created) VALUES ('$username','$password',NOW())");
		exit(json_encode(array("status"=>'Success')));
	}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
	




?>
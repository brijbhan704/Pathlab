<?php
$conn= mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'GET';
	//echo "GET";
	$data = array();
	if(isset($_GET['id'])){
		$id =$conn->real_escape_string($_GET['id']);
		$sql = $conn->query("SELECT username,password FROM user WHERE id='$id'");
		$data =$sql->fetch_assoc();
		//$data=base64_decode($results);
	}else{
		$sql = $conn->query("SELECT username,password FROM user");
		while($d =$sql->fetch_assoc()){
			$data[]=$d;
		}

	}
	exit(json_encode($data));

?>
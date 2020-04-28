<?php
$conn= mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'PUT';
	//echo "PUT";
	if (!isset($_GET['id']))
	exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
	$userId=$conn->real_escape_string($_GET['id']);
	//echo $userId;die;
	$data =urldecode(file_get_contents('php://input'));
	//echo $data;
	if(strpos($data,'=')!==false){
		//echo "all good";
		$allPair = array();
		$data=explode('&',$data);
		foreach ($data as $pair) {
			$pair = explode('=',$pair);
			$allPair[$pair[0]] = $pair[1];
		}
		//print_r($allPair);
		if (isset($allPair['username']) && isset($allPair['password'])) {
			$conn->query("UPDATE user SET username='".$allPair['username']."',password='".$allPair['password']."' WHERE id='$userId'");
		}else if ($allPair['username']) {
			$conn->query("UPDATE user SET username='".$allPair['username']."'WHERE id='$userId'");	
		}else if ($allPair['password']) {
			$conn->query("UPDATE user SET password='".$allPair['password']."' WHERE id='$userId'");	
		}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));

			exit(json_encode(array("status"=>'Success')));
	}else
	exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));

?>
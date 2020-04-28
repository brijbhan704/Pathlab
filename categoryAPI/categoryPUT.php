<?php
$conn= mysqli_connect("localhost","root","","pathlabs");
//UPDATE
$_SERVER['REQUEST_METHOD'] == "PUT";
	//echo "PUT";
	if (!isset($_GET['id']))
	exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
	$userId=$conn->real_escape_string($_GET['id']);
	//echo $userId;die;
	$data =urldecode(file_get_contents('php://input'));
	//echo $data;
	if(strpos($data,'=')!==false){
		$allPair = array();
		$data=explode('&',$data);
		//echo implode(',',$data);die;
		foreach ($data as $pair) {
			$pair = explode('=',$pair);
			$allPair[$pair[0]] = $pair[1];
}
	$conn->query("UPDATE category SET test_name='".$allPair['test_name']."',created_date=NOW() WHERE id='$userId'");

			exit(json_encode(array("status"=>'Success')));
		}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));

?>
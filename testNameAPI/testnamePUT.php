<?php
	$conn=mysqli_connect("localhost","root","","pathlabs");
		$_SERVER['REQUEST_METHOD'] =='PUT';
		//echo "PUT";
		if (isset($_GET['id'])) {
			$id=$conn->real_escape_string($_GET['id']);
			//echo $id;die;
			$data=urldecode(file_get_contents('php://input'));
			//echo $data;die;
		if(strpos($data,'=')!==false){
		$allPair = array();
		$data=explode('&',$data);
		//echo implode(',',$data);die;
		foreach ($data as $pair) {
		$pair = explode('=',$pair);
		$allPair[$pair[0]] = $pair[1];
		}
		$conn->query("UPDATE all_test SET test_name='".$allPair['test_name']."',test_details='".$allPair['test_details']."',created_at=NOW() WHERE pt_id='$id'");

			exit(json_encode(array("status"=>'Success')));
		}else{
			exit(json_encode(array("status"=>'failed',"reason"=>'Check Your Input')));
		}
	}
		?>
<?php
//Update method
		$conn= mysqli_connect("localhost","root","","pathlabs");
		$_SERVER['REQUEST_METHOD'] == 'PUT';
		//echo "PUT";die;
		if (!isset($_GET['id']))
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
		$userId=$conn->real_escape_string($_GET['id']);
		//echo $userId;die;
		$data =urldecode(file_get_contents('php://input'));
		//echo $data;die;
		if(strpos($data,'=')!==false){
		$allPair = array();
		$data=explode('&',$data);
		//echo implode(',',$data);die;
		foreach ($data as $pair) {
			$pair = explode('=',$pair);
			$allPair[$pair[0]] = $pair[1];
		}
//echo "UPDATE patient INNER JOIN all_test ON patient.id=all_test.pt_id SET name='".$allPair['name']."',age='".$allPair['age']."',email='".$allPair['email']."',mobile='".$allPair['mobile']."',doctor_name='".$allPair['doctor_name']."',total_price='".$allPair['total_price']."',test_name='".$allPair['test_name']."',test_details='".$allPair['test_details']."',created=NOW(),created_at=NOW() WHERE patient.id='$userId'";die;

		$conn->query("UPDATE patient INNER JOIN all_test ON patient.id=all_test.pt_id SET name='".$allPair['name']."',age='".$allPair['age']."',email='".$allPair['email']."',mobile='".$allPair['mobile']."',doctor_name='".$allPair['doctor_name']."',total_price='".$allPair['total_price']."',test_name='".$allPair['test_name']."',test_details='".$allPair['test_details']."',created=NOW(),created_at=NOW() WHERE patient.id='$userId'");

			exit(json_encode(array("status"=>'Success')));
		}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
?>
<?php

	//POST METHOD
		$conn= mysqli_connect("localhost","root","","pathlabs");
		$_SERVER['REQUEST_METHOD'] == 'POST';	
		$name =$conn->real_escape_string(@$_POST['name']);	
		$email =$conn->real_escape_string(@$_POST['email']);
		$mobile =$conn->real_escape_string(@$_POST['mobile']);
		$age =$conn->real_escape_string(@$_POST['age']);
		$doctorname =$conn->real_escape_string(@$_POST['doctor_name']);
		$totalprice =$conn->real_escape_string(@$_POST['total_price']);	
		$d=$conn->query("SELECT id FROM patient WHERE email='$email' AND mobile=$mobile");
			$total=mysqli_num_rows($d);
			if($total>0){
				$result=mysqli_fetch_assoc($d);
				$pid = $result['id'];
				//echo $result['id'];die;
				$data['userType'] = 'existing';
				//echo json_encode($data);
				//echo "SELECT p.name,p.email,p.mobile,p.age,p.doctor_name,p.total_price,t.test_name,t.test_details,t.created_at FROM patient p LEFT JOIN all_test t ON p.id=t.pt_id WHERE p.id=$pid";die;

				$sql = $conn->query("SELECT p.name,p.email,p.mobile,p.age,p.doctor_name,p.total_price,t.test_name,t.test_details,t.created_at FROM patient p LEFT JOIN all_test t ON p.id=t.pt_id WHERE p.id=$pid");
				while($d = mysqli_fetch_assoc($sql)){
				$data[] = $d;
				
			}
			exit(json_encode(array($data)));
				
		}else{
			
			$test=$conn->query("INSERT INTO patient (name,email,mobile,age,doctor_name,total_price,created) VALUES('$name','$email','$mobile',$age,'$doctorname',$totalprice,NOW())");
			$ptID = mysqli_insert_id($conn);
			$data['userType'] = 'new_user';
			$data['userID'] = $ptID;
			echo json_encode($data);
		}
	
		/*if($ptID!='') {
		$query=$conn->query("INSERT INTO all_test(pt_id,test_name,price,total,created_at) VALUES($ptID,'$testname','$price','$total',NOW())");	
			exit(json_encode(array("status"=>'Success')));
		}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));	*/
	





?>

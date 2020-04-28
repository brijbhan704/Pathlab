
<?php
//GET METHOD
$conn= mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'GET';
		$data = array();
		if(isset($_GET['id'])){
		$id =$conn->real_escape_string($_GET['id']);		
		$sql = $conn->query("SELECT p.name,p.email,p.mobile,p.age,p.doctor_name,p.total_price,t.test_name,t.test_details,t.created_at FROM patient p LEFT JOIN all_test t ON p.id=t.pt_id 
			WHERE p.id=$id");
		while($d =$sql->fetch_assoc()){
		$data[]=$d;
		}
		exit(json_encode($data));
	}else
	echo json_encode(array("message"=>'failed',"reason"=>'Check Your Input'));
		

?>

<?php
		$conn=mysqli_connect("localhost","root","","pathlabs");
		$_SERVER['REQUEST_METHOD'] =='GET';
		//echo "GET";
		$data = array();
		if(isset($_GET['id'])){	
		$id=$conn->real_escape_string(@$_GET['id']);
		//echo $id;die;
		$sql=$conn->query("SELECT pt_id,test_name,test_details FROM all_test WHERE pt_id=$id");
		while($d = mysqli_fetch_assoc($sql)){
		$data[]=$d;
		
	}
	exit(json_encode($data));
		}else{
			echo json_encode(array("status"=>'Failed',"reason"=>'Check Your Input'));
		}

?>
	<?php
	//DELETE METHOD
		$conn= mysqli_connect("localhost","root","","pathlabs");
		$_SERVER['REQUEST_METHOD'] == 'DELETE';	
		if(!isset($_GET['id']))
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
		$userId=$conn->real_escape_string($_GET['id']);
		//echo $userId;die;
		$conn->query("DELETE FROM all_test WHERE pt_id=$userId");
		exit(json_encode(array("status"=>'Success')));	

?>
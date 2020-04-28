<?php
//DELETE METHOD
$conn=mysqli_connect("localhost","root","","pathlabs");
$_SERVER['REQUEST_METHOD'] == 'DELETE';
	//echo "DELETE";die;
	if(!isset($_GET['id']))
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
		$sub_id=$conn->real_escape_string($_GET['id']);
		//echo $sub_id;die;
		//echo "DELETE FROM category WHERE id=2";die;
		$conn->query("DELETE FROM sub_category WHERE cate_id=$sub_id");
		exit(json_encode(array("status"=>'Success')));
	

?>
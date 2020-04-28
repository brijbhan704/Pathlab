<?php
//UPDATE
	$conn=mysqli_connect("localhost","root","","pathlabs");
	$_SERVER['REQUEST_METHOD'] == "PUT";
	//echo "PUT";
	if (!isset($_GET['id']))
	exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));
	$sub_cate_id=$conn->real_escape_string($_GET['id']);
	//echo $sub_cate_id;die;
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
	$conn->query("UPDATE sub_category SET sub_category_name='".$allPair['sub_category_name']."',price='".$allPair['price']."',created=NOW() WHERE cate_id='$sub_cate_id'");

			exit(json_encode(array("status"=>'Success')));
		}else
		exit(json_encode(array("status"=>'failed', 'reason'=>'check your input')));

?>

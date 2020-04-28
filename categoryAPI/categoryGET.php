<?php
$conn=mysqli_connect("localhost","root","","pathlabs");
if($_SERVER['REQUEST_METHOD'] == 'GET'){

//echo "GET";

$sql=$conn->query("SELECT test_name FROM sub_category where parent_id=0");
while($d=$sql->fetch_assoc()){
	$data[]=$d;

}
exit(json_encode($data));
}
?>
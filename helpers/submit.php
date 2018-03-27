<?php
include "../helpers/dbConnect.php";
$data = array();
$data['title'] = $_POST['title'];
$data['content'] = $_POST['content'];

$query = "insert into post(title, content, createDate) values ('".$data['title']."','".$data['content']."',current_date())";
$result = $conn->exec($query);
if($result) {
	include "../helpers/closeConnect.php";

	header("Location: ../admin/admin.php"); 
} else {
	return "Cap nhat that bai";
}
?>
<?php
include "../helpers/dbConnect.php";
$data = array();
$id = $_GET['id'];
//$query = "insert into post(title, content) values ('".$data['title']."','".$data['content']."')";
$query = "delete from post where id = '$id'";
$result = $conn->exec($query);
if($result) {
	include "../helpers/closeConnect.php";

	header("Location: ../admin/admin.php"); 
} else {
	return "Cap nhat that bai";
}
?>
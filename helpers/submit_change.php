<?php
include "../helpers/dbConnect.php";
$data = array();
$data['title'] = $_POST['title'];
$data['content'] = $_POST['content'];
$data['id'] = $_POST['id'];
//$query = "insert into post(title, content) values ('".$data['title']."','".$data['content']."')";
$query = "update post set title = '".$data['title']."', content='".$data['content']."', editDate = current_date() where id = '".$data['id']."'";
$result = $conn->exec($query);
if($result) {
	include "../helpers/closeConnect.php";

	header("Location: ../admin/admin.php"); 
} else {
	return "Cap nhat that bai";
}
?>
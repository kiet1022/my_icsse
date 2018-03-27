<?php
session_start();
session_destroy();
$_SESSION['LOGIN'] = false;
header('location: ../pages/index.php');
?>
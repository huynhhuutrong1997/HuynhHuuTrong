<?php  
	include"../../connect/connectDB.php"; 
	session_destroy();
	header('Location: ../../index.php');
?>
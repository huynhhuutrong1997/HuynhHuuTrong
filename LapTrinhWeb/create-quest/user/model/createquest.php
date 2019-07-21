<?php  
include'../../connect/connectDB.php';
	if(isset($_POST['add'])){
		$level = $_POST['level'];
		$quest = $_POST['quest'];
		if($quest ==""){
			echo"<script>alert('Vui lòng điền câu hỏi');
              window.location.assign('../view/createquest.php');</script>";
		}else{
			$sql  = mysqli_query($con,"INSERT INTO tb_question VALUES (NULL, '$quest','$level','1')");
			header('location:../view/createanswer.php');
			echo"<script>window.location.assign('../view/createanswer.php');</script>";
		}
	}
?>
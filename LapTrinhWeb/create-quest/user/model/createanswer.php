<?php  
include'../../connect/connectDB.php';
if(isset($_POST['add'])){
	$ansA = $_POST['A'];
	$ansB = $_POST['B'];
	$ansC = $_POST['C'];
	$ansD = $_POST['D'];

	$trueA = (isset($_POST['trueA']))?1:0;
	$trueB = (isset($_POST['trueB']))?1:0;
	$trueC = (isset($_POST['trueC']))?1:0;
	$trueD = (isset($_POST['trueD']))?1:0;
	$sql_id = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question DESC LIMIT 1");
	$row = mysqli_fetch_array($sql_id);
	$id_question = $row['id_question'];
	$sql_A = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansA','$trueA')");
	$sql_B = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansB','$trueB')");
	$sql_C = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansC','$trueC')");
	$sql_D = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansD','$trueD')");
	
}
if(isset($_POST['cancel'])){
	header('location: ../../index.php');
}
if(isset($_POST['add_ans'])){
	$ansA = $_POST['A'];
	$ansB = $_POST['B'];
	$ansC = $_POST['C'];
	$ansD = $_POST['D'];

	$trueA = (isset($_POST['trueA']))?1:0;
	$trueB = (isset($_POST['trueB']))?1:0;
	$trueC = (isset($_POST['trueC']))?1:0;
	$trueD = (isset($_POST['trueD']))?1:0;
	$sql_id = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question DESC LIMIT 1");
	$row = mysqli_fetch_array($sql_id);
	$id_question = $row['id_question'];
	$sql_A = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansA','$trueA')");
	$sql_B = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansB','$trueB')");
	$sql_C = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansC','$trueC')");
	$sql_D = mysqli_query($con,"INSERT INTO tb_answer VALUES (NULL, '$id_question','$ansD','$trueD')");
	header('location: ../view/createanswer.php');
}
?>
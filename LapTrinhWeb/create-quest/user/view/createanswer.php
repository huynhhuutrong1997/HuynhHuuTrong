<?php include"../../header/header.php"; 
?>
<br>
<div class="creatquest">
	<form method="POST" action="../model/createanswer.php">
	<h2 class="text-center">Câu hỏi</h2>
	<div class="input-group mb-3">
		<?php 
			$sql = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question DESC LIMIT 1");
			$row = mysqli_fetch_array($sql);
			$id_question = $row['id_question'];
			$sql_count = mysqli_query($con,"SELECT count(*) as total FROM tb_answer WHERE id_question = '$id_question'");
			$sql_ans = mysqli_query($con,"SELECT * FROM tb_answer WHERE id_question = '$id_question'");
			$array = array('A','B','C','D','E','F','G','H','I','J','K','L');
		?>
	  <textarea type="text" class="form-control" aria-label="Text input with dropdown button" name="quest" disabled="disabled"><?php echo $row['content']?></textarea>
	</div>


	<h2 class="text-center">Đáp án</h2>
	<p>(Chọn vào ô đáp án đúng)</p>
	<?php
		$i=0;
		$row_total = mysqli_fetch_array($sql_count);
		if($row_total['total'] > 0){
		while ($row_ans = mysqli_fetch_assoc($sql_ans)) {
	?>
<!-- 	<div class="input-group col-sm-6 col-centered"> -->

		<div class="input-group-prepend1 col-sm-6">
	    	<span class="btn btn-primary" id=""><?php echo $array[$i]; $i++;?></span>
		
	  	<input type="text" disabled="disabled" class="form-control" value="<?php echo $row_ans['answer']; ?>">
	  	</div>
	<!-- </div> -->
	<?php
		}
	?>
	
	  <div class="input-group-prepend col-sm-6">
	    <span class="btn btn-primary" id="">
	    	<input type="checkbox" name="true<?php echo $array[$row_total]?>" value="1">
	    </span>
	  </div>
	  <input type="text" class="form-control" name="A">
	<?php
	}else{
	?>
	<div class="input-group">
	  <div class="input-group-prepend">
	    <span class="btn btn-primary" id=""><input type="checkbox" name="trueA" value="1"></span>
	  </div>
	  <input type="text" class="form-control" name="A">
		<div class="input-group-prepend">
	    	<span class="btn btn-success" id=""><input type="checkbox" name="trueB" value="1"></span>
	  	</div>
	  <input type="text" class="form-control" name="B">
	</div>
	<br>
	<div class="input-group">
	  <div class="input-group-prepend">
	    <span class="btn btn-danger" id=""><input type="checkbox" name="trueC" value="1"></span>
	  </div>
	  <input type="text" class="form-control" name="C">
		<div class="input-group-prepend">
	    	<span class="btn btn-warning" id=""><input type="checkbox" name="trueD" value="1"></span>
	  	</div>
	  <input type="text" class="form-control" name="D">
	</div>
<?php } ?>
	<hr>
	<div class="btn-creat col-12 text-center">
	<button class="btn btn-warning" name="add_ans">Thêm đáp án</button>
    <button class="btn btn-success" name="add">Xác nhận</button>
    <button class="btn btn-danger"  name="cancel">Hủy</button>
	</div>
</form>
</div>
<br>
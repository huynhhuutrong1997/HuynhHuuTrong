<?php include"../../header/header.php"; ?>
<br>
<div class="creatquest">
	<form method="POST" action="../model/createquest.php">
	<h2 class="text-center">Câu hỏi</h2>
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	  	  <div class="input-group-prepend">
		    <span class="input-group-text" id="">Mức độ:</span>
		  </div>	
	      <select class="btn btn-outline-primary" id="sel1" name="level">
	        <option value="1">Dễ</option>
	        <option value="2">Khó</option>
	        <option value="3">Cực Khó</option>
	      </select>	
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="">Câu 1</span>
		  </div>
	
	  </div>
	  <textarea type="text" class="form-control" aria-label="Text input with dropdown button" name="quest"></textarea>
	</div>


	<!-- <h2 class="text-center">Đáp án</h2>
	<div class="input-group">
	  <div class="input-group-prepend">
	    <span class="btn btn-primary" id="">A (Đúng)</span>
	  </div>
	  <input type="text" class="form-control" name="A" disabled="disabled">
	  <div class="input-group-prepend">
	    <span class="btn btn-success" id="">B (Sai)</span>
	  </div>
	  <input type="text" class="form-control" name="B" disabled="disabled">
	</div>
	<hr>
	<div class="input-group">
	  <div class="input-group-prepend">
	    <span class="btn btn-warning" id="">C (Sai)</span>
	  </div>
	  <input type="text" class="form-control" name="C" disabled="disabled">
	  <div class="input-group-prepend">
	    <span class="btn btn-danger" id="">D (Sai)</span>
	  </div>
	  <input type="text" class="form-control" name="D" disabled="disabled">
	</div> -->
	<hr>
	<div class="btn-creat col-12 text-center">
	<button class="btn btn-warning" name="return">Quay về</button>
    <button class="btn btn-success" name="add">Thêm</button>
    <button class="btn btn-danger"  name="cancel">Hủy</button>
	</div>
</form>
</div>
<br>
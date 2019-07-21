<div class="sonar-wrapper">
  <div class="sonar-emitter">
    <div id="content-header">
    	<?php if(isset($_SESSION['id_user'])){ ?>
    	<a href="/create-quest/user/view/createquest.php">Tạo câu hỏi</a>
    <?php }else{ ?>
    	<a href="#">Tạo câu hỏi</a>
    <?php } ?>
    </div>
    <div class="sonar-wave"></div>
  </div>
  
    <div class="sonar-emitter">
    <div id="content-header">
    	<a href="">Chèn câu hỏi</a>
    </div>
    <div class="sonar-wave"></div>
  </div>
</div>
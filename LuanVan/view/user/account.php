<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../public/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../public/js/jquery1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../public/css/uploadanh.css">
<script type="text/javascript" src="../public/js/uploadanh.js"></script>
<!-- start menu -->

<!--start slider -->
    
<!--end slider -->
<script src="../public/js/jquery.easydropdown.js"></script>
</head>
<body>
	<div class="header-top">
	   <div class="wrap"> 
			  <div class="header-top-left">
			  	   <!-- <div class="box">
   				      <select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Language :</option>
							<option value="1">English</option>
							<option value="2">French</option>
							<option value="3">German</option>
					  </select>
   				    </div> -->
   				    <!-- <div class="box1">
   				        <select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Currency :</option>
							<option value="1">$ Dollar</option>
							<option value="2">€ Euro</option>
						</select>
   				    </div> -->
   				    <div class="clear"></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
					<?php 
						if (isset($_SESSION['user_name'])) {
							?>
							<li class="active"><a href="c_user.php?action=account"> <?=$_SESSION['user_name']?></a></li> |
							<li><a href="c_user.php?action=logout">Đăng Xuất</a></li> 
							<?php
						}
							?>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="c_index.php"><img src="../public/images/logo.png" alt=""/></a>
				</div>
		</div>
		<div class="clear"></div>
     </div>
	</div>


	<div class="account">
	  	<div class="account_left">
	  		<div class="avatar">
	  			<?php if ($user->Avatar == null) {
	  				?>
	  					<img src="../public/images/avatar/avatar.jpg">
	  				<?php
	  			}else{
	  				?>
	  				<img src="../public/images/avatar/<?=$user->Avatar?>">
	  				<?php
	  			}
	  			?>
	  			
				<p><?=$user->HoTen?></p>
	  		</div>
	  		<div class="list">
	  			<ul>
	  				<li><span class="glyphicon glyphicon-user"></span><a href="c_user.php?action=account">Tài Khoản</a></li>
	  				<li><span class="glyphicon glyphicon-list-alt"><a href="c_add.php?action=donhang">Đơn Hàng</a></li>
	  				<li><span class="glyphicon glyphicon-pencil"></span><a href="c_user.php?action=changepass">Đổi Mật Khẩu</a></li>
	  			</ul>
	  		</div>
	  	</div>
	  	<div class="account_right">
	  		<div>
	  			<h2>Hồ Sơ Của Tôi</h2>
	  			<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
	  			<hr>
	  		</div></br>
	  		<div class="row">
	  		<form class="frm-change" method="POST" enctype="multipart/form-data">
	  		
		  		<div class="col-md-8 thongtin">
		  			<div class="div_thongtin"><label class="cls_fix-text label_thongtin">Email:</label><a><?=$user->Email?></a></div>
					
					<div class="div_thongtin"><label class="cls_fix-text label_thongtin">Họ Tên:</label><input type="text" name="hoten" value="<?=$user->HoTen?>"></div>
					<?php
						if ($user->GioiTinh == 1) {
						 	?>
						 		<div class="div_thongtin"><label class="cls_fix-text label_thongtin">Giới Tinh:</label><input type="radio" name="gioitinh" value="1" checked><span>Nam</span> 
		  						<input type="radio" name="gioitinh" value="0"><span>Nữ</span></div>
						 	<?php
						 } else{

						 	?>
						 		<div class="div_thongtin"><label class="cls_fix-text label_thongtin">Giới Tinh:</label><input type="radio" name="gioitinh" value="1" ><span>Nam</span> 
		  						<input type="radio" name="gioitinh" value="0" checked><span>Nữ</span></div>
						 	<?php
						 }
					?>
		  			
					
					<div class="div_thongtin"><label class="cls_fix-text label_thongtin">Ngày Sinh:</label><input type="date" name="ngaysinh" value="<?=$user->NgaySinh?>"></div>

		  			<div class="div_thongtin"><label class="cls_fix-text label_thongtin">SĐT:</label><input type="number" name="sdt" value="<?=$user->SDT?>"></div>
		  			
		  			<div class="div_thongtin"><label class="cls_fix-text label_thongtin">Địa Chỉ:</label><textarea name="diachi"><?=$user->DiaChi?></textarea></div>
		  			
		  			<div class="btn_luu"><button type="submit" name="luu">Lưu</button></div>	
		  		</div>
		  		<div class="col-md-4 avatar_1">
		  			<div class="avatar_account">
						<div id="myfileupload">
						   <input type="file" id="uploadfile" name="uploadavatar" onchange="readURL(this);" />
						</div>
						<div id="thumbbox">
						  <img height="100" width="100" alt="Thumb image" id="thumbimage" style="display: none" />
						  <a class="removeimg" href="javascript:" ></a></div>
						<div id="boxchoice">
						  <a href="javascript:" class="Choicefile">Avatar</a>
						  <p style="clear:both"></p>
						</div>
						 <!--  <label class="filename"></label> -->
					</div>
					<?php
	                    if(isset($_SESSION['thongbao'])){
	                        echo "<div class='alert alert-danger'>".$_SESSION['thongbao']."</div>";

	                    } 
	                	?>
		  		</div>
		  	
	  		</form>
	  		</div>
	  	</div>
	</div>

</body>
</html>
<?php 
include 'footer.php';
?>
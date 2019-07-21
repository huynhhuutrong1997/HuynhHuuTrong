
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
<!-- start menu -->

<!--start slider -->
    
<!--end slider -->
<script src="../public/js/jquery.easydropdown.js"></script>
</head>
<body>
	<div class="header-top">
	   <div class="wrap"> 
			  <div class="header-top-left">
			  	  <!--  <div class="box">
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
							<li class="active"><a href="c_user.php?action=acount"> <?=$_SESSION['user_name']?></a></li> |
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
	  				<li><span class="glyphicon glyphicon-list-alt"><a href="orders.php">Đơn Hàng</a></li>
	  				<li><span class="glyphicon glyphicon-pencil"></span><a href="c_user.php?action=changpass">Đổi Mật Khẩu</a></li>
	  			</ul>
	  		</div>
	  	</div>
	  	<div class="account_right">
	  		<h2>Hồ Sơ Của Tôi</h2>
	  		<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
	  		<hr>
	  		<div class="thongtin">
	  		<form method="POST">
	  			
				
				<div class="div_thongtin"><label class="label_thongtin">Mật Khẩu Hiện Tại:</label><input type="password" name="matkhauht" required=""></div>
				
				<div class="div_thongtin"><label class="label_thongtin">Mật Khẩu Mới:</label><input type="password" id="passmoi" name="matkhaumoi" required=""></div>

	  			<div class="div_thongtin"><label class="label_thongtin">Xác Nhận Mật khẩu:</label><input type="password" id="repassmoi" name="rematkhaumoi" required=""></div>
				<script type="text/javascript">
	    					var password = document.getElementById("passmoi")
							  , confirm_password = document.getElementById("repassmoi");

							function validatePassword(){
							  if(password.value != confirm_password.value) {
							    confirm_password.setCustomValidity("Mật khẩu xác nhận không đúng");
							  } else {
							    confirm_password.setCustomValidity('');
							  }
							}

							password.onchange = validatePassword;
							confirm_password.onkeyup = validatePassword;
	    				</script>
				<?php
                    if(isset($_SESSION['thongbao'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['thongbao']."</div>";

                    } 
                	?>

                	<?php
                    if(isset($_SESSION['success1'])){
                        echo "<div class='alert alert-success'>".$_SESSION['success1']."</div>";

                    } 
                	?>
	  			<div class="btn_luu"><button type="submit" name="doi">Đổi</button></div>
	  		</form>
	  			
	  		</div>
	  		<!-- <div class="avatar_1">
	  			
	  		</div> -->
	  		
	  	</div>
	</div>

</body>
</html>
<?php 
include 'footer.php';
?>
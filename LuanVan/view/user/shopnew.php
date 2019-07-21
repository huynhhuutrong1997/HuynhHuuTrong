
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../public/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/shopnew.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/style1.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="../public/js/jquery1.min.js"></script>

<script type="text/javascript" src="../public/js/danhmucthemsp.js"></script>
<!-- start menu -->

<!--start slider -->
    
<!--end slider -->
<script src="../public/js/jquery.easydropdown.js"></script>
</head>
<body>
	<div class="header-top">
	   <div class="wrap"> 
			  <div class="header-top-left">
			  	   
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
							<li><a href="logout.php">Đăng Xuất</a></li> 
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
	
	<div class="shopnew_content">
		<h1>Điền Thông Tin Shop</h1>
		<hr>
		<div class="shopnew_inf">
			<form method="POST">
				<div class="shopnew_div"><label class="label_thongtin_dkshop">Tên Shop Của Bạn:</label><input type="text" name="tenshop" ></div>
				<div class="shopnew_div"><label class="label_thongtin_dkshop">Địa Chỉ:</label><textarea name="diachi" ><?=$user->DiaChi?></textarea></div>
				<div class="btn_shopnew"><button type="submit" name="tiep">Tiếp</button></div>
			</form>
		</div>

	</div>
	
<?php
 include 'footer.php';
?>

</body>
</html>
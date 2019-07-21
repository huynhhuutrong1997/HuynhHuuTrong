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
<link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../public/css/danhgia.css">
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
	<div class="content_danhgia">
		<div class="quaylai_danhgia">
			<a href="c_add.php?action=chitietdonhang&id_donhang=<?=$id_donhang?>">Quay Lại</a>
		</div>
	<form method="POST">
		<div class="danhgia_sanpham">
			<h2>Đánh giá sản phẩm</h2>
			<div class="hinhsanpham">
				<img src="../public/images/sanpham/<?=$sanpham->Hinh?>">
				<p><?=$sanpham->TenSanPham?></p>
			</div>
			<div class="stars">
			    <input class="star star-5" id="star-5" type="radio" name="star" value="5" checked />
			    <label class="star star-5" for="star-5"></label>
			    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
			    <label class="star star-4" for="star-4"></label>
			    <input class="star star-3" id="star-3" type="radio" name="star" value="3"  />
			    <label class="star star-3" for="star-3"></label>
			    <input class="star star-2" id="star-2" type="radio" name="star" value="2"  />
			    <label class="star star-2" for="star-2"></label>
			    <input class="star star-1" id="star-1" type="radio" name="star" value="1"  />
			    <label class="star star-1" for="star-1"></label>
			</div>
			<div class="input_danhgiasp">
				<textarea name="noidung_sp" cols="27"></textarea>
			</div>
		</div>
		<div class="danhgia_shop">
			<h2>Đánh giá shop</h2>
			<div class="hinhsanpham">
				<?php
					if ($shop->Avatar == null) {
						?>
						<img src="../public/images/avatar/avatar.jpg">
						<?php
					}else{
						?>
						<img src="../public/images/avatar/<?=$shop->Avatar?>">
						<?php
					}
				?>
				
				<p><?=$shop->TenShop?></p>
			</div>
			<div class="star_shop">
			    <input class="stars_shop stars_shop-5" id="stars_shop-5" type="radio" name="star_shop" value="5" checked
			   />
			    <label class="stars_shop stars_shop-5" for="stars_shop-5"></label>
			    <input class="stars_shop stars_shop-4" id="stars_shop-4" type="radio" name="star_shop" value="4" />
			    <label class="stars_shop stars_shop-4" for="stars_shop-4"></label>
			    <input class="stars_shop stars_shop-3" id="stars_shop-3" type="radio" name="star_shop" value="3" />
			    <label class="stars_shop stars_shop-3" for="stars_shop-3"></label>
			    <input class="stars_shop stars_shop-2" id="stars_shop-2" type="radio" name="star_shop" value="2" />
			    <label class="stars_shop stars_shop-2" for="stars_shop-2"></label>
			    <input class="stars_shop stars_shop-1" id="stars_shop-1" type="radio" name="star_shop" value="1" />
			    <label class="stars_shop stars_shop-1" for="stars_shop-1"></label>
			</div>
			<div class="input_danhgiasp">
				<textarea name="noidung_shop" cols="27"></textarea>
			</div>
		</div>
		<div class="btn_danhgia">
			<button type="submit" name="btn_danhgia">Đánh giá</button>
		</div>
	</form>
	</div>
	
	
</body>
</html>
<?php 
include 'footer.php';
?>
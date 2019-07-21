<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<link href="../public/css/shop.css" rel="stylesheet" type="text/css" media="all" />
	<title></title>
</head>
<body>
	<div class="shop_head">
		<div class="shop_banner" <?php
			if ($user->AnhBia =='') {
				?>
				style="background-image:url(../public/images/background/anhbia.jpg);"
				<?php
			}else{
				?>
				style="background-image:url(../public/images/background/<?=$user->AnhBia?>);"
				<?php
			}
			?>>
			<div class="shop_inf">
				<div>
					<?php
						if ($user->Avatar == null) {
						 	?>
						 	<img src="../public/images/avatar/avatar.jpg">
						 	<?php
						 }else{
						 	?>
						 	<img src="../public/images/avatar/<?=$user->Avatar?>">
						 	<?php
						 }
					?>
				</div>
				<div class="shop_inf_text">
					<h2><?=$user->TenShop?></h2>
					<p>100 Lượng theo dõi</p>	
				</div>
			</div>
		</div>
		<div class="shop_menu">
			<ul>
				<li><a href="c_shop.php?action=shop&shop=<?=$id_user?>">Trang Chủ</a></li>
				<li><a href="c_shop.php?action=sanpham&shop=<?=$id_user?>">Tất Cả Sản Phẩm</a></li>
				<li><a class="active" href="c_shop.php?action=hoso&shop=<?=$id_user?>">Hồ Sơ</a></li>
			</ul>
			<!-- <form method="POST">
				<button type="submit" name="submit">Tìm</button>
				<input type="text" name="timkiem">
			</form> -->

		</div>
	</div>
	<div class="shop_hoso">
		<div class="shop_hoso_inf">
			<div class="shop_hoso_tenshop"><p>Thông Tin Shop</p><h1><?=$user->TenShop?></h1></div>
			<div class="shop_hoso_inf_1">
				<div class="shop_hoso_thongtin">
					<label>Địa chỉ:</label><p><?=$user->DiaChi?></p>
				</div>
				<div class="shop_hoso_thongtin">
					<label>Điện thoại:</label><p><?=$user->SDT?></p>
				</div>
				<div class="shop_hoso_thongtin">
					<label>Email:</label><p><?=$user->Email?></p>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>
<?php 
include 'footer.php';
?>
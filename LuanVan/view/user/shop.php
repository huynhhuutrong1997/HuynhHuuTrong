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
				<li><a class="active" href="c_shop.php?action=shop&shop=<?=$id_user?>">Trang Chủ</a></li>
				<li><a href="c_shop.php?action=sanpham&shop=<?=$id_user?>">Tất Cả Sản Phẩm</a></li>
				<li><a href="c_shop.php?action=hoso&shop=<?=$id_user?>">Hồ Sơ</a></li>
			</ul>
			<form method="POST" action="c_shop.php?action=timkiem&shop=<?=$id_user?>">
				<button type="submit" name="submit">Tìm</button>
				<input type="text" name="timkiem">
			</form>
		</div>
	</div>
	<div class="shop_banner_big">
		<?php
			if ($user->Banner == '') {
				?>
				<img src="../public/images/banner/banner.jpg">
				<?php
			}else{
				?>
				<img src="../public/images/banner/<?=$user->Banner?>">
				<?php
			}
		?>
		
	</div>
	<div class="shop_content">
		<h2 class="head">Sản Phẩm Hot</h2>
		 <div class="top-box">
		  	<?php 
		  	foreach ($sanphamhot as $sp) {
		  		$gia = $sp->Gia;
				$money = formatMoney($gia);
		  		?>
	  			  <div class="col_1_of_3 span_1_of_3 shop_sanpham">
				  	 <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$sp->id_SanPham?>">
					 <div class="inner_content clearfix">
						<div class="product_image">
							<img src="../public/images/sanpham/<?=$sp->Hinh?>" alt=""/>
						</div>
	                     <div class="sale-box sale-box-banchay"><span class="on_sale title_shop">Hot</span></div>	
	                    <div class="price">
						   <div class="cart-left">
								<div class="title-div"><p class="title"><?=$sp->TenSanPham?></p></div>
										<div class="price1">
										  <span class="actual"><?=$money?>đ</span>
										</div>
							</div>
							<div class="cart-right"> </div>
							<div class="clear"></div>
						 </div>				
	                   </div>
	                   </a>
					</div>
		  		<?php
		  	}
		  	?>
		
				<div class="clear"></div>
			</div>
		 <h2 class="head cls-spm">Sản Phẩm Mới</h2>
		 <div class="top-box">
		  	<?php 
		  	foreach ($sanphamnew as $sp) {
		  		$gia = $sp->Gia;
				$money = formatMoney($gia);
		  		?>
	  			  <div class="col_1_of_3 span_1_of_3 shop_sanpham">
				  	 <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$sp->id_SanPham?>">
					 <div class="inner_content clearfix">
						<div class="product_image">
							<img src="../public/images/sanpham/<?=$sp->Hinh?>" alt=""/>
						</div>
	                     <!-- <div class="sale-box"><span class="on_sale title_shop">New</span></div> -->	
	                    <div class="price">
						   <div class="cart-left">
								<div class="title-div"><p class="title"><?=$sp->TenSanPham?></p></div>
										<div class="price1">
										  <span class="actual"><?=$money?>đ</span>
										</div>
							</div>
							<div class="cart-right"> </div>
							<div class="clear"></div>
						 </div>				
	                   </div>
	                   </a>
					</div>
		  		<?php
		  	}
		  	?>
		
				<div class="clear"></div>
			</div>	
	</div>
</body>
</html>
<?php 
include 'footer.php';
?>
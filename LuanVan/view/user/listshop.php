<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<link href="../public/css/listshop.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/shop.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css">
<script type="text/javascript" src="../public/js/jquery.jscrollpane.min.js"></script>
	<title></title>
</head>
<body>
	<div class="listshop">
		<h2 class="head">Danh Sách Các Shop</h2>
		 <div class="top-box">
		  	<?php foreach ($listshop as $shop) {
		  		$sao = (int)$shop->TB;
		  		if ($shop->TenShop !='') {
		  			?>
		  			<div class="col_1_of_3 span_1_of_3 shop_sanpham">
				  	 <a href="c_shop.php?action=shop&shop=<?=$shop->id_User?>">
					 <div class="inner_content clearfix">
						<div class="product_image">
							<?php
								if ($shop->Avatar == null) {
									?>
									<img src="../public/images/avatar/avatar.jpg" alt=""/>
									<?php
								}else{
									?>
									<img src="../public/images/avatar/<?=$shop->Avatar?>" alt=""/>
									<?php
								}
							?>
							
						</div>	
	                    <div class="price">
						   <div class="cart-left">
								<div class="title-div list_div"><p class="title tenshop_list"><?=$shop->TenShop?></p></div>
								<div class="price1">
										  <span class="actual">
										  	<div class="toogle list_divdg">
										   		<?php 
										   			if ($shop->TB == 0) {
										   				
										   			?>
										   			<p class="danhgia_p">Chưa có đánh giá</p>
										   			<?php
										   		}else{	
										   			$nam = [4.5,4.6,4.7,4.8,4.9,5];
										   			$bon = [3.5,3.6,3.7,3.8,3.9,4,4.1,4.2,4.3,4.4];
										   			?>
										   				<div class="stars">
													    <input class="star star-5" id="star-5" type="radio"  value="5" <?php if (in_array($shop->TB, $nam)) {
													    ?>
													    	checked
													    <?php
													    } ?> disabled />
													    <label class="star star-5" for="star-5">(<?=$sao?>)</label>
													    <input class="star star-4" id="star-4" type="radio" value="4"<?php if (in_array($shop->TB, $bon)) {
													    ?>
													    	checked
													    <?php
													    } ?> disabled />
													    <label class="star star-4" for="star-4"></label>
													    <input class="star star-3" id="star-3" type="radio" value="3" <?php if ($shop->TB == 3) {
													    ?>
													    	checked
													    <?php
													    } ?> disabled />
													    <label class="star star-3" for="star-3"></label>
													    <input class="star star-2" id="star-2" type="radio" value="2" <?php if ($shop->TB == 2) {
													    ?>
													    	checked
													    <?php
													    } ?> disabled />
													    <label class="star star-2" for="star-2"></label>
													    <input class="star star-1" id="star-1" type="radio"  value="1" <?php if ($shop->TB == 1) {
													    ?>
													    	checked
													    <?php
													    } ?> disabled />
													    <label class="star star-1" for="star-1"></label>
										   		
												</div>
										   				<?php
										   			
										   		}
										   		?>
												
												
										     </div>
										  </span>
								</div>	
							</div>
							<!-- <div class="cart-right"> </div> -->
							<div class="clear"></div>
						 </div>				
	                   </div>
	                   </a>
					</div>
		  			<?php
		  		}
		  		
		  	} ?>
	  			  

					
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>
<?php 
include 'footer.php';
?>
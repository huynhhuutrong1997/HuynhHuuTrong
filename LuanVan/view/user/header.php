<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../public/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="../public/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/binhluan.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../public/js/jquery1.min.js"></script>
<!-- start menu -->
<link href="../public/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../public/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" href="../public/css/fwslider.css" media="all">
    <script src="../public/js/jquery-ui.min.js"></script>
    <script src="../public/js/css3-mediaqueries.js"></script>
    <script src="../public/js/fwslider.js"></script>
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
   				    <div>
   				    	<?php 
   				    		if (isset($_SESSION['id_user'])){
   				    			if (isset($thongtinuser->TenShop) && $thongtinuser->TenShop == '') {
   				    					?>
	   				    				<a class ="kenhnguoiban" href="c_user.php?action=shopnew">Kênh Người Bán</a>
   				    					<?php
   				    			}else{
   				    				?>
   				    				
   				    				<a class ="kenhnguoiban" href="c_admin.php?action=index">Kênh Người Bán</a>
   				    				<?php
   				    			}
   				    		
   				    		}else{
   				    			?>
   				    			<a class ="kenhnguoiban" href="c_user.php?action=login">
   				    Kênh Người Bán</a>
   				    			<?php 

   				    		}
   				    	?>
   				    	
   				</div>
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
						}else{
							?>
							<li><a href="c_user.php?action=login">Đăng nhập</a></li> |
							<li><a href="c_user.php?action=create">Đăng ký</a></li>
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
			<!--Main menu-->
				<div class="menu">
	            <ul class="megamenu skyblue">
					<li class="active grid"><a class="cursor">Thiết Bị Điện Tử</a>
						<div class="megapanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										<?php 
											foreach ($thietbidientu as $dientu) {
												?>
												<h4><?=$dientu->TenLoaiSanPham?></h4>
												<ul>
												<?php
												$chitietloai = explode(',', $dientu->ChiTietLoaiSanPham);
												
												foreach ($chitietloai as $chitiet) {
													list($id_ChiTietLoai, $TenChiTietLoai) = explode(':', $chitiet);
													?>
													<li><a href="c_sanpham.php?action=phanloai&id_loai=<?=$id_ChiTietLoai?>"><?=$TenChiTietLoai?></a></li>
													<?php
												}
												?>
												</ul>
												<?php
											}
										?>
										
											
										

									</div>							
								</div>
							 </div>
						</div>
					</li>
					<li><a class="color5 cursor">Phụ kiện điện tử</a>
						<div class="megapanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										<?php 
											foreach ($phukiendientu as $dientu) {
												?>
												<h4><?=$dientu->TenLoaiSanPham?></h4>
												<ul>
												<?php
												$chitietloai = explode(',', $dientu->ChiTietLoaiSanPham);
												
												foreach ($chitietloai as $chitiet) {
													list($id_ChiTietLoai, $TenChiTietLoai) = explode(':', $chitiet);
													?>
													<li><a href="c_sanpham.php?action=phanloai&id_loai=<?=$id_ChiTietLoai?>"><?=$TenChiTietLoai?></a></li>
													<?php
												}
												?>
												</ul>
												<?php
											}
										?>
									</div>							
								</div>
							 </div>
						</div>
					</li>	
					<li><a class="color4 cursor" href="c_user.php?action=listshop">Danh Sách Shop</a>
						<!-- <div class="megapanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										
										<h4></h4>
										<ul>
												
											<li><a href=""></a></li>
												
										</ul>
												
									</div>							
								</div>
							 </div>
						</div> -->
					</li>
					<!-- <li><a class="color6 cursor">Sức Khỏe & Làm Đẹp</a>
					<div class="megapanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										
										<h4></h4>
										<ul>
												
											<li><a href=""></a></li>
													
										</ul>
												
									</div>							
								</div>
							 </div>
						</div>
					</li> -->
				</ul>
			</div>
		</div>
		<!--End Main <menu--></menu-->
	   <div class="header-bottom-right">
         <div class="search">
         	<form method="GET" action="c_index.php">
         		<input type="text" name="timkiem" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm';}">
				<input type="submit" value="timkiem" id="submit" name="action">
				<div id="response"> </div>
         	</form>	  
		 </div>
	  <div class="tag-list">
	    <ul class="icon1 sub-icon1 profile_img">
			<!-- <li><a class="active-icon c1" href="#"> </a>
				<ul class="sub-icon1 list">
					<li><h3>sed diam nonummy</h3><a href=""></a></li>
					<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
				</ul>
			</li> -->
		</ul>
		<ul class="icon1 sub-icon1 profile_img">
			<li>
				<?php 
		    		if (isset($_SESSION['cart'])){
		    			?>
		    			<?php 
   				    		if (isset($_SESSION['id_user'])){
   				    			?>
   				    			<?php 
   				    				if ($_SESSION['cart']!=null) {
   				    					?>
   				    					<a class="active-icon c2" href="c_add.php?action=ct_card">
   				    					<?php
   				    				}
   				    				else {
   				    					?>
   				    					<a class="active-icon c2" >
   				    					<?php
   				    				}
   				    		}
   				    		else{
   				    			?>
   				    			<a class="active-icon c2" href="c_user.php?action=login">
   				    			<?php 
   				    		}
   				    	?>
		    			
		    			<?php
		    		}else{
		    			?>
		    			<a class="active-icon c2" href="#">
		    			<?php 

		    		}
		    	?>
				
					<span class="badge">
				      	<?php
				      		$sl=0;
				      		if (isset($_SESSION['cart'])) {
				      			foreach ($_SESSION['cart'] as  $value) {
				      				$sl+=$value['quantity'];
				      			}
				      			
				      			echo $sl;

				      		}
				      		else{
				      				echo 0;
				      			}
				        ?>
					</span>
				</a>
				<ul class="sub-icon1 list">
					<div class="container">
						<div class="shopping-cart-header">
					      <a class="c2"><span class="badge">
					      	<?php
					      		$sl=0;
					      		if (isset($_SESSION['cart'])) {
					      			foreach ($_SESSION['cart'] as  $value) {
					      				$sl+=$value['quantity'];
					      			}
					      			
					      			echo $sl;

					      		}
					      		else{
					      				echo 0;
					      			}
					        ?>
					       </span></a>
					      <div class="shopping-cart-total">
					        <span class="lighter-text">Tổng:</span>
					        <span class="main-color-text">
					        	<?php
						      		$total=0;
						      		if (isset($_SESSION['cart'])) {
						      			foreach ($_SESSION['cart'] as  $value) {
						      				$total+=$value['price']*$value['quantity'];
						      			}
						      			
						      			echo number_format($total).' VNĐ';

						      		}
						      		else{
						      				echo 0;
						      			}
						        ?>					        	
					        </span>
					      </div>
					    </div>
					      <?php 
					      	include'../view/card/card.php';
					      ?>
					      <div class="row">
					      	<?php
					      		$sl=0;
					      		if (isset($_SESSION['cart'])) {
					      			foreach ($_SESSION['cart'] as  $value) {
					      				$sl+=$value['quantity'];
					      			}
					      				if ($sl > 2) {
					      					?>
					      					<div >Còn <?=$sl-2?> sản phẩm trong giỏ</div>
					      					<?php
					      				}
					      			
					      		}
					      		else{
					      				
					      			}
					        ?>
					      	
					      		<?php 
   				    		if (isset($_SESSION['id_user'])){
   				    			?>
   				    			<a href="c_add.php?action=ct_card" class="button">Thanh Toán</a>
   				    			<?php
   				    		}else{
   				    			?>
   				    			<a href="c_user.php?action=login" class="button">Thanh Toán</a>
   				    			<?php 
   				    		}
   				    	?>
					      
					      </div>
					      
					</div>
				</ul>
			</li>
		</ul>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>
</html>
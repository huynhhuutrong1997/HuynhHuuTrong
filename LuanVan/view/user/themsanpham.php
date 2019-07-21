
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
	

	<div class="themsanpham">

		<h2>Thêm 1 sản phẩm mới</h2>
		<p>Vui lòng chọn ngành hàng phù hợp cho sản phẩm của bạn</p>
		<hr>
		<div class="them_quaylai" ><a href="c_admin.php?action=list">Quay lại</a></div>
		<div class="danhmuc">
			<ul>
				<li id="dienthoai">Điện Thoại</li>
				<li id="maytinhbang">Máy Tính Bảng</li>
				<li id="thietbiamthanh">Thiết Bị Âm Thanh</li>
				<li id="latop">Laptop</li>
				<li id="mtdeban">Máy Tính Để Bàn</li>
				<li id="pkdidong">Phụ Kiện Di Động</li>
				<li id="pkmaytinh">Phụ Kiên Máy Tính</li>
				<li id="thietbimang">Thiết Bị Mạng</li>
			</ul>
		</div>
		<div class="chitietdm" id="ctdienthoai">
			<ul>
				<?php 
					foreach ($dienthoai as $dt) {
						?>
							<li><a href="c_themsanpham.php?action=form1&id=<?=$dt->id_ChiTietLoai?>"><?=$dt->TenChiTietLoai?></a></li>
						<?php
					}
				?>
				
			</ul>
		</div>
		<div class="chitietdm" id="ctmtinhbang">
			<ul>
				<?php 
					foreach ($maytinhbang as $mtb) {
						?>
							<li><a href="c_themsanpham.php?action=form1&id=<?=$dt->id_ChiTietLoai?>"><?=$mtb->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<div class="chitietdm" id="ctthietbiamthanh">
			<ul>
				<?php 
					foreach ($thietbiamthanh as $tbat) {
						?>
							<li><a href="c_themsanpham.php?action=form2&id=<?=$tbat->id_ChiTietLoai?>"><?=$tbat->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<div class="chitietdm" id="ctlaptop">
			<ul>
				<?php 
					foreach ($latop as $lap) {
						?>
							<li><a href="c_themsanpham.php?action=form2&id=<?=$lap->id_ChiTietLoai?>"><?=$lap->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<div class="chitietdm" id="ctmtdeban">
			<ul>
				<?php 
					foreach ($maytinhdeban as $mt) {
						?>
							<li><a href="c_themsanpham.php?action=form2&id=<?=$mt->id_ChiTietLoai?>"><?=$mt->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<div class="chitietdm" id="ctpkdidong">
			<ul>
				<?php 
					foreach ($phukiendidong as $pkdt) {
						?>
							<li><a href="c_themsanpham.php?action=form3&id=<?=$pkdt->id_ChiTietLoai?>"><?=$pkdt->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<div class="chitietdm" id="ctpkmaytinh">
			<ul>
				<?php 
					foreach ($phukienmaytinh as $pkmt) {
						?>
							<li><a href="c_themsanpham.php?action=form2&id=<?=$pkmt->id_ChiTietLoai?>"><?=$pkmt->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
		<div class="chitietdm" id="cttbimang">
			<ul>
				<?php 
					foreach ($thietbimang as $tbm) {
						?>
							<li><a href="c_themsanpham.php?action=form2&id=<?=$tbm->id_ChiTietLoai?>"><?=$tbm->TenChiTietLoai?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
	</div>



</body>
</html>

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
<script src="../public/js/uploadanh.js" type="text/javascript"></script>
<script type="text/javascript" src="../public/js/themtuychon.js"></script>

<link rel="stylesheet" type="text/css" href="../public/css/uploadanh.css">
<!-- Select -->
 <script src="../public/js/jquery-1.8.0.min.js"></script>
 <script src="../public/js/select2.js"></script>
 <link href="../public/css/select2.css" rel="stylesheet"/>
 <script>
    $(document).ready(function() {
        $("#baohanh").select2();
        $("#thuonghieusim").select2();
        $("#tbamthanh").select2();
        $("#dungluong").select2();
        $("#dongmaytuongthich").select2();
        $("#chatlieu").select2();
        $("#chucnang").select2();
    });
</script>
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
							<li class="active"><a href="account.php?id=<?=$_SESSION['id_user']?>"> <?=$_SESSION['user_name']?></a></li> |
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
	

<div class="themsanphamct">
	<form method="POST" enctype="multipart/form-data">
		<div class="thongtincb">
			<h2>Thông Tin Cơ Bản</h2>
			<hr>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Tên Sản Phẩm:</label><input type="text" name="tensp" value="<?=$chitietsanpham->TenSanPham?>" required>
				
			</div>
			<!-- sim thẻ cào -->
			<?php
				$id_phukiendt = [13];
				
				if (in_array($id_loai, $id_phukiendt)) {
					$chitietsp = $chitietsanpham->ChiTietSanPham;
     				list($thuonghieu,$baohanh) = explode(':', $chitietsp);
				?>
					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="thuonghieusim" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="G mobile">G mobile</option>
							<option value="Mobifone">Mobifone</option>
							<option value="Vietnamobile">Vietnamobile</option>
							<option value="Viettel">Viettel</option>
							<option value="VTC">VTC</option>
							<option value="GPP">GPP</option>
							<option value="Cyberpay">Cyberpay</option>
							<option value="Saitong">Saitong</option>
							<option value="NOOSY">NOOSY</option>
							<option value="GPPLTE">GPPLTE</option>
							<option value="VNPT">VNPT</option>
							<option value="VCOIN">VCOIN</option>
						</select>
					</div>
						<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input" value="<?=$thuonghieu?>">
						<a class="a_thaydoi" id="input_luachon">Quay Lại</a>
					</div>
				<?php
				}

			?>
			<!-- end sim -->
			<!-- Phụ kiện điện thoại -->
			<?php 
				$id_phukiendt = [12, 14, 15];
				if (in_array($id_loai, $id_phukiendt)) {
					$chitietsp = $chitietsanpham->ChiTietSanPham;
     				list($thuonghieu,$dongmay,$chatlieu,$chucnang,$baohanh) = explode(':', $chitietsp);
				?>
					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="tbamthanh" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="3Dconnexion">3Dconnexion</option>
							<option value="Abz Cases">Abz Cases</option>
							<option value="Acase">Acase</option>
							<option value="Kotion Each">Kotion Each</option>
						</select>
						<a class="a_thaydoi" id="select_luachon">Thêm thương hiệu khác</a>
					</div>
					<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input" value="<?=$thuonghieu?>">
						<a class="a_thaydoi" id="input_luachon">Quay Lại</a>
					</div>
					<div class="d_thongtincb" id="select_divdongmay">
						<label class="label_thongtincb">Dòng Máy Tương Thích:</label>
						<select id="dongmaytuongthich" name="dongmay_select">
							<option value="<?=$dongmay?>"><?=$dongmay?></option>
							<option value="Tất cả dòng máy">Tất cả dòng máy</option>
							<option value="Nhiều dòng máy">Nhiều dòng máy</option>
							<option value="A7 2016">A7 2016</option>
							<option value="Acer Liquid E3">Acer Liquid E3</option>
							<option value="Acer Liquid M220 Each">Acer Liquid M220</option>
						</select>
						<a class="a_thaydoi" id="select_luachondongmay">Thêm dòng máy khác</a>
					</div>
					<div class="d_thongtincb" id="input_divdongmay" style="display: none;">
						<label class="label_thongtincb">Dòng Máy Tương Thích:</label>
						<input type="text" name="dongmay_input" value="<?=$dongmay?>">
						<a class="a_thaydoi" id="input_luachondongmay">Quay Lại</a>
					</div>
					<div class="d_thongtincb">
						<label class="label_thongtincb">Chất Liệu:</label>
						<select id="chatlieu" name="chatlieu">
							<option value=":<?=$chatlieu?>"><?=$chatlieu?></option>
							<option value=":Canvas">Canvas</option>
							<option value=":Cao su">Cao su</option>
							<option value=":Carbon Fiber">Carbon Fiber</option>
							<option value=":Da">Da</option>
							<option value=":Da Bò">Da Bò</option>
							<option value=":Da TPU vải Jean">Da TPU vải Jean</option>
						</select>
					</div>
					<div class="d_thongtincb">
						<label class="label_thongtincb">Chức Năng:</label>
						<select id="chucnang" name="chucnang">
							<option value=":<?=$chucnang?>"><?=$chucnang?></option>
							<option value=":Sạc dự phòng">Sạc dự phòng</option>
							<option value=":Tự động tắt/ bật">Tự động tắt/ bật</option>
							<option value=":Ốp lưng kèm sạc dự phòng">Ốp lưng kèm sạc dự phòng</option>
							<option value=":Ví">Ví</option>
							<option value=":Cường lực">Cường lực</option>
							<option value=":Màn hình thông báo">Màn hình thông báo</option>
							<option value=":Chống mồ hôi">Chống mồ hôi</option>
							<option value=":Chống bụi">Chống bụi</option>
							<option value=":Chống nước">Chống nước</option>
							<option value=":Chống trầy">Chống trầy</option>
							<option value=":Chống sốc">Chống sốc</option>
							<option value=":Có chân chống xem phim">Có chân chống xem phim</option>
							<option value=":Bảo vệ mặt lưng máy">Bảo vệ mặt lưng máy</option>
							<option value=":Viền camera">Viền camera</option>
							<option value=":Phát sáng">Phát sáng</option>
							<option value=":Phát quang trong đêm">Phát quang trong đêm</option>
							<option value=":Chống dấu vân tay">Chống dấu vân tay</option>
							<option value=":Tản nhiệt">Tản nhiệt</option>
							<option value=":Bao Da Gập">Bao Da Gập</option>
						</select>
					</div>

				<?php
				}

			?>
			<!-- Phụ kiện điện thoại -->
			<div class="d_thongtincb">
				<label class="label_thongtincb">Bảo hành (Tháng):</label>
				<select id="baohanh" name="baohanh">
					<option value=":<?=$baohanh?>"><?=$baohanh?></option>
					<option value=":Không Bảo Hành">Không Bảo Hành</option>
					<option value=":1 Tháng">1 Tháng</option>
					<option value=":2 Tháng">2 Tháng</option>
					<option value=":3 Tháng">3 Tháng</option>
					<option value=":4 Tháng">4 Tháng</option>
					<option value=":5 Tháng">5 Tháng</option>
					<option value=":6 Tháng">6 Tháng</option>
					<option value=":7 Tháng">7 Tháng</option>
					<option value=":8 Tháng">8 Tháng</option>
					<option value=":9 Tháng">9 Tháng</option>
					<option value=":10 Tháng">10 Tháng</option>
					<option value=":11 Tháng">11 Tháng</option>
					<option value=":12 Tháng">12 Tháng</option>
					<option value=":13 Tháng">13 Tháng</option>
					<option value=":14 Tháng">14 Tháng</option>
					<option value=":15 Tháng">15 Tháng</option>
					<option value=":16 Tháng">16 Tháng</option>
					<option value=":17 Tháng">17 Tháng</option>
					<option value=":18 Tháng">18 Tháng</option>
					<option value=":19 Tháng">19 Tháng</option>
					<option value=":20 Tháng">20 Tháng</option>
					<option value=":24 Tháng">24 Tháng</option>
					<option value=":36 Tháng">36 Tháng</option>
					<option value=":48 Tháng">48 Tháng</option>
					
				</select>
			</div>
		
			
			
			<div class="d_thongtincb">
				<label class="label_thongtincb">Mô tả:</label>
				<textarea name="mota"><?=$chitietsanpham->MoTa?></textarea>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Giá:</label><input type="number" name="gia" min="0" value="<?=$chitietsanpham->Gia?>" required>
				
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Kho hàng:</label><input type="number" name="khohang" min="1" value="<?=$chitietsanpham->Kho?>" required>
				
			</div>
		</div>
		
		<div class="anh">
			<div class="uploadanh">
				 <div id="myfileupload">
				   <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);"  />
				   <!--      Name  mà server request về sẽ là ImageUpload-->
				 </div>
				 <div id="thumbbox">
				  <img height="100" width="100" alt="Thumb image" id="thumbimage" src="../public/images/sanpham/<?=$chitietsanpham->Hinh?>" "/>
				  <a class="removeimg" href="javascript:" ></a>
				</div>
				 <div id="boxchoice">
				  <a href="javascript:" class="Choicefile">Chọn Ảnh 1</a>
				  <p style="clear:both"></p>
				 </div>
				 <!--  <label class="filename"></label> -->
			</div>
			<!-- ảnh 2 -->
			<div class="uploadanh">
				 <div id="myfileupload2">
				   <input type="file" id="uploadfile2" name="ImageUpload1"  onchange="anh2(this);"  />
				   <!--      Name  mà server request về sẽ là ImageUpload-->
				  
				 </div>
				 <div id="thumbbox2">
				  <img height="100" width="100" alt="Thumb image" id="thumbimage2" src="../public/images/sanpham/<?=$chitietsanpham->Hinh1?>" />
				  <a class="removeimg2" href="javascript:" ></a></div>
				 <div id="boxchoice2">
				  <a href="javascript:" class="Choicefile2">Chọn Ảnh 2</a>
				  <p style="clear:both"></p>
				 </div>
				  <!-- <label class="filename2"></label> -->
			</div>
			<!-- ảnh 3 -->
			<div class="uploadanh">
				 <div id="myfileupload3">
				   <input type="file" id="uploadfile3" name="ImageUpload2" onchange="anh3(this);"  />
				   <!--      Name  mà server request về sẽ là ImageUpload-->
				  
				 </div>
				 <div id="thumbbox3">
				  <img height="100" width="100" alt="Thumb image" id="thumbimage3" src="../public/images/sanpham/<?=$chitietsanpham->Hinh2?>"/>
				  <a class="removeimg3" href="javascript:" ></a></div>
				 <div id="boxchoice3">
				  <a href="javascript:" class="Choicefile3">Chọn Ảnh 3</a>
				  <p style="clear:both"></p>
				 </div>
				  <!-- <label class="filename3"></label> -->
			</div>
		</div>
		
		
		
			
		</div>
		<div class="thongbaoanh">
			<?php
                    if(isset($_SESSION['thongbao'])){
                        echo "<div class='alert alert-danger thongbao1'>".$_SESSION['thongbao']."</div>";

                    } 
            ?>
			
		</div>
				
		<div class="btn_them">
			<button name="btnluu">Lưu</button>
			<div class="quaylai"><a type="button" href="c_admin.php?action=list">Quay Lại</a></div>

		</div>
	</form>
</div>
	


</body>
</html>
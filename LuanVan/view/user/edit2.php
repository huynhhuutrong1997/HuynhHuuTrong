
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
        $("#thuonghieulap").select2();
        $("#tbamthanh").select2();
        $("#dungluong").select2();
        
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
			<!-- Laptop -->
			<?php 
				$id_laptop = [6,7,8];
				$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu,$baohanh) = explode(':', $chitietsp);
				if (in_array($id_loai, $id_laptop)) {
					?>

					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="thuonghieulap" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="Acer">Acer</option>
							<option value="Apple">Apple</option>
							<option value="Asus">Asus</option>
							<option value="Dell">Dell</option>
						</select>
						<a class="a_thaydoi" id="select_luachon">Thêm thương hiệu khác</a>
					</div>
					<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input" value="<?=$thuonghieu?>">
						<a class="a_thaydoi" id="input_luachon">Thương hiệu có sẳn</a>
					</div>
					<?php
				}
			?>
			
			<!-- end laptop -->
			

			<!-- Thiết bị âm thanh -->
			<?php 
				$id_tbamthanh = [3,4,5];
				if (in_array($id_loai, $id_tbamthanh) ) {
					?>
					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="tbamthanh" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="A-technology">A-technology</option>
							<option value="Acnos">Acnos</option>
							<option value="Aibo">Aibo</option>
							<option value="Kotion Each">Kotion Each</option>
						</select>
						<a class="a_thaydoi" id="select_luachon">Thêm thương hiệu khác</a>
					</div>
					<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input">
						<a class="a_thaydoi" id="input_luachon">Thương hiệu có sẳn</a>
					</div>
						
					<?php
				}
			?>
			
			<!-- end thiết bị âm thanh -->
			<!-- Máy tính để bàn -->
				<?php 
				$id_maytinh = [9,10,11];
				if (in_array($id_loai, $id_maytinh) ) {
					?>
					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="tbamthanh" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="2Good">2Good</option>
							<option value="Acer">Acer</option>
							<option value="AOC">AOC</option>
							<option value="Artech">Artech</option>
							<option value="Asus">Asus</option>
							<option value="AverMedia">AverMedia</option>
							<option value="BenQ">BenQ</option>
							<option value="Casio">Casio</option>
							<option value="DELL">DELL</option>
							<option value="FPT">FPT</option>
							<option value="Fujisys">Fujisys</option>
							<option value="fujitsu">fujitsu</option>
							<option value="Gigabyte">Gigabyte</option>
							<option value="Gipco">Gipco</option>
							<option value="Hp">Hp</option>
							<option value="Intel">Intel</option>
							<option value="iSEN">iSEN</option>
							<option value="Kinglight">Kinglight</option>
							<option value="LDNIO">LDNIO</option>
							<option value="Lenovo">Lenovo</option>
							<option value="LG">LG</option>
							<option value="Microsoft">Microsoft</option>
							<option value="Motorola">Motorola</option>
							<option value="NEC">NEC</option>
							<option value="OTEK">OTEK</option>
							<option value="Philips">Philips</option>
							<option value="Samsung">Samsung</option>
							<option value="Segotep">Segotep</option>
							<option value="ViewSonic">ViewSonic</option>
							<option value="Visonic">Visonic</option>
							<option value="Vitra">Vitra</option>
							<option value="Thinkview">Thinkview</option>
						</select>
						<a class="a_thaydoi" id="select_luachon">Thêm thương hiệu khác</a>
					</div>
					<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input" value="<?=$thuonghieu?>">
						<a class="a_thaydoi" id="input_luachon">Thương hiệu có sẳn</a>
					</div>
						
					<?php
				}
			?>
			<!-- end mấy tính để bàn -->
			<!-- phụ kiện máy tính -->
			<?php 
				$id_pkmaytinh = [16,17,18];
				if (in_array($id_loai, $id_pkmaytinh) ) {
					?>
					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="tbamthanh" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="ABCNOVEL">ABCNOVEL</option>
							<option value="AcBel">AcBel</option>
							<option value="Adata">Adata</option>
							<option value="Advancing Gene">Advancing Gene</option>
							<option value="AFOX">AFOX</option>
							<option value="Air Cooling">Air Cooling</option>
							<option value="AKRACING">AKRACING</option>
							<option value="Amazon">Amazon</option>
							<option value="AMD">AMD</option>
							<option value="ANDYSON">ANDYSON</option>
							<option value="Anker">Anker</option>
							<option value="Ansmann">Ansmann</option>
							<option value="Antech">Antech</option>
							<option value="Apacer">Apacer</option>
							<option value="ARDUINO">ARDUINO</option>
							<option value="ASint™️">ASint™️</option>
							<option value="ASROCK">ASROCK</option>
							<option value="Asus">Asus</option>
							<option value="AVerMedia">AVerMedia</option>
							<option value="AzureWave">AzureWave</option>
							<option value="AZZOR">AZZOR</option>
							<option value="Banana Gold">Banana Gold</option>
							<option value="Baseus">Baseus</option>
							<option value="Belinda">Belinda</option>
							<option value="BITMAIN">BITMAIN</option>
							<option value="Buffalo">Buffalo</option>
							<option value="BYKSKI">BYKSKI</option>
							<option value="Cable Matters">Cable Matters</option>
							<option value="Cable5A">Cable5A</option>
							<option value="Camac">Camac</option>
							<option value="Camelion">Camelion</option>
							<option value="Canon">Canon</option>
							<option value="captain">captain</option>
							<option value="Casio">Casio</option>
						</select>
						<a class="a_thaydoi" id="select_luachon">Thêm thương hiệu khác</a>
					</div>
					<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input" value="<?=$thuonghieu?>">
						<a class="a_thaydoi" id="input_luachon">Thương hiệu có sẳn</a>
					</div>
						
					<?php
				}
			?>
			<!-- end phụ kiện máy tính -->
			<!-- thiết bị mạng -->
			<?php 
				$id_tbmang = [20,21,22,23,24];
				if (in_array($id_loai, $id_tbmang) ) {
					?>
					<div class="d_thongtincb" id="select_div">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<select id="tbamthanh" name="thuonghieu_select">
							<option value="<?=$thuonghieu?>"><?=$thuonghieu?></option>
							<option value="No brand">No brand</option>
							<option value="ALCATEL">ALCATEL</option>
							<option value="Allied Telesis">Allied Telesis</option>
							<option value="AMP">AMP</option>
							<option value="AMTAKO">AMTAKO</option>
							<option value="Anker">Anker</option>
							<option value="ANYCAST">ANYCAST</option>
							<option value="APTEK">APTEK</option>
							<option value="airtel">airtel</option>
							<option value="Aruba">Aruba</option>
							<option value="ASUS">ASUS</option>
							<option value="ATHEROS">ATHEROS</option>
							<option value="Avantree">Avantree</option>
							<option value="Aztech">Aztech</option>
							<option value="Belden">Belden</option>
							<option value="Broadlink">Broadlink</option>
							<option value="Cambium Networks">Cambium Networks</option>
						</select>
						<a class="a_thaydoi" id="select_luachon">Thêm thương hiệu khác</a>
					</div>
					<div class="d_thongtincb" id="input_div" style="display: none;">
						<label class="label_thongtincb">Thương Hiệu:</label>
						<input type="text" name="thuonghieu_input" value="<?=$thuonghieu?>">
						<a class="a_thaydoi" id="input_luachon">Thương hiệu có sẳn</a>
					</div>
						
					<?php
				}
			?>
			<!-- end thiết bị mạng -->
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
				  <a class="removeimg" href="javascript:" ></a></div>
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
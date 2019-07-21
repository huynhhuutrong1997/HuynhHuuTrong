<?php 
include ('controller/c_themsanpham.php');
$c_themsanpham = new C_themsanpham();
$chitietthemsp = $c_themsanpham->chitietthemsp();
$id_loai = $chitietthemsp['id_loai'];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="public/js/jquery1.min.js"></script>
<script src="public/js/uploadanh.js" type="text/javascript"></script>
<script type="text/javascript" src="public/js/danhmucthemsp.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/uploadanh.css">
<!-- Select -->
 <script src="public/js/jquery-1.8.0.min.js"></script>
 <script src="public/js/select2.js"></script>
 <link href="public/css/select2.css" rel="stylesheet"/>
 <script>
    $(document).ready(function() {
        $("#thuonghieu").select2();
        $("#model").select2();
        $("#bonhotrong").select2();
        $("#mang").select2();
        $("#khecamsim").select2();   
        $("#chongthamnuoc").select2();
        $("#manhinh").select2();
        $("#hedieuhanh").select2();
        $("#ram").select2();
        $("#camsau").select2();
        $("#camtruoc").select2();
        $("#gps").select2();
        $("#blutoo").select2();
        $("#microUSB").select2();
        $("#pin").select2();
        $("#mau").select2();
        $("#baohanh").select2();
        $("#thuonghieulap").select2();
        $("#thuonghieusac").select2();
        $("#dungluong").select2();
    });
</script>
<!-- start menu -->

<!--start slider -->
    
<!--end slider -->
<script src="public/js/jquery.easydropdown.js"></script>
</head>
<body>
	<div class="header-top">
	   <div class="wrap"> 
			  <div class="header-top-left">
			  	   <div class="box">
   				      <select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Language :</option>
							<option value="1">English</option>
							<option value="2">French</option>
							<option value="3">German</option>
					  </select>
   				    </div>
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
					<a href="index.php"><img src="public/images/logo.png" alt=""/></a>
				</div>
		</div>
		<div class="clear"></div>
     </div>
	</div>
	

<div class="themsanphamct">
	<form>
		<div class="thongtincb">
			<h2>Thông Tin Cơ Bản</h2>
			<hr>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Tên Sản Phẩm:</label><input type="text" name="tensp" required>
				
			</div>
			<!-- Điện thoại, máy tính bảng -->
			<?php
			 if ($id_loai == 1 || $id_loai == 2) {
			 	?>
			 	<div class="d_thongtincb">
				<label class="label_thongtincb">Thương Hiệu:</label>
				<select id="thuonghieu">
					<option value="2GOOD">2GOOD</option>
					<option value="ACER">ACER</option>
					<option value="ADMET">ADMET</option>
					<option value="Apple">Apple</option>
					<option value="ASUS">ASUS</option>
					<option value="AVIO">AVIO</option>	
					<option value="BenPhones">BenPhones</option>
					<option value="CSIO">CSIO</option>
					<option value="CHUWI">CHUWI</option>	
					<option value="DELL">DELL</option>
					<option value="FPT">FPT</option>
					<option value="Google Nexus">Google Nexus</option>	
					<option value="Google">Google</option>
					<option value="Google Phone">Google Phone</option>
					<option value="Honor">Honor</option>
					<option value="HP">HP</option>
					<option value="HTC">HTC</option>
					<option value="Huawei">Huawei</option>
					<option value="Intel">Intel</option>
					<option value="Intex">Intex</option>
					<option value="KingCom">KingCom</option>
					<option value="Kingston">Kingston</option>
					<option value="Lenovo">Lenovo</option>
					<option value="LG G Pad">LG G Pad</option>
					<option value="LG">LG</option>
					<option value="Microsoft">Microsoft</option>
					<option value="Mobell">Mobell</option>
					<option value="Mobile">Mobile</option>
					<option value="Mobiistar">Mobiistar</option>
					<option value="Motorola">Motorola</option>
					<option value="Nokia">Nokia</option>
					<option value="Novo">Novo</option>
					<option value="Oppo">Oppo</option>
					<option value="Philips">Philips</option>
					<option value="Honor">Honor</option>
					<option value="Q-Mobil">Q-Mobile</option>
					<option value="Q-smart">Q-smart</option>
					<option value="S-Mobile">S-Mobile</option>
					<option value="SamSung">SamSung</option>
					<option value="Sony">Sony</option>
					<option value="Xiaomi">Xiaomi</option>
					<option value="Viettel">Viettel</option>
					<option value="Vsmart">Vsmart</option>
				</select>
				
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Model:</label>
				<select id="model">
					<option value="Acer Iconia Tab 8 W W1-810">Acer Iconia Tab 8 W W1-810</option>
					<option value="Acer Iconia Talk S A1-734">Acer Iconia Talk S A1-734</option>
					<option value="Acer Iconica W3-810">Acer Iconica W3-810</option>
					<option value="Acer Liquid E3">Acer Liquid E3</option>
					<option value="Acer Liquid E600">Acer Liquid E600</option>
					<option value="Acer Liquid M220">Acer Liquid M220</option>	
					<option value="Acer Liquid S1">Acer Liquid S1</option>
					<option value="Acer Liquid S2">Acer Liquid S2</option>
					<option value="Acer Liquid Z5">Acer Liquid Z5</option>	
					<option value="Acer Liquid Z530S">Acer Liquid Z530S</option>
					<option value="Acer Liquid Z630">Acer Liquid Z630</option>
					<option value="ADMET K3000">GADMET K3000</option>	
					<option value="AEKU M5 (AIEK M5)">AEKU M5 (AIEK M5)</option>
					<option value="AIEK E1">AIEK E1</option>
					<option value="Amazon basic 2016">Amazon basic 2016</option>
					<option value="Amazon Fire 7 2015">Amazon Fire 7 2015</option>
					<option value="Amazon Fire 7">Amazon Fire 7</option>
					<option value="Amazon Fire 8">Amazon Fire 8</option>
					<option value="Apple iPad 1">Apple iPad 1</option>
					<option value="Apple iPad 2">Apple iPad 2</option>
					<option value="Apple Ipad 3">Apple Ipad 3</option>
					<option value="Apple iPad 4">Apple iPad 4</option>
					<option value="Apple IPad Air 1">Apple IPad Air 1</option>
					<option value="Apple iPad Air 2">Apple iPad Air 2</option>
					<option value="Apple iPad Air">Apple iPad Air</option>
					<option value="Apple Ipad Gen 5 2017">Apple Ipad Gen 5 2017</option>
					<option value="Apple iPad mini 2">Apple iPad mini 2</option>
					<option value="Apple iPad Mini 3">Apple iPad Mini 3</option>
					<option value="Apple iPad Mini 4">Apple iPad Mini 4</option>
					<option value="Apple iPad mini">Apple iPad mini</option>
					<option value="Apple iPad Pro 10.5">Apple iPad Pro 10.5</option>
					<option value="Apple iPad Pro">Apple iPad Pro</option>
					<option value="Apple iPhone 3G">Apple iPhone 3G</option>
					<option value="Apple iPhone 3GS">Apple iPhone 3GS</option>
					<option value="Apple iPhone 4">Apple iPhone 4</option>
					<option value="Apple iPhone 4s">Apple iPhone 4s</option>
					<option value="Apple iPhone 5">Apple iPhone 5</option>
					<option value="Apple iPhone 5s">Apple iPhone 5s</option>
					<option value="Apple iPhone 5c">Apple iPhone 5c</option>
					<option value="Apple iPhone 5se">Apple iPhone 5se</option>
					<option value="Apple iPhone 6 Plus">Apple iPhone 6 Plus</option>
					<option value="Apple iPhone 6">Apple iPhone 6</option>
					<option value="Apple iPhone 6c">Apple iPhone 6c</option>
					<option value="Apple iPhone 6s Plus">Apple iPhone 6s Plus</option>
					<option value="Apple iPhone 6s">Apple iPhone 6s</option>
					<option value="Apple iPhone 7 Plus">Apple iPhone 7 Plus</option>
					<option value="Apple iPhone 7">Apple iPhone 7</option>
					<option value="Apple iPhone 8 Plus">Apple iPhone 8 Plus</option>
					<option value="Apple iPhone 8">Apple iPhone 8</option>
					<option value="Apple iPhone SE">Apple iPhone SE</option>
					<option value="Apple iPhone X">Apple iPhone X</option>
					<option value="Apple iPhone Xs Max">Apple iPhone Xs Max</option>
					<option value="Apple iPhone Xs">Apple iPhone Xs</option>
				</select>
			</div>

			<div class="d_thongtincb">
				<label class="label_thongtincb">Bộ nhớ trong:</label>
				<select id="bonhotrong">
					<option value=":8MB">8MB</option>
					<option value=":256MB">256MB</option>
					<option value=":512MB">512MB</option>
					<option value=":2GB">2GB</option>
					<option value=":4GB">4GB</option>
					<option value=":Dưới 4GB">Dưới 4GB</option>
					<option value=":8GB">8GB</option>
					<option value=":16GB">16GB</option>
					<option value=":32GB">32GB</option>
					<option value=":64GB">64GB</option>
					<option value=":128GB">128GB</option>
					<option value=":Hơn 128GB">Hơn 128GB</option>
					<option value=":200GB">200GB</option>
					<option value=":256GB">256GB</option>
					<option value=":512GB">512GB</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Mạng:</label>
				<select id="mang">
					<option value=":GSM">GMS</option>
					<option value=":HSPA">HSPA</option>
					<option value=":LTE">LTE</option>
					<option value=":No">No</option>
					<option value="CDMA/EVDO"></option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Mạng:</label>
				<select id="khecamsim">
					<option value=":Single">Single</option>
					<option value=":Dual">Dual</option>
					<option value=":Triple">Triple</option>
					<option value=":No">No</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Chống thấm nước:</label>
				<select id="chongthamnuoc">
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Kích thước màn hình (inches):</label>
				<select id="manhinh">
					<option value=":3.5">3.5</option>
					<option value=":4">4</option>
					<option value=":4.7">4.7</option>
					<option value=":5.5">5.5</option>
					<option value=":5">5</option>
					<option value=":10.1">10.1</option>
					<option value=":1.77">1.77</option>
					<option value=":4.5">4.5</option>
					<option value=":5.2">5.2</option>
					<option value=":5.7">5.7</option>
					<option value=":6">6</option>
					<option value="4.3">4.3</option>
					<option value=":4.8">4.8</option>
					<option value=":3.8">3.8</option>
					<option value=":5.3">5.3</option>
					<option value=":5.01">5.01</option>
					<option value=":7">7</option>
					<option value=":5.8">5.8</option>
					<option value=":6.3">6.3</option>
					<option value=":8">8</option>
					<option value=":5.6">5.6</option>
					<option value=":12.2">12.2</option>
					<option value=":3.3">3.3</option>
					<option value=":4.4">4.4</option>
					<option value=":5.1">5.1</option>
					<option value=":6.2">6.2</option>
					<option value=":18.4">18.4</option>
					<option value=":2">2</option>
					<option value=":1.5">1.5</option>
					<option value=":2.4">2.4</option>
					<option value=":9.7">9.7</option>
					<option value=":9.6">9.6</option>
					<option value=":8.4">8.4</option>
					<option value=":10.5">10.5</option>
					<option value=":5.9">5.9</option>
					<option value=":6.8">6.8</option>
					<option value=":6.9">6.9</option>
					<option value=":6.1">6.1</option>
					<option value=":5.09">5.09</option>
					<option value=":6.6">6.6</option>
					<option value=":3.2">3.2</option>
					<option value=":4.9">4.9</option>
					<option value=":1.45">1.45</option>
					<option value=":1.8">1.8</option>
					<option value=":2.8">2.8</option>
					<option value=":1.4">1.4</option>
					<option value=":5.88">5.88</option>
					<option value=":5.43">5.43</option>
					<option value=":5.46">5.46</option>
					<option value=":4.6">4.6</option>
					<option value=":6.44">6.44</option>
					<option value=":5.15">5.15</option>
					<option value=":6.4">6.4</option>
					<option value=":6.98">6.94</option>
					<option value=":4.95">4.95</option>
					<option value=":5.96">5.96</option>
					<option value=":8.9">8.9</option>
					<option value=":3.7">3.7</option>
					<option value=":6.5">6.5</option>
					<option value=":6.39">6.39</option>
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Hệ điều hành:</label>
				<select id="hedieuhanh">
					<option value=":No">No</option>
					<option value=":Android 2.1">Android 2.1</option>
					<option value=":Android 2.3">Android 2.3</option>
					<option value=":Android 4.0.4">Android 4.0.4</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Ram:</label>
				<select id="ram">
					<option value=":No">No</option>
					<option value=":4MB">4MB</option>
					<option value=":8MB">8MB</option>
					<option value=":16MB">16MB</option>
					<option value=":32MB">32MB</option>
					<option value=":128MB">128MB</option>
					<option value=":256MB">256MB</option>
					<option value=":512MB">512MB</option>
					<option value=":1GB">1GB</option>
					<option value=":1.5GB">1.5GB</option>
					<option value=":2GB">2GB</option>
					<option value=":3GB">3GB</option>
					<option value=":4GB">4GB</option>
					<option value=":6GB">6GB</option>
					<option value=":8GB">8GB</option>
					<option value=":16GB">16GB</option>
					<option value=":32GB">32GB</option>
					<option value=":64GB">64GB</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Camera sau:</label>
				<select id="camsau">
					<option value=":Không có camera sau">Không có camera sau</option>
					<option value=":VGA">VGA</option>
					<option value=":0.08MP">0.08MP</option>
					<option value=":0.3MP">0.3MP</option>
					<option value=":1.2MP">1.2MP</option>
					<option value=":1.3MP">1.3MP</option>
					<option value=":12.3MP">12.3MP</option>
					<option value=":12MP">12MP</option>
					<option value=":13.1MP">13.1MP</option>
					<option value=":13MP">13MP</option>
					<option value=":16.3MP">16.3MP</option>
					<option value=":16MP">16MP</option>
					<option value=":19MP">19MP</option>
					<option value=":2.1MP">2.1MP</option>
					<option value=":20.1MP">20.1MP</option>
					<option value=":20.7MP">20.7MP</option>
					<option value=":20MP">20MP</option>
					<option value=":21.2MP">21.2MP</option>
					<option value=":21.5MP">21.5MP</option>
					<option value=":21MP">21MP</option>
					<option value=":22.5MP">22.5MP</option>
					<option value=":23MP">23MP</option>
					<option value=":2MP">2MP</option>
					<option value=":3.15MP">3.15MP</option>
					<option value=":3.2MP">3.2MP</option>
					<option value=":3MP">3MP</option>
					<option value=":4 ultrapixel">4 ultrapixel</option>
					<option value=":5MP">5MP</option>
					<option value=":8MP">8MP</option>
					<option value=":Dual 12MP + 12MP">Dual 12MP + 12MP</option>
					<option value=":Dual 12MP + 2MP">Dual 12MP + 2MP</option>
					<option value=":Dual 12MP + 5MP">Dual 12MP + 5MP</option>
					<option value=":Dual 13MP + 13MP">Dual 13MP + 13MP</option>
					<option value=":Dual 13MP + 2MP">Dual 13MP + 2MP</option>
					<option value=":Dual 13MP + 5MP">Dual 13MP + 5MP</option>
					<option value=":Dual 16MP + 8MP">Dual 16MP + 8MP</option>
					<option value=":Dual 20MP + 12MP">Dual 20MP + 12MP</option>
					<option value=":15MP">15MP</option>
					<option value=":8.0MP">8.0MP</option>
					<option value=":2.0MP">2.0MP</option>
					<option value=":5.0 MP">5.0 MP</option>
					<option value=":18 MP">18 MP</option>
					<option value=":5.0MP">5.0MP</option>
					<option value=":2.0 MP">2.0 MP</option>
					<option value=":10 MP">10 MP</option>
					<option value=":13.0 MP">13.0 MP</option>
					<option value=":3.0 MP">3.0 MP</option>
					<option value=":Dual 12MP+13MP">Dual 12MP+13MP</option>
					<option value=":Dual 12MP+8MP">Dual 12MP+8MP</option>
					<option value=":Dual 16MP + 2MP">Dual 16MP + 2MP</option>
					<option value=":Dual 24MP + 16MP">Dual 24MP + 16MP</option>
					<option value=":Dual 20MP + 2MP">Dual 20MP + 2MP</option>
					<option value=":24MP">24MP</option>
					<option value=":Triple 24MP + 5MP + 8MP">Triple 24MP + 5MP + 8MP</option>
					<option value=":Triple 12MP+16MP+8MP">Triple 12MP+16MP+8MP</option>
					<option value=":Triple 40MP+20MP+8MP">Triple 40MP+20MP+8MP</option>
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Camera trước:</label>
				<select id="camtruoc">
					<option value=":Không có camera trước">Không có camera trước</option>
					<option value=":0.3MP">0.3MP</option>
					<option value=":0.9MP">0.9MP</option>
					<option value=":1.2MP">1.2MP</option>
					<option value=":1.3MP">1.3MP</option>
					<option value=":1.6MP">1.6MP</option>
					<option value=":1.9MP">1.9MP</option>
					<option value=":10MP">10MP</option>
					<option value=":12MP">12MP</option>
					<option value=":13MP">13MP</option>
					<option value=":15MP">15MP</option>
					<option value=":16MP">16MP</option>
					<option value=":1MP">1MP</option>
					<option value=":2.0MP">2.0MP</option>
					<option value=":2.1MP">2.1MP</option>
					<option value=":2.2MP">2.2MP</option>
					<option value=":20MP">20MP</option>
					<option value=":24MP">24MP</option>
					<option value=":2MP">2MP</option>
					<option value=":3.2MP">3.2MP</option>
					<option value=":3.7MP">3.7MP</option>
					<option value=":4 Ultra Pixel">4 Ultra Pixel</option>
					<option value=":4MP">4MP</option>
					<option value=":5.1MP">5.1MP</option>
					<option value=":5MP">5MP</option>
					<option value=":6MP">6MP</option>
					<option value=":7MP">7MP</option>
					<option value=":8MP">8MP</option>
					<option value=":Dual 16MP + 8MP">Dual 16MP + 8MP</option>
					<option value=":Dual 20MP + 8MP">Dual 20MP + 8MP</option>
					<option value=":7.5MP">7.5MP</option>
					<option value=":1.1MP">1.1MP</option>
					<option value=":Dual 13MP + 2MP">Dual 13MP + 2MP</option>
					<option value=":24 MP">24 MP</option>

				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">GPS:</label>
				<select id="gps">
					<option value=":Yes">Yes</option>
					<option value=":No">No</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Bluetooth:</label>
				<select id="blutoo">
					<option value=":Yes">Yes</option>
					<option value=":No">No</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">microUSB:</label>
				<select id="microUSB">
					<option value=":1.1">1.1</option>
					<option value=":2">2</option>
					<option value=":2.0 Type-C">2.0 Type-C</option>
					<option value=":3">3</option>
					<option value=":3.1">3.1</option>
					<option value=":3.1 Type-C">3.1 Type-C</option>
					<option value=":3.0 Type-C">3.0 Type-C</option>
					<option value=":1.0 Charging only">1.0 Charging only</option>
					<option value=":Type-C">Type-C</option>
					<option value=":Không có microUSB">Không có microUSB</option>
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Pin (mAh):</label>
				<select id="pin">
					<option value=":1219">1219</option>
					<option value=":1420">1420</option>
					<option value=":1432">1432</option>
					<option value=":1440">1440</option>
					<option value=":1510">1510</option>
					<option value=":1560">1560</option>
					<option value=":1624">1624</option>
					<option value=":1715">1715</option>
					<option value=":1810">1810</option>
					<option value=":1960">1960</option>
					<option value=":2750">2750</option>
					<option value=":2900">2900</option>
					<option value=":2915">2915</option>
					<option value=":2600">2600</option>
					<option value=":8200">8200</option>
					<option value=":800">800</option>
					<option value=":1900">1900</option>
					<option value=":2300">2300</option>
					<option value=":2350">2350</option>
					<option value=":3000">3000</option>
					<option value=":3300">3300</option>
					<option value=":3600">3600</option>
					<option value=":3050">3050</option>
					<option value=":4000">4000</option>
					<option value=":5000">5000</option>
					<option value=":1500">1500</option>
					<option value=":1800">1800</option>
					<option value=":1860">1860</option>
					<option value=":2100">2100</option>
					<option value=":2000">2000</option>
					<option value=":2400">2400</option>
					<option value=":2950">2950</option>
					<option value=":2500">2500</option>
					<option value=":1850">1850</option>
					<option value=":2050">2050</option>
					<option value=":3100">3100</option>
					<option value=":2430">2430</option>
					<option value=":2800">2800</option>
					<option value=":3200">3200</option>
					<option value=":8220">8220</option>
					<option value=":3220">3220</option>
					<option value=":3500">3500</option>
					<option value=":4600">4600</option>
					<option value=":9500">9500</option>
					<option value=":1200">1200</option>
					<option value=":2330">2330</option>
					<option value=":2550">2550</option>
					<option value=":1300">1300</option>
					<option value=":5700">5700</option>
					<option value=":2200">2200</option>
					<option value=":1000">1000</option>
					<option value=":6800">6800</option>
					<option value=":4450">4450</option>
					<option value=":7300">7300</option>
					<option value=":4200">4200</option>
					<option value=":6000">6000</option>
					<option value=":4800">4800</option>
					<option value=":5870">5870</option>
					<option value=":7900">7900</option>
					
					
				</select>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Màu:</label>
				<select id="mau">
					<option value=":Bạc">Bạc</option>
					<option value=":Đen">Đen</option>
					<option value=":Nâu">Nâu</option>

				</select>
			</div>
			 	<?php
			 }
			?>
			
			<!-- end điện thoại -->
			<div class="d_thongtincb">
				<label class="label_thongtincb">Bảo hành (Tháng):</label>
				<select id="baohanh">
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
		
			<!-- Laptop, thiết bị âm thanh-->
			<!-- <?php
				// if ($id_loai == 3 || $id_loai == 4 || $id_loai == 5 || $id_loai == 6 || $id_loai == 7 || $id_loai == 8	) {
					?>
					<div class="d_thongtincb">
						<label class="label_thongtincb">Mô tả: Thương Hiệu</label>
						<select id="thuonghieulap">
							<option value=":No brand">No brand</option>
							<option value=":Acer">Acer</option>
							<option value=":Apple">Apple</option>
						</select>
					</div>
					<?php
				}
			?> -->
			
			<!-- end laptop -->
			<!-- Phụ kiện điện thoại -->
				<!-- <?php
					// if ($id_loai == 14) {
					?>
						<div class="d_thongtincb">
								<label class="label_thongtincb">Mô tả: Thương Hiệu</label>
								<select id="thuonghieusac">
									<option value=":No brand">No brand</option>
									<option value=":ADATA">ADATA</option>
									<option value=":Akus">Akus</option>
								</select>
						</div>
						<div class="d_thongtincb">
								<label class="label_thongtincb">Mô tả: Thương Hiệu</label>
								<select id="dungluong">
									<option value=":1-1000mAh">1-1000mAh</option>
									<option value=":1000-5000mAh">1000-5000mAh</option>
									<option value=":1-1000mAh">1-1000mAh</option>
									<option value=":10001-15000mAh">10001-15000mAh</option>
								</select>
						</div>
					<?php
				}
				?> -->
				
			<!-- end Phụ kiện điện thoại -->
			<div class="d_thongtincb">
				<label class="label_thongtincb">Mô tả:</label>
				<textarea></textarea>
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Giá:</label><input type="number" name="gia" required>
				
			</div>
			<div class="d_thongtincb">
				<label class="label_thongtincb">Kho hàng:</label><input type="number" name="tensp" required>
				
			</div>
		</div>
		<div class="anh">
			<div class="uploadanh">
				 <div id="myfileupload">
				   <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
				   <!--      Name  mà server request về sẽ là ImageUpload-->
				  
				 </div>
				 <div id="thumbbox">
				  <img height="100" width="100" alt="Thumb image" id="thumbimage" style="display: none" />
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
				   <input type="file" id="uploadfile2" name="ImageUpload2" onchange="anh2(this);" />
				   <!--      Name  mà server request về sẽ là ImageUpload-->
				  
				 </div>
				 <div id="thumbbox2">
				  <img height="100" width="100" alt="Thumb image" id="thumbimage2" style="display: none" />
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
				   <input type="file" id="uploadfile3" name="ImageUpload3" onchange="anh3(this);" />
				   <!--      Name  mà server request về sẽ là ImageUpload-->
				  
				 </div>
				 <div id="thumbbox3">
				  <img height="100" width="100" alt="Thumb image" id="thumbimage3" style="display: none" />
				  <a class="removeimg3" href="javascript:" ></a></div>
				 <div id="boxchoice3">
				  <a href="javascript:" class="Choicefile3">Chọn Ảnh 3</a>
				  <p style="clear:both"></p>
				 </div>
				  <!-- <label class="filename3"></label> -->
			</div>
		</div>
		<div class="btn_them">
			<button name="btnthem">Thêm</button>
		</div>
	</form>
</div>
	


</body>
</html>
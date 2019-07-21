<?php
include 'header.php';
?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" type="text/css" href="../public/css/danhgia_ct.css">
<link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css">
<script type="text/javascript" src="../public/js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<!-- <script src="../public/js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: '../public/imges/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script> -->
<link rel="stylesheet" href="../public/css/etalage.css">
<script src="../public/js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 360,
					thumb_image_height: 360,
					source_image_width: 900,
					source_image_height: 900,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
</script>	
</head>
<body>
<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="c_index.php">Home</a> / <a href="#"><?=$title->TenLoaiSanPham?></a> /<a href="c_sanpham.php?action=phanloai&id_loai=<?=$chitietsanpham->id_ChiTietLoai?>"><?=$title->TenChiTietLoai?></a> / <?=$chitietsanpham->TenSanPham?></ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								
								<img class="etalage_thumb_image" src="../public/images/sanpham/<?=$chitietsanpham->Hinh?>" class="img-responsive" />
								<img class="etalage_source_image" src="../public/images/sanpham/<?=$chitietsanpham->Hinh?>" class="img-responsive" title="" />
							
							</li>
							<li>
								<?php
									if ($chitietsanpham->Hinh1 !="") {
										?>
										<img class="etalage_thumb_image" src="../public/images/sanpham/<?=$chitietsanpham->Hinh1?>" class="img-responsive" />
										<img class="etalage_source_image" src="../public/images/sanpham/<?=$chitietsanpham->Hinh1?>" class="img-responsive" title="" />
										<?php
									}
								?>
								
							</li>
							<li>
								<?php
									if ($chitietsanpham->Hinh2 !="") {
										?>
										<img class="etalage_thumb_image" src="../public/images/sanpham/<?=$chitietsanpham->Hinh2?>" class="img-responsive"  />
										<img class="etalage_source_image" src="../public/images/sanpham/<?=$chitietsanpham->Hinh2?>" class="img-responsive"  />
										<?php
									}
								?>
								
							</li>
						    <!-- <li>
								<img class="etalage_thumb_image" src="../public/images/s4.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="../public/images/s-img3.jpg" class="img-responsive"  />
							</li> -->
						</ul>
					<div class="clearfix"></div>
	         </div>

         <div class="desc1 span_3_of_2">
         	<h3 class="m_3"><?=$chitietsanpham->TenSanPham?></h3>
         	<?php
         		$gia = $chitietsanpham->Gia;
				$money = formatMoney($gia);
         	?>
             <p class="m_5 gia"><?=$money?> ₫</p>

             <form method="POST">
	             <!-- <div class="d_soluong">
	             	<label class="c_soluong">Số Lượng</label><input type="number" name="soluong" value="1" min="1" max="10">
	             </div> -->
	             <div>
	             	<div class="btn_form">
	   				   <a class="btn-add f_muahang" data-toggle="collapse" href="c_add.php?action=add&id_sanpham=<?php echo $_GET['id_sanpham']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">Thêm Giỏ Hàng</a>
				 	</div>
					 <div class="btn_form">

						<!-- <form > -->
							<!-- <a class="btn-add f_muahang" data-toggle="collapse" href="c_add.php?action=buy&id_sanpham=<?php echo $_GET['id_sanpham']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample" name="dathang" type="submit">Đặt Hàng</a> -->
							<!-- <button onclick="window.location.href='c_add.php?action=buy&id_sanpham=<?php echo $_GET['id_sanpham']; ?>'"
							type="submit" name="dathang">cc</button> -->
						<!-- </form> -->
					 </div>
	             </div>
             </form>
             <div class="thongtinshop">
		     	<h3 class="m_3">THÔNG TIN SHOP</h3>
		     	<div class="tnshop">
		     		<label class="c_soluong">Được bán bởi:</label><a href="c_shop.php?action=shop&shop=<?=$chitietsanpham->id_User?>"><?=$shop->TenShop?></a>
		     	</div>
		    
		     </div>
	     </div>
		

	   <div class="clear"></div>	
	    <div class="clients">
	    <h3 class="m_3">SẢN PHẨM TƯƠNG TỰ</h3>
		 <ul id="flexiselDemo3">
		 	<?php 
		 		foreach ($sanphamtuongtu as $sanphamtt) {
		 				
		         		$gia = $sanphamtt->Gia;
						$money = formatMoney($gia);
         	
		 			?>
		 			<li class="c_sanphamtuongtu"><a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$sanphamtt->id_SanPham?>"><img src="../public/images/sanpham/<?=$sanphamtt->Hinh?>" /><div class="sanphamtt"><p class="tensp"><?=$sanphamtt->TenSanPham?></p></div><p class="money"><?=$money?> đ</p></a></li>
		 			<?php
		 		}
		 	?>
			
		 </ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="../public/js/jquery.flexisel.js"></script>
     </div>

     <div class="toogle">
     	<h3 class="m_3">CHI TIẾT SẢN PHẨM</h3>
		
     	<!--Dien thoai & may tinh bang-->
     	<?php
     		$dieukien = [1,2];
     		if(in_array($chitietsanpham->id_ChiTietLoai, $dieukien) ){
     			$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu,$mod,$nhotrong,$mang,$khesim,$chongnuoc,$kichthuocmanhinh,$hedieuhanh,$ram,$camsau,$camtruoc,$gps,$bluet,$microusb,$pin,$mau,$baohanh) = explode(':', $chitietsp);
     				
     			?>
     			<div class="chitietsp">
		     		<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet" href=""><?=$thuonghieu?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Model</label><a class="a_chitiet" href=""><?=$mod?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Bộ nhớ trong</label><a class="a_chitiet" href=""><?=$nhotrong?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Mạng</label><a class="a_chitiet" href=""><?=$mang?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Khe cắm sim</label><a class="a_chitiet" href=""><?=$khesim?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Chống thấm nước</label><a class="a_chitiet" href=""><?=$chongnuoc?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Kích thước màn hình (Inches)</label><a class="a_chitiet" href=""><?=$kichthuocmanhinh?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Hệ điều hành</label><a class="a_chitiet" href=""><?=$hedieuhanh?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">RAM</label><a class="a_chitiet" href=""><?=$ram?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Camera sau</label><a class="a_chitiet" href=""><?=$camsau?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Camera trước</label><a class="a_chitiet" href=""><?=$camtruoc?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">GPS</label><a class="a_chitiet" href=""><?=$gps?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Bluetooth</label><a class="a_chitiet" href=""><?=$bluet?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">microUSB</label><a class="a_chitiet" href=""><?=$microusb?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Pin (mAh)</label><a class="a_chitiet" href=""><?=$pin?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Màu</label><a class="a_chitiet" href=""><?=$mau?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Bảo hành (tháng)</label><a class="a_chitiet" href=""><?=$baohanh?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet" href=""><?=$chitietsanpham->Kho?></a></div>
		     		<div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet" href=""><?=$shop->DiaChi?></a></div>
		     	</div>

     			<?php
     		}
     	?>
     	
     	<!--end dien thoai & may tinh bang-->

     	<!--Laptop-->
     	<?php 
     		$dieukien2 = [6,7,8 , 13];
     		if(in_array($chitietsanpham->id_ChiTietLoai, $dieukien2)){
     			$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu,$baohanh) = explode(':', $chitietsp);
     	?>
     	<div class="chitietsp">
     		<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet" href=""><?=$thuonghieu?></a></div>
     		<div class="chitiet"><label class="c_chitiet">Bảo hành</label><a class="a_chitiet" href=""><?=$baohanh?></a></div>
     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet" href=""><?=$chitietsanpham->Kho?></a></div>
     		<div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet" href=""><?=$shop->DiaChi?></a></div>
     	</div>

     	<?php
     		}
     	?>
     	<!-- end laptop-->


     	<!--Phu kien dien thoai-->
     	<?php 
     		$dieukien3 = [12,14];
     		if(in_array($chitietsanpham->id_ChiTietLoai, $dieukien3)){
     			$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu,$dongmay,$chatlieu,$chucnang,$baohanh) = explode(':', $chitietsp);
     	?>
     		<div class="chitietsp">
     			<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet"><?=$thuonghieu?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Dòng máy tương thích</label><a class="a_chitiet"><?=$dongmay?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chất liệu</label><a class="a_chitiet"><?=$chatlieu?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chức năng</label><a class="a_chitiet"><?=$chucnang?></a></div>
	     		
	     		<div class="chitiet"><label class="c_chitiet">bảo hành</label><a class="a_chitiet"><?=$baohanh?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet"><?=$chitietsanpham->Kho?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet"><?=$shop->DiaChi?></a></div>
     		</div>
     	<?php 
     		}
     	?>
     	<!--end phu kien dien thoai-->

     	<!--thiet bi am thanh & phụ kien may tinh & thiết bị mạng -->
     	<?php 
     		$dieukien4 = [3,4,5,16,17,18,19,20,21,22,23,24];
     		if(in_array($chitietsanpham->id_ChiTietLoai, $dieukien4)){
     			$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu,$baohanh) = explode(':', $chitietsp);

     	?>
 			<div class="chitietsp">
	     		<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet" href=""><?=$thuonghieu?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Bảo Hành</label><a class="a_chitiet" href=""><?=$baohanh?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet" href=""><?=$chitietsanpham->Kho?></a></div>
	     		<div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet" href=""><?=$shop->DiaChi?></a></div>
	     	</div>

	     	<?php 
	     }
	     	?>

     	<!--end thiet bi am thanh & phụ kien may tinh-->

     	<!--thời trang áo-->
     		<!-- <div class="chitietsp">
	     		<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet" href="">No brand</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chất liệu</label><a class="a_chitiet" href="">Thun</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Tay áo</label><a class="a_chitiet" href="">Tay dài</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Dáng áo</label><a class="a_chitiet" href="">Dáng vừa</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Cổ áo</label><a class="a_chitiet" href="">Có mũ trùm đầu</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Túi áo</label><a class="a_chitiet" href="">Có</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Cách giặt</label><a class="a_chitiet" href="">Giặt tay</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet" href="">5</a></div><div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet" href="">Quận Thủ Đức, TP. Hồ Chí Minh</a></div>
	     	</div>	 -->
     	<!--end thời trang áo-->

     	<!--thời trang quần-->
     		<!-- <div class="chitietsp">
	     		<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet" href="">No brand</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chất liệu</label><a class="a_chitiet" href="">Bò</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Phong cách</label><a class="a_chitiet" href="">Dạo phố</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Ống quần</label><a class="a_chitiet" href="">Dáng vừa</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Cổ áo</label><a class="a_chitiet" href="">Có mũ trùm đầu</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Túi áo</label><a class="a_chitiet" href="">Có</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Cách giặt</label><a class="a_chitiet" href="">Giặt tay</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet" href="">5</a></div><div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet" href="">Quận Thủ Đức, TP. Hồ Chí Minh</a></div>
	     	</div> -->	
     	<!--end thời trang quần-->

     	<!--Đồng hồ -->
     		<!-- <div class="chitietsp">
	     		<div class="chitiet"><label class="c_chitiet">Thương hiệu</label><a class="a_chitiet" href="">GENEVA</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chất liệu dây</label><a class="a_chitiet" href="">Da</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Giới tính</label><a class="a_chitiet" href="">Nữ</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chất liệu mặt kính</label><a class="a_chitiet" href="">Mineral</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Chất liệu viền ngoài</label><a class="a_chitiet" href="">Thép không gỉ</a></div>
	     		<div class="chitiet"><label class="c_chitiet">Kho hàng</label><a class="a_chitiet" href="">5</a></div><div class="chitiet"><label class="c_chitiet">Gửi từ</label><a class="a_chitiet" href="">Quận Thủ Đức, TP. Hồ Chí Minh</a></div>
	     	</div> -->
     	<!--end đồng hồ-->
     </div>
     <div class="toogle">
     	<h3 class="m_3">MÔ TẢ SẢN PHẨM</h3>
     	<p class="m_text"><?=$chitietsanpham->MoTa?></p>
     </div>
     <div class="toogle">
     	<h3 class="m_3">ĐÁNH GIÁ SẢN PHẨM</h3>
   		<?php 
   			if ($danhgia == null) {
   			?>
   			<p>Chưa có đánh giá</p>
   			<?php
   		}else{
   			foreach ($danhgia as $dg) {
   				?>
   				<div class="stars">
			    <input class="star star-5" id="star-5" type="radio"  value="5" <?php if ($dg->DanhGiaSanPham == 5) {
			    ?>
			    	checked
			    <?php
			    } ?> disabled />
			    <label class="star star-5" for="star-5"></label>
			    <input class="star star-4" id="star-4" type="radio" value="4"<?php if ($dg->DanhGiaSanPham == 4) {
			    ?>
			    	checked
			    <?php
			    } ?> disabled />
			    <label class="star star-4" for="star-4"></label>
			    <input class="star star-3" id="star-3" type="radio" value="3" <?php if ($dg->DanhGiaSanPham == 3) {
			    ?>
			    	checked
			    <?php
			    } ?> disabled />
			    <label class="star star-3" for="star-3"></label>
			    <input class="star star-2" id="star-2" type="radio" value="2" <?php if ($dg->DanhGiaSanPham== 2) {
			    ?>
			    	checked
			    <?php
			    } ?> disabled />
			    <label class="star star-2" for="star-2"></label>
			    <input class="star star-1" id="star-1" type="radio"  value="1" <?php if ($dg->DanhGiaSanPham == 1) {
			    ?>
			    	checked
			    <?php
			    } ?> disabled />
			    <label class="star star-1" for="star-1"></label>
   		
		</div>
		<div class="noidungdanhgia">
			<p><?=$dg->NoiDungSanPham?></p>
			<p class="thoigianbl"><?=$dg->ThoiGianDanhGia?></p>
		</div>
		<hr>
   				<?php
   			}
   		}
   		?>
		
		<div style="text-align: center;"><?=$paginationHTML1?></div>
     </div>
	 <div class="toogle">
     	<h3 class="m_3">Bình Luận</h3>
     	<div class="binhluan_content">
     		<?php 
     			if(isset($_SESSION['id_user'])){
     				?>
     				<div class="binhluan">
		     			<form method="POST">
		     				<textarea name="noidungbl" rows="6" cols="113" required></textarea>
			     			<div class="btn_datcauhoi">
			     				<span class="span">Hãy Đặt Câu Hỏi Liên Quan Đến Sản Phẩm Mà Bạn Muốn Biết</span>
			     				<button type="submit" name="datcauhoi">Đặt Câu Hỏi
			     				</button>
			     			</div>
		     				
		     			</form>
		     		</div>
     				<?php
     			}else{
     				?>
     					<div class="dangnhapbl">
     						<a href="c_user.php?action=login&id_sanpham=<?=$chitietsanpham->id_SanPham?>">Đăng Nhập</a><span>Để Bình Luận</span>
     					</div>
     				<?php
     			}
     		?>
     		
     		<div class="cacbinhluan">
	     		<h1 class="cauhoi_h1">Các Câu Hỏi</h1>
	     		<hr>
     			<div>
     				<?php 
     					foreach ($binhluan as $bl) {
     						?>
     						<div class="cauhoi">
		     					<div class="img">
		     						<img src="../public/images/question.png" height="23" width="23"><h2><?=$bl->NoiDung?></h2>
		     					</div>
		     					<p><?=$bl->BinhLuan?></p>
		     				</div>
		     				<?php 
		     				if (isset($_SESSION['id_user'])) {
		     					if ($bl->NoiDungTraLoi == "" && $bl->idUserTraLoi == $_SESSION['id_user']) {
		     						?>
		     						<form method="POST">
		     						<div class="traloi_cauhoi">
		     								<input type="" name="idtraloi" value="<?=$bl->idTraLoi?>" hidden >
		     								<textarea cols="105" name="noidungtl"></textarea>
		     								<button type="submit" name="btntraloi">Trả lời</button>
		     							
		     						</div>
		     						</form>
		     						<?php
		     					}
		     				}
		     					
		     				?>
		     				<?php
		     					if ($bl->NoiDungTraLoi != "") {
		     						?>
		     						<div class="traloi">
				     					<div class="img">
				     						<img src="../public/images/answer.png" height="23" width="23"><h2><?=$bl->NoiDungTraLoi?></h2>
				     					</div>
				     					<p><?=$shop->TenShop?></p>
				     				</div>
		     						<?php
		     					}
		     				?>
		     				
		     				
		     				<hr>
     						<?php
     					}
     				?>
     				
     				
     			</div>
     			<div style="text-align: center;"><?=$paginationHTML?></div>
     		</div>
     		
     	</div>
     </div>
     </div>
			<div class="rsidebar span_1_of_left left-optimal">
			<div class="top-border"><p class="goiy">Sản Phẩm Gợi Ý</p></div>
			<div class="border">   
		    <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
               
                    <?php 
		              	foreach ($goiyluatkethop as $goiy) {
			              		foreach ($goiy as $value) {
			              			 $gia = $value->Gia;
			              			 $money = formatMoney($gia);
			              			?>
						              <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$value->id_SanPham?>">
											 <div class="inner_content clearfix">
												<div class="product_image">
													<img src="../public/images/sanpham/<?=$value->Hinh?>" alt=""/>
												</div>
							                   	<!--  <div class="sale-box sale-box-banchay"><span class="on_sale title_shop">Bán Chạy</span></div> -->
							                    <div class="price">
							                    	<div class="cart-left">
							                    		<div class="title-div">
															<p class="title"><?=$value->TenSanPham?></p>
														</div>
														<div class="price1">
															  <span class="actual"><?=$money?>đ</span>
														</div>
							                    	</div>
													<div class="clear"></div>
												 </div>				
							                 </div>
							             </a>
			              			<?php
			              		}
		              		?>
		              		 
		              		<?php
		              	}
		               ?>
			               	
              
              	</div>
             </div>
            </div>
	    </div>	
		      <div class="clear"></div>
	</div>
			<div class="clear"></div>
	</div>
</div>
</body>
</html>

<?php

include 'footer.php';
?>
<?php
include 'header.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Shop</title>
</head>
  <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
                    <img src="../public/images/main_slide-01.jpg" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <!-- <h4 class="title">Aluminium Club</h4> -->
                        <!-- /Text title -->
                        
                        <!-- Text description -->
                        <!-- <p class="description">Experiance ray ban</p> -->
                        <!-- /Text description -->
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="../public/images/main_slide-02.jpg" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- <h4 class="title">consectetuer adipiscing </h4> -->
                        <!-- <p class="description">diam nonummy nibh euismod</p> -->
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Sản Phẩm Bán Chạy</h2>
			<div class="top-box">
		<?php
				foreach ($sanpham as $sp) {
						$gia = $sp->Gia;
						$money = formatMoney($gia);
						
					?>
						 <div class="col_1_of_3 span_1_of_3"> 
						   <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$sp->id_SanPham?>">
							<div class="inner_content clearfix">
								<div class="product_image">
									<img src="../public/images/sanpham/<?=$sp->Hinh?>" alt=""/>
								</div>
			                   
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
			<div style="text-align: center;"><?=$paginationHTML?></div>
			</div>	
		<!--   <h2 class="head">Staff Pick</h2>
		  <div class="top-box1">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../public/images/pic8.jpg" alt=""/>
					</div>
                     <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					 <a href="single.html">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../public/images/pic4.jpg" alt=""/>
					</div>
				    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="single.html">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../public/images/pic2.jpg" alt=""/>
					</div>
                   	 <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="clear"></div>
			</div> -->	
	        <h2 class="head">Sản Phẩm Mới</h2>	
		    <div class="top-box">
			  	
			  		<?php 
			  			foreach ($sanphammoi as $spnew) {
			  				$gia = $spnew->Gia;
							$money = formatMoney($gia);
			  				?>
			  				<div class="col_1_of_3 span_1_of_3"> 
						   <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$spnew->id_SanPham?>">
							<div class="inner_content clearfix">
								<div class="product_image">
									<img src="../public/images/sanpham/<?=$spnew->Hinh?>" alt=""/>
								</div>
			                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>
			                    <div class="price">
								   <div class="cart-left">
										<div class="title-div"><p class="title"><?=$spnew->TenSanPham?></p></div>
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
			<div class="rsidebar span_1_of_left left-optimal">
			<div class="top-border"><p class="goiy">Gợi ý</p></div>
			<div class="border">   
		    <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <!-- <img src="../public/images/t-img1.jpg"  alt="" />
               	<img src="../public/images/t-img2.jpg"  alt="" />
                <img src="../public/images/t-img3.jpg"  alt="" /> -->
                <?php 
                	foreach ($goiybanchay as $banchay) {
                		$gia = $banchay->Gia;
						$money = formatMoney($gia);
                		?>
	                <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$banchay->id_SanPham?>">
						 <div class="inner_content clearfix">
							<div class="product_image">
								<img src="../public/images/sanpham/<?=$banchay->Hinh?>" alt=""/>
							</div>
		                   	 <div class="sale-box sale-box-banchay"><span class="on_sale title_shop">Bán Chạy</span></div>
		                    <div class="price">
		                    	<div class="cart-left">
		                    		<div class="title-div">
										<p class="title"><?=$banchay->TenSanPham?></p>
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
                	foreach ($goiymoi as $moi) {
                		$gia = $moi->Gia;
						$money = formatMoney($gia);
                		?>
	                <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$moi->id_SanPham?>">
						 <div class="inner_content clearfix">
							<div class="product_image">
								<img src="../public/images/sanpham/<?=$moi->Hinh?>" alt=""/>
							</div>
		                   	 <div class="sale-box"><span class="on_sale title_shop">New</span></div>
		                    <div class="price">
		                    	<div class="cart-left">
		                    		<div class="title-div">
										<p class="title"><?=$moi->TenSanPham?></p>
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
              
              </div>
             </div>
             </div>
	    </div>
	   <div class="clear"></div>
	</div>
	</div>
	</div>
<?php
	include 'footer.php';
?>
</body>
</html>
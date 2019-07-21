<?php 
include 'header.php';
?>

<!DOCTYPE html>
<html>
<body>
<div class="mens">    
  <div class="main">
     <div class="wrap">
		<div class="cont span_2_of_3">
		  	<!-- <h2 class="head"><?=$title->TenChiTietLoai?></h2> -->
		  	<div class="mens-toolbar">
            <!--   <div class="sort">
               	<div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                <option value="">Position</option>
		                <option value="">Name</option>
		                <option value="">Price</option>
		            </select>
		            <a href=""><img src="public/images/arrow2.gif" alt="" class="v-middle"></a>
               </div>
    		</div> -->
       <!--  <div class="pager">   
        	<div class="limiter visible-desktop">
            <label>Show</label>
            <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                        </select> per page        
             </div>
       		<ul class="dc_pagination dc_paginationA dc_paginationA06">
			    <li><a href="#" class="previous">Pages</a></li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
		  	</ul>
	   		<div class="clear"></div>
    	</div> -->
     	<div class="clear"></div>
	</div>
	<div class="top-box">
		
		<?php
				foreach ($sanpham as $sp) {
					?>
						 <div class="col_1_of_3 span_1_of_3"> 
						   <a href="c_sanpham.php?action=chitiet&id_sanpham=<?=$sp->id_SanPham?>">
							<div class="inner_content clearfix">
								<div class="product_image">
									<img src="../public/images/sanpham/<?=$sp->Hinh?>" alt=""/>
								</div>
			                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
			                    <div class="price">
								   <div class="cart-left">
										<div class="title-div"><p class="title"><?=$sp->TenSanPham?></p></div>
										<div class="price1">
											<?php
								         		$gia = $sp->Gia;
												$money =formatMoney($gia);
								         	?>
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
		<div class="clear"></div>
		</div>
		<div style="text-align: center;"><?=$paginationHTML?></div>
	</div>

</div>
		<script src="js/jquery.easydropdown.js"></script>
</body>
</html>
<?php
include 'footer.php'; 

?>
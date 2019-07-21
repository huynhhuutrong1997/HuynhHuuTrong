<?php include"../view/user/header.php"; ?> 
<body>
    <div class="main-donhang">
        <div class="container">
            <div class="giohang box-shadow">
                <h3>Mã Đơn Hàng <?php echo '#'.$_GET['id_donhang']; ?></h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                          <th class="stt" scope="col">STT</th>
                          <th class="name-sp" scope="col">Tên Sản Phẩm </th>
                          <th class="text-center" scope="col">Hình Ảnh</th>
                          <th class="soluong text-center" scope="col">Số Lượng</th>
                          <th class="text-center" scope="col">Đơn Giá</th>
                          <th class="text-center" scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>               
                    <?php 
                        if (isset($dataCart)) {
                            $stt=1;
                            $sum=0;
                            foreach ($dataID as $values) {
                            	
                            }
                            foreach ($dataCart as $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $stt; ?></td>
                                <td>
                                	<?php echo $value['TenSanPham'];?>
                                </td>
                                <td class="text-center"><img src="../public/images/sanpham/<?php echo $value['Hinh']; ?>" width="40" height="40" /></td>
                                <td class="text-center"><?php echo $values['soluong'];?></td>
                                <td class="text-center"><?php echo number_format($value['Gia']*$values['soluong']).' VNĐ'; ?></td>
                                <td class="text-center"><a href="c_sanpham.php?action=chitiet&id_sanpham=<?php echo $value['id_SanPham'];?>">Chi Tiết</a></td>
                            </tr>
                            <?php 
                                $stt++;
                                $sum+=($value['Gia'])*($values['soluong']);
                                }
                            ?>
                            <?php
                        }
                        else{
                            echo "<p>Không có sản phẩm trong giỏ hàng của bạn !</p>"; 
                        }
                    ?>
                    </tbody>
                </table>
                <hr>
                <div class="row align-self-center">
                	<div class="col-md-6 text-left">
                        <h3 class="title">Lý Do Hủy</h3>
                        <hr>
                        <div class="form-group">
                            <textarea disabled="disabled" class="form-control" name ="LyDoHuy"><?php 
                            foreach ($datacancel as $value) {
                                echo $value['LyDoHuy'];
                            }
                             ?></textarea> 
                        </div> 
                    </div>
                	<div class="col-md-6 text-right d-flex align-items-center"><h4>Tổng: 
	                    <?php if(isset($sum)!=0){
	                        echo number_format($sum).' VNĐ';
	                        
	                    }else 
	                    {
	                        echo 0;
	                    } 
	                ?>  
	                </h4>
		            </div>		        
                </div> 
                <hr>   
                    <a class="fix-text" href="c_add.php?action=ordercancel"><i class="fas fa-arrow-left">  Trở  Về</i></a>  
            </div>
        </div>
    </div>
</body>
<?php 
    include "../view/user/footer.php";
?> 
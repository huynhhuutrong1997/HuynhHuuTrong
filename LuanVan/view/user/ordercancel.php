<?php 
	include"header.php";
?>
<link rel="stylesheet" type="text/css" href="../public/css/style1.css">
<style type="text/css"> 
    body {
        font-size: 14px !important;
    }
</style>
<div class="main-donhang">
    <div class="container fix-size">
	<div class="giohang box-shadow">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3 class="title">Đơn hàng đã hủy</h3>
            </div>
        </div>
	    <hr>
	    <table class="table">
	        <thead>
	            <tr>
	              <th class="stt" scope="col">STT</th>
	              <th class="" scope="col">Mã Đơn Hàng</th>
	              <th class="text-center" scope="col">Tên Khách Hàng</th>
	              <th class=" text-center" scope="col">Số Lượng Sản Phẩm</th>
	              <th scope="col">Tổng Tiền</th>
	              <th class="text-center" scope="col">Trạng Thái Đơn Hàng</th>
                  <th class="text-center" scope="col">Thời Gian Đặt</th>
                  <th class="text-center" scope="col">Thao Tác</th>

	            </tr>
	        </thead>
	        <tbody>
	        	<?php 
                    if ($datac==null) {
                        echo "<p>Bạn Không có đơn hàng nào !</p>"; 

                    }
                    else{
                        
                        $stt=1;            
                        foreach ($datac as $value) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $stt; ?></td>
                            <td><?php 
                                echo '#'.$value['id'];
                            ?></td>
                            <td class="text-center"><?php echo $value['TenKH'];?></td>
                            <td class="text-center"><?php echo $value['SoLuong'];?></td>
                            <td><?php echo number_format($value['TongTien']).' VNĐ';?></td>
                            <?php 
                                if ($value['Status']=='Đã Hủy') {
                                    ?>
                                    <td style="color: red;" class="text-center"><?php echo $value['Status'];?></td>
                                    <?php
                                }
                                else {
                                    ?>
                                    <td class="text-center"><?php echo $value['Status'];?></td>
                                    <?php
                                }
                            ?>
                            <td class="text-center"><?php echo date("d-m-Y",strtotime($value['date_Created']));?></td>
                            <td class="text-center">
                                <a class="btn-order btn-primary" href="c_add.php?action=chitietordercancel&id_donhang=<?php echo $value['id']; ?>"><i class="far fa-calendar-minus"></i></a>
                            </td>                          
                        </tr>
                        <?php 
                            $stt++;
                            }
                        ?>
                        <?php
                    }
                ?>
	        </tbody>
	    </table>
	    <hr>   
        <div class="row align-self-center">
                    <div class="col-md-6 text-left"><a class="fix-text" href="c_add.php?action=donhang"><i class="fas fa-arrow-left">  Trở  Về</i></a></div>
                    <div class="col-md-6 text-right d-flex align-items-center">
                    </div>              
                </div>  
	</div>
    </div>
    <div class="row">
        <div class="container">
            <?php
                if (isset($data)) {
                    foreach ($data as $value) {
                        
                    }
                        
                }
            ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php 
	include"footer.php";
?> 

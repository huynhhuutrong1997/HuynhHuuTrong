<?php 
	include"header.php";
?>
<style type="text/css">
    body, .form-control {
        font-size: 14px !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="../public/css/style1.css">
<div class="main-donhang">
    <div class="container fix-size">
	<div class="giohang box-shadow">
	    <h3 class="title">Đơn Hàng Muốn Hủy</h3>
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
                    if ($data==null) {
                        echo "<p>Không có sản phẩm trong giỏ hàng của bạn !</p>"; 

                    }
                    else{
                        
                        $stt=1;            
                        foreach ($data as $value) {
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
                            <td class="text-center">
                                <?php 
                                    echo date("d-m-Y",strtotime($value['date_Created']));
                                ?>
                            </td>
                            <td class="text-center">
                                <a class="btn-order btn-primary" href="c_add.php?action=chitietdonhang&id_donhang=<?php echo $value['id']; ?>"><i class="far fa-calendar-minus"></i></a>
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
        <div>
            <h3 class="title">Lý Do Hủy</h3>
            <hr>
            <form method="post" action="c_add.php?action=removedonhang&id=<?php echo $_GET['id_donhang']; ?>">
                <div class="form-group">
                    <textarea required="true" placeholder="Lý do bạn muốn hủy đơn hàng của chúng tôi là gì ?" class="form-control" name ="LyDoHuy"></textarea> 
                </div>
                <div class="text-right">
                <button class="btn btn-primary" name="delorder">Hủy Đơn Hàng</button></div>
            </form>
            <hr>
        </div>
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
<?php 
	include"footer.php";
?> 

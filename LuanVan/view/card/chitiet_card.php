<?php include"../view/user/header.php"; ?> 
<body>
    <div class="main-donhang">
        <div class="container fix-padding">
            <div class="giohang box-shadow">
                <h3>Tất cả sản phẩm</h3>
                <hr>
                <form method="post" action="c_add.php?action=xacnhandonhang">
                    <table class="table">
                        <thead>
                            <tr>
                              <th class="stt" scope="col">STT</th>
                              <th class="name-sp" scope="col">Tên </th>
                              <th class="text-center" scope="col">Hình Ảnh</th>
                              <th class="soluong text-center" scope="col">Số Lượng</th>
                              <th scope="col">Đơn Giá</th>
                              <th class="text-center" scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if (isset($_SESSION['cart'])) {
                                $stt=1;
                                $sum=0;
                                foreach ($_SESSION['cart'] as $value) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $stt; ?></td>
                                    <td><?php 
                                        if (isset($_SESSION['cart'])!=null) {
                                           echo $value['name']; 
                                        }
                                        else {
                                            echo '';
                                        }
                                    ?></td>
                                    <td class="text-center"><img src="../public/images/sanpham/<?php echo $value['image']; ?>" width="40" height="40" /></td>
                                    <td class="text-center">
                                        <div id="qtySelector" class="quantity-col1">                   
                                        <p class="tiki-number-input">
                                            <div class="input-group bootstrap-touchspin">
                                                <span class="input-group-btn">
                                                    <?php
                                                        if ($value['quantity']>1) {
                                                            ?>
                                                            <a class="add-del btn btn-default bootstrap-touchspin-down" href="c_add.php?action=del_quantity&id_add=<?php echo $value['id'];?>">-</a>
                                                            <?php
                                                        }
                                                        else {
                                                            ?>
                                                            <a disabled class="add-del btn btn-default bootstrap-touchspin-down" href="c_add.php?action=del_quantity&id_add=<?php echo $value['id'];?>">-</a>
                                                            <?php
                                                        }
                                                    ?>                 
                                                </span>
                                                <input disabled="disabled" style="width: 30.64px;height: 34px;text-align: center;" type="text" name="" value="<?php echo $value['quantity'];?>">
                                                <span class="input-group-btn">
                                                    <?php
                                                        if (($value['quantity']>0)&&($value['quantity']<10)) {
                                                            ?>
                                                            <a class="add-del btn btn-default bootstrap-touchspin-down" href="c_add.php?action=add_quantity&id_add=<?php echo $value['id'];?>">+</a>
                                                            <?php
                                                        }
                                                        else {
                                                            ?>
                                                            <a disabled class="add-del btn btn-default bootstrap-touchspin-down" href="c_add.php?action=add_quantity&id_add=<?php echo $value['id'];?>">+</a>
                                                            <?php
                                                        }
                                                    ?>                 
                                                </span>
                                            </div>
                                        </p>
                                    </div>                                     
                                    </td>
                                    <td><?php echo number_format((($value['price'])*($value['quantity']))).' VNĐ'?></td>
                                    <td class="text-center"><a href="c_add.php?action=unset&id=<?php echo $value['id']; ?>">Xóa</a></td>
                                </tr>
                                <?php 
                                    $stt++;
                                    $sum+=($value['price'])*($value['quantity']);
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
                    <div class="text-right"><h4>Tổng: 
                        <?php if(isset($sum)!=0){
                            echo number_format($sum).' VNĐ';
                            
                        }else 
                        {
                            echo 0;
                        } 
                    ?>  
                    </h4></div> 
                    <hr>  
                    <div class="container box-shadow">
                        <?php
                            if (isset($data_card)) {
                                foreach ($data_card as $value) {
                                    
                                }
                                    
                            }
                        ?>
                        <div class="col-md-6 file-main">
                                    <h4 class="heading-top">
                                    <i class="la la-send"></i>Thông tin khách hàng</h4>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col fix-text">
                                            <label class="final">Tên Khách Hàng</label>
                                        </div>
                                        <input type="text" class="form-control" name="name" value="<?php echo $value['HoTen']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="col fix-text">
                                            <label class="final">Địa Chỉ</label>
                                        </div>
                                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?php echo $value['DiaChi']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="col fix-text">
                                            <label class="final">Số ĐT</label>
                                        </div>
                                        <input type="text" class="form-control" required pattern="[0-9]{10}" name="phone" value="<?php echo $value['SDT']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="col fix-text">
                                            <label class="final">Email</label>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $value['Email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="col fix-text">
                                            <label class="final">Địa Chỉ Giao Hàng</label>
                                        </div>
                                        <textarea class="form-control" name ="addressgh"></textarea> 
                                    </div>
                                    <?php
                                        if ($_SESSION['cart']!=null) {
                                            ?>
                                                <button class="btn btn-submit detail" type="submit" name="xacnhan">Xác Nhận
                                                </button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button disabled="disabled" class="btn btn-submit detail" type="submit" name="xacnhan">Xác Nhận
                                                </button>
                                            <?php
                                        }
                                    ?>
                        </div>
                        <div class="col-md-6 row-main">
                            <h3>Phương thức vận chuyển</h3>
                            <hr>
                            <img src="../public/images/PhuongThucGiaoHang/phuong-thuc-dat-hang.jpg">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php 
    include "../view/user/footer.php";
?> 
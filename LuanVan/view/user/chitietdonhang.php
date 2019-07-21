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
                        if (isset($chitietdonhang)) {
                            $stt=1;
                            $sum=0;
                           
                            foreach ($chitietdonhang as $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $stt; ?></td>
                                <td>
                                    <?php echo $value['TenSanPham'];?>
                                </td>
                                <td class="text-center"><img src="../public/images/sanpham/<?php echo $value['Hinh']; ?>" width="40" height="40" /></td>
                                <td class="text-center"><?php echo $value['soluong'];?></td>
                                <td class="text-center"><?php echo number_format($value['Gia']*$value['soluong']).' VNĐ'; ?></td>
                                <td class="text-center">
                                    <a href="c_sanpham.php?action=chitiet&id_sanpham=<?php echo $value['id_SanPham'];?>">Chi Tiết</a>
                                    <?php 
                                        if ($donhang['Status'] == "Đã Giao Hàng" && $value['DanhGia'] == 0) {
                                           ?>
                                           <a href="c_user.php?action=danhgia&id_donhang=<?=$id_donhang?>&id_sanpham=<?php echo $value['id_SanPham'];?>">| Đánh giá</a>
                                           <?php
                                        }
                                    ?>
                                    
                                </td>
                            </tr>
                            <?php 
                                $stt++;
                                $sum+=($value['Gia'])*($value['soluong']);
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
                    <div class="col-md-6 text-left"><a class="fix-text" href="c_add.php?action=donhang"><i class="fas fa-arrow-left">  Trở  Về</i></a></div>
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
            </div>
        </div>
    </div>
</body>
<?php 
    include "../view/user/footer.php";
?> 
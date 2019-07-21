<?php include"include-top.php"; ?>
<div id="wrapper">
<?php include"menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            <h1>Chi tiết đơn hàng</h1>
            <hr>
        </div>
        <div class="container-fluid">           
            <div class="giohang box-shadow">
                <h3>Mã Đơn Hàng <?php echo '#'.$_GET['id_donhang']; ?></h3>
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
                                <td class="text-center"><a href="c_sanpham.php?action=chitiet&id_sanpham=<?php echo $value['id_SanPham'];?>">Chi Tiết</a></td>
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
                    <div class="col-md-6 text-left">
                        <!-- <a class="fix-text" href="c_admin.php?action=<?php echo $_SESSION['status_post']; ?>"><i class="fas fa-arrow-left">  Trở  Về</i></a> -->
                    </div>
                    <div class="col-md-6 text-right"><h4>Tổng: 
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
</div>
<?php include"include-bot.php"; ?>


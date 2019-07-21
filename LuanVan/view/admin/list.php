<?php 
include"include-top.php";
?>
<div id="wrapper">
<?php include"menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol> -->
            <h1>Tất cả sản phẩm</h1>
            <hr>
            <div class="them_tim">
                <a class="list_them" href="c_themsanpham.php?action=danhmuc">Thêm sản phẩm</a>
                <div class="tim">
                    <form method="POST" action="c_admin.php?action=timkiem">
                        <input type="text" name="tim"><button name="submit" type="submit">Tìm</button>
                    </form>
                    
                </div>
            </div>
            
        </div>
        <div class="container-fluid">
            <div class="danhsach">
                    <table class="table table-bordered table-hover">
                        <thead class="header-table">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Tên SP</th>
                                <th scope="col">Hình 1</th>
                                <th scope="col">Hình 2</th>
                                <th scope="col">Hình 3</th>
                                <!-- <th scope="col">Mô Tả SP</th> -->
                                <th scope="col">Giá SP</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $stt=1;
                                $edit1 = [1,2];
                                $edit2 = [3,4,5,6,7,8,9,10,11,16,17,18,19,20,21,22,23,24];

                                foreach ($data as $value) {
                                    if (in_array($value['id_ChiTietLoai'], $edit1)) {
                                       $form = 'edit1';
                                    }else if (in_array($value['id_ChiTietLoai'], $edit2)) {
                                       $form = 'edit2';
                                    }else{
                                       $form = 'edit3';
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $value['id_SanPham']; ?></td>
                                    <td><?php echo $value['TenSanPham']; ?></td>
                                    <td><img src="../public/images/sanpham/<?php echo $value['Hinh']; ?>" width="40" height="40" /></td>
                                    <td><img src="../public/images/sanpham/<?php echo $value['Hinh1']; ?>" width="40" height="40" /></td>
                                    <td><img src="../public/images/sanpham/<?php echo $value['Hinh2']; ?>" width="40" height="40" /></td>
                                    
                                
                                    <td class="list_gia"><?php echo number_format($value['Gia']).' VNĐ'; ?></td>
                                    <td class="list_thaotac">
                                        <a href="c_sanpham.php?action=<?=$form?>&id_loai=<?=$value['id_ChiTietLoai']?>&id=<?php echo $value['id_SanPham']; ?>">Sửa</a>
                                        <hr>
                                        <a id="list_xoa" href="c_sanpham.php?action=xoa&id=<?=$value['id_SanPham']?>">Xóa</a>
                                    </td>
                                </tr>
                                <?php 
                                    $stt++;
                                    }
                                ?>
                        </tbody>
                    </table>
                   <div style="text-align: center;"><?=$paginationHTML?></div> 
                </div>
        </div>
    </div>
</div>
<?php include"include-bot.php"; ?>


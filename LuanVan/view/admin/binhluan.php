<?php 
include"include-top.php";
?>
<div id="wrapper">
<?php include"menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
           <!--  <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol> -->
            <h1>Bình luận</h1>
            <hr>
        </div>
        <div class="container-fluid">
            <div class="danhsach">
                    <table class="table table-bordered table-hover">
                        <thead class="header-table">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Nội Dung Bình Luận</th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $stt=1;
                               
                                foreach ($binhluan as $value) {
                                    
                                ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?=$value['NoiDung']?></td>
                                    <td><?=$value['ThoiGian']?></td>
                                    <td class="list_thaotac">
                                        <a href="c_sanpham.php?action=chitiet&id_sanpham=<?php echo $value['id_SanPham']; ?>">Trả Lời</a>
                                    </td>
                                </tr>
                                <?php 
                                    $stt++;
                                    }
                                ?>
                        </tbody>
                    </table>
                   <!-- <div style="text-align: center;"><?=$paginationHTML?></div>  -->
            </div>
        </div>
    </div>
</div>
<?php include"include-bot.php"; ?>


<?php include"include-top.php";
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
            <h1>Danh sách đơn hàng</h1>
            <hr>
        </div>
        <div class="container-fluid">
            <!-- <div class="filter">
                <input type="date" name="" value="">
            </div> -->
            <div class="giohang box-shadow">               
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
                            if ($datas!=null) {
                                $stt=1;            
                                foreach ($datas as $value) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $stt; ?></td>
                                    <td><?php 
                                        echo '#'.$value['id'];
                                    ?></td>
                                    <td class="text-center"><?php echo $value['TenKH'];?></td>
                                    <td class="text-center"><?php echo $value['SoLuong'];?></td>
                                    <td><?php echo number_format($value['TongTien']).' VNĐ';?></td>
                                    <td class="text-center">
                                    <form method="POST" action="c_admin.php?action=status&id=<?php 
                                    echo $value['id'];?>">
                                        <?php 
                                            if ($value['Status']=='Đã Hủy') {
                                                ?>
                                                    <div class="align-self-end fix-width">
                                            <div class="status-order">
                                            <select disabled="disabled" name="status">
                                                <option  name="status" value="<?php echo $value['Status'];?>"><?php echo $value['Status'];?></option>                      
                                                <option name="status" value="Đã Giao Hàng">Đang Vận Chuyển</option>                
                                            </select>
                                        </div>
                                        <div>
                                            <button disabled="disabled" class="save" id="btn" name="save"><i class="far fa-save"></i></button>
                                        </div>
                                                <?php
                                            }
                                            else {
                                            ?>
                                            <div class="align-self-end fix-width">
                                            <div class="status-order">
                                            <select name="status">
                                                <option name="status" value="<?php echo $value['Status'];?>"><?php echo $value['Status'];?></option>
                                                <?php 
                                                    if ($value['Status']=='Chưa Xác Nhận') {
                                                        ?>
                                                        <option name="status" value="Đã Xác Nhận">Đã Xác Nhận</option>
                                                        <option name="status" value="Từ Chối">Từ Chối</option>
                                                        <?php
                                                    }
                                                    else if ($value['Status']=='Đã Xác Nhận') {
                                                        ?>
                                                        <option name="status" value="Đang Đóng Gói">Đang Đóng Gói</option>
                                                        <?php
                                                    }
                                                    else if ($value['Status']=='Đang Đóng Gói') {
                                                        ?>
                                                        <option name="status" value="Đang Vận Chuyển">Đang Vận Chuyển</option>
                                                        <?php
                                                    }
                                                    else if ($value['Status']=='Đang Vận Chuyển') {
                                                        ?>
                                                        <option name="status" value="Đang Giao Hàng">Đang Giao Hàng</option>
                                                        <?php
                                                    }
                                                    else if ($value['Status']=='Đang Giao Hàng') {
                                                        ?>
                                                        <option name="status" value="Đã Giao Hàng">Đã Giao Hàng</option> 
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <button class="save" id="btn" name="save"><i class="far fa-save"></i></button>
                                        </div>
                                                <?php
                                            }
                                        ?>
                                    </form>                       
                                    </td>
                                    <td class="text-center"><?php echo date("d-m-Y",strtotime($value['date_Created']));?></td>
                                    <td class="text-center">   
                                        <?php 
                                            if ($value['Status']=='Đã Hủy') {
                                                ?>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                      Lý Do
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hủy Đơn Hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Bạn có muốn hủy đơn hàng này không ?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button name="del" type="submit" class="btn btn-primary">Hủy Đơn Hàng</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                    <a class="btn btn-primary" href="c_admin.php?action=adminchitietdonhang&id_donhang=<?php echo $value['id']; ?>">Xem</a>
                                                <?php
                                            }
                                        ?>

                                    </td>
                                </tr>
                                <?php 
                                    $stt++;
                                    }
                                ?>
                                <?php
                            }
                            else{
                                echo "<p>Không có đơn hàng nào trong cửa hàng của bạn, hãy tiếp tục cố gắng nhé !</p>"; 
                            }
                        ?>
                    </tbody>
                </table>
                <hr>              
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
</div>
<?php include"include-bot.php"; ?>


<?php include"../include-top.php";?>
<div id="wrapper">
<?php include"../menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
          <h1>Tất cả thành viên</h1>
          <hr>
        </div>
        <div class="container-fluid">
          
          <div class="table-users">
   <div class="header">Thành viên</div>
   
   <table cellspacing="0">
      <tr>
         <th>Ảnh</th>
         <th>Tên</th>
         <th>Email</th>
         <th>SĐT</th>
         <th>Trạng thái</th>
         <th>Cài đặt</th>
      </tr>
      <?php
      if (isset($users)) {
        foreach ($users as $value) {
          ?>
            <tr>
           <td><img src="../../public/images/avatar/<?php if($value['Avatar']!=null) {echo $value['Avatar'];}else{echo 'anh-avatar-dep-den-chat-cap-cho-facebook-tuong-doc-dao-nhat21.jpg';} ?>" alt="" /></td>
           <td><?=$value['HoTen'] ?></td>
           <td><?=$value['Email'] ?></td>
           <td><?=$value['SDT'] ?></td>
           <?php 
            if($value['Ma']==0) {
              ?>
                <td>Đã kích hoạt</td>
              <?php
            }
            else {
              ?>
                <td>Chưa kích hoạt</td>
              <?php
            }
           ?>
           <td>
            <?php 
              if ($value['Active']==1) {
                ?>
                <form method="post" action="c_admin.php?action=Disable&id=<?=$value['id_User']?>">
                  <button class="btn btn-danger">Cấm</button>
                </form>
                <?php
              }
              elseif($value['Active']==3){
                ?>
                <form method="post" action="c_admin.php?action=Enablesh&id=<?=$value['id_User']?>">
                  <button class="btn btn-success">Hủy Cấm</button>
                </form>
                <?php
              }
              elseif ($value['Ma']!=0) {
                ?>
                <form method="post" action="c_admin.php?action=KichHoat&id=<?=$value['id_User']?>">
                  <button class="btn btn-success">Kích hoạt</button>
                </form>
                <?php
              }
            ?>
           </td>
        </tr>
          <?php
        }
      }       
       ?>
   </table>
</div>

        </div>
    </div>
</div>
<?php include"../include-bot.php";?>


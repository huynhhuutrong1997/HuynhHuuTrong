<?php include"../include-top.php";?>
<div id="wrapper">
<?php include"../menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
          <h1>System Apriori</h1>
          <hr>
        </div>
        <div class="container-fluid">
          <form method="post" action="c_admin.php?action=code">
            <button name="zipcode" type="Submit" class="btn btn-success">Update DB Apriori</button>
          </form>
          <table cellspacing="0">
            <tr>
               <th>ID</th>
               <th>Loại Sản Phẩm</th>
               <th>LSP gợi ý </th>
               <th>Độ Tin Cậy</th>
            </tr>
            <?php
              if (isset($dbapriori)) {
                foreach ($dbapriori as $value) {
                  foreach ($dbname as $name) {
                    if ($value['id_Sp']==$name['id_ChiTietLoai']) {
                      ?>
                      <tr>
                       <td><?=$value['id'] ?></td>
                       <td><?=$name['TenChiTietLoai'] ?></td>
                       <td><?=$value['Array_LKH'] ?></td>
                       <td><?=$value['Count'] ?> %</td>
                      </tr>
                    <?php
                    }
                  }        
                }
              }
             ?>
         </table>
        </div>
    </div>
</div>
<?php include"../include-bot.php";?>




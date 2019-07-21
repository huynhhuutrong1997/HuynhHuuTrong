<?php include"../include-top.php";?>
<div id="wrapper">
<?php include"../menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
          <h1>All Shop</h1>
          <hr>
        </div>
        <div class="container-fluid">
          
        	<div class="table-users">
   <div class="header">Users</div>
   
   <table cellspacing="0">
      <tr class="title">
         <th>Avatar</th>
         <th>Name</th>
         <th>Shop</th>
         <th>Email</th>
         <th>Phone</th>
         <th width="230">Setting</th>
      </tr>
      <?php
      if (isset($users)) {
      	foreach ($users as $value) {
      		?>
      	<tr>
           <td><img src="../../public/images/avatar/<?php if($value['Avatar']!=null) {echo $value['Avatar'];}else{echo 'anh-avatar-dep-den-chat-cap-cho-facebook-tuong-doc-dao-nhat21.jpg';} ?>" alt="" /></td>
			     <td><?=$value['HoTen'] ?></td>
           <td><?=$value['TenShop'] ?></td>
			     <td><?=$value['Email'] ?></td>
			     <td><?=$value['SDT'] ?></td>
			     <td>
            <?php 
              if ($value['Active']==1) {
                ?>
                <form method="post" action="c_admin.php?action=Disables&id=<?=$value['id_User']?>">
                  <button class="btn btn-danger">Disable</button>
                </form>
                <?php
              }
              elseif($value['Active']==4){
                ?>
                <form method="post" action="c_admin.php?action=Enableshs&id=<?=$value['id_User']?>">
                  <button class="btn btn-success">Enablesh</button>
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


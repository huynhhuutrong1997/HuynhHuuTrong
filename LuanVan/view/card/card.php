<?php  
// include "../Model/m_admin.php";
// $db=new Databasee;
// $db->connect();
   if(isset($_SESSION['cart'])!=NULL){ 
    $sql="SELECT * FROM sanpham WHERE id_SanPham IN ("; 
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
        $sql=substr($sql, 0, -1).")  limit 2"; 
        if ($_SESSION['cart']!=null) {
         $data=$db->getDataAllCard($sql);
        }
        else
        {
          return null;
        }
        
         foreach ($data as $value) {
         ?> 
         <li class="clearfix">
            <div class="row">
              <div class="col-md-3">
                <img src="../public/images/sanpham/<?php echo $value['Hinh']; ?>" width="60" height="60" />
              </div>
              <div class="col-md-9">
                <span class="item-name"><?php echo $value['TenSanPham'] ?></span>
              </div>
            </div><br>
            <span class="item-price">Giá: <?php echo number_format($value['Gia']).' VNĐ'; ?></span>
            <span class="item-quantity">Số Lượng:<?php echo $_SESSION['cart'][$value['id_SanPham']]['quantity'] ?></span>
          </li><hr />
        <?php 
        } 
    ?> 
    <?php  
    }else{ 
          
        echo "</br><p>Giỏ hàng của bạn trống. Vui lòng thêm một số sản phẩm.</p>";  
    }  
?>





 
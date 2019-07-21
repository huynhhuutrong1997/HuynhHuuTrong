<?php
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id_sanpham']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else
        { 
            foreach ($data as $value) {
                $_SESSION['cart'][$value['id_SanPham']]=array( 
                    "quantity" => 1, 
                    "price" => $value['Gia'],
                    "name" =>$value['TenSanPham'],
                    "image" =>$value['Hinh'],
                    "id"=>$value['id_SanPham'],
                    "id_shop"=>$value['id_User']
                   
                ); 
            }
        }      
    } 
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Thêm Giỏ hàng Thành Công !');
    window.location.href='c_index.php';
    </script>");
?> 






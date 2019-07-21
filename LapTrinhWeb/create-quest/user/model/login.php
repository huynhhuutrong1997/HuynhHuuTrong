<?php
  include"../../connect/connectDB.php"; 
  if(isset($_POST['login'])){
    $account  = $_POST['account'];
    $password = $_POST['password'];
    if($account == "" || $password ==""){
      $message= '<div id="result">Vui lòng nhập đầy đủ thông tin</div>';
    }else{

      $sql = mysqli_query($con,"SELECT count(*) as total FROM tb_user WHERE account ='$account'");
      $row = mysqli_fetch_assoc($sql);

      if($row['total'] == 1 ){
        $sqls = mysqli_query($con,"SELECT * FROM tb_user WHERE account ='$account'");
        $rows = mysqli_fetch_assoc($sqls);
        if($password == $rows['password']){
          $_SESSION['id_user'] = $rows['id_user']; 
          header('Location: ../../index.php');
        }else{ 
          echo"<script>alert('Tài khoản hoặc mật khẩu không chính xác');
              window.location.assign('../view/formlogin.html');</script>";
        }
      }else{
        echo"<script>alert('Tài khoản không tồn tại');
              window.location.assign('../view/formlogin.html');</script>";
      }
    }
  }
?>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Đăng Nhập</title>
<link rel="stylesheet" href="resources/css/style.css">
<link href="resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body id="body">
<div class="pen-title">
  <h1>Đăng Nhập</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="quaylai"><a href="/QLNS3/"><span class="glyphicon glyphicon-remove">
	 </span>
	</a> 
  </div>
  <div class="form">
    <h2>${kiemtra}</h2>
    <form method="post">
      <input type="text" name="tentaikhoan" placeholder="Tên Tài Khoản"/>
      <input type="password" name="matkhau" placeholder="Mật Khẩu"/>
      <input id="submit" type="submit" value="Đăng nhập"/>
    </form>
  </div>
  <div class="cta"><a href="#">Quên mật khẩu?</a></div>
</div>
</div>
  	 <script src="resources/bootstrap/js/jquery.min.js"></script>
  	 <script src="resources/bootstrap/js/bootstrap.min.js"></script>
	 <script src="resources/bootstrap/js/index.js"></script>

</html>
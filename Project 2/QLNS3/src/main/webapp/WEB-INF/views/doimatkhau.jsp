<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sửa Thông Tin Tài Khoản</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
<style>
	#thongbao{
		color: red;
	}
	#thongbao1{
		color: green;
	}
</style>
</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
      <div class="container">
      	<h3 class="text-center">Đổi mật khẩu</h3>
      	<h4 class="text-center" id="thongbao">${thongbao }</h4>
      	<h4 class="text-center" id="thongbao1">${thongbao1 }</h4>
      	<div class="row">
      		<div class="col-md-4 col-md-offset-4">
      			<form method="post" class="form-horizontal">
		        	<div class="form-group">
		        		<label class="col-md-4 control-label">Tên Tài Khoản</label>
		        		<div class="col-md-8">
		        			<h4>${user }</h4>
		        		</div>
		        		
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Mật Khẩu hiện tại</label>
			        	<div class="col-md-8">
			        		<input name="matkhauhientai" class="form-control" type="password" placeholder="Nhập mật khẩu hiện tại">
			        	</div>
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Nhập mật khẩu mới</label>
			        	<div class="col-md-8">
			        		<input name="matkhau" class="form-control" type="password" placeholder="Nhập mật khẩu mới" >
			        	</div>
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Nhập lại mật khẩu</label>
			        	<div class="col-md-8">
			        		<input name="nhaplaimatkhau" class="form-control" type="password" placeholder="Nhập mật lại mật khẩu" >
			        	</div>
		        	</div>
		        		<div class="row">
			        		<div class="col-md-offset-4 col-md-2">
			        			<button class="btn btn-primary" type="submit">Đổi</button>
			        		</div>
			        		
		        		</div>
		        	
		        </form>
      		</div>
      	</div>
        
      </div>
      </div>
      <!--#content-->


    <div id="footer">
      
    </div><!--#footer-->
    
    <script src="/QLNS3/resources/bootstrap/js/jquery.min.js"></script>
    
    <script src="/QLNS3/resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
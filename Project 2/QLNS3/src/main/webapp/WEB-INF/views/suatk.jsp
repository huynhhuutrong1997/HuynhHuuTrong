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
</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
      <div class="container">
      	<h3 class="text-center">Sửa Thông Tin Tài Khoản</h3>
      	<div class="row">
      		<div class="col-md-4 col-md-offset-4">
      			<form action="suatk?tentaikhoan=${taikhoan.getTentaikhoan() }" method="post" class="form-horizontal">
		        	<div class="form-group">
		        		<label class="col-md-4 control-label">Tên Tài Khoản</label>
		        		<div class="col-md-8">
		        			<h4>${taikhoan.getTentaikhoan() }</h4>
		        		</div>
		        		
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Mật Khẩu</label>
			        	<div class="col-md-8">
			        		<input name="matkhau" class="form-control" type="text" value="${taikhoan.getMatkhau()}">
			        	</div>
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Quyền</label>
			        	<div class="col-md-8">
			        		<input name="quyen" class="form-control" type="text" value="${taikhoan.getQuyen()}">
			        	</div>
		        	</div>
		        	
		        		<div class="row">
			        		<div class="col-md-offset-4 col-md-2">
			        			<button class="btn btn-primary" type="submit">Lưu</button>
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
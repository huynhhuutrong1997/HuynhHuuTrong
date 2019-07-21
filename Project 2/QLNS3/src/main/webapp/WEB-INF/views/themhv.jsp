<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quản Lý Trình Độ Học Vấn</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
<style >
 #thongbao{
 	color: red;
 }	 	
</style>

</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
     	<div class="container">
      	<h3 class="text-center">Thêm Trình Độ Học Vấn</h3>
      	<h4 class="text-center" id="thongbao">${thongbao }</h4>
      	<div class="row">
      		<div class="col-md-4 col-md-offset-4">
      			<form  method="post" class="form-horizontal">
					<div class="form-group">
					  	<label class="col-md-4 control-label" >Mã Học Vấn</label>
					  	<div class="col-md-8">
		        			<input name="mahv" class="form-control" type="text" placeholder="Nhập mã học vấn">
		        		</div>
					  	
					</div>			
		        	<div class="form-group">
		        		<label class="col-md-4 control-label">Tên Học Vấn</label>
		        		<div class="col-md-8">
		        			<input name="tenhv" class="form-control" type="text" placeholder="Nhập tên học vấn">
		        		</div>
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Chuyên Ngành</label>
			        	<div class="col-md-8">
			        		<input name="chuyennganh" class="form-control" type="text" placeholder="Nhập chuyên ngành">
			        	</div>
			        	
		        	</div>
		        	<div class="form-group">
		        		<div class="col-md-offset-4 col-md-8">
		        			<button class="btn btn-primary" type="submit">Thêm</button>
		        		</div>
		        	</div>
		        </form>
      		</div>
      	</div>
        
      </div>
      
    </div><!--#content-->


    <div id="footer">
      
    </div><!--#footer-->
    
    <script src="/QLNS3/resources/bootstrap/js/jquery.min.js"></script>
    
    <script src="/QLNS3/resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
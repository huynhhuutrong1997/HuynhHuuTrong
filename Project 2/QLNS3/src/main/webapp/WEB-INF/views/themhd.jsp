<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quản Lý Hợp Đồng</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
<style>
#thongbao{
color: red;
}
</style>
</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
     	<div class="container">
      	<h3 class="text-center">Thêm Hợp Đồng</h3>
      	<h4 class="text-center" id="thongbao">${thongbao }</h4>
      	<div class="row">
      		<div class="col-md-4 col-md-offset-4">
      			<form  method="post" class="form-horizontal">
      				<div class="form-group">
		        		<label class="col-md-4 control-label">Mã Hợp Đồng</label>
		        		<div class="col-md-8">
		        			<input name="mahd" class="form-control" type="text" placeholder="Nhập mã hợp đồng">
		        		</div>
		        	</div>
					<div class="form-group">
					  	<label class="col-md-4 control-label" >Nhân Viên</label>
					  <div class="col-md-8">
						  <select class="form-control" name="nhanvien" id="sel1">
						  		<c:forEach var="nhanvien" items="${listNhanVien }">
						        <option value="${nhanvien.getManv()}">${nhanvien.getHonv()} ${nhanvien.getTennv()} (${nhanvien.getManv()}) </option>
						        </c:forEach>
						   </select>
					  </div>
					  	
					</div>			
		        	<div class="form-group">
		        		<label class="col-md-4 control-label">Loại Hợp Đồng</label>
		        		<div class="col-md-8">
		        			<input name="loaihd" class="form-control" type="text" placeholder="Nhập loại hợp đồng">
		        		</div>
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Thời Gian(Tháng)</label>
			        	<div class="col-md-8">
			        		<input name="thoigian" class="form-control" type="number" value="1"">
			        	</div>
			        	
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Từ Ngày</label>
			        	<div class="col-md-8">
			        		<input name="tungay" class="form-control" type="date" value="${ngayhientai }">
			        	</div>
			        	
		        	</div>
		        	<div class="form-group">
			        	<label class="col-md-4 control-label">Đến Ngày</label>
			        	<div class="col-md-8">
			        		<input name="denngay" class="form-control" type="date"  value="${ngayhientai }">
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
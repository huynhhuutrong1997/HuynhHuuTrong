<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quản Lý Tài Khoản</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href="/QLNS3/themtk"><button class="btn btn-success">Thêm tài khoản</button></a>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Danh sách tài khoản</h3>
              </div>
              <div class="panel-body">
                <input class="form-control" id="dev-table-filter"
                  data-action="filter" data-filters="#dev-table"
                  placeholder="Từ khóa" type="text">
              </div>


					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>Mã Nhân Viên</th>
								<th>Tên Tài Khoản</th>
								<th>Mật Khẩu</th>
								<th>Quyền</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="taikhoan" items="${listTaiKhoan }">
							<tr>
								<td>${taikhoan.getNhanvien().getManv()}</td>
								<td>${taikhoan.getTentaikhoan()}</td>
								<td>${taikhoan.getMatkhau()}</td>
								<td>${taikhoan.getQuyen() }</td>
								<td><form action="taikhoan?tentaikhoan=${taikhoan.getTentaikhoan() }" method="post"><button class="btn btn-warning">Xóa</button></form></td>
								<td><a href="taikhoan/${taikhoan.getTentaikhoan() }"><button class="btn btn-primary">Sửa</button></a></td>
							</tr>
							</c:forEach>
				
						</tbody>
					</table>
            </div>
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
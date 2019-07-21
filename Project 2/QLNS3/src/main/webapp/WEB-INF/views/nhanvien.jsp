<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quản Lý Nhân Viên</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <a href="themnv"><button class="btn btn-success">Thêm nhân viên</button></a>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Danh sách nhân viên</h3>

              </div>
              <div class="panel-body">
                <input class="form-control" id="dev-table-filter"
                  data-action="filter" data-filters="#dev-table"
                  placeholder="Từ khóa" type="text">
              </div>


					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>Mã nhân viên</th>
								<th>Họ </th>
								<th>Tên</th>
								<th>Giới tính</th>
								<th>Ngày sinh</th>
								<th>SĐT</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="nhanvien" items="${listNhanVien }">
							<tr>
								<td>${nhanvien.getManv()}</td>
								<td>${nhanvien.getHonv()}</td>
								<td>${nhanvien.getTennv()}</td>
								<td>${nhanvien.getGioitinh()}</td>
								<td>${nhanvien.getNgaysinh()}</td>
								<td>${nhanvien.getSdt()}</td>
								<td><a href="nhanvien/${nhanvien.getManv()}"><button class="btn btn-primary">Xem</button></a></td>
								<td><form action="nhanvien?manv=${nhanvien.getManv() }" method="post"><button class="btn btn-warning">Xóa</button></form></td>
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
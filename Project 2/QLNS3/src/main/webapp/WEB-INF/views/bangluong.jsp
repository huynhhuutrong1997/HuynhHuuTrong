<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<%@ page import="Entities.NgayNghi" %>
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
	<jsp:include page="header.jsp"></jsp:include>
    </div><!--#Header-->


    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <a href="/QLNS3/revenuereport.htm?output=excel"><button class="btn btn-success">Xuất file excel</button></a>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Bảng Lương</h3>
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
								<th>Họ Nhân Viên</th>
								<th>Tên Nhân Viên</th>
								<th>Chức Vụ</th>
								
								<th>Lương Cơ Bản</th>
								<th>Phụ Cấp</th>
								<th>Số Ngày Nghỉ</th>
								<th>Tổng Lương($)</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="nv" items="${listNhanVien}">
								<tr>
									<td>${nv.getManv()}</td>
									<td>${nv.getHonv()}</td>
									<td>${nv.getTennv()}</td>
									<td>${nv.getChucvu().getTencv()}</td>
									<td>${nv.getBacluong()*nv.getBangluong().getLuongcoban()}</td>
									<td>${nv.getBacphucap()*nv.getBangluong().getTienphucap() }</td>
									<!-- lay so ngay nghi thong qua ham getSoNgayNghi
									ngaynghi la du lieu duoc gui tu controller
									adate la du lieu duoc gui tu controller -->
									<td>${ngaynghi.getSoNgayNghi(nv.getNgaynghi(),adate)}</td>
									<td>${nv.getBacluong()*nv.getBangluong().getLuongcoban()*26 - 
									ngaynghi.getSoNgayNghi(nv.getNgaynghi(),adate)*nv.getBangluong().getLuongcoban()
									*nv.getBacluong() + nv.getBacphucap()*nv.getBangluong().getTienphucap()}</td><!-- tinh luong -->
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
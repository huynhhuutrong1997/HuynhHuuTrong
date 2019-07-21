<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
</head>
<body>
		<div id="header">
      <div class="container">
        <div id="header1">
          <h3>Quản Lý Nhân Sự</h3>
        </div>
      </div>
      <div class="container">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
          	<a class="navbar-brand" href="/QLNS3/">Trang Chủ</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="main-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown"><a data-toggle="dropdown" href="#">Tác Vụ-Cập Nhật <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/QLNS3/nhanvien">Nhân Viên</a></li>
                  <li class="divider"></li>
                  <li><a href="/QLNS3/phongban">Phòng Ban</a></li>
                  <li class="divider"></li>
                  <li><a href="/QLNS3/chucvu">Chức Vụ</a></li>
                  <li class="divider"></li>
                  <li><a href="/QLNS3/hopdongld">Hợp Đồng</a></li>
                  <li class="divider"></li>
                  <li><a href="/QLNS3/trinhdohv">Trình Độ Học Vấn</a></li>
                </ul>
              </li>
              <li class="dropdown"><a data-toggle="dropdown" href="#">Bảng Lương <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                  <li class=""><a href="/QLNS3/ngaynghi">Quản Lý Ngày Nghỉ</a></li>
                  <li class="divider"></li>
                  <li><a href="/QLNS3/bangluong">Bảng Lương</a></li>
                  
                </ul>
              </li>
              <c:choose>
              		<c:when test="${quyen == 'admin'}">
	              		<li class="dropdown"><a data-toggle="dropdown" href="#">Hệ Thống <span class="caret"></span></a>
			                 <ul class="dropdown-menu">
			                  <li class=""><a href="/QLNS3/taikhoan">Quản Lý Tài Khoản</a></li>
			                </ul>
			             </li>
              		
              		</c:when>
              </c:choose>
              
              <li class="dropdown"><a data-toggle="dropdown" href="#">Báo Cáo-Thống Kê <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                  <li><a href="/QLNS3/hopdongld">Tình Hình Nhân Sự</a></li>
                  <li class="divider"></li>
                  <li><a href="/QLNS3/bangluong">Báo Cáo Lương</a></li>
                </ul>
              </li>
            </ul >
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="/QLNS3/doimatkhau">${user}</a></li>
            </ul>
          </div>
        </nav>
      </div>
</body>
</html>
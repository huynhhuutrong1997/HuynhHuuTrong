<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Quản lý nhân sự</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="resources/css/styles.css">
	<script src='<c:url value="resources/JS/jquery-3.3.1.min.js"/>'></script>
	<script src='<c:url value="resources/JS/custom.js"/>'></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<div class="row">
				<!-- logo -->
				<div class="left">
					<div class="logo">
						<figure>
							<a href="/QLNS3/">
								<img src="resources/images/logo.jpg" style="width: 210px">
							</a>
						</figure>
					</div>
				</div>
				<!-- end logo -->
				<div class="right">
					<!-- top-bar -->
					<div class="top-bar">
						<ul class="wrap">
							<c:choose>
								<c:when test="${chucaidau !=null }">
							<li class="item">
								<span class="text">
									<a href="/QLNS3/doimatkhau">${chucaidau} </a>
								</span>
							</li>
							<li class="item">
								<span class="text">
									<a href="thoat">Thoát</a>
								</span>
							</li>		
								</c:when>
								<c:otherwise>
							<li class="item">
								<span class="text">	
									<a href="dangnhap">Đăng nhập</a>
								</span>
							</li>
<!-- 							<li class="item"> -->
<!-- 								<span class="text">	 -->
<!-- 									<a href="dangky">Đăng ký</a> -->
<!-- 								</span> -->
<!-- 							</li>		 -->
								</c:otherwise>
								</c:choose>
						</ul>
					</div>
					<!-- main-bar -->
					<div class="main-bar">
						<div class="menu">
							<ul class="wrap-menu">
								<li class="item active">
									<a href="#">Trang Chủ</a>
								</li>
								
								<li class="item">
									<a href="#">Giới Thiệu</a>
								</li>
								<li class="item">
								<c:choose>
									<c:when test="${chucaidau !=null }">
										<a href="nhanvien">Quản Lý</a>
									</c:when>
								</c:choose>
									
								</li>
							</ul>
						</div>
						<div class="search">
							
						</div>
					</div>
					<!-- end main-bar -->

				</div>
				<!-- end top-bar -->
			

				</div>
			</div>
		</div>
	</header>
	<!-- end header -->
	<!-- slider -->
	<section id="slider">
		<div class="wrap-slider">
			<div class="wrap-img">
				<figure class="item">
					<img src="resources/images/slider3.jpg">
				</figure>
				<figure class="item">
					<img src="resources/images/slider2.jpg">
				</figure>
				<figure class="item">
					<img src="resources/images/slider1.png">
				</figure>
			</div>
		</div>
	</section>
	<!-- end slider -->
	

	<!-- footer -->
	<footer>
		<div class="container">
			<div class="row">
				<!-- info -->
				<div class="info">
					<div class="title">
						<h2>Địa chỉ liên hệ</h2>
					</div>
					<!-- address -->
					<div class="address item">
						<span class="icon">
							<img src="resources/images/icon-map.png" width="8">
						</span>
						<span class="text">
							Ninh Kiều, Cần Thơ
						</span>
					</div>

					<!-- phone -->
					<div class="phone item">
						<span class="icon">
							<img src="resources/images/icon-phone-footer.png" width="12">
						</span>
						<span class="text">
							01643606417
						</span>
					</div>

					<!-- for-us -->
					<div class="email item">
						<span class="icon">
							<img src="resources/images/icon-email.png" width="12">
						</span>
						<span class="text">
							huynhhuutrong.sd@gmail.com
						</span>
					</div>
					<div class="item">
						<span class="icon">
							<img src="resources/images/icon-circle-i.png" width="12">
						</span>
						<span class="text">
							07:00 - 22:00
						</span>
					</div>
				</div>
				<!-- end info -->

				<!-- for-us -->
				<div class="for-us">
					<div class="title">
						<h2>Thông tin</h2>
					</div>

					<div class="item">
						<div class="text">
							<a href="#">Trang chủ</a>
						</div>
					</div>

					<div class="item">
						<div class="text">
							<a href="#">Giới thiệu</a>
						</div>
					</div>
					
					
				</div>
				<!-- end for-us -->
				
				<!-- tags -->
				
				<!-- end tags -->
			</div>
		</div>
	</footer>
	<!-- end footer -->
</body>
</html>
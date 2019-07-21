<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Thêm Nhân Viên</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
<script src='<c:url value="resources/JS/jquery-3.3.1.min.js"/>'></script>
<script src='<c:url value="resources/JS/custom.js"/>'></script>
<style >
	 	.col-md-2{
	 		margin-top: 10px;
	 	}
	 	.col-md-10{
	 		margin-top: 10px;
	 	}
	 	.btn{
	 		margin-top: 25px;
	 		width: 100px;
	 	}
	 	#thongbao{
	 		color: red;
	 	}
</style>
</head>
<body>
	<c:import url="header.jsp"/>
    <div id="content">
     <div class="container jumbotron">
     <form action="themnv/them" method="post">
		<div class="row">
			<!--body-left-->
			<div class="col-md-4 ">

				<form method="post">
				<label for="hinhanh">chọn ảnh (PNG, JPG)</label>	
				<input type="file" id="hinhanh" name="hinhanh" />
				</form>

			</div>
			<!--end body-left-->
			<!--body-right-->
				<div class="col-md-8 container">
				<div class="form-group">
					<label>Mã Nhân Viên:</label>
					<p id="thongbao">${thongbao }</p>
					<input class="form-control" type="text" name="manv" >
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Họ:</label>
						<input class="form-control" type="text" name="honv">
					</div>
					<div class="col-md-6">
						<label>Tên:</label>
						<input class="form-control" type="text" name="tennv" >
					</div>
				</div>
				<div class="row">
					<div class=" col-md-6 form-group">
						<!-- <label>Giới Tính:</label>
						<form>
						    <label class="radio-inline">
						      <input type="radio" name="#">Nam
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="#">Nữ
						    </label>
					  	</form> -->
					  	<label>Giới Tính:</label>
					  	<select class="form-control" name="gioitinh" id="sel1">
					        <option>Nam</option>
					        <option>Nữ</option>
					     </select>
					</div>			
					<div class=" col-md-6 form-group">
						<label>Dân Tộc:</label>
						<input class="form-control" type="text" name="dantoc" />
					</div>							
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Ngày Sinh:</label>
						<input class="form-control" type="date" name="ngaysinh" value="${ngayhientai }">
					</div>
					<div class="col-md-6">
						<label>Số Chứng Minh ND:</label>
						<input class="form-control" type="number" name="cmnd" >
					</div>
				</div>
				<div class="form-group">
					<label>Quê Quán:</label>
					<input class="form-control" type="text" name="quequan" >
				</div>
				<div class="form-group">
					<label>Địa Chỉ Thường Trú:</label>
					<input class="form-control" type="text" name="diachi" >
				</div>
				<div class="form-group">
					<label>Số Điện Thoại:</label>
					<input class="form-control" type="text" name="sdt"  />
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="text" name="email"/>
				</div>
				<div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Phòng Ban:</label>
						<select class="form-control" name="phongban" id="sel1">
						        <c:forEach var="phongban" items="${listPhongBan }">
							        <option value="${phongban.getMapb() }">${phongban.getTenpb()}</option>
							    </c:forEach>
						</select>
					</div>
					<div class="col-md-6">
						<label>Chức Vụ:</label>
						<select class="form-control" name="chucvu" id="sel1">
						        <c:forEach var="chucvu" items="${listChucVu }">
							        <option value="${chucvu.getMacv()}">${chucvu.getTencv()}</option>
							    </c:forEach>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Bậc Lương:</label>
						<input class="form-control" type="number" name="bacluong" value="0" />
					</div>
					<div class="col-md-6">
						<label>Bậc Phụ Cấp:</label>
						<input class="form-control" type="number" name="bacphucap" value="0" />
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-md-6">
						<label>Trình Độ Học Vấn:</label>
						<select class="form-control" name="trinhdohv" id="sel1">
					        <c:forEach var="trinhdohv" items="${listTrinhDohv }">
						        <option value="${trinhdohv.getMatdhv()}">${trinhdohv.getTentdhv()} - ${trinhdohv.getChuyennganh() }</option>
						    </c:forEach>
						</select>
					</div>
					<div class="col-md-6">
						<label>Lương cơ bản:</label>
						<select class="form-control" name="maluong" id="sel1">
						        <c:forEach var="bangluong" items="${listBangLuong }">
							        <option value="${bangluong.getMaluong()}">${bangluong.getLuongcoban()}</option>
							    </c:forEach>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Điểm mạnh</label>
						<input class="form-control" type="text" name="diemmanh"  />
					</div>
					<div class="col-md-6">
						<label>Điểm yếu:</label>
						<input class="form-control" type="text" name="diemyeu"  />
					</div>
				</div>
				<div class="form-group">
					<label>Ngày Vào Công Ty:</label>
					<input class="form-control" type="date" name="ngayvaoct" value="${ngayhientai }"/>
				</div>
			</div>
			<div class="row">
					<div class="col-md-2">
							<button  class="btn btn-success" type="submit">Thêm</button>
					</div>
			
			</div>
		</div>
	</div>
    </form>  
    </div>
    </div><!--#content-->


    <div id="footer">
      
    </div><!--#footer-->
    
    <script src="/QLNS3/resources/bootstrap/js/jquery.min.js"></script>
    
    <script src="/QLNS3/resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
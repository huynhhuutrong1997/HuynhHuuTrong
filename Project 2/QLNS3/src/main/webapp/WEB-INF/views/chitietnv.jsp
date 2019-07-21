<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix="c" %> 
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chi Tiết Nhân Viên</title>
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
	 </style>
</head>
<body>
	<c:import url="header.jsp"/>


    <div id="content">
     <div class="container jumbotron">
     
		<div class="row">
		
		<c:choose>
			<c:when test="${suanv == 1 }">
			<!--body-left-->
			<form action="chitietnv/sua" method="post">
			<div class="col-md-4 ">
			
				<img class="img-responsive" src="/QLNS3/resources/images/nhanvien/${nhanvien.getAnh()}" width="150px" height="200px">
				<label for="hinhanh">chọn ảnh (PNG, JPG)</label>
				<input type="file" id="hinhanh" name="hinhanh" value="${nhanvien.getAnh()}"/>
				
			</div>
			<!--end body-left-->
			<!--body-right-->
				<div class="col-md-8 container">
				<div class="form-group">
					<label>Mã Nhân Viên:</label>
					<input class="form-control" type="text" name="manv" value="${nhanvien.getManv()}" readonly="false">
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Họ:</label>
						<input class="form-control" type="text" name="honv" value="${nhanvien.getHonv()}">
					</div>
					<div class="col-md-6">
						<label>Tên:</label>
						<input class="form-control" type="text" name="tennv" value="${nhanvien.getTennv()}" >
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
					  		<option>${nhanvien.getGioitinh()}</option>
					        <option>Nam</option>
					        <option>Nữ</option>
					     </select>
					</div>			
					<div class=" col-md-6 form-group">
						<label>Dân Tộc:</label>
						<input class="form-control" type="text" name="dantoc" value="${nhanvien.getDantoc()}"/>
					</div>							
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Ngày Sinh:</label>
						<input class="form-control" type="date" name="ngaysinh" value="${nhanvien.getNgaysinh()}" >
					</div>
					<div class="col-md-6">
						<label>Số Chứng Minh ND:</label>
						<input class="form-control" type="number" name="cmnd" value="${nhanvien.getCmnd()}">
					</div>
				</div>
				<div class="form-group">
					<label>Quê Quán:</label>
					<input class="form-control" type="text" name="quequan" value="${nhanvien.getQuequan()}">
				</div>
				<div class="form-group">
					<label>Địa Chỉ Thường Trú:</label>
					<input class="form-control" type="text" name="diachi" value="${nhanvien.getDiachithuongtru()}">
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Số Điện Thoại:</label>
						<input class="form-control" type="text" name="sdt" value="${nhanvien.getSdt()}" />
					</div>
					<div class="col-md-6">
						<label>Email:</label>
						<input class="form-control" type="text" name="email" value="${nhanvien.getEmail()}"/>
					</div>
				</div>
				
				<div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Phòng Ban:</label>
						<select class="form-control" name="phongban" id="sel1">
							<option value="${nhanvien.getPhongban().getMapb() }">${nhanvien.getPhongban().getTenpb()}</option>
						        <c:forEach var="phongban" items="${listPhongBan }">
							        <option value="${phongban.getMapb() }">${phongban.getTenpb()}</option>
							    </c:forEach>
						</select>
					</div>
					<div class="col-md-6">
						<label>Chức Vụ:</label>
						<select class="form-control" name="chucvu" id="sel1">
							<option value="${nhanvien.getChucvu().getMacv() }">${nhanvien.getChucvu().getTencv() }</option>
						        <c:forEach var="chucvu" items="${listChucVu }">
							        <option value="${chucvu.getMacv()}">${chucvu.getTencv()}</option>
							    </c:forEach>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Bậc Lương:</label>
						<input class="form-control" type="text" name="bacluong" value="${nhanvien.getBacluong()}" />
					</div>
					<div class="col-md-6">
						<label>Bậc Phụ Cấp:</label>
						<input class="form-control" type="text" name="bacphucap" value="${nhanvien.getBacphucap()}"/>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-md-6">
						<label>Trình Độ Học Vấn:</label>
						<select class="form-control" name="trinhdohv" id="sel1">
							<option value="${nhanvien.getTrinhdohocvan().getMatdhv() }">${nhanvien.getTrinhdohocvan().getTentdhv() } - ${nhanvien.getTrinhdohocvan().getChuyennganh() }</option>
						        <c:forEach var="trinhdohv" items="${listTrinhDohv }">
						        	
							        <option value="${trinhdohv.getMatdhv()}">${trinhdohv.getTentdhv()} - ${trinhdohv.getChuyennganh() }</option>
							    </c:forEach>
						</select>
					</div>
					<div class="col-md-6">
						<label>Lương cơ bản:</label>
						<select class="form-control" name="maluong" id="sel1">
							<option value="${nhanvien.getBangluong().getMaluong() }">${nhanvien.getBangluong().getLuongcoban() }</option>
						        <c:forEach var="bangluong" items="${listBangLuong }">
							        <option value="${bangluong.getMaluong()}">${bangluong.getLuongcoban()}</option>
							    </c:forEach>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Điểm mạnh</label>
						<input class="form-control" type="text" name="diemmanh" value="${nhanvien.getDiemmanh() }"  />
					</div>
					<div class="col-md-6">
						<label>Điểm yếu:</label>
						<input class="form-control" type="text" name="diemyeu"  value="${nhanvien.getDiemyeu()}" />
					</div>
				</div>
				<div class="form-group">
					<label>Ngày Vào Công Ty:</label>
					<input class="form-control" type="date" name="ngayvaoct" value="${nhanvien.getNgayvaocongty()}"/>
				</div>
			</div>
			<div class="row">
					<div class="col-md-2">
						
							<button class="btn btn-success">Lưu</button>
						
					</div>
			</form>		
		
					<div class="col-md-2">
						<form >
							<a href="chitietnv/${huy=2}"><button class="btn btn-warning">Hủy</button></a>
						</form>
					</div>
				</div>
				
				</div>
					
			</c:when>
			<c:otherwise>
			<!--body-left-->
			<div class="col-md-4 ">
					<img class="img-responsive" src="/QLNS3/resources/images/nhanvien/${nhanvien.getAnh()}" width="150px" height="200px">
		
			</div>
			<!--end body-left-->
			<!--body-right-->
				<div class="col-md-8 container">
					<div class="row">
						<div class="col-md-3 " >
							<label>Mã Nhân Viên:</label>
						</div>
						<div class="col-md-9">
							<span>${nhanvien.getManv()}</span>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-3">
							<label>Họ Tên:</label>
						</div>
						<div class="col-md-9">
							<span>${nhanvien.getHonv()} ${nhanvien.getTennv()}</span>
						</div>
					</div>
									
					<div class="row">
						<div class="col-md-3">
							<label>Giơi Tính:</label>
						</div>
						<div class="col-md-9">
							<span>${nhanvien.getGioitinh()}</span>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-3">
							<label>Dân Tộc:</label>
						</div>
						<div class="col-md-9">
							<span>${nhanvien.getDantoc()}</span>
						</div>
					</div>			
						<div class="row">
							<div class="col-md-3">
								<label>Ngày Sinh:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getNgaysinh()}</span>
							</div>
						</div>						
						<div class="row">
							<div class="col-md-3">
								<label>Quê Quán:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getQuequan()}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Địa Chỉ Thường Trú:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getDiachithuongtru()}</span>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-3">
								<label>	Số CMND:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getCmnd() }</span>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-3">
								<label>Email:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getEmail()}</span>
							</div>
						</div>	<div class="row">
							<div class="col-md-3">
								<label>Số Điện Thoại:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getSdt()}</span>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-3">
								<label>Phòng Ban:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getPhongban().getTenpb() }</span>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-3">
								<label>Chức Vụ:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getChucvu().getTencv() }</span>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-3">
								<label>	Học Vấn:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getTrinhdohocvan().getTentdhv() } - ${nhanvien.getTrinhdohocvan().getChuyennganh() } </span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Lương Cơ Bản:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getBangluong().getLuongcoban() }</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Bậc Lương:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getBacluong()}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Bậc phụ cấp:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getBacphucap()}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>	Điểm Mạnh:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getDiemmanh() }</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>	Điểm Yếu:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getDiemyeu() }</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>	Ngày Vào CTy:</label>
							</div>
							<div class="col-md-9">
								<span>${nhanvien.getNgayvaocongty() }</span>
							</div>
						</div>
						<div>
					<div class="row">
						<div class="col-md-2">
							<form action="/QLNS3/chitietnv" method="post">
								<button class="btn btn-primary">Sửa</button>
							</form>
						</div>
						<div class="col-md-2">
							<form action="/QLNS3/nhanvien">
								<button class="btn btn-success">Quay Lại</button>
							</form>
						</div>
					</div>		
					</div>
						<!--end body-right-->
			
				</div>
			</c:otherwise>
		</c:choose>	
			
	</div>
      
    </div>
    </div><!--#content-->


    <div id="footer">
      
    </div><!--#footer-->
    
    <script src="/QLNS3/resources/bootstrap/js/jquery.min.js"></script>
    
    <script src="/QLNS3/resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
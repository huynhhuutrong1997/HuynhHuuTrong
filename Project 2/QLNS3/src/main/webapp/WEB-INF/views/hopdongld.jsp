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
<style >
	.luu{
			float: right;
	}
</style>
</head>
<body>
	<c:import url="header.jsp"/>


    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <div class="row" >
          		<div class="col-md-6 col-xs-6">
          			  <a href="/QLNS3/themhd"><button class="btn btn-success">Thêm</button></a>
          		</div>
          		
          		<div class="col-md-6 col-xs-6" >
          			
          			<a class="luu" href="/QLNS3/hopdonghh"><button class="btn btn-success">Hợp đồng gần hết hạn và hết hạn</button></a>
          			
          		</div>
          	</div>
          
          
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Danh sách hợp đồng</h3>

              </div>
              <div class="panel-body">
                <input class="form-control" id="dev-table-filter"
                  data-action="filter" data-filters="#dev-table"
                  placeholder="Từ khóa" type="text">
              </div>


					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>Mã Hợp Đồng</th>
								<th>Nhân Viên</th>
								<th>Loại HĐ</th>
								<th>Thời Gian(Tháng)</th>
							</tr>
						</thead>
						<tbody>
							<c:forEach var="hopdong" items="${listHopDong }">
							<tr>
								<td>${hopdong.getMahopdong()}</td>
								<td>${hopdong.getNhanvien().getHonv()} ${hopdong.getNhanvien().getTennv()}</td>
								<td>${hopdong.getLoaihopdong()}</td>
								<td>${hopdong.getThoigian()}</td>
								<td>${hopdong.getTungay()} đến ${hopdong.getDenngay() }</td>
								<td><form action="hopdongld?mahd=${hopdong.getMahopdong() }" method="post"><button class="btn btn-warning">Xóa</button></form></td>
								<td><a href="hopdongld/${hopdong.getMahopdong() }"><button class="btn btn-primary">Sửa</button></a></td>
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
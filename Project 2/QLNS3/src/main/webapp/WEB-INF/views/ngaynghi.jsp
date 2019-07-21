<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ngày Nghỉ</title>
<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css"
	rel="stylesheet">
<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
</head>
<body>
	<jsp:include page="header.jsp"></jsp:include>
	</div>
	<!--#Header-->

	<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<form action="xemngaynghi" method="post">
							<input type="date" name="ngaynghi" value="${ngaynghi}">
							<button class="btn btn-success">Xem Ngày Nghỉ</button>
							<p>${mess}</p>
						</form>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"></h3>
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
											<th>Họ Nhân Viên
											<th>Tên Nhân Viên</th>
											<th>Vắng</th>
										</tr>
									</thead>
									<tbody>
										<form action="themngaynghi" method="get">
											<c:forEach var="nv" items="${listNhanVien}">
												<tr>
													<td>${nv.getManv()}</td>
													<td>${nv.getHonv()}</td>
													<td>${nv.getTennv()}</td>
													<td>
														<input type="checkbox" name="listnvnghi" value="${nv.getManv()}"/>
													</td>
												</tr>
											</c:forEach>
											<input type="submit" class="btn btn-success" value="Lưu">
										</form>
								</tbody>	
							</table>	
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!--#content-->


	<div id="footer"></div>
	<!--#footer-->

	<script src="/QLNS3/resources/bootstrap/js/jquery.min.js"></script>
	<script src="/QLNS3/resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
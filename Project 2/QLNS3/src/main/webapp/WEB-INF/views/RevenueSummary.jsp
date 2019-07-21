<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/QLNS3/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/QLNS3/resources/css/stylesTK.css" rel="stylesheet">
</head>
<body>
<h2>Spring MVC</h2>

<h3>Revenue Report</h3>

<table border="1px" cellpadding="8px">
<tr>
<td>Month</td><td>Revenue</td>
</tr>
<c:forEach items="${revenueData}" var="current">
<tr>
   <td><c:out value="${current.key}" /></td>
   <td><c:out value="${current.getValue().getTennv()}" /></td>
   <td>${current.getValue().getQuequan()} </td>
</tr>
</c:forEach>
</table>

</body>
</html>
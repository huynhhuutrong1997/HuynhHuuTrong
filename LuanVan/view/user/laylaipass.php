
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../public/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../public/js/jquery1.min.js"></script>
<!-- start menu -->

<!--start slider -->
    
<!--end slider -->
<script src="../public/js/jquery.easydropdown.js"></script>
</head>
<body>
	<div class="header-top">
	   <div class="wrap"> 
			  <div class="header-top-left">
			  	   <!-- <div class="box">
   				      <select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Language :</option>
							<option value="1">English</option>
							<option value="2">French</option>
							<option value="3">German</option>
					  </select>
   				    </div> -->
   				    <!-- <div class="box1">
   				        <select tabindex="4" class="dropdown">
							<option value="" class="label" value="">Currency :</option>
							<option value="1">$ Dollar</option>
							<option value="2">€ Euro</option>
						</select>
   				    </div> -->
   				    <div class="clear"></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
					<li><a href="c_user.php?action=login">Đăng nhập</a></li> |
					<li><a href="c_user.php?action=create">Đăng ký</a></li>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="c_index.php"><img src="../public/images/logo.png" alt=""/></a>
				</div>
		</div>
		<div class="clear"></div>
     </div>
	</div>


<div class="login">
  	<div class="wrap">
		
		<div class="col_1_of_login span_1_of_login">
		<div class="login-title">
       		<h4 class="title">Lấy Lại Mật Khẩu</h4>
			<div id="loginbox" class="loginbox">
				<form method="POST" action="#" name="login" id="login-form">
				  <fieldset class="input">
				    <p id="login-form-username">
				      <label for="modlgn_username">Nhập Mật Khẩu</label>
				     
				     <input id="Matkhau" class="inputbox" type="password" name="matkhau" placeholder ="Mật Khẩu" pattern=".{6,}" title="Mật khẩu phải từ 6 ký tự trở lên" required>
				    </p>
				    <p id="login-form-password">
				      <label for="modlgn_passwd">Nhập Lại Mật Khẩu</label>
				   <input id="Rematkhau" class="inputbox" type="password" name="rematkhau" placeholder="Nhập Lại Mật Khẩu" required> 
				    </p>
				   <script type="text/javascript">
	    					var password = document.getElementById("Matkhau")
							  , confirm_password = document.getElementById("Rematkhau");

							function validatePassword(){
							  if(password.value != confirm_password.value) {
							    confirm_password.setCustomValidity("Mật khẩu không đúng");
							  } else {
							    confirm_password.setCustomValidity('');
							  }
							}

							password.onchange = validatePassword;
							confirm_password.onkeyup = validatePassword;
	    				</script>
				    <div class="remember">
					   
					    <input type="submit" name="laylaipass" class="button" value="Xác Nhận"><div class="clear"></div>
					 </div>
				  </fieldset>
				 </form>
			</div>
	    </div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</body>
</html>
<?php 
include 'footer.php';
?>
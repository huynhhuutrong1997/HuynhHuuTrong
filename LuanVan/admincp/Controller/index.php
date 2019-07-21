<?php
	if (isset($_SESSION['userName'])) {
		?>
		<?php include"../include-top.php";?>
			<div id="wrapper">
			<?php include"../menu.php"; ?>
			    <div id="content-wrapper">
			        <div class="container-fluid">
			          <h1>Trang Chủ</h1>
			          <hr>
			        </div>
			        <!-- <div class="container-fluid">
			          <?php echo $_SESSION['userName']; ?>
			        </div> -->
			        <div class="container-fluid">
				        <div class="row">
				            <div class="col-lg-4 col-md-6 col-sm-6">
				              <div class="card card-stats">
				                <div class="card-header card-header-warning card-header-icon">
				                  <div class="card-icon fix-size">
				                    <i class="fas fa-store-alt"></i>
				                  </div>
				                  <p class="card-category">Tổng Shop</p>
				                  <h3 class="card-title"><?php if (isset($countsh)) {echo $countsh;}?><small>Shop</small>
				                  </h3>
				                </div>
				                <div class="card-footer">
				                  <div class="stats">
				                    <a href="c_admin.php?action=shop">Xem tất cả</a>
				                  </div>
				                </div>
				              </div>
				            </div>
				            <div class="col-lg-4 col-md-6 col-sm-6">
				              <div class="card card-stats">
				                <div class="card-header card-header-warning card-header-icon">
				                  <div class="card-icon fix-size">
				                    <i class="fas fa-users"></i>
				                  </div>
				                  <p class="card-category">Thành viên</p>
				                  <h3 class="card-title"><?php if (isset($countsh)) {echo $countus;}?><small>  Thành viên</small></h3>
				                </div>
				                <div class="card-footer">
				                  <div class="stats">
				                    <a href="c_admin.php?action=user">Xem tất cả</a>
				                  </div>
				                </div>
				              </div>
				            </div>
				            <div class="col-lg-4 col-md-6 col-sm-6">
				              <div class="card card-stats">
				                <div class="card-header card-header-warning card-header-icon">
				                  <div class="card-icon fix-size">
				                    <i class="fas fa-dollar-sign"></i>
				                  </div>
				                  <p class="card-category">Doanh thu</p>
				                  <h3 class="card-title"><?php if (isset($countsh)) {echo $tongtien;}?></h3>
				                </div>
				                <div class="card-footer">
				                  <div class="stats">
				                    <a href="#">Xem chi tiết</a> 
				                  </div>
				                </div>
				              </div>
				            </div>				   
				         </div>
			     	</div>
			    </div>
			</div>
			<?php include"../include-bot.php";?>
		<?php
	}
	else {
		header('location:login.php');
	}
 ?>




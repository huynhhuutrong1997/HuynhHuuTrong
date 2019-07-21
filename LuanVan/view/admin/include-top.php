
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kênh Người Bán</title>

    <!-- Custom fonts for this template-->
    <link href="../public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Page level plugin CSS-->
    <link href="../public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../public/css/home_admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/uploadanh.css">
    <!-- Custom styles for this template-->
    <link href="../public/admin/css/sb-admin.css" rel="stylesheet">
   
    <link href="../public/admin/css/style.css" rel="stylesheet">

    <link href="../public/css/style1.css" rel="stylesheet">
    <!-- javaspript -->
    <script type="text/javascript" src="../public/js/jquery1.min.js"></script>
    <script type="text/javascript" src="../public/js/home_uploadanh.js"></script>
</head>
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="c_index.php">Shop</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
            <<!-- div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div> -->
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <?php if($dem>0){
                    ?>
                    <span class="badge badge-danger"><?=$dem?></span>
                    <?php
                }?>
                
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="c_admin.php?action=chuaxacnhan">Đơn Hàng (<?=$demhoadon?>)</a>
                <a class="dropdown-item" href="c_admin.php?action=binhluan">Bình Luận (<?=$dembinhluan?>)</a>
               <!--  <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </li>
      <!--   <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> -->
        <li class="nav-item dropdown no-arrow user">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>  <?php echo $_SESSION['user_name'] ?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="icon-dropdown"><a href="#"><i class="fas fa-user"></i>User Profile</a>
                </li>
               <!--  <li class="icon-dropdown"><a href="#"><i class="fas fa-user-cog"></i> Settings</a>
                </li> -->
                <li class="divider"></li>
                <li class="icon-dropdown"><a href="c_user.php?action=logout"><i class="fas fa-sign-out-alt"></i>Đăng Xuất</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
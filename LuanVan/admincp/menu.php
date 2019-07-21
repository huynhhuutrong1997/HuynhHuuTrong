<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php if(isset($_SESSION['userName'])){echo 'c_admin.php?action=index';} ?>">
            <i class="fas fa-home"></i>
            <span>Trang chủ</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="c_admin.php?action=alluser">
            <i class="fa fa-user"></i>
            <span>User</span>
        </a>
    </li> -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-table"></i>
        <span>All User</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Role User</h6>
            <a href="c_admin.php?action=shop" class="dropdown-item" >Shop</a>
            <a href="c_admin.php?action=user" class="dropdown-item" >User</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="c_admin.php?action=System">
            <i style="font-size: 16px;" class="fa fa-cog fa-spin fa-3x fa-fw"></i>
            <span>System Apriori</span>
        </a>
    </li>
  <!--   <li class="nav-item">
        <a class="nav-link" href="c_admin.php?action=RDApriori">
            <i style="font-size: 16px;" class="fa fa-cog fa-spin fa-3x fa-fw"></i>
            <span>Random Apriori</span>
        </a>
    </li> -->
</ul>
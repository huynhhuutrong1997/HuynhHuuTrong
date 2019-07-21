<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="c_admin.php?action=index">
            <i class="fas fa-home"></i>
            <span>Trang chủ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="c_admin.php?action=list">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tất cả sản phẩm</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-table"></i>
        <span>Đơn hàng</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Trạng Thái Đơn Hàng</h6>
            <a href="c_admin.php?action=chuaxacnhan" class="dropdown-item">Chưa Xác Nhận</a>
            <a href="c_admin.php?action=daxacnhan" class="dropdown-item" >Đã Xác Nhận</a>
            <a href="c_admin.php?action=dangdonggoi" class="dropdown-item">Đang Đóng Gói</a>
            <a href="c_admin.php?action=dangvanchuyen" class="dropdown-item">Đang Vận Chuyển</a>
            <a href="c_admin.php?action=danggiaohang" class="dropdown-item">Đang Giao Hàng</a>
            <a href="c_admin.php?action=dagiaohang" class="dropdown-item">Đã Giao Hàng</a>
            <a href="c_admin.php?action=bituchoi" class="dropdown-item">Bị Từ Chối</a>
        </div>
    </li>
</ul>
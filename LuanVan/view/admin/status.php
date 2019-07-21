<?php
if (($status=='Đã Xác Nhận') or ($status=='Từ Chối')) {
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cập nhật thành công !');
    window.location.href='c_admin.php?action=chuaxacnhan';
    </script>");
}
else if ($status=='Đang Đóng Gói') {
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cập nhật thành công !');
    window.location.href='c_admin.php?action=daxacnhan';
    </script>");
}
else if($status=='Đang Vận Chuyển') {
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cập nhật thành công !');
    window.location.href='c_admin.php?action=dangdonggoi';
    </script>");
}
else if($status=='Đang Giao Hàng'){
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cập nhật thành công !');
    window.location.href='c_admin.php?action=dangvanchuyen';
    </script>");
}
else if ($status=='Đã Giao Hàng') {
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cập nhật thành công !');
    window.location.href='c_admin.php?action=danggiaohang';
    </script>");
}

?>
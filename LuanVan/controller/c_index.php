<?php
include_once("../Model/m_admin.php");
	$db=new Databasee;
	$db->connect();
include '../model/m_sanpham.php';

include_once ('../model/pagerindex.php');
include_once ('../model/pager.php');
session_start();

if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else
	{
		$action='';
	}
$m_sanpham = new M_sanpham();
$thietbidientu = $m_sanpham->getDMThietBiDienTu();
$phukiendientu = $m_sanpham->getDMPhuKienDienTu();


$sanpham = $m_sanpham->getSanPham();
//phân trang
$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
$pagination = new paginationindex(count($sanpham),$trang_hientai,9,2);
$paginationHTML = $pagination->showPagination();
$limit = $pagination->_nItemOnPage;
$vitri = ($trang_hientai-1)*$limit;
$sanpham = $m_sanpham->getSanPham($vitri, $limit);
//lấy sản phẩm mới
$sanphammoi = $m_sanpham->getSanPhamNew();
//3 sản phẩm bán chạy
$goiybanchay = $m_sanpham->getSanPhamGoiY();
//3 sản phẩm mới
$goiymoi = $m_sanpham->getSanPhamNewGoiY();
//
unset($_SESSION['error_khongtontai']);
unset($_SESSION['error_dangky']);
unset($_SESSION['user_error']);



if (isset($_SESSION['id_user'])) {
	$thongtinuser = $m_sanpham->getUser($_SESSION['id_user']);

}
		

//format kiểu tiền tệ
	function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%.2f', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
	}



switch ($action) {
		case 'timkiem':{
			// if (isset($_POST['submit'])) {
			$key = $_GET['timkiem'];
			$sanpham = $m_sanpham->TimKiem($key);
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($sanpham),$trang_hientai,9,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$sanpham =$m_sanpham->TimKiem($key,$vitri,$limit);
			require_once('../view/user/timkiem.php');
		// }
			break;
		}
		default:{
			require_once '../view/user/index.php';
		}
	}
	

// }
?>
<style type="text/css">
	* {
		box-sizing: content-box !important;
	}
</style>
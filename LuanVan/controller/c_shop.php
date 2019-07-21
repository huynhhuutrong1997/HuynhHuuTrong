<?php
include ('../model/m_shop.php');
include_once ('../model/pager.php');
include_once("../Model/m_admin.php");
	$db=new Databasee;
	$db->connect();
	session_start();
	if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else
	{
		$action='';
	}

	$thanhcong=array();
	$m_shop = new M_shop();
	$thietbidientu = $m_shop->getDMThietBiDienTu();
	$phukiendientu = $m_shop->getDMPhuKienDienTu();
	$id_user = $_GET['shop'];
	$sanpham = $m_shop->getSanPhamByIdUser($id_user);
	$user = $m_shop->getThongTinUser($id_user);
	if ($user==null || $sanpham==null) {
		header('location:c_index.php');
	}
	// if (isset($_SESSION['id_user'])) {
	// $thongtinuser = $m_shop->getThongTinUser($_SESSION['id_user']);

	// }

	
	switch ($action) {
		case 'shop':{
			$sanphamhot = $m_shop->getSanPhamHT($id_user);
			$sanphamnew = $m_shop->getSanPhamNew($id_user);
			require_once('../view/user/shop.php');
			break;
		}
		case 'sanpham':{
			
			//phân trang
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($sanpham),$trang_hientai,10,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$sanpham =$m_shop->getSanPhamByIdUser($id_user,$vitri, $limit);
			require_once('../view/user/sanphamshop.php');
			break;
		}
		case 'hoso':{
			
			require_once('../view/user/hososhop.php');
			break;
		}
		case 'timkiem':{
			//tìm kiếm sản phẩm
			if (isset($_POST['submit'])) {
				$key = $_POST['timkiem'];
				$sanpham = $m_shop->TimKiem($key,$id_user);
				$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
				$pagination = new pagination(count($sanpham),$trang_hientai,10,2);
				$paginationHTML = $pagination->showPagination();
				$limit = $pagination->_nItemOnPage;
				$vitri = ($trang_hientai-1)*$limit;
				$sanpham =$m_shop->TimKiem($key,$id_user,$vitri,$limit);
				require_once('../view/user/sanphamshop.php');
			}

			break;
		}
			
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
?>
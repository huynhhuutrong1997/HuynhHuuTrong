<?php
include_once ('../model/pager.php');
include_once ('../model/pager1.php');
include '../model/m_sanpham.php';
include_once("../model/m_admin.php");
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
	$m_sanpham = new M_sanpham();
	
	$thietbidientu = $m_sanpham->getDMThietBiDienTu();
	$phukiendientu = $m_sanpham->getDMPhuKienDienTu();
	//tiềm kiếm sản phẩm
	if (isset($_POST['submit'])) {
	$key = $_POST['timkiem'];
	$sanpham = $m_sanpham->TimKiem($key);
	$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
	$pagination = new pagination(count($sanpham),$trang_hientai,9,2);
	$paginationHTML = $pagination->showPagination();
	$limit = $pagination->_nItemOnPage;
	$vitri = ($trang_hientai-1)*$limit;
	$sanpham =$m_sanpham->TimKiem($key,$vitri,$limit);
	require_once('../view/user/timkiem.php');
	}

	if (isset($_SESSION['id_user'])) {
	$thongtinuser = $m_sanpham->getUser($_SESSION['id_user']);

}
	switch ($action) {
		case 'phanloai':{
			
			$id_loai = $_GET['id_loai'];
			$danhmucsanpham =$m_sanpham->getSanPhamByIdLoai($id_loai);

			// var_dump($danhmucsanpham);
			$title = $m_sanpham->getTitlebyId($id_loai);
			if ($title == null) {
				header('Location:c_index.php');	
			}
			//phân trang
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($danhmucsanpham),$trang_hientai,9,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$danhmucsanpham =$m_sanpham->getSanPhamByIdLoai($id_loai,$vitri, $limit);
			require_once('../view/user/loaisanpham.php');
			
			break;
		}
		case 'chitiet':{
			$id_sanpham = $_GET['id_sanpham'];
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			$title = $m_sanpham->getTitleId($id_sanpham);
			if ($chitietsanpham != null) {
				
			$sanphamtuongtu = $m_sanpham->getSanPhamTuongTu($chitietsanpham->id_ChiTietLoai);
			$shop = $m_sanpham->getThongTinShop($chitietsanpham->id_User);
			}else{
				header('Location:c_index.php');
			}
			$danhgia = $m_sanpham->getDanhGia($id_sanpham);
			//phân trang danh giá
			$trang_hientai1 =(isset($_GET['page1']))?$_GET['page1']:1;
			$pagination1 = new pagination1(count($danhgia),$trang_hientai1, 5,2);
			$paginationHTML1 = $pagination1->showPagination();
			$limit1 = $pagination1->_nItemOnPage;
			$vitri1 = ($trang_hientai1-1)*$limit1;
			$danhgia = $m_sanpham->getDanhGia($id_sanpham,$vitri1, $limit1);

				$sql="SELECT * FROM `luatkethop` WHERE id_Sp='$id_sanpham'";
				$listfilter =$db->getAllHistory($sql);
				
			// // gợi ý theo luật kết hợp
			// $luatkethop = $m_sanpham->LuatKetHop($chitietsanpham->id_ChiTietLoai);
			if (isset($listfilter)) {
				$length=0;
				foreach ($listfilter as  $value) {
				 	$ars_filter[]=$value['Array_LKH'];
				 	$length++;
				}
				$key=0;
				foreach ($ars_filter as  $value) {
					$ar_filter=explode(',', $value);
					$count=count($ar_filter);
					$key=$key+$count;
				}
				if ($key>$length) {
					foreach ($listfilter as  $value) {
						$arsr_filter[]=$value['Array_LKH'];
					}
					foreach ($arsr_filter as  $value) {
						$ar_filter=explode(',', $value);
						$count=count($ar_filter);
						if ($count>=2) {
							$filter[]=$value;
						}
					}
					$filter=explode(',', $filter[0]);
				}
				else {
					$sql1="SELECT * FROM `luatkethop` WHERE id_Sp='$id_sanpham' ORDER BY `luatkethop`.`id` DESC";
					$listfilter1= $db->getAllHistory($sql1);
					foreach ($listfilter1 as  $value) {
						$filter[]=$value['Array_LKH'];
					}
				}
				
				$goiyluatkethop = array();
				foreach ($filter as $value) {
					$arr = $m_sanpham->getSanPhamByLKH($value);
					array_push($goiyluatkethop, $arr);
				}
			}else{
				$goiyluatkethop = array();
				$ar = $m_sanpham->getSanPhamGoiY();
				array_push($goiyluatkethop, $ar);
			}

			//Bình luận
			if (isset($_POST['datcauhoi'])) {
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$thoigian=date('Y-m-d H:i:s');
				$id_user = $_SESSION['id_user'];
				$noidung = $_POST['noidungbl'];
				$binhluan = $m_sanpham->insertBinhLuan($noidung, $id_user, $id_sanpham, $thoigian);
				$getid = $m_sanpham->getIdBinhLuan();
				$id_binhluan = $getid->LastID;
				$noidungtraloi = "";
				$id_usertl = $chitietsanpham->id_User;
				$add = $m_sanpham->addIdBinhLuan($noidungtraloi,$id_binhluan,$id_usertl);
			}
			
			$binhluan = $m_sanpham->getBinhLuan($id_sanpham);

			//phân trang bình luận
			$trang_hientai =(isset($_GET['page']))?$_GET['page']:1;
			$pagination = new pagination(count($binhluan),$trang_hientai, 5,2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($trang_hientai-1)*$limit;
			$binhluan = $m_sanpham->getBinhLuan($id_sanpham,$vitri, $limit);
			if (isset($_POST['btntraloi'])) {
				// date_default_timezone_set('Asia/Ho_Chi_Minh');
				// $thoigian_traloi=date('Y-m-d H:i:s');
				$id_traloi = $_POST['idtraloi'];
				$noidungtraloi = $_POST['noidungtl'];
				$traloi = $m_sanpham->answerBinhLuan($id_traloi,$noidungtraloi);
				$binhluan = $m_sanpham->getBinhLuan($id_sanpham);
			}


			require_once('../view/user/chitietsanpham.php');
			break;
		}
		case 'edit1':{
			$id_loai = $_GET['id_loai'];
			$id_sanpham = $_GET['id'];
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			if ($chitietsanpham == null) {
				header('Location:c_index.php');
			}else{
				$id_u = $chitietsanpham->id_User;
				if ($id_u != $_SESSION['id_user']) {
				header('Location:c_index.php');
				}
				$ar_dk1 = [1,2];
				$id_chitiet = $chitietsanpham->id_ChiTietLoai;
				if (!in_array($id_chitiet, $ar_dk1) ) {
				header('Location:c_index.php');	
				}
			}


			if (isset($_POST['btnluu'])) {
			$tensp = $_POST['tensp'];
			$hinh = $_FILES['ImageUpload'];
			$hinh1 = $_FILES['ImageUpload1'];
			$hinh2 = $_FILES['ImageUpload2'];
			$mota = $_POST['mota'];
			$gia = $_POST['gia'];
			$kho = $_POST['khohang'];
			$thuonghieu = $_POST['thuonghieu'];
			$model1 = $_POST['model1'];
			$bonhotrong = $_POST['bonhotrong'];
			$mang = $_POST['mang'];
			$khecamsim = $_POST['khecamsim'];
			$chongthamnuoc = $_POST['chongthamnuoc'];
			$manhinh = $_POST['manhinh'];
			$hedieuhanh = $_POST['hedieuhanh'];
			$ram = $_POST['ram'];
			$camsau = $_POST['camsau'];
			$camtruoc = $_POST['camtruoc'];
			$gps = $_POST['gps'];
			$blutoo = $_POST['blutoo'];
			$microUSB = $_POST['microUSB'];
			$pin = $_POST['pin'];
			$mau = $_POST['mau'];
			$baohanh = $_POST['baohanh'];

			$chietsanpham = $thuonghieu.$model1.$bonhotrong.$mang.$khecamsim.$chongthamnuoc.$manhinh.$hedieuhanh.$ram.$camsau.$camtruoc.$gps.$blutoo.$microUSB.$pin.$mau.$baohanh;
			$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
			

			if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
				
				$fileName = $hinh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				$img=$new_file_name;
				move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

				$fileName1 = $hinh1['name'];
				$morong1 = explode(".", $fileName1);
				$duoi1 = $morong1['1'];
				$random_digit1=rand(0000,9999);
				$random_digits1=rand(0000,9999);
				$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
				$img1=$new_file_name1;
				move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

				$fileName2 = $hinh2['name'];
				$morong2 = explode(".", $fileName2);
				$duoi2 = $morong2['1'];
				$random_digit2=rand(0000,9999);
				$random_digits2=rand(0000,9999);
				$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
				$img2=$new_file_name2;
				move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
				
				$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
				header('location:c_admin.php?action=list');
			}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else{
					if (in_array($hinh2['type'],$allowType)) {
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$img2 = $chitietsanpham->Hinh2;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}else{
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
						
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}
				}
				
			

		}	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			require_once('../view/user/edit1.php');
			break;
		}
		case 'edit2':{
			$id_loai = $_GET['id_loai'];
			$id_sanpham = $_GET['id'];	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			if ($chitietsanpham == null) {
				header('Location:c_index.php');
			}else{
				$id_u = $chitietsanpham->id_User;
				if ($id_u != $_SESSION['id_user']) {
				header('Location:c_index.php');
				}
				$ar_dk2 = [3,4,5,6,7,8,9,10,11,16,17,18,19,20,21,22,23,24];
				$id_chitiet = $chitietsanpham->id_ChiTietLoai;
				if (!in_array($id_chitiet, $ar_dk2)) {
					header('Location:c_index.php');
				}
			}
			$chitietsp = $chitietsanpham->ChiTietSanPham;
     			list($thuonghieu1,$baohanh) = explode(':', $chitietsp);
			if (isset($_POST['btnluu'])) {
				$tensp = $_POST['tensp'];
				$hinh = $_FILES['ImageUpload'];
				$hinh1 = $_FILES['ImageUpload1'];
				$hinh2 = $_FILES['ImageUpload2'];
				$mota = $_POST['mota'];
				$gia = $_POST['gia'];
				$kho = $_POST['khohang'];
				$thuonghieu_select = $_POST['thuonghieu_select'];
				$thuonghieu_input = $_POST['thuonghieu_input'];
				if ($thuonghieu_input != $thuonghieu_select) {
					if ($thuonghieu_select != $thuonghieu1) {
						$thuonghieu = $thuonghieu_select;
					}else{
						$thuonghieu = $thuonghieu_input;
					}
				}else{

					$thuonghieu = $thuonghieu1;
				}
				
				$baohanh = $_POST['baohanh'];
				$chietsanpham = $thuonghieu.$baohanh;
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
			

			if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
				
				$fileName = $hinh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				$img=$new_file_name;
				move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

				$fileName1 = $hinh1['name'];
				$morong1 = explode(".", $fileName1);
				$duoi1 = $morong1['1'];
				$random_digit1=rand(0000,9999);
				$random_digits1=rand(0000,9999);
				$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
				$img1=$new_file_name1;
				move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

				$fileName2 = $hinh2['name'];
				$morong2 = explode(".", $fileName2);
				$duoi2 = $morong2['1'];
				$random_digit2=rand(0000,9999);
				$random_digits2=rand(0000,9999);
				$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
				$img2=$new_file_name2;
				move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
				
				$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
				header('location:c_admin.php?action=list');
			}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else{
					if (in_array($hinh2['type'],$allowType)) {
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$img2 = $chitietsanpham->Hinh2;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}else{
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
						
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho);
					// header('location:c_admin.php?action=list');
					}
				}
				
			

		}	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			require_once('../view/user/edit2.php');
			break;
		}
		case 'edit3':{
			$id_loai = $_GET['id_loai'];
			$id_sanpham = $_GET['id'];	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);
			if ($chitietsanpham == null) {
				header('Location:c_index.php');
			}else{
				$id_u = $chitietsanpham->id_User;
				if ($id_u != $_SESSION['id_user']) {
				header('Location:c_index.php');
				}
				$ar_dk3 = [12,13,14,15,16];
				$id_chitiet = $chitietsanpham->id_ChiTietLoai;
				if (!in_array($id_chitiet, $ar_dk3)) {
				header('Location:c_index.php');

				}
			}
     		
			if (isset($_POST['btnluu'])) {
				$tensp = $_POST['tensp'];
				$hinh = $_FILES['ImageUpload'];
				$hinh1 = $_FILES['ImageUpload1'];
				$hinh2 = $_FILES['ImageUpload2'];
				$mota = $_POST['mota'];
				$gia = $_POST['gia'];
				$kho = $_POST['khohang'];
				$thuonghieu_select = $_POST['thuonghieu_select'];
				$thuonghieu_input = $_POST['thuonghieu_input'];
				$baohanh = $_POST['baohanh'];
				$id_phukiendt = [12, 14, 15];
				if (in_array($id_loai, $id_phukiendt)) {

					$chitietsp1 = $chitietsanpham->ChiTietSanPham;
     				list($thuonghieu1,$dongmay1,$chatlieu,$chucnang,$baohanh1) = explode(':', $chitietsp1);
     				$dongmay_input = $_POST['dongmay_input'];
     				$dongmay_select = $_POST['dongmay_select'];
     			if ($dongmay_input != $dongmay_select) {
						if ($dongmay_select != $dongmay1) {
							$dongmay = $dongmay_select;
						}else{
							$dongmay = $dongmay_input;
						}
					}else{

						$dongmay = ':'.$dongmay1;
				}
				if ($thuonghieu_input != $thuonghieu_select) {
						if ($thuonghieu_select != $thuonghieu1) {
							$thuonghieu = $thuonghieu_select;
						}else{
							$thuonghieu = $thuonghieu_input;
						}
					}else{

						$thuonghieu = $thuonghieu1;
				}	
				$chatlieu = $_POST['chatlieu'];
				$chucnang = $_POST['chucnang'];
				$ctsanpham = $thuonghieu.$dongmay.$chatlieu.$chucnang.$baohanh;
				}else{
					$chitietsp = $chitietsanpham->ChiTietSanPham;
     				list($thuonghieu1,$baohanh1) = explode(':', $chitietsp);
     				if ($thuonghieu_input != $thuonghieu_select) {
						if ($thuonghieu_select != $thuonghieu1) {
							$thuonghieu = $thuonghieu_select;
						}else{
							$thuonghieu = $thuonghieu_input;
						}
					}else{

						$thuonghieu = $thuonghieu1;
					}
					$ctsanpham = $thuonghieu.$baohanh;
				}
				
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];

			if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
				
				$fileName = $hinh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				$img=$new_file_name;
				move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

				$fileName1 = $hinh1['name'];
				$morong1 = explode(".", $fileName1);
				$duoi1 = $morong1['1'];
				$random_digit1=rand(0000,9999);
				$random_digits1=rand(0000,9999);
				$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
				$img1=$new_file_name1;
				move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

				$fileName2 = $hinh2['name'];
				$morong2 = explode(".", $fileName2);
				$duoi2 = $morong2['1'];
				$random_digit2=rand(0000,9999);
				$random_digits2=rand(0000,9999);
				$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
				$img2=$new_file_name2;
				move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
				
				$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
				header('location:c_admin.php?action=list');
			}else if (in_array($hinh['type'], $allowType) && in_array($hinh1['type'], $allowType)) {
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);

					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType) && in_array($hinh2['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);

					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else{
					if (in_array($hinh2['type'],$allowType)) {
					$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$fileName2 = $hinh2['name'];
					$morong2 = explode(".", $fileName2);
					$duoi2 = $morong2['1'];
					$random_digit2=rand(0000,9999);
					$random_digits2=rand(0000,9999);
					$new_file_name2=$random_digit2.$random_digits2.'.'.$duoi2;
					$img2=$new_file_name2;
					move_uploaded_file($hinh2['tmp_name'],'../public/images/sanpham/'.$img2);
					
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh['type'], $allowType)) {
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
					$fileName = $hinh['name'];
					$morong = explode(".", $fileName);
					$duoi = $morong['1'];
					$random_digit=rand(0000,9999);
					$random_digits=rand(0000,9999);
					$new_file_name=$random_digit.$random_digits.'.'.$duoi;
					$img=$new_file_name;
					move_uploaded_file($hinh['tmp_name'],'../public/images/sanpham/'.$img);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
				}else if (in_array($hinh1['type'], $allowType)) {
					$img = $chitietsanpham->Hinh;
					$img2 = $chitietsanpham->Hinh2;
					$fileName1 = $hinh1['name'];
					$morong1 = explode(".", $fileName1);
					$duoi1 = $morong1['1'];
					$random_digit1=rand(0000,9999);
					$random_digits1=rand(0000,9999);
					$new_file_name1=$random_digit1.$random_digits1.'.'.$duoi1;
					$img1=$new_file_name1;
					move_uploaded_file($hinh1['tmp_name'],'../public/images/sanpham/'.$img1);
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					header('location:c_admin.php?action=list');
					}else{
						$img = $chitietsanpham->Hinh;
					$img1 = $chitietsanpham->Hinh1;
					$img2 = $chitietsanpham->Hinh2;
						
					$sanpham = $m_sanpham->updateSanPham($id_sanpham, $tensp, $img, $img1, $img2, $ctsanpham, $mota, $gia, $kho);
					// header('location:c_admin.php?action=list');
					}
				}
				
			

		}	
			$chitietsanpham = $m_sanpham->getSanPhamId($id_sanpham);	
			require_once('../view/user/edit3.php');
			break;
		}
		case 'xoa':{
			$id_sanpham = $_GET['id'];
			$delete = $m_sanpham->deleteSanPham($id_sanpham);
			header('location:c_admin.php?action=list');
			require_once('../view/admin/list.php');
			break;
		}
			
	}








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
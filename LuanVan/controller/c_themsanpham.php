<?php
include ('../model/m_themsanpham.php');
session_start();
if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else
	{
		$action='';
	}

	$thanhcong=array();
	
	switch ($action) {
		case 'danhmuc':{
		unset($_SESSION['thongbao']);
		$m_themsanpham = new M_themsanpham();
		//danh mục sản phẩm
		$dienthoai = $m_themsanpham->getDienThoai();
		$maytinhbang = $m_themsanpham->getMayTinhBang();
		$thietbiamthanh = $m_themsanpham->getThietBiAmThanh();
		$latop = $m_themsanpham->getLapTop();
		$maytinhdeban = $m_themsanpham->getMayTinhDeBan();
		$phukiendidong = $m_themsanpham->getPhuKienDiDong();
		$phukienmaytinh = $m_themsanpham->getPhuKienMayTinh();
		$thietbimang = $m_themsanpham->getThietBiMang();
			require_once('../view/user/themsanpham.php');
			
			break;
		}
		case 'form1':{
			$id_loai = $_GET['id'];
			$id_user = $_SESSION['id_user'];
			if (isset($_POST['btnthem'])) {
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
			if (!in_array($hinh['type'], $allowType) || !in_array($hinh1['type'], $allowType) || !in_array($hinh2['type'], $allowType)) {
				$_SESSION['thongbao'] = "File không đúng định dạng";
			}else{
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
				
				$sanpham = insertsanpham($tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho, $id_loai, $id_user);
			}
		}
		
			require_once('../view/user/form1.php');
			break;
		}
		case 'form2':{
			$id_loai = $_GET['id'];
			$id_user = $_SESSION['id_user'];
			
			if (isset($_POST['btnthem'])) {
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
				if ($thuonghieu_select != '') {
					$thuonghieu = $thuonghieu_select;
				}else{
					$thuonghieu = $thuonghieu_input;
				}
				$chietsanpham = $thuonghieu.$baohanh;
				
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
				if (!in_array($hinh['type'], $allowType) || !in_array($hinh1['type'], $allowType) || !in_array($hinh2['type'], $allowType)) {
					$_SESSION['thongbao'] = "File không đúng định dạng";
				}else{
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
					$sanpham = insertsanpham($tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho, $id_loai, $id_user);
				}

			}
			require_once('../view/user/form2.php');
			break;
		}
		case 'form3':{
			$id_loai = $_GET['id'];
			$id_user = $_SESSION['id_user'];
			
			if (isset($_POST['btnthem'])) {
				$tensp = $_POST['tensp'];
				$hinh = $_FILES['ImageUpload'];
				$hinh1 = $_FILES['ImageUpload1'];
				$hinh2 = $_FILES['ImageUpload2'];
				$mota = $_POST['mota'];
				$gia = $_POST['gia'];
				$kho = $_POST['khohang'];
				$thuonghieu_select = $_POST['thuonghieu_select'];
				$thuonghieu_input = $_POST['thuonghieu_input'];
				if ($thuonghieu_select != '') {
					$thuonghieu = $thuonghieu_select;
				}else{
					$thuonghieu = $thuonghieu_input;
				}
				$baohanh = $_POST['baohanh'];
				$id_phukiendt = [12, 14, 15];
				if (in_array($id_loai, $id_phukiendt)) {
				$dongmay = ":".$_POST['dongmay'];
				$chatlieu = $_POST['chatlieu'];
				$chucnang = $_POST['chucnang'];
				$chietsanpham = $thuonghieu.$dongmay.$chatlieu.$chucnang.$baohanh;
				}else{
					$chietsanpham = $thuonghieu.$baohanh;
				}
				
				$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
				if (!in_array($hinh['type'], $allowType) || !in_array($hinh1['type'], $allowType) || !in_array($hinh2['type'], $allowType)) {
					$_SESSION['thongbao'] = "Chưa chọn ảnh hoặc file ảnh không đúng";
				}else{
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
					$sanpham = insertsanpham($tensp, $img, $img1, $img2, $chietsanpham, $mota, $gia, $kho, $id_loai, $id_user);
				}

			}
			require_once('../view/user/form3.php');
			break;
		}
	}

	//thêm sản phẩm
	function insertsanpham($tensp, $hinh, $hinh1, $hinh2, $chitietsp, $mota, $gia, $kho , $id_chitietloai, $id_shop){
		$m_themsanpham = new M_themsanpham();
		$id_sanpham = $m_themsanpham->insertSanPham($tensp, $hinh, $hinh1, $hinh2, $chitietsp, $mota, $gia, $kho, $id_chitietloai, $id_shop);
		if($id_sanpham>0){
			$_SESSION['success'] = "Thềm Thành Công";
			header('Location:c_admin.php?action=list');
			if (isset($_SESSION['error'])) {
				unset($_SESSION['error']);
			}
		}else{
			$_SESSION['error'] = "Thêm Không Thành Công";
		}
	}
?>
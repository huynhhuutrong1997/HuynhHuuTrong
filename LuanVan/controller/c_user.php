<?php
include ('../model/m_user.php');
include('../public/mail/class.smtp.php');
include "../public/mail/class.phpmailer.php"; 
include "../public/mail/functions.php"; 
include_once("../Model/m_admin.php");
	$db=new Databasee;
	$db->connect();
	if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else
	{
		$action='';
	}
	
	$thanhcong=array();
	$m_user = new M_user();
	$thietbidientu = $m_user->getDMThietBiDienTu();
	$phukiendientu = $m_user->getDMPhuKienDienTu();
	if (isset($_SESSION['id_user'])) {
	$thongtinuser = $m_user->getUser($_SESSION['id_user']);

	}
	switch ($action) {
		case 'create':{
			unset($_SESSION['error_khongtontai']);
			unset($_SESSION['user_error']);
			if(isset($_POST['dangky'])){
				$hoten = $_POST['hoten'];
				$gioitinh =$_POST['gioitinh'];
				$email = $_POST['email'];
				$matkhau = $_POST['matkhau'];
				$rematkhau = $_POST['rematkhau'];
				if($matkhau == $rematkhau){
					$ma = rand(0000,9999);
					$user = dangkyTK($hoten, $gioitinh, $email, $matkhau,$ma);
					$lastid = $m_user->getIdUser();
					$id_user = $lastid->LastID;
					$title = 'Kích Hoạt Tài Khoản';
					$content = 'Vui lòng nhấp vào đường link này :http://localhost/GitLuanVan/controller/c_user.php?action=active&id='.$id_user.'&ma='.$ma.' ,để kích hoạt tài khoản Shop TK';
					$nTo = $hoten;
					$mTo = $email;
					$diachi = $email;
					$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
					
				}

			}
			
			require_once('../view/user/register.php');
			break;
		}
		
		case 'login':{
			unset($_SESSION['error_khongtontai']);
			unset($_SESSION['error_dangky']);
			if(isset($_POST['dangnhap'])){
			    $email = $_POST['email'];
			    $matkhau = $_POST['matkhau'];
			    $user = dangnhapTK($email,md5($matkhau));
			    if (isset($_GET['id_sanpham'])) {
				header('Location:c_sanpham.php?action=chitiet&id_sanpham='.$_GET['id_sanpham']);
				}
			}
			
			require_once('../view/user/login.php');
			break;
		}
		case 'logout':{
			dangxuat();
			break;
		}
		case 'account':{
			if (!isset($_SESSION['id_user'])) {
				header('location:c_index.php');
			}
			unset($_SESSION['thongbao']);
			$id_user = $_SESSION['id_user'];
			$user = $m_user->getUser($id_user);
			if(isset($_POST['luu'])){
			$id_user = $_SESSION['id_user'];
			$hoten = $_POST['hoten'];
			$gioitinh =$_POST['gioitinh'];
			$ngaysinh = $_POST['ngaysinh'];
			$sdt = $_POST['sdt'];
			$diachi = $_POST['diachi'];
			$anh = $_FILES['uploadavatar'];
			$allowType = ['image/png','image/jpeg','image/gif','image/jpg'];
			if ($fileName = $anh['name'] == "") {
				$img = $user->Avatar;
				$updateuser = updateuser($id_user,$hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $img);
			}else
			if (!in_array($anh['type'], $allowType)) {
				$_SESSION['thongbao'] = "File không đúng định dạng";
			}else{
				$fileName = $anh['name'];
				$morong = explode(".", $fileName);
				$duoi = $morong['1'];
				$random_digit=rand(0000,9999);
				$random_digits=rand(0000,9999);
				$new_file_name=$random_digit.$random_digits.'.'.$duoi;
				// $target= "img/".$new_file_name;
				$img=$new_file_name;
				move_uploaded_file($anh['tmp_name'],'../public/images/avatar/'.$img);
				$updateuser = updateuser($id_user,$hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $img);
			}
			
			$user = $m_user->getUser($id_user);
		}
			require_once('../view/user/account.php');
			break;
		}
		case 'changepass':{
			if (!isset($_SESSION['id_user'])) {
				header('location:c_index.php');
			}
			$id_user = $_SESSION['id_user'];
			$user = $m_user->getUser($id_user);
			$matkhaucu = $user->MatKhau;
			unset($_SESSION['success1']);
			unset($_SESSION['thongbao']);
			if(isset($_POST['doi'])){
				$id_user = $_SESSION['id_user'];
				$matkhauht = $_POST['matkhauht'];
				$matkhau =$_POST['matkhaumoi'];
				$rematkhaumoi = $_POST['rematkhaumoi'];
				$md5_matkhaumoi = md5($matkhauht);
				if ($matkhaucu == $md5_matkhaumoi) {
					$dm5_matkhau = md5($matkhau);
					$changeuser = changepass($id_user,$dm5_matkhau);
					unset($_SESSION['thongbao']);
					$_SESSION['success1'] = "Đổi mật khẩu thành công";
				}else{
					$_SESSION['thongbao'] = "Mật Khẩu Hiện Tại Không Đúng";
				}
			}
			require_once('../view/user/changepass.php');
			break;
		}
		case 'shopnew':{
			require_once('../view/user/createshop.php');
			break;
		}
		case 'createshopnew':{
			if (!isset($_SESSION['id_user'])) {
				header('location:c_index.php');
			}
			$id_user = $_SESSION['id_user'];
			$user = $m_user->getUser($id_user);
			if (isset($_POST['tiep'])) {
				$tenshop = $_POST['tenshop'];
				$diachi = $_POST['diachi'];
				$ten = $m_user->TenShop($id_user,$tenshop,$diachi);
				header('location:c_admin.php?action=index');
			}
			require_once('../view/user/shopnew.php');
			break;
		}
		case 'forget':{
			unset($_SESSION['error_dangky']);
			unset($_SESSION['user_error']);
			
			if (isset($_POST['laylaimatkhau'])) {
				$email = $_POST['email'];
				$user = $m_user->checkEmail($email);
					if ($user == true) {
						$ma = rand(0000,9999);
						
						$user_forget = $m_user->updateMa($email,$ma);
						$title = 'Lấy Lại Mật Khẩu';
						$content = 'Chào '.$user->HoTen.', để lấy lại mật khẩu vui lòng lick vào đường link này : http://localhost/GitLuanVan/controller/c_user.php?action=laylaipass&id='.$user->id_User.'&ma='.$ma;
						$nTo = $user->HoTen;
						$mTo = $email;
						$diachi = $email;
						$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
						header('Location:c_user.php?action=thongbao');
					}else{

						$_SESSION['error_khongtontai'] = "Tài Khoản Không Tồn Tại";
						header('Location:c_user.php?action=forget');
					}
			}
			
			
			require_once('../view/user/quenmatkhau.php');
			break;

		}
		case 'thongbao':{

			require_once('../view/user/thongbao.php');
			break;

		}
		// case 'lkh':{
		// 	$tblTable='LichSu';
		// 	$LichSu=$db->getAllLichSu($tblTable);
		// 	$id=89;
		// 	require_once('../view/user/lkh.php');
		// 	break;
		// }
		case 'laylaipass':{
			$id_user = $_GET['id'];
			$ma = $_GET['ma'];
			$user = $m_user->getUser($id_user);
			$code = $user->Ma;
			if ($ma == 0) {
				header('Location:c_index.php');
			}else if ($ma != $code) {
				header('Location:c_index.php');
			}else{
				if (isset($_POST['laylaipass'])) {
					$matkhau = $_POST['matkhau'];
					$md5_matkhau = md5($matkhau);
					$reset = 0;
					$forget = $m_user->forgetPassWord($id_user, $md5_matkhau ,$reset);
					header('Location:c_user.php?action=laylaimk');
				}
			}
			require_once('../view/user/laylaipass.php');
			break;

		}
		case 'thongbaodk':{

			require_once('../view/user/thongbaodk.php');
			break;

		}
		case 'active':{
			$ma = $_GET['ma'];
			$id_user = $_GET['id'];
			$user = $m_user->getUser($id_user);
			$code = $user->Ma;
			$active = 1;
			$reset = 0;
			if ($ma == 0) {
				header('Location:c_index.php');
			}else if ($ma != $code) {
				header('Location:c_index.php');
			}else{
				$user = $m_user->activeUsser($id_user , $active , $reset);
			}
			
			
			require_once('../view/user/active.php');
			break;

		}
		case 'laylaimk':{
			require_once('../view/user/thongbaolaylaipass.php');
			break;
		}
		case 'danhgia':{
			$id_sanpham = $_GET['id_sanpham'];
			$id_donhang = $_GET['id_donhang'];
			$sanpham = $m_user->getSanPham($id_sanpham);
			$shop = $m_user->getUser($sanpham->id_User);
			if (isset($_POST['btn_danhgia'])) {
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$thoigian=date('Y-m-d H:i:s');
				$danhgiasp = $_POST['star'];
				$noidungdanhgiasp = $_POST['noidung_sp'];
				$danhgiashop = $_POST['star_shop'];
				$noidungdanhgiashop = $_POST['noidung_shop'];
				$danhgia = $m_user->DanhGia($danhgiasp, $noidungdanhgiasp, $danhgiashop, $noidungdanhgiashop, $thoigian, $id_sanpham, $id_donhang);
				$danhgiact = 1;
				$danhgiachitiet = $m_user->DanhGiaChiTiet($danhgiact, $id_donhang, $id_sanpham);
				header('Location:c_add.php?action=chitietdonhang&id_donhang='.$id_donhang);
			}
			require_once('../view/user/danhgia.php');
			break;
		}
		case 'listshop':{
			$hop = $m_user->getShop();
			$listshop = array();
			foreach ($hop as $value) {
				$danhgiashop = $m_user->getDanhGiaShop($value->id_User);
				array_push($listshop,$danhgiashop);
			}
			// var_dump($listshop);
			require_once('../view/user/listshop.php');
			break;
		}
			
	}
	//đăng ký tài khoản
	
	function dangkyTK($hoten, $gioitinh, $email, $matkhau ,$ma){
		$m_user = new M_user();
		$active = 0 ;
		$id_user = $m_user->DangKy($hoten, $gioitinh, $email, $matkhau, $active ,$ma);
		if($id_user>0){
			header('Location:c_user.php?action=thongbaodk');
		}else{
			$_SESSION['error_dangky'] = "Đăng ký không thành công";
			header('Location:c_user.php?action=create');

		}
	}

	//đăng nhập
	 function dangnhapTK($email, $matkhau){
		$m_user = new M_user();
		$user = $m_user->DangNhap($email, $matkhau);
		if($user == true){
			if ($user->Active == 1) {
				$_SESSION['user_name'] = $user->HoTen;
				$_SESSION['id_user'] = $user->id_User;
				header('location:c_index.php');
				if(isset($_SESSION['user_error'])){
					unset($_SESSION['user_error']);

				}
				if(isset($_SESSION['chua_dang_nhap'])) {
					unset($_SESSION['chua_dang_nhap']);
				}

			}
			// elseif ($user->Active == 2) {
			// 	$_SESSION['user_name'] = $user->HoTen;
			// 	$_SESSION['id_user'] = $user->id_User;
			// 	header('location:c_admin.php?action=update_apriori');
			// 	if(isset($_SESSION['user_error'])){
			// 		unset($_SESSION['user_error']);

			// 	}
			// 	if(isset($_SESSION['chua_dang_nhap'])) {
			// 		unset($_SESSION['chua_dang_nhap']);
			// 	}

			// }
			else{
				$_SESSION['user_error'] = "Tài Khoản chưa kích hoạt";
				header('location:c_user.php?action=login');
			}
			
		}else{
			$_SESSION['user_error'] = "Sai thông tin đăng nhập";
			header('location:c_user.php?action=login');
		}

	}
	//đăng xuất
	function dangxuat(){
		session_destroy();
		header('location:c_index.php');
	}


	
	
	

	//update User
	function updateuser($id_user,$hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $avatar){
		$m_user = new M_user();
		$id_user = $m_user->updateUser($id_user,$hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $avatar);
	}

	//đổi mật khẩu
	function changepass($id_user, $matkhau){
		$m_user = new M_user();
		$id_user = $m_user->changePass($id_user, $matkhau);
	}

?>
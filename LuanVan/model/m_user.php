<?php
include ('database.php');
session_start();
/**
 * 
 */
class M_user extends database
{
	
	//Đăng ký tài khoản
	function DangKy($hoten, $gioitinh, $email, $matkhau , $active , $ma){
		$sql = "INSERT INTO users(HoTen,GioiTinh,Email,MatKhau,Active,Ma) VALUES(?,?,?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($hoten, $gioitinh, $email, md5($matkhau), $active,$ma));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}

	//đăng nhập
	function DangNhap($email, $md5_matkhau){

		$sql = "SELECT * FROM users WHERE Email = '$email' and MatKhau = '$md5_matkhau'";
		$this->setQuery($sql);
		return $this->loadRow(array($email,$md5_matkhau));

	}


	//Load thông tin user

	function getUser($id_user){
		$sql = "SELECT * FROM users WHERE id_User ='$id_user'";
		$this->setQuery($sql);
		return $this->loadRow(array($id_user));
	}

//Update thông tin tài khoản
	function updateUser($id_user,$hoten, $gioitinh, $ngaysinh, $sdt, $diachi, $avatar){
		$sql = "UPDATE users SET HoTen = '$hoten', GioiTinh = '$gioitinh', NgaySinh = '$ngaysinh', SDT = '$sdt', DiaChi = '$diachi', avatar = '$avatar'  WHERE id_User = '$id_user' ";
		$this->setQuery($sql);
		$result = $this->execute(array($id_user,$hoten, $gioitinh, $ngaysinh, $sdt, $diachi));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}

	//Đổi mật khẩu
	function changePass($id_user, $matkhau){

		$sql ="UPDATE users SET MatKhau ='$matkhau' WHERE id_User = '$id_user'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_user, $matkhau) );
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}
	// Thêm tên Shop
	function TenShop($id_user,$tenshop, $diachi){
		$sql = "UPDATE users SET TenShop = '$tenshop', DiaChi = '$diachi' WHERE id_User = '$id_user'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_user, $tenshop, $diachi) );
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}
	//kiểm tra email có tồn tài hay không
	function checkEmail($email){
		$sql = "SELECT * FROM users WHERE Email ='$email'";
		$this->setQuery($sql);
		return $this->loadRow(array($email));
	}

	//Update thông tin tài khoản
	function activeUsser($id_user , $active , $reset){
		$sql = "UPDATE users SET Active = '$active', Ma = '$reset' WHERE id_User = '$id_user' ";
		$this->setQuery($sql);
		$result = $this->execute(array($id_user , $active , $reset));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}

	//Lấy id user mới tạo
	function getIdUser(){
			$sql = "SELECT Max(id_User) as LastID FROM users";
		$this->setQuery($sql);
		return $this->loadRow(array());
		}
	//upde lấy mã để lấy pass
	function updateMa($email,$ma){

		$sql ="UPDATE users SET Ma = '$ma' WHERE Email = '$email'";
		$this->setQuery($sql);
		$result = $this->execute(array($email,$matkhau) );
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}
	//Lấy Lại password
	function forgetPassWord($id_user, $matkhau ,$ma){

		$sql ="UPDATE users SET MatKhau ='$matkhau' , Ma = '$ma' WHERE id_User = '$id_user'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_user, $matkhau , $ma) );
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}
// Đánh giá 
	function DanhGia($danhgiasp, $noidungdanhgiasp, $danhgiashop, $noidungdanhgiashop, $thoigian, $id_sanpham, $id_donhang){

		$sql = "INSERT INTO danhgia(DanhGiaSanPham,NoiDungSanPham,DanhGiaShop,NoiDungShop,ThoiGianDanhGia,id_SanPham,id_DonHang) VALUES(?,?,?,?,?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($danhgiasp, $noidungdanhgiasp, $danhgiashop, $noidungdanhgiashop, $thoigian, $id_sanpham, $id_donhang));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}

	}
	function DanhGiaChiTiet($danhgia, $id_donhang, $id_sanpham){
		$sql ="UPDATE chitietdonhang SET DanhGia ='$danhgia' WHERE id_donhang = '$id_donhang' AND id_sp ='$id_sanpham'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_user, $matkhau , $ma) );
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}	
	

	//lấy thông tin sản phẩm
	function getSanPham($id_sanpham){
		$sql = "SELECT * FROM sanpham WHERE id_SanPham ='$id_sanpham'";
		$this->setQuery($sql);
		return $this->loadRow(array($id_sanpham));
	}
	// load danh mục sản phẩm lên menu
	//danh mục thiết bị điện tử
	function getDMThietBiDienTu(){

			$sql = "SELECT loaisanpham.*, GROUP_CONCAT(Distinct chitietloaisanpham.id_ChiTietLoai,':', chitietloaisanpham.TenChiTietLoai) as ChiTietLoaiSanPham FROM loaisanpham INNER JOIN chitietloaisanpham  ON loaisanpham.id_LoaiSanPham = chitietloaisanpham.id_LoaiSanPham and loaisanpham.id_menu = 1 GROUP BY loaisanpham.id_LoaiSanPham";

			$this->setQuery($sql);
			return $this->loadAllRows();
		}

	//danh mục phụ kiện thiết bị điện tử
	function getDMPhuKienDienTu(){

			$sql = "SELECT loaisanpham.*, GROUP_CONCAT(Distinct chitietloaisanpham.id_ChiTietLoai,':', chitietloaisanpham.TenChiTietLoai) as ChiTietLoaiSanPham FROM loaisanpham INNER JOIN chitietloaisanpham  ON loaisanpham.id_LoaiSanPham = chitietloaisanpham.id_LoaiSanPham and loaisanpham.id_menu = 2 GROUP BY loaisanpham.id_LoaiSanPham";

			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		//Danh sách các shop thêm gia bán hàng
		function getShop(){
			$sql = "SELECT * FROM users";
			$this->setQuery($sql);
			return $this->loadAllRows(array());
		}
		//Lấy đánh giá shop
		function getDanhGiaShop($id_user){
		$sql = "SELECT users.*, AVG(danhgia.DanhGiaShop) AS TB FROM sanpham LEFT JOIN danhgia ON sanpham.id_SanPham = danhgia.id_SanPham INNER JOIN users ON users.id_User = sanpham.id_User WHERE sanpham.id_User = '$id_user'";
		$this->setQuery($sql);
		return $this->loadRow(array($id_user));
	}
}
?>
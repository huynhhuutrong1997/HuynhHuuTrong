<?php
include ('database.php');
/**
 * 
 */
class M_sanpham extends database
{
	//get sản phẩm bán chạy
	function getSanPham($vitri=-1,$limit=-1){
			$sql = "SELECT sanpham.* , COUNT(sanpham.id_SanPham) as dem FROM sanpham LEFT JOIN chitietdonhang ON sanpham.id_SanPham = chitietdonhang.id_sp GROUP BY sanpham.id_SanPham ORDER BY dem DESC";
			if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array());
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
		//danh mục thời trang
	function getThoiTrang(){

			$sql = "SELECT loaisanpham.*, GROUP_CONCAT(Distinct chitietloaisanpham.id_ChiTietLoai,':', chitietloaisanpham.TenChiTietLoai) as ChiTietLoaiSanPham FROM loaisanpham INNER JOIN chitietloaisanpham  ON loaisanpham.id_LoaiSanPham = chitietloaisanpham.id_LoaiSanPham and loaisanpham.id_menu = 3 GROUP BY loaisanpham.id_LoaiSanPham";

			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		//danh mục sức khỏe và làm đẹp
	function getSucKhoeVaLamDep(){

			$sql = "SELECT loaisanpham.*, GROUP_CONCAT(Distinct chitietloaisanpham.id_ChiTietLoai,':', chitietloaisanpham.TenChiTietLoai) as ChiTietLoaiSanPham FROM loaisanpham INNER JOIN chitietloaisanpham  ON loaisanpham.id_LoaiSanPham = chitietloaisanpham.id_LoaiSanPham and loaisanpham.id_menu = 4 GROUP BY loaisanpham.id_LoaiSanPham";

			$this->setQuery($sql);
			return $this->loadAllRows();
		}
// end load danh mục sản phẩm lên menu

	//lấy tất cả sản phẩm theo id loại
	function getSanPhamByIdLoai($id_chitietloai,$vitri=-1,$limit=-1){
			$sql = "SELECT * FROM sanpham WHERE id_ChiTietLoai = $id_chitietloai";
			if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_chitietloai));
		}
	//lấy tên loại sản phẩm
	function getTitlebyId($id_chitietloai){
			$sql = "SELECT TenChiTietLoai FROM chitietloaisanpham WHERE id_ChiTietLoai = $id_chitietloai";
			
			$this->setQuery($sql);
			return $this->loadRow(array($id_chitietloai));
		}

	//lấy chi tiết sản phẩm
	function getSanPhamId($id_sanpham){

		$sql = "SELECT * FROM sanpham WHERE id_SanPham = $id_sanpham";
		$this->setQuery($sql);
		return $this->loadRow(array($id_sanpham));
	}

	function getTitleId($id_sanpham){
			$sql = "SELECT loaisanpham.TenLoaiSanPham, chitietloaisanpham.TenChiTietLoai FROM loaisanpham INNER JOIN chitietloaisanpham ON loaisanpham.id_LoaiSanPham = chitietloaisanpham.id_LoaiSanPham INNER JOIN sanpham ON sanpham.id_ChiTietLoai = chitietloaisanpham.id_ChiTietLoai WHERE id_SanPham = $id_sanpham";

			$this->setQuery($sql);
			return $this->loadRow(array($id_sanpham));
		}
	// //lấy địa chỉ theo id sản phẩm
	// function getDiaChiShop($id_sanpham){
	// 	$sql = "SELECT shop.* FROM sanpham INNER JOIN shop ON sanpham.id_Shop = shop.id_Shop WHERE id_SanPham = $id_sanpham";
	// 		$this->setQuery($sql);
	// 		return $this->loadRow(array($id_sanpham));
	// }

	//lấy sản phẩm tương tự
	function getSanPhamTuongTu($id_chicietloai){

			$sql = "SELECT * FROM sanpham WHERE id_ChiTietLoai = $id_chicietloai ORDER BY id_SanPham DESC LIMIT 10";

			$this->setQuery($sql);
			return $this->loadAllRows(array($id_chicietloai));
	}	
	//lấy 9 sản phẩm mới
	function getSanPhamNew(){
		$sql = "SELECT * FROM sanpham ORDER BY id_SanPham DESC LIMIT 9";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	//lấy thông tin shop của sản phẩm
	function getThongTinShop($id_user){
		$sql = "SELECT * FROM users WHERE id_User ='$id_user'";
		$this->setQuery($sql);
		return $this->loadRow(array($id_user));
	}
	//lấy tất cả bình luận của sản phẩm
	function getBinhLuan($id_sanpham,$vitri=-1,$limit=-1){
			$sql = "SELECT binhluan.NoiDung, traloi.NoiDungTraLoi , users.HoTen as BinhLuan , traloi.id_User as idUserTraLoi, traloi.id_TraLoi as idTraLoi FROM binhluan INNER JOIN traloi ON binhluan.id_BinhLuan = traloi.id_BinhLuan INNER JOIN users On binhluan.id_User = users.id_User WHERE binhluan.id_SanPham = $id_sanpham ORDER BY binhluan.id_BinhLuan DESC ";
			if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_sanpham));
		}
	//thêm bình luận
		function insertBinhLuan($noidung, $id_user, $id_sanpham, $thoigian){
			$sql = "INSERT INTO binhluan(NoiDung, id_User, id_SanPham, ThoiGian) VALUES (?,?,?,?)";
			$this->setQuery($sql);
			$result = $this->execute(array($noidung, $id_user, $id_sanpham,$thoigian));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}

		}
	//lấy id bình luận mới nhất
		function getIdBinhLuan(){
			$sql = "SELECT Max(id_BinhLuan) as LastID FROM binhluan";
		$this->setQuery($sql);
		return $this->loadRow(array());
		}
	//add id binh luận vào bảng trả lời
		function addIdBinhLuan($noidung, $id_binhluan, $id_user){
			$sql = "INSERT INTO traloi(NoiDungTraLoi, id_BinhLuan, id_User) VALUES (?,?,?)";
			$this->setQuery($sql);
			$result = $this->execute(array($noidung, $id_binhluan, $id_user));
			if($result){
				return $this->getLastId();
			}else{
				return false;
			}

		}

	//trả lời bình luận
	function answerBinhLuan($id_traloi,$noidungtraloi){
		$sql = "UPDATE traloi SET NoiDungTraLoi = '$noidungtraloi' WHERE id_TraLoi = '$id_traloi'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_traloi,$noidungtraloi));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}

	} 
	//Load thông tin user

	function getUser($id_user){
		$sql = "SELECT * FROM users WHERE id_User ='$id_user'";
		$this->setQuery($sql);
		return $this->loadRow(array($id_user));
	}

	//update sản phẩm
	function updateSanPham($id_sanpham, $tensp, $hinh, $hinh1, $hinh2, $chitietsp, $mota, $gia, $kho){
		$sql = "UPDATE sanpham SET TenSanpham = '$tensp', Hinh = '$hinh', Hinh1 = '$hinh1', Hinh2 = '$hinh2', 	ChiTietSanPham = '$chitietsp', MoTa = '$mota', Gia = '$gia', Kho = '$kho' WHERE id_SanPham = '$id_sanpham'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_sanpham, $tensp, $hinh, $hinh1, $hinh2, $chitietsp, $mota, $gia, $kho));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}

	}

	//Xóa sản phẩm
	function deleteSanPham($id_sanpham){
		$sql = "DELETE FROM sanpham WHERE id_SanPham = '$id_sanpham'";
		$this->setQuery($sql);
		$result = $this->execute(array($id_sanpham));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}

	// lấy đành giá sản phẩm
	function getDanhGia($id_sanpham,$vitri=-1,$limit=-1){
		$sql = "SELECT * FROM danhgia WHERE id_SanPham ='$id_sanpham'";
		if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array());
	}

	//tìm kiếm sản phẩm
	function TimKiem($key,$vitri=-1,$limit=-1){

		$sql = "SELECT * FROM sanpham WHERE TenSanpham LIKE '%$key%'";
		if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array());

	}

	// lấy 3 sản phảm bắn chạy nhất
	function getSanPhamGoiY(){
			$sql = "SELECT sanpham.* , COUNT(sanpham.id_SanPham) as dem FROM sanpham LEFT JOIN chitietdonhang ON sanpham.id_SanPham = chitietdonhang.id_sp GROUP BY sanpham.id_SanPham ORDER BY dem DESC LIMIT 3";
			$this->setQuery($sql);
			return $this->loadAllRows(array());
		}
	//lấy 3 sản phẩm mới để gợi ý
	function getSanPhamNewGoiY(){
		$sql = "SELECT * FROM sanpham ORDER BY id_SanPham DESC LIMIT 3";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	//gợi ý luật kết hợp
	//Gợi ý luật kết hợp
	function LuatKetHop($id_chitietloai){
		$sql = "SELECT * FROM luatkethop WHERE id_Sp = $id_chitietloai";
			$this->setQuery($sql);
			return $this->loadRow(array($id_chitietloai));
		}

	function getSanPhamByLKH($id_chitietloai){
		$sql = "SELECT sanpham.* , COUNT(sanpham.id_SanPham) as dem FROM sanpham LEFT JOIN chitietdonhang ON sanpham.id_SanPham = chitietdonhang.id_sp WHERE sanpham.id_ChiTietLoai = $id_chitietloai GROUP BY sanpham.id_SanPham ORDER BY dem DESC LIMIT 3";
			$this->setQuery($sql);
			return $this->loadAllRows();
	}

}

?>
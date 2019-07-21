<?php 
include ('database.php');
/**
 * 
 */
class M_shop extends database
{
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
		
// end load danh mục sản phẩm lên menu
	//lấy tất cả sản phẩm của shop
	function getSanPhamByIdUser($id_user,$vitri=-1,$limit=-1){
			$sql = "SELECT * FROM sanpham WHERE id_User = $id_user";
			if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_user));
		}
	function getThongTinUser($id_user){
		$sql = "SELECT * FROM users WHERE id_User = $id_user";
		$this->setQuery($sql);
			return $this->loadRow(array($id_user));
	}

	//lấy id chi tiết loại sản phẩm của shop
	function getIdChiTietLoai($id_user){
		$sql = "SELECT id_ChiTietLoai FROM sanpham WHERE id_User = $id_user GROUP BY id_ChiTietLoai";
		$this->setQuery($sql);
		return $this->loadAllRows(array($id_user));
	}

	//lấy 9 sản phẩm mới
	function getSanPhamNew($id_user){
		$sql = "SELECT * FROM sanpham WHERE id_User = $id_user ORDER BY id_SanPham DESC LIMIT 10";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	//tìm kiếm sản phẩm
	function TimKiem($key,$id_user,$vitri=-1,$limit=-1){

		$sql = "SELECT * FROM sanpham WHERE TenSanpham LIKE '%$key%' AND id_User ='$id_user'";
		if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->setQuery($sql);
			return $this->loadAllRows(array());

	}

	// lấy 5 sản phảm HOT
	function getSanPhamHT($id_user){
			$sql = "SELECT sanpham.* , COUNT(sanpham.id_SanPham) as dem FROM sanpham LEFT JOIN chitietdonhang ON sanpham.id_SanPham = chitietdonhang.id_sp  WHERE sanpham.id_User = $id_user GROUP BY sanpham.id_SanPham ORDER BY dem DESC LIMIT 5";
			$this->setQuery($sql);
			return $this->loadAllRows(array());
		}
}
?>
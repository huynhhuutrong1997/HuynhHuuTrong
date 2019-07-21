<?php
include ('database.php');
/**
 * 
 */
class M_themsanpham extends database
{
	
	function getDienThoai(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getMayTinhBang(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 2";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getThietBiAmThanh(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 3";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getLapTop(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 4";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getMayTinhDeBan(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 5";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getPhuKienDiDong(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 6";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getPhuKienMayTinh(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 7";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getThietBiMang(){
		$sql ="SELECT * FROM chitietloaisanpham WHERE id_LoaiSanPham = 8";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	//thêm sản phẩm
	function insertSanPham($tensp, $hinh, $hinh1, $hinh2, $chitietsp, $mota, $gia, $kho, $id_chitietloai, $id_user){
		$sql ="INSERT INTO sanpham(TenSanPham,Hinh,Hinh1,Hinh2,ChiTietSanPham,MoTa,Gia,Kho,id_ChiTietLoai,id_User) VALUES (?,?,?,?,?,?,?,?,?,?)";

		$this->setQuery($sql);
		$result = $this->execute(array($tensp, $hinh, $hinh1, $hinh2, $chitietsp,$mota, $gia, $kho, $id_chitietloai, $id_user));
		if($result){
			return $this->getLastId();
		}else{
			return false;
		}
	}
}
?>
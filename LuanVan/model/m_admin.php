<?php 
	class Databasee
	{
		private $hostname='localhost';
		private $username='root';
		private $pass='';
		private $dbname='shopmultisellerv1';

		private $conn = NULL;
		private $result = NULL;

		public function connect(){
			$this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
			if(!$this->conn){
				echo "ô hay, gì thế này !";
				return false;
			}
			else{
				// mysqli_set_charset($this->conn,'utf-8');
				$this->conn->query('set names "utf8"');
			}
			return $this->conn;
		}
//thực hiện câu lệnh truy vấn
		public function execute($sql){
			$this->result=$this->conn->query($sql);
			return $this->result;
		}
		//lấy dữ liệu
		function getData(){
			if ($this->result) {
				$data= mysqli_fetch_array($this->result);
			}
			else{
				$data=0;
			}
			return $data;
		}
		// lấy toàn bộ dữ liệu
		public function getAllData($table,$id_User){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_User = '$id_User'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}

		// lấy toàn bộ dữ liệu phân trang
		public function getAllDataLiMit($table,$id_User,$vitri=-1,$limit=-1){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_User = '$id_User' ORDER BY id_SanPham DESC";
			if($vitri>-1 && $limit>1){
				$sql.=" limit $vitri, $limit";
			}
			$this->execute($sql);
			if($this->num_rows()==0){
				$data= array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}

		//tìm kiếm sản phâm trong quản lý
		// lấy toàn bộ dữ liệu phân trang
		public function TimKiemSanPham($id_User,$key){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM sanpham  WHERE (id_User = '$id_User' AND TenSanpham LIKE '%$key%') OR (id_SanPham = '$key' and id_User = '$id_User')";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data= array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//get data order admin
		public function getDataOrder($table,$key){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_shop in ($key)";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;
		}
		//end
		//insert lkh
		public function insertLKH($sql){
			$this->execute($sql);
		}
		//end
		//get all data donhang
		public function getAllDataOrder($table){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table ORDER BY id DESC";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//end
		// get chi tiết đơn hàng
		public function getChiTietDonHang($id_donhang){
			$sql="SELECT chitietdonhang.* , sanpham.id_SanPham as id_SanPham, sanpham.TenSanPham as TenSanPham,sanpham.Hinh as Hinh ,sanpham.Gia as Gia FROM chitietdonhang INNER JOIN sanpham ON chitietdonhang.id_sp = sanpham.id_SanPham WHERE chitietdonhang.id_donhang = '$id_donhang'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//lay id sanpham trong donhang
		public function getIdSpAll($table,$id_donhang){
			$sql="SELECT * FROM $table  WHERE id_donhang = '$id_donhang'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		public function getDongHang($id_donhang){
			$sql="SELECT * FROM donhang  WHERE id = '$id_donhang'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data=$datas;
				}
			}
			return $data;

		}
		//end
		//lay thông tin khach hang
		public function getThongTinKH($id_user){
			$sql="SELECT * FROM users  WHERE id_User = '$id_user'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//getdata order admin
		public function getDataOrderAdmin($table,$key,$trangthai){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_shop in ($key) and Status='$trangthai' ORDER BY id DESC ";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//end
		//get gio hang
		public function getDataCard($table,$id_sp){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM sanpham 
                WHERE id_SanPham = '$id_sp'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=0;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//hover gio hang
		public function getDataAllCard($sql){	
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=0;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//load add product
		public function getDataCardAdd($table,$id_SP){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_SanPham = '$id_SP'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=0;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;
		}
		//get sanpham in key
		public function getKeyCardAll($table,$id_SP,$key){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_SanPham in ($key)";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;
		}
		//end
		
		//đếm số bản ghi
		function num_rows(){
			if ($this->result) {
				$num = mysqli_num_rows($this->result);
			}
			else {
				$num=0;
			}
			return $num;
		}
		//thêm dữ liệu
		public function InsertData($hoten,$namsinh,$quequan){
			$sql="INSERT INTO thanhvien(id,hoten,namsinh,quequan) values(null,'$hoten','$namsinh','$quequan') ";
			return $this->execute($sql);
		}
		public function InsertDataLKH($id_SP,$table,$date_create){
			$sql="INSERT INTO $table values(null,'$id_SP','$date_create') ";
			return $this->execute($sql);
		}
		//update status
		public function UpdateStatusOrder($id,$status,$table){
			$sql="UPDATE $table SET status='$status' WHERE id='$id' ";
			return $this->execute($sql);
		}
		//end

		//thêm don hang
		public function InsertProduct($id_user,$diachigiaohang,$sdt,$tenkh,$soluong,$tongtien,$id_shop,$num_key,$date){
			$sql="INSERT INTO donhang values(null,'$id_user','$diachigiaohang','$sdt','$tenkh','Chưa Xác Nhận','$soluong','$tongtien','$id_shop','$num_key','$date','')";
			return $this->execute($sql);
		}
		//end them đơn hàng
		//getdonhang
		public function getOrderUser($table,$id_User){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_User = '$id_User' and Status!='Đã Hủy' ORDER BY id DESC";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=null;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//start
		//getlichsu
		public function getAllHistory($sql){
			// $sql="SELECT * FROM $table";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=null;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//start
		public function getLoaiSP($table,$id_SP){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_SanPham = '$id_SP'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=null;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//end
		//start
		public function getAllLichSu($table){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table ";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=null;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//end
		//end
		//get order del
		public function getOrderUserDel($table,$id_User,$id_donhang){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_User = '$id_User' and id='$id_donhang'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=null;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//end
		//update huy order
		public function UpdateStatusOrderDel($id,$status,$table,$date,$lydo){
			$sql="UPDATE $table SET status='$status',date_Created='$date',LyDoHuy='$lydo' WHERE id='$id' ";
			return $this->execute($sql);
		}
		//end
		//ordercancel
		public function getOrderUserCancel($table,$id_User){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM $table  WHERE id_User = '$id_User'and Status='Đã Hủy'";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=null;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}
		//end
		//select id donhang
		public function getIdDonhang($table,$id_user){
			// $sql="SELECT * FROM $table";
			$sql="SELECT * FROM `donhang` WHERE id_User= '$id_user' ORDER by id DESC LIMIT 1";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=0;
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;
		}
		//end
		//them chitietdonhang
		public function InsertBuil($id_donhang,$id_sp,$soluong,$dongia){
			$sql="INSERT INTO chitietdonhang values(null,'$id_donhang','$id_sp','$soluong','$dongia',0)";
			return $this->execute($sql);
		}
		//end

		public function Updata($id,$hoten,$namsinh,$quequan){
			$sql="UPDATE thanhvien SET hoten ='$hoten',namsinh='$namsinh',quequan='$quequan' where id ='$id'";
			return $this->execute($sql);
		}

		public function Delete($id){
			$sql="DELETE FROM thanhvien where id='$id' ";
			return $this->execute($sql);
		}

		// lấy bình luận theo id shop
		public function getBinhLuan($id_user){
			
			$sql="SELECT binhluan.NoiDung as NoiDung, binhluan.id_SanPham as id_SanPham , binhluan.ThoiGian as ThoiGian FROM binhluan INNER JOIN traloi ON binhluan.id_BinhLuan = traloi.id_BinhLuan WHERE traloi.id_User = '$id_user' AND traloi.NoiDungTraLoi =''";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data=array();
			}
			else {
				while ($datas=$this->getData()){
					$data[]=$datas;
				}
			}
			return $data;

		}

		public function UpdateShop($id_user,$tenshop,$diachi,$sdt,$anhbia,$avatar,$banner){
			$sql="UPDATE users SET TenShop='$tenshop', DiaChi = '$diachi', SDT = '$sdt', Avatar = '$avatar', AnhBia = '$anhbia', Banner = '$banner' WHERE id_User ='$id_user' ";
			return $this->execute($sql);
		}

		

	}
?>
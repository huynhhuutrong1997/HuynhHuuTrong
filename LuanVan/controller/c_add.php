<?php
	session_start();
	include_once("../Model/m_admin.php");
	include_once("../Model/m_sanpham.php");
	$m_sanpham = new M_sanpham();
	$thietbidientu = $m_sanpham->getDMThietBiDienTu();
	$phukiendientu = $m_sanpham->getDMPhuKienDienTu();
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
	if (isset($_SESSION['id_user'])) {
	$thongtinuser = $m_sanpham->getUser($_SESSION['id_user']);

	}
	switch ($action) {
		case 'load':{
			// $tblTable="sanpham";
			// $data=$db->getDataCard($tblTable,$_GET['id_sanpham']);
			require_once('../View/card/load.php');
			break;
		}
		case 'add':{
			$tblTable="sanpham";
			$data=$db->getDataCard($tblTable,$_GET['id_sanpham']);
			require_once('../View/card/add.php');
			break;
		}
		case 'donhang':{
			if (isset($_SESSION['id_user'])) {
				$tblTable="donhang";
				$datat=$db->getOrderUser($tblTable,$_SESSION['id_user']);
			}
			else{
				$datat=null;
			}
			require_once('../View/user/donhang.php');
			break;
		}
		case 'chitietdonhang':{
			$id_donhang = $_GET['id_donhang'];
			$chitietdonhang = $db->getChiTietDonHang($id_donhang);
			$donhang = $db->getDongHang($id_donhang);
			require_once('../View/user/chitietdonhang.php');
			break;
		}
		case 'chitietordercancel':{
			$tblTable="chitietdonhang";
			$dataID=$db->getIdSpAll($tblTable,$_GET['id_donhang']);
			$string='';
			foreach ($dataID as $value) {
				$string.=$value['id_sp'].',';
				$key=substr($string, 0, -1);
            }
            $tblTable="sanpham";
            $dataCart=$db->getKeyCardAll($tblTable,$value['id_sp'],$key);
            $tblTable="donhang";
			$datacancel=$db->getOrderUserDel($tblTable,$_SESSION['id_user'],$_GET['id_donhang']);
			require_once('../View/user/chitietordercancel.php');
			break;
		}
		case 'ct_card':{
			if (isset($_SESSION['id_user'])) {
				$id=$_SESSION['id_user'];
				$tblTable="users";
				$data_card=$db->getAllData($tblTable,$id);
			}
			else{
				$id=null;
				$data=null;
			}
			require_once('../View/card/chitiet_card.php');
			break;
		}
		case 'add_quantity':{
			$id_add=$_GET['id_add'];
			$_SESSION['cart'][$id_add]['quantity']++;
			echo ("<script LANGUAGE='JavaScript'>
		    window.location.href='c_add.php?action=ct_card';
		    </script>");
			break;
		}
		case 'del_quantity':{
			$id_add=$_GET['id_add'];
			$_SESSION['cart'][$id_add]['quantity']--;
			echo ("<script LANGUAGE='JavaScript'>
		    window.location.href='c_add.php?action=ct_card';
		    </script>");
			break;
		}
		case 'unset':{
			$idunset=$_GET['id'];
			unset($_SESSION['cart'][$idunset]);
			if ($_SESSION['cart']!=null) {
				if (isset($_SESSION['id_user'])) {
				$id=$_SESSION['id_user'];
				$tblTable="users";
				$data_card=$db->getAllData($tblTable,$id);
				}
				else{
					$id=null;
					$data=null;
				}
				require_once('../View/card/chitiet_card.php');
			}
			else {
				require_once('../View/card/cart_error.php');
			}
						
			break;
		}
		case 'xacnhandonhang':{
			if (isset($_POST['xacnhan'])&&($_SESSION['cart']!=null)) {
				$id_user=$_SESSION['id_user'];
				$name=$_POST['name'];
				$addressgh=$_POST['addressgh'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$date=date('Y-m-d H:i:s');
				if (isset($_SESSION['cart'])) {
					$ids[]='';
					$id_s='';
					foreach ($_SESSION['cart'] as $value) {
						$ids[]=$value['id_shop'];
					}
					$ids=array_unique($ids);
					foreach ($ids as $value) {
						$id_s.=$value.',';
					}
					$id_s=substr($id_s, 1, -1);			
				}
				$id_s = explode(",", $id_s);
				foreach ($id_s as $value) {
					$sl_items=0;
					$sum=0;
					$num_key=mt_rand();
					if($value!=0){
						foreach ($_SESSION['cart'] as $values) {
							if ($value==$values['id_shop']) {
								$sl_items+=$values['quantity'];
								$sum+=$values['quantity']*$values['price'];
							}
						}
					$db->InsertProduct($id_user,$addressgh,$phone,$name,$sl_items,$sum,$value,$num_key,$date);
						$tblTable="donhang";
						$data=$db->getIdDonhang($tblTable,$id_user);
						foreach ($data as  $value) {
							if ($value['NumKey']==$num_key) {
								$id_buil=$value['id'];
								$_SESSION['numkey'][$value['id']]=array(
									"id"=>$id_buil,
									"id_shop"=>$value['id_Shop']
								);
							}
						}
					}			
				}
				$str='';
				foreach ($_SESSION['cart'] as $value) {
					$id_SanPham=$db->getLoaiSP('sanpham',$value['id']);
					foreach ($id_SanPham as $value) {
						$str.=$value['id_ChiTietLoai'].',';
					}
				}
				$str=substr($str, 0, -1);
				$date_create=date('Y-m-d H:i:s');
				$db->InsertDataLKH($str,'LichSu',$date_create); 
				foreach ($_SESSION['numkey'] as $value) {
					if ($value!=0) {
						foreach ($_SESSION['cart'] as $values) {
							if ($value['id_shop']==$values['id_shop']) {
								$id_donhang=$value['id'];
								$idsp=$values['id'];
								$soluong=$values['quantity'];
								$dongia=$values['quantity']*$values['price'];
								$db->InsertBuil($id_donhang,$idsp,$soluong,$dongia);
							}
						}
					}
				}
			}
			unset($_SESSION['cart']);
			unset($_SESSION['numkey']);
			require_once('../view/card/xacnhan.php');
			break;
		}
		case 'removedonhang':{
			if (isset($_POST['delorder'])) {
				$id=$_GET['id'];
				$lydo= $_POST['LyDoHuy'];
				$status_update='Đã Hủy';
				$date=date('Y-m-d H:i:s');
				$tblTable="donhang";
		 		$data=$db->UpdateStatusOrderDel($id,$status_update,$tblTable,$date,$lydo);
		 		require_once('../View/user/huydonhang.php');
			}
		 	break;
		 }
		case 'huydonhang':{
			if ($_GET['status']=='Chưa Xác Nhận') {
				$tblTable="donhang";
				$data=$db->getOrderUserDel($tblTable,$_SESSION['id_user'],$_GET['id_donhang']);
				require_once('../View/user/formdelorder.php');
			}else {
				require_once('../View/user/fail.php');
			}
			break;
		}
		case 'ordercancel':{
			$tblTable="donhang";
			$datac=$db->getOrderUserCancel($tblTable,$_SESSION['id_user']);
			require_once('../View/user/ordercancel.php');
			break;
		}
		// default : {
		// 	$tblTable="sanpham";
		// 	$data=$db->getDataCard($tblTable,$_GET['id_sanpham']);
		// 	require_once('View/card/card.php');
		// }
	}
?>

<!-- //đơn hàng
id idkhachhang diachigiaohang sdt tổngtiền 

//chitietdonhang
id iddonhang idsp soluong gia -->
<?php
	session_start();
	include_once("../Model/m_admin.php");
	include_once("../Model/apriori.php");
	$db=new Database;
	$db->connect();
	if (isset($_GET['action'])) {
		$action=$_GET['action'];
	}
	else {
		$action='';
	}
	switch ($action) {
		case 'user': {
			$sql="SELECT * FROM users WHERE Active !=2 and TenShop =''";
			$users=$db->getAllData($sql);			
			require_once('../View/user.php');
			break;
		}
		case 'KichHoat':{
			$id=$_GET['id'];
			$sql="UPDATE users SET Active=1,Ma=0 WHERE id_User='$id'";
			$enable=$db->querysql($sql);
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Tài khoản này đã được kích hoạt!');
		    window.location.href='c_admin.php?action=user';
		    </script>");
			break;
		}
		case 'shop': {
			$sql="SELECT * FROM users WHERE Active in (1,4)";
			$users=$db->getAllData($sql);			
			require_once('../View/shop.php');
			break;
		}
		case 'index': {		
			$sqlm="SELECT count(*) FROM users WHERE Active !=2";	
			$dbusers=$db->querydb($sqlm);
			$sqls="SELECT count(*) FROM users WHERE TenShop!=''";	
			$dbshop=$db->querydb($sqls);
			foreach ($dbusers as  $value) {
				$countus=$value['count(*)'];
			}
			foreach ($dbshop as  $shop) {
				$countsh=$shop['count(*)'];
			}
			$tongtien=0;
			$sqlmoney="SELECT * FROM donhang WHERE Status='Đã Giao Hàng'";
			$dbmoney=$db->querydb($sqlmoney);
			foreach ($dbmoney as $money) {
				$tongtien+=$money['TongTien'];
			}
			$tongtien=number_format($tongtien).'  VNĐ';
			require_once('index.php');
			break;
		}
		case 'login': {
			if (isset($_POST['login'])) {
				$sql="SELECT * FROM users WHERE Active=2";
				$loginadmin=$db->getAllData($sql);
				foreach ($loginadmin as  $value) {
					if ($value['Email']==$_POST['userName']) {
						if ($value['MatKhau']==md5($_POST['Password'])) {
							$_SESSION['userName']=$value['HoTen'];
							require_once('index.php');
							// header('location:index.php');
						}
						else {
							$mes='Mật khẩu không khớp!';
							require_once('login.php');
						}
					}
					else {
						$mes='Tài khoản không tồn tại';
						require_once('login.php');
					}
				}
			}
			// require_once('index.php');
			break;
		}
		case 'logout':{
			unset($_SESSION['userName']);
			require_once('login.php');
			break;
		}
		case 'System': {
			$sql="SELECT * FROM luatkethop";
			$dbapriori=$db->querydb($sql);
			$sqlname="SELECT * FROM chitietloaisanpham";
			$dbname=$db->querydb($sqlname);
			require_once('../View/systemapriori.php');
			break;
		}
		case 'updateapriori': {
			require_once('../View/systemapriori.php');
			break;
		}
		case 'code':{
			require_once('../View/activecode.php');
			break;
		}	
		case 'verifycode':{
			if (isset($_POST['submitcode'])) {
				if ($_SESSION["security_code"]==$_POST['txtCaptcha']){
					$Apriori = new Apriori();
					$Apriori->setMaxScan(20);       //Scan 2, 3, ...
					$Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
					$Apriori->setMinConf($_POST['conf']);       //Minimum confidence - Percent 
					$Apriori->setDelimiter(',');    //Delimiter 
					$sql="SELECT * FROM LichSu WHERE create_at BETWEEN '2019-1-1 00:00:00' AND '2019-12-30 00:00:00'";
					// $sql="SELECT * FROM LichSu ";
					$LichSu=$db->getAllHistory($sql);
					// var_dump($LichSu);exit();
					$swapd=[];
					// echo 'array Lịch Sử---------------------------------------'.'</br>';
					if ($LichSu!=null) {
						foreach ($LichSu as $value) {
							$swapd[]=$value['id_Item'];
						}
					}
					$str='';
					foreach ($swapd as  $value) {
						$str.='"'.$value.'"'.',';

					}
					$str=substr($str, 0,-1);
					
					$Apriori->process($swapd);
					$st='';
					$st.=$Apriori->echoContent();
					$st=explode(':', $st);
					$ars_key=[];
					$ars_st=[];
					$str_count=[];
					for ($i=0; $i <count($st)-1 ; $i++) { 
						$ars=explode('=>', $st[$i]);
						//echo $ars[0].'=>'.$ars[1].'<br/>';
						$arrs=explode(',', $ars[0]);
						$arsr=explode('=', $ars[1]);
						foreach ($arrs as $value) {
							$item1=preg_replace('/\s+/', '', $value);
							$item2=preg_replace('/\s+/', '', $arsr[0]);
							$conf=explode('%',preg_replace('/\s+/', '', $arsr[1]));
							$item3=$conf[0];
							$_SESSION['list'][]= array(
								'idsp' =>$item1, 
								'str' =>$item2, 
								'conf' =>$item3
							);
						}
						// echo '-----------------------------------------'.'<br/>';
						
					}
					$ar_list='';
					// if (isset($_SESSION['list'])) {
						
					// }
					foreach ($_SESSION['list'] as  $value) {
						//echo $value['idsp'].'=>'.$value['str'].'='.$value['conf'].'<br/>';
						$ar_list.=$value['idsp'].',';
					}
					$sessTemp = $_SESSION['list'];
					$index_delete = Array();
					// echo '-----------------------------------------'.'<br/>';

					for ($i=0; $i < count($sessTemp); $i++) { 
						for ($j=$i+1; $j < count($sessTemp); $j++){
							if($sessTemp[$i]['idsp']==$sessTemp[$j]['idsp']){
								if($sessTemp[$i]['str']==$sessTemp[$j]['str']){
									if($sessTemp[$i]['conf']==$sessTemp[$j]['conf']){
										array_push($index_delete, $i);
									}elseif($sessTemp[$i]['conf']>$sessTemp[$j]['conf']){
										array_push($index_delete, $j);
									}elseif($sessTemp[$i]['conf']<$sessTemp[$j]['conf']){
										array_push($index_delete, $i);
									}
								}
							}
						}
					}

					//in nhung cai can xoa
					// foreach ($index_delete as $key => $value) {
					// 	echo $value." ";
					// }
					//loc bo nhung phan tu trung
					$index_delete_2 = array_unique($index_delete);

					//xoa
					foreach ($index_delete_2 as $value) {
						unset($sessTemp[$value]);
					}
					//done
					$sql1="DELETE  FROM `luatkethop`";
					$db->insertLKH($sql1);
					$sql5="ALTER TABLE luatkethop AUTO_INCREMENT = 1";		
					$db->insertLKH($sql5);
					if ($sessTemp!=null) {
						foreach ($sessTemp as  $value) {
							//echo $value['idsp'].'=>'.$value['str'].'='.$value['conf'].'<br/>';
							$index=$value['idsp'];
							$index1=$value['str'];
							$index2=$value['conf'];
							$sql2="INSERT INTO luatkethop VALUES(NULL,'$index','$index1','$index2')";
							$query=$db->insertLKH($sql2);
						}
					}
					unset($_SESSION['list']);
					echo ("<script LANGUAGE='JavaScript'>
				    window.alert('Update thành công Apriori.');
				    window.location.href='c_admin.php?action=System';
				    </script>");
				}
				else {
					$mess='Mã Code không đúng, vui lòng nhập lại !';
					require_once('../View/activecode.php');
				}
			}
			break;
		}
		case 'Disable':{
			$id=$_GET['id'];
			$sql="UPDATE users SET Active=3 WHERE id_User='$id'";
			$enable=$db->querysql($sql);
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Người dùng này đã bị cấm !');
		    window.location.href='c_admin.php?action=user';
		    </script>");
			break;
		}
		case 'Enablesh':{
			$id=$_GET['id'];
			$sql="UPDATE users SET Active=1 WHERE id_User='$id'";
			$enable=$db->querysql($sql);
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Đã hủy cấm người dùng này !');
		    window.location.href='c_admin.php?action=user';
		    </script>");
			break;
		}
		case 'Disables':{
			$id=$_GET['id'];
			$sql="UPDATE users SET Active=4 WHERE id_User='$id'";
			$enable=$db->querysql($sql);
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Người dùng này đã bị cấm !');
		    window.location.href='c_admin.php?action=shop';
		    </script>");
			break;
		}
		case 'Enableshs':{
			$id=$_GET['id'];
			$sql="UPDATE users SET Active=1 WHERE id_User='$id'";
			$enable=$db->querysql($sql);
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Đã hủy cấm người dùng này !');
		    window.location.href='c_admin.php?action=shop';
		    </script>");
			break;
		}
		case 'RDApriori':{
			require_once('../View/AprioriJS/index.html');
			break;
		}
	}
?>
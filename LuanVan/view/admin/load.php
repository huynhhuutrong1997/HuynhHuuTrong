<?php 
foreach ($datas as $value) {
	echo $value['id'].'</br>';
}

echo $_SESSION['id_user'];
//var_dump($datas);
// $key='';
// $key_id='';
// $tam='';
// foreach ($data as $value) {
	
// 	$key=$value['id_shop'];
// 	//echo $key.'</br>';
// 	$key=explode(",", $key);
// 	if (in_array("1", $key)) {
// 	//$tam.="'".'{'.$value['id_shop'].'}'."'".',';
// 	$tam.="'".$value['id_shop']."'".',';
// 	// 	//echo $key;
//    	}	
// }
// echo $tam=substr($tam, 0,-1);
//echo $search_key;

?>
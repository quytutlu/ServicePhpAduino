<?php 
	include_once "BLL.php";
	include_once "Object/TrangThai.php";
	$XuLyNV=new XuLyNghiepVu();
	$cmd;
	if(isset($_GET["cmd"]))
	{
		$cmd=$_GET["cmd"];
		$cmd=strtolower($cmd);
		switch ($cmd) {
		case "batbongden":
			$result=$XuLyNV->BatBongDen();
			if($result==1)
			{
				$KetQua=json_encode(array('success'=>true));
				echo $KetQua;
			}
			else
			{
				$KetQua=json_encode(array('success'=>false));
				echo $KetQua;
			}
			break;
		case "tatbongden":
			$result=$XuLyNV->TatBongDen();
			if($result==1)
			{
				$KetQua=json_encode(array('success'=>true));
				echo $KetQua;
			}
			else
			{
				$KetQua=json_encode(array('success'=>false));
				echo $KetQua;
			}
			break;
		case "laytrangthai":
			if(isset($_GET["arduino"]))
			{
				if(isset($_GET["nhietdo"]))
				{
					$XuLyNV->UpdateNhietDo($_GET["nhietdo"]);
				}
			}
			$ListTrangThai=$XuLyNV->LayTrangThai();
			$Len=count($ListTrangThai);
			$KetQua=json_encode(array('list'=>$ListTrangThai));
			echo $KetQua;
			break;
		}
	}
	else
	{
		echo "khong nhan duoc lenh";
	}
	
 ?>
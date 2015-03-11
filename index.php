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
		case "batdieuhoa":
			$result=$XuLyNV->BatDieuHoa();
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
		case "tatdieuhoa":
			$result=$XuLyNV->TatDieuHoa();
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
				if(isset($_GET["congtac"]))
				{
					if($_GET["congtac"]==1)
					{
						$XuLyNV->BatBongDen();	
					}
					else
					{
						$XuLyNV->TatBongDen();
					}					
				}
			}
			$ListTrangThai=$XuLyNV->LayTrangThai();
			$Len=count($ListTrangThai);
			$KetQua=json_encode(array('list'=>$ListTrangThai));
			echo $KetQua;
			break;
		case "capnhattrangthai":
			$result=$XuLyNV->UpdateStt($_GET["mastt"]);
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
		case "dangnhap":
			$TenDangNhap;
			$MatKhau;
			if(isset($_GET["tendangnhap"]))	
			{
				$TenDangNhap=$_GET["tendangnhap"];
			}
			if(isset($_GET["matkhau"]))
			{
				$MatKhau=$_GET["matkhau"];
			}
			echo json_encode(array("success"=>$XuLyNV->DangNhap($TenDangNhap,$MatKhau)));
			break;
		}
	}
	else
	{
		echo "khong nhan duoc lenh";
	}
	
 ?>
<?php 
	include_once "BLL.php";
	include_once "Object/TrangThai.php";
	$XuLyNV=new XuLyNghiepVu();
	function Display($key,$value)
	{
		$KetQua=json_encode(array($key=>$value));
		echo $KetQua;
	}
	$cmd;
	if(isset($_GET["cmd"]))
	{
		$cmd=$_GET["cmd"];
		$cmd=strtolower($cmd);
		switch ($cmd) {
		case "batthietbi":
			if(isset($_GET["tenthietbi"]))
			{
				$result=$XuLyNV->BatThietBi($_GET["tenthietbi"]);
				Display("success",$result);
			}
			break;
		case "tatthietbi":
			if(isset($_GET["tenthietbi"]))
			{
				$result=$XuLyNV->TatThietBi($_GET["tenthietbi"]);
				Display("success",$result);
			}
			break;
		case "rangoai":
			$result=$XuLyNV->RaNgoai();
			Display("success",$result);
			break;
		case "laytrangthaiarduino":
			$NhietDo=$_GET["nhietdo"];
			$XuLyNV->UpdateNhietDo($NhietDo);
			$ListTrangThai=$XuLyNV->LayTrangThai("arduino",$NhietDo);
			Display("list",$ListTrangThai);
			break;
		case "laytrangthai":
			$ListTrangThai=$XuLyNV->LayTrangThai("khac");
			Display("list",$ListTrangThai);
			break;
		case "capnhattrangthai":
			$result=$XuLyNV->UpdateStt($_GET["mastt"]);
			Display("success",$result);
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
			Display("success",$XuLyNV->DangNhap($TenDangNhap,$MatKhau));
			break;
		}
	}
	else
	{
		echo "khong nhan duoc lenh";
	}
	
 ?>
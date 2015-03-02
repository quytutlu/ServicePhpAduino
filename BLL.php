<?php
	include_once "DAL.php";
	include_once "Object/TrangThai.php";
	class XuLyNghiepVu
	{
		private $ThaoTacCSDL;
		public function XuLyNghiepVu()
		{
			$this->ThaoTacCSDL=new TruyXuatDuLieu();
		}
		public function BatBongDen()
		{
			return $this->ThaoTacCSDL->BatBongDen();
		}
		public function TatBongDen()
		{
			return $this->ThaoTacCSDL->TatBongDen();
		}
		public function LayTrangThai()
		{
			$kq=$this->ThaoTacCSDL->LayTrangThai();
			$ListTrangThai;
			while($row=mysql_fetch_array($kq))
			{
				$temp=new TrangThaiThietBi();
				$temp->TenThietBi=$row[1];
				$temp->TrangThai=$row[2];
				$ListTrangThai[]=$temp;
			}
			return $ListTrangThai;
		}
		public function UpdateNhietDo($NhietDo)
		{
			$this->ThaoTacCSDL->UpdateNhietDo($NhietDo);
		}
	}
?>
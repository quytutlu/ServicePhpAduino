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
		public function BatDieuHoa()
		{
			return $this->ThaoTacCSDL->BatDieuHoa();
		}
		public function TatDieuHoa()
		{
			return $this->ThaoTacCSDL->TatDieuHoa();
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
		private function GuiEmail()
		{
			//echo "Da gui email";
		}
		public function UpdateNhietDo($NhietDo)
		{
			$this->ThaoTacCSDL->UpdateNhietDo($NhietDo);
			if($NhietDo>40)
			{
				$kq=$this->ThaoTacCSDL->KiemTraCoNguoi();
				$row=mysql_fetch_array($kq);
				if($row[1]==0)
				{
					//echo "Da gui mail";
					$this->GuiEmail();
				}
				else
				{
					echo "bao dong chay";
				}
			}
			if($NhietDo>35&&$NhietDo<40)
			{
				$kq=$this->ThaoTacCSDL->KiemTraCoNguoi();
				$row=mysql_fetch_array($kq);
				if($row[1]==1)
				{
					$this->BatDieuHoa();
				}
			}
		}
		public function UpdateStt($MaStt)
		{
			return $this->ThaoTacCSDL->UpdateStt($MaStt);
		} 
		public function DangNhap($TenDangNhap,$MatKhau)
		{
			$kq=$this->ThaoTacCSDL->DangNhap($TenDangNhap,$MatKhau);
			return mysql_num_rows($kq)==1;
		}
	}
?>
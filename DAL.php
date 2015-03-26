<?php
	class TruyXuatDuLieu
	{
		private $conn;
		public function TruyXuatDuLieu()
		{
			$conn=mysql_connect("localhost","root","60648994t");
			mysql_select_db("Arduino",$conn);
		}
		public function CloseDB()
		{
			mysql_close();
		}
		public function BatThietBi($TenThietBi)
		{
			$sql="Call BatThietBi(\"".$TenThietBi."\")";
			return mysql_query($sql);
		}
		public function TatThietBi($TenThietBi)
		{
			$sql="Call TatThietBi(\"".$TenThietBi."\")";
			return mysql_query($sql);
		}
		public function RaNgoai()
		{
			$sql="Call RaNgoai()";
			return mysql_query($sql);
		}
		public function LayTrangThai($cmd)
		{
			$sql;
			if($cmd=="arduino")
			{
				$sql="Call LayTrangThaiArduino()";
			}
			else
			{
				$sql="Call LayTrangThai()";				
			}
			return mysql_query($sql);
		}
		public function UpdateNhietDo($NhietDo)
		{
			$sql="Call UpdateNhietDo(".$NhietDo.")";
			return mysql_query($sql);
		}
		public function UpdateStt($MaStt)
		{
			$sql="Call UpdateStt(".$MaStt.")";
			return mysql_query($sql);
		}
		public function DangNhap($TenDangNhap,$MatKhau)
		{
			$sql="Call DangNhap(\"".$TenDangNhap."\",\"".$MatKhau."\")";
			return mysql_query($sql);
		}
		public function KiemTraCoNguoi()
		{
			$sql="select TenThietBi,TrangThai from ThietBi where TenThietBi=\"CoNguoiONha\"";
			return mysql_query($sql);
		}
		public function LayEmail()
		{
			$sql="select email from thongtinnguoidung";
			return mysql_query($sql);			
		}
	}
?>
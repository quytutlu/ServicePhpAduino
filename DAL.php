<?php
	class TruyXuatDuLieu
	{
		private $conn;
		public function TruyXuatDuLieu()
		{
			$conn=mysql_connect("localhost","root");
			mysql_select_db("Arduino",$conn);
		}
		public function CloseBD()
		{
			mysql_close();
		}
		public function BatBongDen()
		{
			$sql="Call BatBongDen()";
			return mysql_query($sql);
		}
		public function TatBongDen()
		{
			$sql="Call TatBongDen()";
			return mysql_query($sql);
		}
		public function BatDieuHoa()
		{
			$sql="Call BatDieuHoa()";
			return mysql_query($sql);
		}
		public function TatDieuHoa()
		{
			$sql="Call TatDieuHoa()";
			return mysql_query($sql);
		}
		public function LayTrangThai()
		{
			$sql="Call LayTrangThai()";
			return mysql_query($sql);
		}
		public function UpdateNhietDo($NhietDo)
		{
			$sql="Call UpdateNhietDo(".$NhietDo.")";
			mysql_query($sql);
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
			$sql="select * from trangthai";
			return mysql_query($sql);	
		}
		public function LayEmail()
		{
			$sql="Call LayEmail()";
			return mysql_query($sql);			
		}
	}
?>
<?php
	class TruyXuatDuLieu
	{
		private $conn;
		public function TruyXuatDuLieu()
		{
			$conn=mysql_connect("localhost","root");
			mysql_select_db("Arduino",$conn);
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
		public function LayTrangThai()
		{
			$sql="Call LayTrangThai()";
			return mysql_query($sql);
		}
		public function UpdateNhietDo($NhietDo)
		{
			$sql="Call UpdateNhietDo(".$NhietDo.")";
			echo $sql;
			mysql_query($sql);
		}
		public function DangNhap($TenDangNhap,$MatKhau)
		{
			$sql=@"Call DangNhap(\"".$TenDangNhap."\",\"".$MatKhau."\")";
			return mysql_query($sql);
		}
	}
?>
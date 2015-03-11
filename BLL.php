<?php
	include_once "DAL.php";
	include_once "Object/TrangThai.php";
	require 'PHPMailer/PHPMailerAutoload.php';
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
		private function LayEmail()
		{
			$kq=$this->ThaoTacCSDL->LayEmail();
			return mysql_fetch_array($kq)[0];
		}
		public function GuiEmail($NhietDo)
		{
			$email=$this->LayEmail();
			$mail = new PHPMailer();
			// Thiết lập SMTP
			$mail->IsSMTP();                // thiết lập 1 kết nối đến SMTP
			$mail->IsHTML(true);
			//$mail->SMTPDebug  = 2;        // in ra màn hình thông tin debug
			$mail->SMTPAuth = true;        	// sử dụng tài khoản email để gửi
			$mail->SMTPSecure = "tls";      // sử dụng kết nối tls
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 25;
			$mail->Encoding = '7bit';       // SMS uses 7-bit encoding

			$mail->Username   = "nhathongminharduino@gmail.com"; // Tài khoản email gửi
			$mail->Password   = "654321a@"; // mật khẩu
			$mail->FromName="Arduino";

			// thiết lập 1 email
			$mail->CharSet="utf-8";
			$mail->Subject = "Cảnh báo từ ngôi nhà thông minh";     // Chủ đề email
			$mail->Body = "<h1>-Cảnh báo nhiệt độ trong nhà hiện tại là ".$NhietDo."</h1>\r\n<h1>-Nhiệt độ này có thể nhà bạn đang có sự cố hãy kiểm tra</h1>";        // nội dung email
			 
			// email nhận
			$mail->AddAddress( $email );
			$mail->send();      // Gửi mail!
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
					$this->GuiEmail($NhietDo);
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
<html>
<head>
	<title>Smart Home</title>
	<script type='text/javascript' src='jquery-1.9.1.js'></script>
	<script type="text/javascript" src="jquery.session.js"></script>
</head>
<body>
	<script type="text/javascript">
	function DangNhap () {
		var TenDangNhap=document.getElementById('user').value;
		var MatKhau=document.getElementById('pass').value;
		$.ajax({type:'GET',url:"index.php?cmd=dangnhap&tendangnhap="+TenDangNhap+"&matkhau="+MatKhau,
			success:function  (data) {
			obj = JSON.parse(data);
			if(obj.success==true)
			{
				sessionStorage.setItem("success", "true");
				window.location.href = "GUI.html";
			}else{
				alert("Đăng nhập thất bại");
			}
		}});
	}
	</script>
	<center>
	<table>
		<h1>Đăng nhập</h1>
		<tr>
			<td>Tên đăng nhập:</td>
			<td><input type="text" id="user"/></td>
		</tr>
		<tr>
			<td>Mật khẩu:</td>
			<td><input type="password" id="pass"/></td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<button id="login" onclick="DangNhap()">login</button>
			</td>
		</tr>
	</table>
	</center>
</body>
</html>
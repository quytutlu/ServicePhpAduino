<html>
<head>
	<title>Smart Home</title>
	<script type='text/javascript' src='jquery-1.9.1.js'></script>
	<script type="text/javascript" src="jquery.session.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.4-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
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
	<form class="form-horizontal" style="width:900px; margin:auto;" >
		<div class="form-group" style="margin-top:100px">
		    <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
		    <div class="col-sm-10">
		      <input style="width:300px" type="text" class="form-control" id="user" placeholder="Username">
		    </div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Mật khẩu</label>
			<div class="col-sm-10">
			    <input style="width:300px" type="password" class="form-control" id="pass" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			    <input class="btn btn-default" type="button" value="Đăng nhập" onclick="DangNhap()">
			</div>
		</div>
	</form>
</body>
</html>


function SetStt(idStt,idThietBi,Stt){
	document.getElementById(idStt).innerHTML=Stt;
	if(Stt=="Bật"){
		tt="Tắt";
	}else{
		tt="Bật";
	}
	document.getElementById(idThietBi).value=tt;
}
var id
var sttDenCompac,sttDenTuypDai,sttQuatDien1,sttQuatDien2,sttTivi;
var idp=["sttdcp","sttdtd","sttqd1","sttqd2","stttv"];
var idbt=["dencompac","dentuypdai","quatdien1","quatdien2","tivi"];
$.ajax({type: 'GET',url: "index.php?cmd=laytrangthai",success:function(data){
	obj = JSON.parse(data);
	for (var i = 0; i < obj.list.length; i++) {
		ThietBi=obj.list[i].TenThietBi;
		TrangThai=obj.list[i].TrangThai;
		if(ThietBi=="DenComPac"){
			if(TrangThai=="dcp1"){
				sttDenCompac="Bật";
				document.getElementById(idbt[0]).setAttribute("class", "btn btn-danger");
			}else{
				sttDenCompac="Tắt";
				document.getElementById(idbt[0]).setAttribute("class", "btn btn-primary");
			}
			SetStt('sttdcp','dencompac',sttDenCompac);
			continue;
		}
		if(ThietBi=="DenTuypDai"){
			if(TrangThai=="dtd1"){
				sttDenTuypDai="Bật";
				document.getElementById(idbt[1]).setAttribute("class", "btn btn-danger");
			}else{
				sttDenTuypDai="Tắt";
				document.getElementById(idbt[1]).setAttribute("class", "btn btn-primary");
			}
			SetStt('sttdtd','dentuypdai',sttDenTuypDai);
			continue;
		}
		if(ThietBi=="QuatDien1"){
			if(TrangThai=="qd11"){
				sttQuatDien1="Bật";
				document.getElementById(idbt[2]).setAttribute("class", "btn btn-danger");
			}else{
				sttQuatDien1="Tắt";
				document.getElementById(idbt[2]).setAttribute("class", "btn btn-primary");
			}
			SetStt('sttqd1','quatdien1',sttQuatDien1);
			continue;
		}
		if(ThietBi=="QuatDien2"){
			if(TrangThai=="qd21"){
				sttQuatDien2="Bật";
				document.getElementById(idbt[3]).setAttribute("class", "btn btn-danger");
			}else{
				sttQuatDien2="Tắt";
				document.getElementById(idbt[3]).setAttribute("class", "btn btn-primary");
			}
			SetStt('sttqd2','quatdien2',sttQuatDien2);
			continue;
		}
		if(ThietBi=="Tivi"){
			if(TrangThai=="tv1"){
				sttTivi="Bật";
				document.getElementById(idbt[4]).setAttribute("class", "btn btn-danger");
			}else{
				sttTivi="Tắt";
				document.getElementById(idbt[4]).setAttribute("class", "btn btn-primary");
			}
			SetStt('stttv','tivi',sttTivi);
			continue;
		}
	};
}});
function FindIdp(id1){
	for (var i = 0; i < idbt.length; i++) {
		if(idbt[i]==id1){
			return i;
		}
	};
	return -1;
}
function UpdateStt (id) {
	var TrangThai1=document.getElementById(id).value;
	if(TrangThai1=="Bật")
	{
		
		var temp="index.php?cmd=batthietbi&tenthietbi="+id;
		$.ajax({type: 'GET',url: temp,success:function(data){
			obj=JSON.parse(data);

			if(obj.success==true){
				document.getElementById(id).value="Tắt";
				document.getElementById(idp[FindIdp(id)]).innerHTML="Bật";
				document.getElementById(id).setAttribute("class", "btn btn-danger");
			}
		}});
	}
	else
	{
		var temp="index.php?cmd=tatthietbi&tenthietbi="+id;
		$.ajax({type: 'GET',url: temp,success:function(data){
			obj=JSON.parse(data);
			if(obj.success==true){
				document.getElementById(id).value="Bật";
				document.getElementById(idp[FindIdp(id)]).innerHTML="Tắt";
				document.getElementById(id).setAttribute("class", "btn btn-primary");
			}
		}});
	}	
}
function DangXuat(){
	sessionStorage.setItem("success", "false");
	window.location.href = "login.php";
}
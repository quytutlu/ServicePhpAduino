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
			}else{
				sttDenCompac="Tắt";
			}
			SetStt('sttdcp','dencompac',sttDenCompac);
			continue;
		}
		if(ThietBi=="DenTuypDai"){
			if(TrangThai=="dtd1"){
				sttDenTuypDai="Bật";
			}else{
				sttDenTuypDai="Tắt";
			}
			SetStt('sttdtd','dentuypdai',sttDenTuypDai);
			continue;
		}
		if(ThietBi=="QuatDien1"){
			if(TrangThai=="qd11"){
				sttQuatDien1="Bật";
			}else{
				sttQuatDien1="Tắt";
			}
			SetStt('sttqd1','quatdien1',sttQuatDien1);
			continue;
		}
		if(ThietBi=="QuatDien2"){
			if(TrangThai=="qd21"){
				sttQuatDien2="Bật";
			}else{
				sttQuatDien2="Tắt";
			}
			SetStt('sttqd2','quatdien2',sttQuatDien2);
			continue;
		}
		if(ThietBi=="Tivi"){
			if(TrangThai=="tv1"){
				sttTivi="Bật";
			}else{
				sttTivi="Tắt";
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
		document.getElementById(id).value="Tắt";
		document.getElementById(idp[FindIdp(id)]).innerHTML="Bật";
		var temp="index.php?cmd=batthietbi&tenthietbi="+id;
		$.ajax({type: 'GET',url: temp});
	}
	else
	{
		document.getElementById(id).value="Bật";
		document.getElementById(idp[FindIdp(id)]).innerHTML="Tắt";
		var temp="index.php?cmd=tatthietbi&tenthietbi="+id;
		$.ajax({type: 'GET',url: temp});
	}
	
}
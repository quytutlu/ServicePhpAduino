<?php
class TrangThaiThietBi
{
	public $TenThietBi;
	public $TrangThai;
	public function TrangThaiThietBi()
	{
		
	}
	public function ToJson()
	{
		return json_encode(array('TenThietBi'=>$this->TenThietBi,'TrangThai'=>$this->TrangThai));
	}
}
?>	
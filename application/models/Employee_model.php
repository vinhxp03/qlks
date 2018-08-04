<?php 
/**
* 
*/
class Employee_model extends MY_Model
{
	var $table = 'nhanvien';

	var $key = 'MANV';

	function insert_id()
	{
		//lay manv
		$query =  $this->db->query("select getid_nv() as manv");
		foreach ($query->result() as $key) {
			return $key->manv;
		}
	}

	function getId($taikhoan='')
	{
		//lay tennv
		$query =  $this->db->query("select nv.manv from nhanvien nv, dangnhap dn where
									 nv.manv=dn.manv and dn.taikhoan='$taikhoan'");
		foreach ($query->result() as $key) {
			return $key->manv;
		}
	}
}

 ?>
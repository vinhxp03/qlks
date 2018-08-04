<?php 
/**
* 
*/
class Customer_model extends MY_Model
{
	var $table = 'khachhang';

	var $key = 'MAKH';

	function insert_id()
	{
		//lay makh
		$query =  $this->db->query("select getid_kh() as makh");
		foreach ($query->result() as $key) {
			return $key->makh;
		}
	}
}

 ?>
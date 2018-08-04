<?php 
/**
* 
*/
class Room_model extends MY_Model
{
	var $table = 'phong';

	var $key = 'MAPHONG';

	function insert_id()
	{
		//lay manv
		$query =  $this->db->query("select getid_phong() as maphong");
		foreach ($query->result() as $key) {
			return $key->maphong;
		}
	}

	function get_multi_list()
	{
		$sql = "select p.MAPHONG, l.TENLOAIPHONG, l.DONGIA, p.GHICHU from phong p, loaiphong l WHERE p.MALOAIPHONG=l.MALOAIPHONG";
		return $this->query($sql);
	}
}

 ?>
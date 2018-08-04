<?php 
/**
* 
*/
class Book_model extends MY_Model
{
	var $table = 'datphong';

	var $key = 'MADP';

	function check_room_null()
	{
		$type = $this->session->userdata('type');
		$datein = $this->session->userdata('datein');
		$datein = date_format(new DateTime($datein),'Y-m-d');

		//lay danh sach phong trong 
		/*$sql = "call check_room_null($type,'$datein');";
		$this->query($sql);
		$sql = "select distinct from temp";
		return $this->query($sql);*/
		//lay danh sach phong trong 
		$sql = "select distinct p.MAPHONG
				from phong p, tinhtrang tt
				where p.MAPHONG=tt.MAPHONG and p.MALOAIPHONG=$type
				and tt.MAPHONG not in (select MAPHONG from tinhtrang where
					TUNGAY<='$datein' and DENNGAY>='$datein') 
				or (p.MALOAIPHONG=$type and p.MAPHONG not in (select MAPHONG from tinhtrang));";
		return $this->query($sql);
	}

	function getPrice()
	{
		$type = $this->session->userdata('type');
		//lay gia
		$sql = "select tenloaiphong, dongia from loaiphong where maloaiphong=$type";
		return $this->query($sql);
	}

	function check_exists_room($maphong, $datein){

		$datein = date_format(new DateTime($datein),'Y-m-d');
		$query =  $this->db->query("select tentinhtrang from tinhtrang 
    					where MAPHONG='$maphong' and TUNGAY<='$datein' and DENNGAY>='$datein'");
		foreach ($query->result() as $key) {
			$tinhtrang = $key->tentinhtrang;
		}
		if (strcmp($tinhtrang, "Đã đặt")==0) {
			return false;
		}else{
			return true;
		}
	}

}

 ?>
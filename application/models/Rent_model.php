<?php 
/**
* 
*/
class Rent_model extends MY_Model
{
	var $table = 'thuephong';

	var $key = 'MATP';

	function get_multi_list($id)
	{
		$sql = "select tp.*, kh.*
			    from thuephong tp, khachhang kh 
			    where tp.MAKH=kh.MAKH and tp.matp=$id;";
		return $this->query($sql);
	}
}
?>
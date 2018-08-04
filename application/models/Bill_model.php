<?php 
/**
* 
*/
class Bill_model extends MY_Model
{
	var $table = 'hoadon';

	var $key = 'MAHD';

	function get_list_hd($mahd)
	{
		$sql = "select * from hoadon WHERE mahd='$mahd'";
		return $this->query($sql);
	}

	function get_list_kh($makh)
	{
		$sql = "select * from khachhang WHERE makh='$makh'";
		return $this->query($sql);
	}
	function get_list_phong($maphong)
	{
		$sql = "select * from phong, loaiphong where phong.MALOAIPHONG= loaiphong.MALOAIPHONG and phong.maphong='$maphong'";
		return $this->query($sql);
	}
	function get_list_cthd($mahd)
	{
		$sql = "select * from cthd, dichvu where cthd.MADV=dichvu.MADV and MAHD='$mahd'";
		return $this->query($sql);
	}
	function get_list_room_type()
	{
		$sql = "select distinct * from loaiphong";
		return $this->query($sql); 
	}
	function get_list_year_bill()
	{
		$sql = "select distinct year(NGHD) NAM from hoadon";
		return $this->query($sql); 
	}
	function get_list_month_bill($maphong)
	{
		$sql = "select distinct month(NGHD) THANG, sum(TRIGIA) TONG from hoadon hd, phong p, loaiphong lp
    			where hd.MAPHONG=p.MAPHONG and p.MALOAIPHONG=lp.MALOAIPHONG and p.MAPHONG='$maphong'
    			group by month(NGHD)";
		return $this->query($sql); 
	}
	function get_revenue()
	{
		$sql = "call report_revenue()";
		return $this->query($sql); 
	}
}
<?php 
/**
* 
*/
class Bill extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('bill_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->bill_model->get_total();
		$this->data['total'] = $total;

		//load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('bill/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 15;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp &gt';
        $config['prev_link']   = '&lt Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        //truyen gia tri dau vao la gioi han san pham
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

		//lay du lieu phong
        $list = $this->bill_model->get_list($input);
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/bill/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->bill_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại hóa đơn');
			redirect(admin_url('bill'));
		}

		//thuc hien xoa
		if ($this->bill_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('bill'));
	}

	public function fetch_bill()
	{
		$output='';

		$id = $this->uri->segment('4');
		//lay du lieu phong
        $list = $this->bill_model->get_list_cthd($id);

        $i = 1;
        foreach ($list as $value) {
        	$output.='
				<tr>
					<td>'.$i.'</td>
					<td>'.$value->TENDV.'</td>
					<td>'.$value->SOLUONG.'</td>
					<td>'.$value->DVT.'</td>
					<td>'.$value->DONGIA.' (đ)</td>
					<td>'.$value->DONGIA*$value->SOLUONG.' (đ)</td>
				</tr>
        	';
        	$i=$i+1;
        }
        return $output;
	}

	public function print_report()
	{

		$id = $this->uri->segment(4);
		//lay du lieu phong
        $hoadon = $this->bill_model->get_list_hd($id);

        //lay du lieu khach hang
        foreach ($hoadon as $hd) {
        	$makh = $hd->MAKH;
        	$maphong = $hd->MAPHONG;
        	$trigia = $hd->TRIGIA;
        	$songay = $hd->SONGAYTHUE;
    	}
    	$khachhang = $this->bill_model->get_list_kh($makh);
    	
    	$phong = $this->bill_model->get_list_phong($maphong);
    	foreach ($phong as $p) {
        	$dongia = $p->DONGIA;
    	}

		$this->load->view('admin/tcpdf/tcpdf.php');

		// Extend the TCPDF class to create custom Header and Footer

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('Hóa đơn thuê phòng');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// set auto page breaks dejavuserif
		$pdf->SetFont('dejavuserif','', '12',true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		$content = '';
		foreach ($hoadon as $hd) {
			foreach ($khachhang as $kh) {
		$content.='<br><br>
			<table cellpadding="7px" cellspacing="0">
				<tr>
					<td colspan="5"><h2 align="center"><b>HÓA ĐƠN THUÊ PHÒNG</b></h2></td>
					<td></td>
				</tr>
				<tr align="center">
					<td colspan="5">******************</td>
					<td>Số: '.$hd->MAHD.'</td>
				</tr>
				<tr>
					<td colspan="3">Tên khách hàng: '.$kh->TENKH.'</td>
					<td colspan="3">Giới tính: '.$kh->GIOITINH.'</td>
				</tr>
				<tr>
					<td colspan="6">Địa chỉ: '.$kh->DIACHI.'</td>
				</tr>
				<tr>
					<td colspan="2">Mã phòng: '.$hd->MAPHONG.'</td>
					<td colspan="4">Đơn giá: '.$dongia.' (đ/ngày)</td>
				</tr>
				<tr>
					<td colspan="6">Số ngày thuê: '.$hd->SONGAYTHUE.' (ngày)</td>
				</tr>
			</table>
		';
		}}
		$pdf->writeHTML($content);

		$content = '';
		$content.='<table style="border-bottom: 1px solid #000; border-top: 1px solid #000;" cellpadding="7px" cellspacing="0">
				<tr>
					<td style="border-bottom: 1px solid #000;">STT</td>
					<td style="border-bottom: 1px solid #000;">Dịch vụ</td>
					<td style="border-bottom: 1px solid #000;">Số lượng</td>
					<td style="border-bottom: 1px solid #000;">Đơn vị</td>
					<td style="border-bottom: 1px solid #000;">Đơn giá</td>
					<td style="border-bottom: 1px solid #000;">Thành tiền</td>
				</tr>
		';
		$content.= $this-> fetch_bill();
		$content.='</table>';
		$pdf->writeHTML($content);

		$content = '';
		$content.='<table cellpadding="7px" cellspacing="0">
				<tr>
					<td colspan="3" align="right">Tiền phòng:</td>
					<td>'.$songay*$dongia.' (VND)</td>
				</tr>
				<tr>
					<td colspan="3" align="right">Tổng tiền thanh toán:</td>
					<td>'.$trigia.' (VND)</td>
				</tr>
			</table>
		';
		$pdf->writeHTML($content);

		$content = '';
		$content.='<table cellpadding="7px" cellspacing="0">
				<tr align="center">
					<td colspan="3"></td>
					<td colspan="3">Ngày ... tháng ... năm 20...</td>
				</tr>
				<tr align="center">
					<td colspan="3">Người thuê phòng</td>
					<td colspan="3">Người lập hóa đơn</td>
				</tr>
				<tr align="center">
					<td colspan="3" style="font-size: 10px">(Ký, họ tên)</td>
					<td colspan="3" style="font-size: 10px">(Ký, họ tên)</td>
				</tr>
			</table>
		';
		$pdf->writeHTML($content);

		$pdf->lastPage();

		// close and output PDF document
		$pdf->Output($id.'.pdf','I');

	}
}
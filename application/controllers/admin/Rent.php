<?php 
/**
* 
*/
class Rent extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('rent_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->rent_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu phong
        $list = $this->rent_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/rent/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->rent_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại đặt phòng');
			redirect(admin_url('rent'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('fromdate','Ngày đến','required');

			if ($this->form_validation->run()) {
				$fromdate = $this->input->post('fromdate');
				$todate = $this->input->post('todate');
				$people = $this->input->post('people');

				$data = array(
					'NGDEN'=>$fromdate,
					'NGDI'=>$todate,
					'SONGUOI'=>$people
				);
				if ($this->rent_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('rent'));
			}

		}

		$this->data['temp'] = 'admin/rent/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function pay()
	{
		$id = $this->uri->segment('4');
		$manv = $this->uri->segment('5');

		//Kiem tra ton tai 
		$info = $this->rent_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại thuê phòng');
			redirect(admin_url('rent'));
		}

		if ($this->db->query("call create_bill($id,'$manv')")){
			$this->session->set_flashdata('message','Hóa đơn phòng '.$info->MAPHONG.' được tạo thành công');
		}else{
			$this->session->set_flashdata('message','Tạo hóa đơn không thành công');
			redirect(admin_url('rent'));
		}

		redirect(admin_url('bill'));
	}

	public function print_report()
	{

		$id = $this->uri->segment(4);
		//lay du lieu phong
        $list = $this->rent_model->get_multi_list($id);

		$this->load->view('admin/tcpdf/tcpdf.php');

		// Extend the TCPDF class to create custom Header and Footer

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('Phiếu thuê phòng');

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
		foreach ($list as $value) {
		$content.='<br><br>
			<table cellpadding="7px" cellspacing="0">
				<tr>
					<td colspan="5"><h2 align="center"><b>PHIẾU THUÊ PHÒNG</b></h2></td></tr>
				<tr align="center">
					<td></td>
					<td colspan="3">******************</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Tên khách hàng: '.$value->TENKH.'</td>
					<td>Giới tính: '.$value->GIOITINH.'</td>
				</tr>
				<tr>
					<td colspan="3">Loại khách hàng: '.$value->LOAI.'</td>
				</tr>
				<tr>
					<td colspan="2">Số CMND: '.$value->CMND.'</td>
					<td colspan="3">Điện thoại liên hệ: '.$value->SDT.'</td>
				</tr>
				<tr>
					<td colspan="5">Địa chỉ: '.$value->DIACHI.'</td>
				</tr>
				<tr>
					<td colspan="2">Mã phòng: '.$value->MAPHONG.'</td>
					<td colspan="3">Số người: '.$value->SONGUOI.'</td>
				</tr>
				<tr>
					<td colspan="3">Ngày bắt đầu thuê: '.date('d-m-Y',strtotime($value->NGDEN)).'</td>
					<td colspan="2">Ngày trả phòng: '.date('d-m-Y',strtotime($value->NGDI)).'</td>
				</tr>
				<br>
				<tr align="center">
					<td colspan="2"></td>
					<td colspan="3">Ngày ... tháng ... năm 20...</td>
				</tr>
				<tr align="center">
					<td colspan="2"></td>
					<td colspan="3">Người lập phiếu</td>
				</tr>
				<tr align="center">
					<td colspan="2"></td>
					<td colspan="3" style="font-size: 10px"><i>(Ký, họ tên)</i></td>
				</tr>
			</table>
		';
		}
		$pdf->writeHTML($content);

		$pdf->lastPage();

		// close and output PDF document
		$pdf->Output('PhieuThuePhong_'.$id.'.pdf','I');

	}
}

 ?>
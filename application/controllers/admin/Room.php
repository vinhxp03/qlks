<?php 
/**
* 
*/
class Room extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('room_model');
		$this->load->model('room_type_model');
		$this->load->model('roomstatus_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->room_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu phong
        $list = $this->room_model->get_multi_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/room/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function add()
	{
		$this->data['getid'] = $this->room_model->insert_id();

		$status = $this->roomstatus_model->get_list();
		$this->data['status'] = $status;

		$type = $this->room_type_model->get_list();
		$this->data['type'] = $type;

		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('type','Loại phòng','required');

			if ($this->form_validation->run()) {

				$type = $this->input->post('type');
				$notes = $this->input->post('notes');

				$data = array(
					'MAPHONG'=>$this->room_model->insert_id(),
					'MALOAIPHONG'=>$type,
					'GHICHU'=>$notes
				);
				if ($this->room_model->create($data)) {
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Thêm mới không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('room'));
			}

		}

		$this->data['temp'] = 'admin/room/add';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$this->data['getid'] = $this->room_model->insert_id();

		$status = $this->roomstatus_model->get_list();
		$this->data['status'] = $status;

		$type = $this->room_type_model->get_list();
		$this->data['type'] = $type;

		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->room_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại phòng');
			redirect(admin_url('room'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('type','Loại phòng','required');

			if ($this->form_validation->run()) {

				$type = $this->input->post('type');
				$notes = $this->input->post('notes');

				$data = array(
					'MAPHONG'=>$this->room_model->insert_id(),
					'MALOAIPHONG'=>$type,
					'GHICHU'=>$notes
				);
				if ($this->room_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('room'));
			}

		}

		$this->data['temp'] = 'admin/room/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->room_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại phòng');
			redirect(admin_url('room'));
		}

		//thuc hien xoa
		if ($this->room_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('room'));
	}

	public function report()
	{
		//lay du lieu phong
        $list = $this->room_model->get_multi_list();
		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/room/report';
		$this->load->view('admin/layout',$this->data);
	}

	public function fetch_danhmucphong()
	{
		$output='';

		//lay du lieu phong
        $list = $this->room_model->get_multi_list();

        $i = 1;
        foreach ($list as $value) {
        	$output.='
				<tr>
					<td>'.$i.'</td>
					<td>'.$value->MAPHONG.'</td>
					<td>'.$value->TENLOAIPHONG.'</td>
					<td>'.$value->DONGIA.'</td>
					<td>'.$value->GHICHU.'</td>
				</tr>
        	';
        	$i=$i+1;
        }
        return $output;
	}

	public function print_report()
	{
		$this->load->view('admin/tcpdf/tcpdf.php');

		// Extend the TCPDF class to create custom Header and Footer

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('Danh mục phòng');

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
		$content.='<br><br>
			<table border="1" cellpadding="7px" cellspacing="0">
			<tr style="background-color: rgb(221, 221, 221);">
				<td colspan="4"><h2 align="center"><b>DANH MỤC PHÒNG</b></h2></td></tr>
			<tr>
				<td width="10%">STT</td>
				<td width="20%">Phòng</td>
				<td width="30%">Loại Phòng</td>
				<td width="20%">Đơn Giá (đ/ngày)</td>
				<td width="20%">Ghi Chú</td>
			</tr>
		';
		$content.=$this->fetch_danhmucphong();
		$content.='</table>';

		$pdf->writeHTML($content, true, false, true, false, '');

		$pdf->lastPage();

		// close and output PDF document
		$pdf->Output('DanhMucPhong.pdf','I');

	}
}

 ?>
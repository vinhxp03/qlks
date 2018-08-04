<?php 
/**
* 
*/
class Cthd extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('cthd_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->cthd_model->get_total();
		$this->data['total'] = $total;

		//load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('cthd/index'); //link hien thi ra danh sach san pham
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
        $list = $this->cthd_model->get_list($input);
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/cthd/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->cthd_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại hóa đơn');
			redirect(admin_url('cthd'));
		}

		//thuc hien xoa
		if ($this->cthd_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('cthd'));
	}
}
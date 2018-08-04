<?php 
/**
* 
*/
class Customer extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
	}

	public function index()
	{
		$this->db->query("SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ");
		$this->db->query("START TRANSACTION");
		//lay tong so
		$total = $this->customer_model->get_total();
		$this->data['total'] = $total;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('customer/index'); //link hien thi ra danh sach san pham
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

        //kiem tra du lieu co loc hay khong
		$name = $this->input->post('name');
		if ($name) {
			$input['like'] = array('TENKH',$name);
		}

		//lay du lieu
        $list = $this->customer_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['temp']='admin/customer/index';
		$this->load->view('admin/layout',$this->data);
		$this->db->query("COMMIT");
	}

	public function edit()
	{
		$this->db->query("SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ");
		$this->db->query("START TRANSACTION");
		$id = $this->uri->segment(4);
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->customer_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại khách hàng');
			redirect(admin_url('customer'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('born','Ngày sinh','required');
			$this->form_validation->set_rules('cmnd','CMND','required');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			$this->form_validation->set_rules('address','Địa chỉ','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$sex = $this->input->post('sex');
				$born = $this->input->post('born');
				$cmnd = $this->input->post('cmnd');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$type = $this->input->post('type');

				$data = array(
					'TENKH'=>$name,
					'GIOITINH'=>$sex,
					'NGSINH'=>$born,
					'CMND'=>$cmnd,
					'SDT'=>$phone,
					'DIACHI'=>$address,
					'LOAI'=>$type
				);
				if ($this->customer_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
					//$this->db->query("DO SLEEP(20)");
					//$this->db->query("ROLLBACK");
					$this->db->query("COMMIT");
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('customer'));
			}

		}

		$this->data['temp'] = 'admin/customer/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$this->db->query("SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ");
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->customer_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại khách hàng');
			redirect(admin_url('customer'));
		}

		//thuc hien xoa
		if ($this->customer_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('customer'));
	}

}

 ?>
<?php 
/**
* 
*/
class Employee extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->employee_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu
        $list = $this->employee_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/employee/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('born','Ngày sinh','required');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			$this->form_validation->set_rules('address','Địa chỉ','required');
			$this->form_validation->set_rules('dodate','Ngày vào làm','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$sex = $this->input->post('sex');
				$born = $this->input->post('born');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$dodate = $this->input->post('dodate');
				$status = $this->input->post('status');

				$data = array(
					'MANV'=>$this->employee_model->insert_id(),
					'TENNV'=>$name,
					'GIOITINH'=>$sex,
					'NGSINH'=>$born,
					'SDT'=>$phone,
					'DIACHI'=>$address,
					'NGVAOLAM'=>$dodate,
					'TRANGTHAI'=>$status
				);
				if ($this->employee_model->create($data)) {
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Thêm mới không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('employee'));
			}

		}

		$this->data['temp'] = 'admin/employee/add';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->employee_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại nhân viên');
			redirect(admin_url('employee'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('born','Ngày sinh','required');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			$this->form_validation->set_rules('address','Địa chỉ','required');
			$this->form_validation->set_rules('dodate','Ngày vào làm','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$sex = $this->input->post('sex');
				$born = $this->input->post('born');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$dodate = $this->input->post('dodate');
				$status = $this->input->post('status');

				$data = array(
					'TENNV'=>$name,
					'GIOITINH'=>$sex,
					'NGSINH'=>$born,
					'SDT'=>$phone,
					'DIACHI'=>$address,
					'NGVAOLAM'=>$dodate,
					'TRANGTHAI'=>$status
				);
				if ($this->employee_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('employee'));
			}

		}

		$this->data['temp'] = 'admin/employee/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->employee_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại nhân viên');
			redirect(admin_url('employee'));
		}

		//thuc hien xoa
		if ($this->employee_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('employee'));
	}

	//logout
	public function logout($value='')
	{
		if ($this->session->userdata('username')) {
			$this->session->unset_userdata('username');
		}
		redirect(base_url());
	}
}

 ?>
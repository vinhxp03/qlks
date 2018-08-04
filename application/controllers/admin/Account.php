<?php 
/**
* 
*/
class account extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->login_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu
        $list = $this->login_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/account/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);

		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->login_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại tài khoản');
			redirect(admin_url('account'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên tài khoản','required|callback_check_username');
			$this->form_validation->set_rules('pass','Mật khẩu mới','required');


			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$pass = $this->input->post('pass');

				$data = array(
					'TAIKHOAN'=>$name,
					'MATKHAU'=>$pass,
				);
				if ($this->login_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('account'));
			}

		}

		$this->data['temp'] = 'admin/account/edit';
		$this->load->view('admin/layout',$this->data);
	}

	//check username
	public function check_username()
	{
		$name = $this->input->post('name');
		$where = array('TAIKHOAN'=>$name);

		if ($this->login_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
			return false;
		}
		return true;
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->login_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại tài khoản');
			redirect(admin_url('account'));
		}

		//thuc hien xoa
		if ($this->login_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('account'));
	}
}

 ?>
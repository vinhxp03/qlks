<?php 
/**
* 
*/
class Login extends MY_Controller
{
	function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra du lieu post len
		if ($this->input->post()) {
			
			$this->form_validation->set_rules('login','login','callback_check_login');

			if ($this->form_validation->run()) {

				//$this->session->set_userdata('login',true);
				redirect(admin_url('home'));
			}
		}

		$this->load->view('admin/login/index');
	}

	//kiem tra thong tin dang nhap
	public function check_login()
	{
		$this->load->library('form_validation');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('login_model');
		$where = array('TAIKHOAN'=>$username, 'MATKHAU'=>$password);

		//kiem tra ton tai
		if ($this->login_model->check_exists($where)) {
			
			$this->session->set_userdata('username',$username);
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__,'Tài khoản hoặc mật khẩu không chính xác ');
		return false;
	}
}

 ?>
<?php 
/**
* 
*/
class MY_Controller extends CI_Controller
{
	//biến gửi dữ liệu sang view
	public $data = array();

	function __construct()
	{
		// kế thừa từ CI
		parent::__construct();

		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
				{
					$this->load->helper('admin');
					$this->_check_login();

					//lay du lieu nhan vien dang nhap
					$id = $this->session->userdata('username');
					$this->load->model('employee_model');
			        $id = $this->employee_model->getId($id);
			        $nvinfo = $this->employee_model->get_info($id);
			        $this->data['nvinfo'] = $nvinfo;
					break;
				}
			default:
				{
					// xu ly du lieu trang ngoai
					// lay danh sach loai phong
					$this->load->model('room_type_model');
					$room_type_list = $this->room_type_model->get_list();
					$this->data['room_type_list'] = $room_type_list;
					break;
				}
		}

	}

	function _check_login(){
		$controller = $this->uri->segment(2);

		//set ve chu thuong
		$controller = strtolower($controller);

		$login = $this->session->userdata('username');
		
		//neu truy cap vao 1 controller admin ma chua dang nhap thi tro ve trang dang nhap
		if (!$login && ($controller != 'login')) {
			
		 	redirect(admin_url('login'));
		}

		//neu admin login roi thi khong cho login nua
		if ($login && ($controller == 'login')) {

		 	redirect(admin_url('home'));
		}
	}
}

 ?>
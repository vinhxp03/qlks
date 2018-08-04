<?php 
/**
* 
*/
class Room_status extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('roomstatus_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->roomstatus_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu
        $list = $this->roomstatus_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/room_status/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');

				$data = array(
					'TENTINHTRANG'=>$name,
				);
				if ($this->roomstatus_model->create($data)) {
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Thêm mới không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('room_status'));
			}

		}

		$this->data['temp'] = 'admin/room_status/add';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);

		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->roomstatus_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại tình trạng phòng');
			redirect(admin_url('room_status'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$data = array(
					'TENTINHTRANG'=>$name,
				);
				if ($this->roomstatus_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('room_status'));
			}

		}

		$this->data['temp'] = 'admin/room_status/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->roomstatus_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại tình trạng phòng');
			redirect(admin_url('room_status'));
		}

		//thuc hien xoa
		if ($this->roomstatus_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('room_status'));
	}
}

 ?>
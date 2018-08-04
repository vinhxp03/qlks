<?php 
/**
* 
*/
class Room_type extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('room_type_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->room_type_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu
        $list = $this->room_type_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/room_type/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('price','Đơn giá','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$price = $this->input->post('price');

				$data = array(
					'TENLOAIPHONG'=>$name,
					'DONGIA'=>$price,
				);
				if ($this->room_type_model->create($data)) {
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Thêm mới không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('room_type'));
			}

		}

		$this->data['temp'] = 'admin/room_type/add';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);

		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->room_type_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại loại phòng');
			redirect(admin_url('room_type'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('price','Đơn giá','required');


			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$price = $this->input->post('price');

				$data = array(
					'TENLOAIPHONG'=>$name,
					'DONGIA'=>$price,
				);
				if ($this->room_type_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('room_type'));
			}

		}

		$this->data['temp'] = 'admin/room_type/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->room_type_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại loại phòng');
			redirect(admin_url('room_type'));
		}

		//thuc hien xoa
		if ($this->room_type_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('room_type'));
	}
}

 ?>
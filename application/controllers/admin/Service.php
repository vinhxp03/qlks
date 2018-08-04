<?php 
/**
* 
*/
class Service extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('service_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->service_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu
        $list = $this->service_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/service/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên dịch vụ','required');
			$this->form_validation->set_rules('dvt','Đơn vị tính','required');
			$this->form_validation->set_rules('price','Đơn giá','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$dvt = $this->input->post('dvt');
				$price = $this->input->post('price');

				$data = array(
					'TENDV'=>$name,
					'DVT'=>$dvt,
					'DONGIA'=>$price
				);
				if ($this->service_model->create($data)) {
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Thêm mới không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('service'));
			}

		}

		$this->data['temp'] = 'admin/service/add';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->service_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại dịch vụ');
			redirect(admin_url('service'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên dịch vụ','required');
			$this->form_validation->set_rules('dvt','Đơn vị tính','required');
			$this->form_validation->set_rules('price','Đơn giá','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$dvt = $this->input->post('dvt');
				$price = $this->input->post('price');

				$data = array(
					'TENDV'=>$name,
					'DVT'=>$dvt,
					'DONGIA'=>$price
				);
				if ($this->service_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('service'));
			}

		}

		$this->data['temp'] = 'admin/service/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->service_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại dịch vụ');
			redirect(admin_url('service'));
		}

		//thuc hien xoa
		if ($this->service_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('service'));
	}
}

 ?>
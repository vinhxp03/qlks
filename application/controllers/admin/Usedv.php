<?php 
/**
* 
*/
class Usedv extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('usedv_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->usedv_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu
        $list = $this->usedv_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/usedv/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function add()
	{
		//lay thong tin dich vu
		$this->load->model('service_model');
		$service = $this->service_model->get_list();
		$this->data['service']=$service;

		//lay thong tin thue phong
		$this->load->model('rent_model');
		$rent = $this->rent_model->get_list();
		$this->data['rent']=$rent;

		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên dịch vụ','required');
			$this->form_validation->set_rules('maphong','Mã phòng','required');
			$this->form_validation->set_rules('soluong','Số lượng','required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$maphong = $this->input->post('maphong');
				$soluong = $this->input->post('soluong');

				if (is_numeric($soluong)){
					$this->db->query("call insert_service($name,'$maphong',$soluong)");
					$this->session->set_flashdata('message','Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Thêm mới không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('usedv'));
			}

		}

		$this->data['temp'] = 'admin/usedv/add';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->usedv_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại sử dụng dịch vụ');
			redirect(admin_url('usedv'));
		}
		$madv = $info->MADV;
		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('soluong','Số lượng','required');

			if ($this->form_validation->run()) {
				$soluong = $this->input->post('soluong');

				if (is_numeric($soluong)) {
					$this->db->query("call update_service($id,$madv,$soluong)");
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật dữ liệu không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('usedv'));
			}

		}

		$this->data['temp'] = 'admin/usedv/edit';
		$this->load->view('admin/layout',$this->data);
	}


	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->usedv_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại sử dụng dịch vụ');
			redirect(admin_url('usedv'));
		}

		//thuc hien xoa
		if ($this->usedv_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('usedv'));
	}
}

 ?>
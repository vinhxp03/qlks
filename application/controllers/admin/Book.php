<?php 
/**
* 
*/
class Book extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('book_model');
	}

	public function index()
	{
		//lay tong so
		$total = $this->book_model->get_total();
		$this->data['total'] = $total;

		//lay du lieu phong
        $list = $this->book_model->get_list();
		$this->data['list'] = $list;

		//lay noi dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp']='admin/book/index';
		$this->load->view('admin/layout',$this->data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		//Kiem tra ton tai 
		$info = $this->book_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại đặt phòng');
			redirect(admin_url('book'));
		}

		//lay info de truyen ra view
		$this->data['info'] = $info;

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('fromdate','Ngày đến','required');

			if ($this->form_validation->run()) {
				$fromdate = $this->input->post('fromdate');
				$todate = $this->input->post('todate');
				$people = $this->input->post('people');

				$data = array(
					'NGDEN'=>$fromdate,
					'NGDI'=>$todate,
					'SONGUOI'=>$people
				);
				if ($this->book_model->update($id,$data)) {
					$this->session->set_flashdata('message','Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message','Cập nhật không thành công');
				}
				//chuyen toi trang danh sach quan tri
				redirect(admin_url('book'));
			}

		}

		$this->data['temp'] = 'admin/book/edit';
		$this->load->view('admin/layout',$this->data);
	}

	public function delete()
	{
		$id = $this->uri->segment('4');

		//Kiem tra ton tai 
		$info = $this->book_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại đặt phòng');
			redirect(admin_url('book'));
		}

		//thuc hien xoa
		if ($this->book_model->delete($id)) {
			$this->session->set_flashdata('message','Xóa dữ liệu thành công');
		}
		redirect(admin_url('book'));
	}

	public function convert()
	{
		$id = $this->uri->segment('4');
		$MANV = $this->uri->segment('5');

		// lay thong tin dat phong
		$info = $this->book_model->get_info($id);

		// them moi thue phong
		$this->load->model('rent_model');
		$data = array(
			'MAPHONG'=>$info->MAPHONG,
			'MAKH'=>$info->MAKH,
			'MANV'=>$MANV,
			'NGDEN'=>$info->NGDEN,
			'NGDI'=>$info->NGDI,
			'SONGUOI'=>$info->SONGUOI
		);
		if ($this->rent_model->create($data)) {
			$this->session->set_flashdata('message','Thêm mới dữ liệu thuê phòng thành công');
			redirect(admin_url('rent'));
		}
	}
}

 ?>
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
		$this->load->model('customer_model');
	}

	public function index()
	{
		$this->db->query("START TRANSACTION");
		// lay danh sach phong trong
		$room_null = $this->book_model->check_room_null();
		$this->data['room_null'] = $room_null;

		$this->db->query("COMMIT");

		//lay noi dung message
		$type = $this->session->userdata('type');
		$this->data['type'] = $type;

		$datein = $this->session->userdata('datein');
		$this->data['datein'] = $datein;

		$dateout = $this->session->userdata('dateout');
		$this->data['dateout'] = $dateout;

		$people = $this->session->userdata('people');
		$this->data['people'] = $people;

		$room_null = $this->book_model->check_room_null();
		$this->data['room_null'] = $room_null;

		$price = $this->book_model->getPrice();
		$this->data['price'] = $price;

		//lay noi dung flashdata
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('name','Tên','required');
			$this->form_validation->set_rules('born','Ngày sinh','required');
			$this->form_validation->set_rules('cmnd','CMND','required');
			$this->form_validation->set_rules('phone','Điện thoại','required');
			$this->form_validation->set_rules('address','Địa chỉ','required');

			if ($this->form_validation->run()) {
				
				$room_null = $this->input->post('room_null');
				$type = $this->input->post('type');
				$datein = $this->input->post('datein');
				$dateout = $this->input->post('dateout');
				$people = $this->input->post('people');

				$datein = date_format(new DateTime($datein),'Y-m-d');
				$dateout = date_format(new DateTime($dateout),'Y-m-d');

				$id = $this->customer_model->insert_id();
				$name = $this->input->post('name');
				$sex = $this->input->post('sex');
				$born = $this->input->post('born');
				$cmnd = $this->input->post('cmnd');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				$loai = $this->input->post('loai');

				if (strtotime($dateout) - strtotime($datein) <= 0){
					$this->session->set_flashdata('message','Ngày đi phải lớn hơn ngày đến!');
					redirect(base_url('book'));
				}

				$book = array(
					'MAKH'=>$id,
					'MAPHONG'=>$room_null,
					'NGDEN'=>$datein,
					'NGDI'=>$dateout,
					'SONGUOI'=>$people
				);

				$cus = array(
					'MAKH'=>$id,
					'TENKH'=>$name,
					'GIOITINH'=>$sex,
					'NGSINH'=>$born,
					'CMND'=>$cmnd,
					'SDT'=>$phone,
					'DIACHI'=>$address,
					'LOAI'=>$loai
				);
				$this->db->query("SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ");
				$this->db->query("START TRANSACTION");
				
				if ($this->customer_model->create($cus)) {
					
					$this->db->query("COMMIT");
					
					$this->db->query("SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ");
					$this->db->query("START TRANSACTION");
					$this->db->query("select * FROM DATPHONG FOR UPDATE");
					
					$this->db->query("do sleep(2)");

					if ($this->book_model->check_exists_room($room_null,$datein)==false) {
						$this->session->set_flashdata('message','Phòng này đã có người đặt rồi!');
						redirect(base_url('book'));
					}
					$this->db->query("do sleep(3)");
					if ($this->book_model->create($book)) {
						$this->db->query("COMMIT");
						$this->session->set_flashdata('message','Đặt phòng thành công! Cảm ơn bạn đã sử dụng khách sạn của chúng tôi');
					}
				}else{
					$this->session->set_flashdata('message','Đặt phòng không thành công');
				}
				redirect(base_url('book'));

			}
		}

		//load view
		$this->data['temp']='site/book/check/index';
		$this->load->view('site/book/layout',$this->data);
	}
}
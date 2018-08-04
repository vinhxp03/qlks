<?php 
/**
* 
*/
class Home extends MY_Controller
{
	function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		//kiem tra neu co du lieu submit
		if ($this->input->post()) {

			$this->form_validation->set_rules('type','Kiểu phòng','required');

			if ($this->form_validation->run()) {
				
				$type = $this->input->post('type');
				$datein = $this->input->post('datein');
				$dateout = $this->input->post('dateout');
				$people = $this->input->post('people');

				$checkdata = array(
					'type'=>$type,
					'datein'=>$datein,
					'dateout'=>$dateout,
					'people'=>$people
				);

				$this->session->set_userdata($checkdata);

				$this->session->set_flashdata('message','Hiển thị danh sách phòng trống');
				//chuyen toi trang danh sach quan tri
				redirect(base_url('book'));
			}
		}

		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout',$this->data);
	}
}

 ?>
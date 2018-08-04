<?php 
/**
* 
*/
class About extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//load view
		$this->load->view('site/about/layout');
	}
}
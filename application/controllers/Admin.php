<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//chk admin status
		if($this->session->userdata('admin_status') !=1){
				redirect('login/logout','refresh');
		}
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('mainpage_view');
		$this->load->view('template/footer');
	}

}
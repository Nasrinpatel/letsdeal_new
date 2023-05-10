<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Calendar_model', 'cale');
		//$this->load->model('front/Propertymaster_model', 'promast');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		
		$data['page_name'] = 'calendar_view';
		$this->load->view('admin/index', $data);
	}



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Country_model','coun');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');

	}

	public function index()
	{		
		$data['page_name'] = 'country_view';
		$data['countries'] = $this->coun->all();
		
		$this->load->view('admin/index',$data);

	}
	public function all()
	{
		$countries = $this->coun->all();
		$result = array('data'=>[]);
		$result = array();
		$i=1;
		foreach ($countries as $value) { 
			$button = '<a href="'.base_url('admin/country/edit/' .$value['id']).'" class="action-icon edit-btn" data-id="'.$value['id'].'" data-bs-toggle="modal" data-bs-target="#countryedit-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/country/delete/' .$value['id']).'" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['name'],
				date('d M Y h:i:s a',strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	
	public function store()
	{

		$this->form_validation->set_rules('name', 'Country Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['status'] = $this->input->post('status');
		
			$response = $this->coun->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Country Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/country/');
		}
	}

	public function edit($id)
	{
		$data = $this->coun->getCountry($id);
		echo json_encode($data);
	}

	public function update($id)
	{	
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		$response = $this->coun->updaterecords($id,$data);
		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Country Updated Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}
	}
	
	public function delete($id)
	{
		$response = $this->coun->delete($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Country Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/country/');
		

	}
	
}

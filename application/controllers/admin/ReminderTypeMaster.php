<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReminderTypeMaster extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/ReminderType_model','retype');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');

	}

	public function index()
	{		
		$data['page_name'] = 'remindertype_view';
		$data['remitypes'] = $this->retype->all();
		//$data['remtype'] = $this->retype->getReminderType();

		$this->load->view('admin/index',$data);

	}
	public function all()
	{
		$remitypes = $this->retype->all();
		$result = array('data'=>[]);
		$result = array();
		$i=1;
		foreach ($remitypes as $value) { 
			//$model_data = $this->db->get_where('tb_remindertype_master', array('id' => $value['model_type']))->row();

			$button = '<a href="'.base_url('admin/ReminderTypeMaster/edit/' .$value['id']).'" class="action-icon edit-btn" data-id="'.$value['id'].'" data-bs-toggle="modal" data-bs-target="#remindertypeedit-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/ReminderTypeMaster/delete/' .$value['id']).'" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['name'],
				$value['model_type'],
				date('d M Y h:i:s a',strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	
	public function store()
	{

		$this->form_validation->set_rules('name', 'Reminder Type Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['model_type'] = $this->input->post('model_type');
			$formArray['status'] = $this->input->post('status');
		
			$response = $this->retype->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Reminder Type Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/ReminderTypeMaster/');
		}
	}

	public function edit($id)
	{
		$data = $this->retype->getReminderType($id);
		echo json_encode($data);
	}

	public function update($id)
	{	
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);
		// echo $this->db->last_query();
		$response = $this->retype->updaterecords($id,$data);
	
		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Reminder Type Updated Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}
	}
	
	public function delete($id)
	{
		$response = $this->retype->delete($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Reminder Type Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/ReminderTypeMaster/');
		

	}
	
}

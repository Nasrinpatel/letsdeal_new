<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agentmaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Agentmaster_model', 'agentmaster');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'agent_master_view';
		$this->load->view('admin/index', $data);
	}

	public function all()
	{
		$agent = $this->agentmaster->all();
		$result = array('data'=>[]);
		$i=1;
		foreach ($agent as $value) { 
			$source_data = $this->db->get_where('tb_source_master',array('id'=>$value['source_id']))->row();
			$position_data = $this->db->get_where('tb_position_master',array('id'=>$value['position_id']))->row();
			$staff_data = $this->db->get_where('tbl_staff_master',array('id'=>$value['assigned_id']))->row();

			$button = '<a href="'.base_url('admin/agentmaster/edit/' .$value['id']).'" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/agentmaster/delete/' .$value['id']).'" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['first_name'].' '.$value['last_name'],
				$value['phone'],
				$value['email'],
				$value['company_name'],
				($source_data != null)?$source_data->name:'',
				($position_data != null)?$position_data->name:'',
				($staff_data != null)?$staff_data->first_name.' '.$staff_data->last_name:'',
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}

	public function all_contact($id)
	{
		$contacts = $this->agentmaster->getAgentContact($id);
		$result = array('data'=>[]);
		$i=1;
		foreach ($contacts as $value) { 
			$position_data = $this->db->get_where('tb_position_master',array('id'=>$value['position_id']))->row();

			$button = '<a href="'.base_url('admin/agentmaster/edit_contact/' .$value['id']).'" class="action-icon edit-btn" data-id="'.$value['id'].'" data-bs-toggle="modal" data-bs-target="#edit-agent-contact-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/agentmaster/delete_contact/' .$value['id'].'/'.$id).'#agent-contacts" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['first_name'].' '.$value['last_name'],				
				($position_data != null)?$position_data->name:'',				
				$value['company_name'],
				$value['email'],
				$value['phone'],
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	public function all_note($id)
	{
		$notes = $this->agentmaster->getAgentNote($id);
		$result = array('data'=>[]);
		$i=1;
		foreach ($notes as $value) { 

			$button = '<a href="'.base_url('admin/agentmaster/edit_note/' .$value['id']).'" class="action-icon edit-btn" data-id="'.$value['id'].'" data-bs-toggle="modal" data-bs-target="#edit-agent-notes-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/agentmaster/delete_note/' .$value['id'].'/'.$id).'#agent-notes" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
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

	public function add()
	{
		$data['sourcemaster'] = $this->agentmaster->getSourceMaster();
		$data['source'] = $this->agentmaster->getSource();
		$data['position'] = $this->agentmaster->getPosition();
		$data['staff'] = $this->agentmaster->getStaff();
		$data['page_name'] = 'agent_master_add';
		$this->load->view('admin/index', $data);
	}
//Agent master
	public function store()
	{		
		
		
		$this->form_validation->set_rules('source_id', 'Source','required');
		$this->form_validation->set_rules('assigned_id', 'Assigned','required');
		$this->form_validation->set_rules('position_id', 'Position','required');
		$this->form_validation->set_rules('first_name', 'First name','required');
		$this->form_validation->set_rules('last_name', 'Last name','required');		
		$this->form_validation->set_rules('phone', 'Phone','required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('company_name', 'Company name','required');
		$this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('status', 'Status','required');
		if ($this->form_validation->run() == false) {
			$this->add();
		} else {
			$formArray = array();
			
			$formArray['source_id'] = $this->input->post('source_id');
			$formArray['assigned_id'] = $this->input->post('assigned_id');
			$formArray['position_id'] = $this->input->post('position_id');
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['email'] = $this->input->post('email');
			$formArray['company_name'] = $this->input->post('company_name');
			$formArray['description'] = $this->input->post('description');
			$formArray['status'] = $this->input->post('status');
		
			$response = $this->agentmaster->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Agent Master Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/Agentmaster/');
		}
		
	}
	//Contact master
	public function store_contact()
	{	
		$formArray = array();			
		$formArray['agent_id'] = $this->input->post('agent_id');	
		$formArray['first_name'] = $this->input->post('first_name');
		$formArray['last_name'] = $this->input->post('last_name');
		$formArray['position_id'] = $this->input->post('position_id');
		$formArray['company_name'] = $this->input->post('company_name');
		$formArray['email'] = $this->input->post('email');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['description'] = $this->input->post('description');
		$formArray['status'] = $this->input->post('status');
	
		$response = $this->agentmaster->save_contact_records($formArray);

		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Agent Contact Added Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}	
	}

	public function edit($id)
	{
		$data['agent'] = $this->agentmaster->getAgent($id);
		// $data['contacts'] = $this->agentmaster->getAgentContact($id);
		$data['sourcemaster'] = $this->agentmaster->getSourceMaster();
		$data['source'] = $this->agentmaster->getSource();
		$data['position'] = $this->agentmaster->getPosition();
		$data['staff'] = $this->agentmaster->getStaff();
		$data['page_name'] = 'agent_master_edit';
		$this->load->view('admin/index', $data);
	}
	
	public function edit_contact($id)
	{	
		$data = $this->agentmaster->getContact($id);
		echo json_encode($data);
	}

	public function update($id){
	
		$this->form_validation->set_rules('source_id', 'Source','required');
		$this->form_validation->set_rules('assigned_id', 'Assigned','required');
		$this->form_validation->set_rules('position_id', 'Position','required');
		$this->form_validation->set_rules('first_name', 'First name','required');
		$this->form_validation->set_rules('last_name', 'Last name','required');		
		$this->form_validation->set_rules('phone', 'Phone','required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('company_name', 'Company name','required');
		$this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('status', 'Status','required');

		if ($this->form_validation->run() == false) {
			$this->edit($id);
		}else{
			$formArray = array();
		
			$formArray['source_id'] = $this->input->post('source_id');
			$formArray['assigned_id'] = $this->input->post('assigned_id');
			$formArray['position_id'] = $this->input->post('position_id');
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['email'] = $this->input->post('email');
			$formArray['company_name'] = $this->input->post('company_name');
			$formArray['description'] = $this->input->post('description');
			$formArray['status'] = $this->input->post('status');
		
			$response = $this->agentmaster->updaterecords($id,$formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Agent Master Updated Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/Agentmaster/');
		}
	}

	public function update_contact($id)
	{	
		$formArray = array();			
		$formArray['agent_id'] = $this->input->post('agent_id');	
		$formArray['first_name'] = $this->input->post('first_name');
		$formArray['last_name'] = $this->input->post('last_name');
		$formArray['position_id'] = $this->input->post('position_id');
		$formArray['company_name'] = $this->input->post('company_name');
		$formArray['email'] = $this->input->post('email');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['description'] = $this->input->post('description');
		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->update_contact_records($id,$formArray);
		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Agent Contact Updated Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}
	}
	//Note master
	public function store_note()
	{	
		$formArray = array();			
		$formArray['agent_id'] = $this->input->post('agent_id');	
		$formArray['name'] = $this->input->post('name');
		$formArray['status'] = $this->input->post('status');
	
		$response = $this->agentmaster->save_note_records($formArray);

		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Agent Note Added Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}	
	}
	public function edit_note($id)
	{	
		$data = $this->agentmaster->getNote($id);
		echo json_encode($data);
	}
	public function update_note($id)
	{	
		$formArray = array();			
		$formArray['agent_id'] = $this->input->post('agent_id');	
		$formArray['name'] = $this->input->post('name');
		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->update_note_records($id,$formArray);
		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Agent Note Updated Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}
	}
	public function delete_note($id,$agent_id)
	{
		$response = $this->agentmaster->delete_note_records($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Agent Note Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/'.$agent_id.'#agent-notes');
	}
	public function delete($id)
	{
		$response = $this->agentmaster->delete($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Agent Master Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/');
		

	}
	public function delete_contact($id,$agent_id)
	{
		$response = $this->agentmaster->delete_contact_records($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Agent Contact Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/'.$agent_id.'#agent-contacts');
	}
}

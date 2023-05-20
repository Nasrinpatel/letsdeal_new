<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agentmaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Agentmaster_model', 'agentmaster');
		//$this->load->model('front/Propertymaster_model', 'promast');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		//$data['remtype'] = $this->agentmaster->getReminderType();
		$data['remtype'] = $this->agentmaster->getReminderType('Channel Partner');
		$data['page_name'] = 'agent_master_view';
		$this->load->view('admin/index', $data);
	}


	public function all()
	{
		$agent = $this->agentmaster->all();
		$result = array('data' => []);
		$i = 1;
		foreach ($agent as $value) {
			$source_data = $this->db->get_where('tb_source_master', array('id' => $value['source_id']))->row();
			$position_data = $this->db->get_where('tb_position_master', array('id' => $value['position_id']))->row();
			$staff_data = $this->db->get_where('tbl_staff_master', array('id' => $value['assigned_id']))->row();
			$button = '<a href="' . base_url('admin/agentmaster/agentDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-info"></i>
			<a href="' . base_url('admin/agentmaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/agentmaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['first_name'] . ' ' . $value['last_name'] . ' ' . (($value['nick_name'] == "") ? '' : '(' . $value['nick_name'] . ')'),
				$value['phone'],
				$value['email'],
				$value['company_name'],
				($source_data != null) ? $source_data->name : '',
				($position_data != null) ? $position_data->name : '',
				($staff_data != null) ? $staff_data->first_name . ' ' . $staff_data->last_name : '',
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}

	public function all_contact($id)
	{
		$contacts = $this->agentmaster->getAgentContact($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($contacts as $value) {
			$position_data = $this->db->get_where('tb_position_master', array('id' => $value['position_id']))->row();

			$button = '<a href="' . base_url('admin/agentmaster/edit_contact/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-agent-contact-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/agentmaster/delete_contact/' . $value['id'] . '/' . $id) . '#agent-contacts" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['first_name'] . ' ' . $value['last_name'],
				($position_data != null) ? $position_data->name : '',
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
		$result = array('data' => []);
		$i = 1;
		foreach ($notes as $value) {

			$button = '<a href="' . base_url('admin/agentmaster/edit_note/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-agent-notes-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/agentmaster/delete_note/' . $value['id'] . '/' . $id) . '#agent-notes" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['name'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	public function all_property($id, $page)
	{

		//$promasters = $this->propertymaster->all($id);
		$promasters = $this->agentmaster->getAgentProperty($id);
		$result = array('data' => []);
		//$result = array();
		$i = 1;
		foreach ($promasters as $value) {

			$master_data = $this->db->get_where('tb_master', array('id' => $value['pro_master_id']))->row();
			$category_data = $this->db->get_where('tb_property_category', array('id' => $value['pro_category_id']))->row();
			$subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $value['pro_subcategory_id']))->row();


			$button = '<a href="' . base_url('admin/Propertymaster/propertyDetails/' . $value['id']) . '?agent_id=' . $id . '&page=' . $page . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-info"></i>
			<a href="' . base_url('admin/Propertymaster/edit/' . $value['id']) . '?agent_id=' . $id . '&page=' . $page . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Propertymaster/addreminder/' . $value['id'])  . '?agent_id=' . $id . '&page=' . $page . '" class="action-icon addreminder-btn"><i class="mdi mdi-calendar-clock-outline text-primery"></i></a>

			<a href="' . base_url('admin/Propertymaster/delete/' . $value['id']) . '?agent_id=' . $id . '&page=' . $page . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			// <a href="' . base_url('admin/Propertymaster/edit/' . $value['id']) . '?agent_id=' . $id . '&page=' . $page . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>


			$result['data'][] = array(
				$value['id'],
				$i++,
				$master_data->name,
				$category_data->name,
				$subcategory_data->name,
				date('d M Y h:i:s a', strtotime($value['created_date'])),
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
		// $data['category'] = $this->agentmaster->getCategory();
		// $data['subcategory'] = $this->agentmaster->getSubcategory();
		//$data['agent'] = $this->agentmaster->getAgent();
		$data['page_name'] = 'agent_master_add';
		$this->load->view('admin/index', $data);
	}

	//Channel Partner
	public function store()
	{
		//$this->form_validation->set_rules('source_id', 'Source', 'required');
		$this->form_validation->set_rules('position_id', 'Position', 'required');
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		//$this->form_validation->set_rules('nick_name', 'Nick name','required');	
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required');
		//$this->form_validation->set_rules('company_name', 'Company name', 'required');
		//$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == false) {
			$this->add();
		} else {
			$formArray = array();
			//$formArray['inquiry_type'] = $this->input->post('inquiry_type');
			//$formArray['agent_id'] = $this->input->post('agent_id');
			$formArray['source_id'] = $this->input->post('source_id');
			// if($formArray['inquiry_type']=='direct'){
			// 	$formArray['assigned_id'] = null;
			// }else{
			// 	$formArray['assigned_id'] = $this->input->post('assigned_id');
			// }
			if (!empty($_POST['assigned_id'])) {
				$formArray['assigned_id'] = implode(',', $this->input->post('assigned_id'));
			}
			$formArray['position_id'] = $this->input->post('position_id');
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			$formArray['nick_name'] = $this->input->post('nick_name');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['email'] = $this->input->post('email');
			$formArray['company_name'] = $this->input->post('company_name');
			$formArray['description'] = $this->input->post('description');
			$formArray['status'] = $this->input->post('status');


			$response = $this->agentmaster->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Channel Partner Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/Agentmaster/');
		}
	}
	//Channel Partnerdetails
	public function agentDetails($id)
	{
		$data['agent'] = $this->agentmaster->getAgent($id);
		//$data['remtype'] = $this->agentmaster->getReminderType();
		$data['remtype'] = $this->agentmaster->getReminderType('Channel Partner');
		// $data['contacts'] = $this->customermaster->getCustomerContact($id);
		// $data['sourcemaster'] = $this->customermaster->getSourceMaster();
		$data['source'] = $this->agentmaster->getSourceByID($data['agent']->source_id);
		$data['position'] = $this->agentmaster->getPosition();
		$data['position_data'] = $this->agentmaster->getPositionByID($data['agent']->position_id);
		$data['staff'] = $this->agentmaster->getStaffByID($data['agent']->assigned_id);
		$data['category'] = $this->agentmaster->getCategory();
		$data['subcategory'] = $this->agentmaster->getSubcategory();
		$data['states'] = $this->agentmaster->getState();
		$data['cities'] = $this->agentmaster->getCity();
		$data['areas'] = $this->agentmaster->getArea();
		// $data['agent'] = $this->customermaster->getAgent();

		$data['page_name'] = 'agent_master_details';
		$this->load->view('admin/index', $data);
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
			echo json_encode(array('success' => true, 'message' => 'Channel Partner Contact Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function edit($id)
	{
		$data['agent'] = $this->agentmaster->getAgent($id);
		// $data['contacts'] = $this->agentmaster->getAgentContact($id);
		$data['remtype'] = $this->agentmaster->getReminderType('Channel Partner');
		$data['sourcemaster'] = $this->agentmaster->getSourceMaster();

		$data['source'] = $this->agentmaster->getSource();
		$data['position'] = $this->agentmaster->getPosition();
		$data['staff'] = $this->agentmaster->getStaff();
		$data['position_data'] = $this->agentmaster->getPositionByID($data['agent']->position_id);
		$data['staff_data'] = $this->agentmaster->getStaffByID($data['agent']->assigned_id);
		$data['source_data'] = $this->agentmaster->getSourceByID($data['agent']->source_id);
		$data['category'] = $this->agentmaster->getCategory();
		$data['subcategory'] = $this->agentmaster->getSubcategory();
		$data['states'] = $this->agentmaster->getState();
		$data['cities'] = $this->agentmaster->getCity();
		$data['areas'] = $this->agentmaster->getArea();
		$record['parameter'] = array('id' => $id);
		$assigned = $this->agentmaster->getassigneddata('tb_agent_master', $record);
		$data['assigned_id'] = explode(',', $assigned['assigned_id']);
		//$data['agent'] = $this->agentmaster->getAgent();
		$data['page_name'] = 'agent_master_edit';
		$this->load->view('admin/index', $data);
	}

	public function edit_contact($id)
	{
		$data = $this->agentmaster->getContact($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		//	$this->form_validation->set_rules('inquiry_type', 'Inquiry type','required');
		//$this->form_validation->set_rules('agent_id', 'Agent','required');
		//		$this->form_validation->set_rules('source_id', 'Source', 'required');
		// if($this->input->post('inquiry_type') != 'direct'){
		// 	$this->form_validation->set_rules('assigned_id', 'Assigned','required');
		// }
		//		$this->form_validation->set_rules('assigned_id', 'Assigned', 'required');
		$this->form_validation->set_rules('position_id', 'Position', 'required');
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		//$this->form_validation->set_rules('nick_name', 'Nick name','required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required');
		//		$this->form_validation->set_rules('company_name', 'Company name', 'required');
		//$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit($id);
		} else {
			$formArray = array();
			//$formArray['inquiry_type'] = $this->input->post('inquiry_type');
			//$formArray['agent_id'] = $this->input->post('agent_id');
			$formArray['source_id'] = $this->input->post('source_id');
			// if($formArray['inquiry_type']=='direct'){
			// 	$formArray['assigned_id'] = null;
			// }else{
			// 	$formArray['assigned_id'] = $this->input->post('assigned_id');
			// }
			if (!empty($_POST['assigned_id'])) {
				$formArray['assigned_id'] = implode(',', $this->input->post('assigned_id'));
			}
			$formArray['position_id'] = $this->input->post('position_id');
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			$formArray['nick_name'] = $this->input->post('nick_name');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['email'] = $this->input->post('email');
			$formArray['company_name'] = $this->input->post('company_name');
			$formArray['description'] = $this->input->post('description');
			$formArray['status'] = $this->input->post('status');

			$response = $this->agentmaster->updaterecords($id, $formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Channel Partner Updated Successfully.');
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

		$response = $this->agentmaster->update_contact_records($id, $formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Channel PartnerContact Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	//All Specialist for
	public function all_specialistfor($id)
	{
		$specialistfor = $this->agentmaster->getSpecialistfor($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($specialistfor as $value) {
			$category_data = $this->db->get_where('tb_property_category', array('id' => $value['pro_category_id']))->row();
			$subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $value['pro_subcategory_id']))->row();
			$button = '<a href="' . base_url('admin/agentmaster/edit_specialistfor/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-agent-specialistfor-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/agentmaster/delete_specialistfor/' . $value['id'] . '/' . $id) . '#agent-specialistfor" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$category_data->name,
				$subcategory_data->name,
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	//store Specialist for
	public function store_specialistfor()
	{
		$formArray = array();
		$formArray['agent_id'] = $this->input->post('agent_id');
		$formArray['pro_category_id'] = $this->input->post('pro_category_id');
		$formArray['pro_subcategory_id'] = $this->input->post('pro_subcategory_id');

		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->save_specialistfor_records($formArray);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Specialist for Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	//Specialist for category sub category 
	public function getSubcategoryByCategory()
	{
		$category_id = $this->input->post('property_category_id');
		$subcategories = $this->agentmaster->getSubcategoryByCategory($category_id);
		echo json_encode($subcategories);
	}
	//Specialist edit
	public function edit_specialistfor($id)
	{
		$data = $this->agentmaster->getSpecialist($id);
		echo json_encode($data);
	}
	//Specialist Update
	public function update_specialistfor($id)
	{
		$formArray = array();
		$formArray['agent_id'] = $this->input->post('agent_id');
		$formArray['pro_category_id'] = $this->input->post('pro_category_id');
		$formArray['pro_subcategory_id'] = $this->input->post('pro_subcategory_id');
		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->update_specialistfor_records($id, $formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Channel Partner Specialist For Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	//Specialist Delete
	public function delete_specialistfor($id, $agent_id)
	{
		$response = $this->agentmaster->delete_specialistfor_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Channel Partner Specialist For Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/' . $agent_id . '#agent-specialist-for');
	}
	//************************- */

	//All Specialist Area
	public function all_specialistarea($id)
	{
		$specialistarea = $this->agentmaster->getSpecialistarea($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($specialistarea as $value) {
			$state_data = $this->db->get_where('tb_state_master', array('id' => $value['state_id']))->row();
			$city_data = $this->db->get_where('tb_city_master', array('id' => $value['city_id']))->row();
			$area_data = $this->db->get_where('tb_area_master', array('id' => $value['area_id']))->row();

			$button = '<a href="' . base_url('admin/agentmaster/edit_specialistarea/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-agent-specialistarea-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
				<a href="' . base_url('admin/agentmaster/delete_specialistarea/' . $value['id'] . '/' . $id) . '#agent-specialistarea" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$state_data->name,
				$city_data->name,
				(($area_data != null) ? $area_data->name : ''),
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	//store Specialist Area
	public function store_specialistarea()
	{
		$formArray = array();
		$formArray['agent_id'] = $this->input->post('agent_id');
		$formArray['state_id'] = $this->input->post('state_id');
		$formArray['city_id'] = $this->input->post('city_id');
		$formArray['area_id'] = $this->input->post('area_id');

		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->save_specialistarea_records($formArray);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Specialist for Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	//Specialist Area state city 
	public function getCityByState()
	{
		$state_id = $this->input->post('state_id');
		$cities = $this->agentmaster->getCityByState($state_id);
		echo json_encode($cities);
	}
	public function getAreaByCity()
	{
		$city_id = $this->input->post('city_id');
		$cities = $this->agentmaster->getAreaByCity($city_id);
		echo json_encode($cities);
	}
	//Specialist Area edit
	public function edit_specialistarea($id)
	{
		$data = $this->agentmaster->getSpecialistfetch($id);
		echo json_encode($data);
	}
	//Specialist Area Update
	public function update_specialistarea($id)
	{
		$formArray = array();
		$formArray['agent_id'] = $this->input->post('agent_id');
		$formArray['state_id'] = $this->input->post('state_id');
		$formArray['city_id'] = $this->input->post('city_id');
		$formArray['area_id'] = $this->input->post('area_id');
		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->update_specialistarea_records($id, $formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Channel Partner Specialist Area Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	//Specialist Area Delete
	public function delete_specialistarea($id, $agent_id)
	{
		$response = $this->agentmaster->delete_specialistarea_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Channel Partner Specialist Area Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/' . $agent_id . '#agent-specialist-area');
	}

	//************************* */
	//Note master
	public function store_note()
	{
		$formArray = array();
		$formArray['agent_id'] = $this->input->post('agent_id');
		$formArray['name'] = $this->input->post('name');
		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->save_note_records($formArray);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Channel PartnerNote Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
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

		$response = $this->agentmaster->update_note_records($id, $formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Channel Partner Note Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	public function delete_note($id, $agent_id)
	{
		$response = $this->agentmaster->delete_note_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Channel Partner Note Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/' . $agent_id . '#agent-notes');
	}

	public function delete($id)
	{
		$response = $this->agentmaster->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Channel Partner Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/');
	}

	public function delete_contact($id, $agent_id)
	{
		$response = $this->agentmaster->delete_contact_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Channel Partner Contact Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/' . $agent_id . '#agent-contacts');
	}
	//reminder
	public function all_reminders($id)
	{
		$reminders = $this->agentmaster->getReminders($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($reminders as $value) {
			$type_data = $this->db->get_where('tb_remindertype_master', array('id' => $value['type']))->row();
			$button = '<a href="' . base_url('admin/agentmaster/edit_reminders/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-agent-reminders-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/agentmaster/delete_reminders/' . $value['id'] . '/' . $id) . '#agent-reminders" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$type_data->name,
				date('d M Y h:i:s a', strtotime($value['date_time'])),
				$value['priority'],
				$value['repeat_every'] . ' ' . ucwords($value['recurring_type']),
				(($value['cycles'] == 0) ? 'infinite' : $value['cycles']),
				$value['beforeday'],
				$value['description'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	//reminders master
	public function store_reminders()
	{
		$data = $this->input->post();
		$data['model_type'] = 'Channel Partner';
		$data['model_id'] = $this->input->post('agent_id');
		$response = $this->agentmaster->save_reminders_records($data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Agent Reminder Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
		//echo $this->db->last_query();die();
	}
	public function edit_reminders($id)
	{
		$data = $this->agentmaster->getReminder($id);
		echo json_encode($data);
	}
	public function update_reminders($id)
	{
		$data = $this->input->post();
		$data['model_type'] = 'Channel Partner';
		$data['model_id'] = $this->input->post('agent_id');
		$response = $this->agentmaster->update_reminders_records($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Agent Reminder Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}



	public function delete_reminders($id, $agent_id)
	{
		$response = $this->agentmaster->delete_reminders_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Agent Reminder Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Agentmaster/edit/' . $agent_id . '#agent-reminders');
	}

	public function store_ajax()
	{
		$formArray = array();
		$formArray['source_id'] = $this->input->post('source_id');
		if (!empty($_POST['assigned_id'])) {
			$formArray['assigned_id'] = implode(',', $this->input->post('assigned_id'));
		}
		$formArray['position_id'] = $this->input->post('position_id');
		$formArray['first_name'] = $this->input->post('first_name');
		$formArray['last_name'] = $this->input->post('last_name');
		$formArray['nick_name'] = $this->input->post('nick_name');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['email'] = $this->input->post('email');
		$formArray['company_name'] = $this->input->post('company_name');
		$formArray['description'] = $this->input->post('description');
		$formArray['status'] = $this->input->post('status');

		$response = $this->agentmaster->saverecords($formArray);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Channel Partner Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
}

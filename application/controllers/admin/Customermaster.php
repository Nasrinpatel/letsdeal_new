<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customermaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Customermaster_model', 'customermaster');
        $this->load->model('front/Commonmodel', 'common');
		// $this->load->model('front/Propertymaster_model', 'propertymaster');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'customer_master_view';
		$data['remtype'] = $this->customermaster->getReminderType('Customer');
		// $data['customers'] = $this->customermaster->getCustomer();
		// $data['master'] = $this->customermaster->getPromaster();
		// $data['category'] = $this->customermaster->getCategory();
		// $data['subcategory'] = $this->customermaster->getSubcategory();
		$this->load->view('admin/index', $data);
	}

	public function all()
	{
		$customer = $this->customermaster->all();
		$result = array('data' => []);
		$i = 1;
		foreach ($customer as $value) {
			$source_data = $this->db->get_where('tb_source_master', array('id' => $value['source_id']))->row();
			$position_data = $this->db->get_where('tb_position_master', array('id' => $value['position_id']))->row();
			$staff_data = $this->db->get_where('tbl_staff_master', array('id' => $value['assigned_id']))->row();
			$agent_data = $this->db->get_where('tb_agent_master', array('id' => $value['agent_id']))->row();
			$button = '<a href="' . base_url('admin/customermaster/customerDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-info"></i>
			<a href="' . base_url('admin/customermaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/customermaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				($value['agent_id'] == '' || $value['inquiry_type'] == 'direct') ? '-' : $agent_data->first_name . ' ' . $agent_data->last_name . ' ' . (($agent_data->nick_name == "") ? '' : '(' . $agent_data->nick_name . ')'),
				$value['first_name'] . ' ' . $value['last_name'],
				$value['phone'],
				$value['email'],
				$value['company_name'],
				($source_data != null) ? $source_data->name : '',
				($position_data != null) ? $position_data->name : '',
				$value['status'],
				($staff_data != null) ? $staff_data->first_name . ' ' . $staff_data->last_name : '',
				$button
			);
		}
		echo json_encode($result);
	}

	public function all_contact($id)
	{
		$contacts = $this->customermaster->getCustomerContact($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($contacts as $value) {
			$position_data = $this->db->get_where('tb_position_master', array('id' => $value['position_id']))->row();

			$button = '<a href="' . base_url('admin/customermaster/edit_contact/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-customer-contact-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/customermaster/delete_contact/' . $value['id'] . '/' . $id) . '#customer-contacts" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
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
		$notes = $this->customermaster->getCustomerNote($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($notes as $value) {

			$button = '<a href="' . base_url('admin/customermaster/edit_note/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-customer-notes-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/customermaster/delete_note/' . $value['id'] . '/' . $id) . '#customer-notes" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
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
		$promasters = $this->customermaster->getCustomerProperty($id);
		$result = array('data' => []);
		//$result = array();
		$i = 1;
		foreach ($promasters as $value) {

			$master_data = $this->db->get_where('tb_master', array('id' => $value['pro_master_id']))->row();
			$category_data = $this->db->get_where('tb_property_category', array('id' => $value['pro_category_id']))->row();
			$subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $value['pro_subcategory_id']))->row();


			$button = '<a href="' . base_url('admin/Propertymaster/propertyDetails/' . $value['id']) . '?customer_id=' . $id . '&page=' . $page . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-info"></i>
			<a href="' . base_url('admin/Propertymaster/edit/' . $value['id']) . '?customer_id=' . $id . '&page=' . $page . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Propertymaster/addreminder/' . $value['id'])  . '?customer_id=' . $id . '&page=' . $page . '" class="action-icon addreminder-btn"><i class="mdi mdi-calendar-clock-outline text-primery"></i></a>
			<a href="' . base_url('admin/Propertymaster/delete/' . $value['id']) . '?customer_id=' . $id . '&page=' . $page . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';

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
		$data['sourcemaster'] = $this->customermaster->getSourceMaster();
		$data['source'] = $this->customermaster->getSource();
		$data['position'] = $this->customermaster->getPosition();
		$data['staff'] = $this->customermaster->getStaff();
		$data['agent'] = $this->customermaster->getAgent();

		$data['page_name'] = 'customer_master_add';
		$this->load->view('admin/index', $data);
	}
	//Customer master
	public function store()
	{
		$this->form_validation->set_rules('inquiry_type', 'Inquiry type', 'required');
		if ($_POST['inquiry_type'] == 'agent') {
			$this->form_validation->set_rules('agent_id[]', 'Agent', 'required');
		}
		$this->form_validation->set_rules('source_id', 'Source', 'required');
		//  if($this->input->post('inquiry_type') != 'direct'){
		//  	$this->form_validation->set_rules('assigned_id', 'Assigned','required');
		//  }
		//  $this->form_validation->set_rules('position_id', 'Position','required');
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		//$this->form_validation->set_rules('nick_name', 'Nick name','required');		
		$this->form_validation->set_rules('phone', 'Phone', 'required');
//		$this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('company_name', 'Company name','required');
		//$this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == false) {
			$this->add();
		} else {
			$formArray = array();
			$formArray['inquiry_type'] = $this->input->post('inquiry_type');
			//			$formArray['agent_id'] = $this->input->post('agent_id');
			$formArray['source_id'] = $this->input->post('source_id');
			// if($formArray['inquiry_type']=='direct'){
			// 	$formArray['assigned_id'] = null;
			// }else{
			// 	$formArray['assigned_id'] = $this->input->post('assigned_id');
			// }
			$formArray['position_id'] = $this->input->post('position_id');
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			// $formArray['nick_name'] = $this->input->post('nick_name');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['email'] = $this->input->post('email');
			$formArray['company_name'] = $this->input->post('company_name');
			$formArray['description'] = $this->input->post('description');
			$formArray['status'] = $this->input->post('status');
			if (!empty($_POST['assigned_id'])) {
				$formArray['assigned_id'] = implode(',', $this->input->post('assigned_id'));
			}
			$response = $this->customermaster->saverecords($formArray);

			if ($response == true) {
                if(!empty($_POST['agent_id'])){
                    foreach ($_POST['agent_id'] as $key => $value){
                        $record['agent_id'] = $value;
                        $record['customer_id'] = $response['id'];
                        $insert_agent = $this->customermaster->save_agent_records($record);
                    }
                }
				$this->session->set_flashdata('success', 'Customer Master Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/Customermaster/');
		}
	}
	//Customer details
	public function customerDetails($id)
	{

		$data['customer'] = $this->customermaster->getCustomer($id);
		// $data['contacts'] = $this->customermaster->getCustomerContact($id);
		// $data['sourcemaster'] = $this->customermaster->getSourceMaster();
		$data['source'] = $this->customermaster->getSourceByID($data['customer']->source_id);
		$data['position'] = $this->customermaster->getPosition();
		$data['position_data'] = $this->customermaster->getPositionByID($data['customer']->position_id);
		$data['staff'] = $this->customermaster->getStaffByID($data['customer']->assigned_id);
		//$data['remtype'] = $this->customermaster->getReminderType();
		$data['remtype'] = $this->customermaster->getReminderType('Customer');
		// $data['agent'] = $this->customermaster->getAgent();

		$data['page_name'] = 'customer_master_details';
		$this->load->view('admin/index', $data);
	}
	public function edit($id)
	{
		$data['customer'] = $this->customermaster->getCustomer($id);
		// $data['contacts'] = $this->customermaster->getCustomerContact($id);
		$data['remtype'] = $this->customermaster->getReminderType('Customer');
		$data['sourcemaster'] = $this->customermaster->getSourceMaster();
		$data['source'] = $this->customermaster->getSource();
		$data['position'] = $this->customermaster->getPosition();
		$data['staff'] = $this->customermaster->getStaff();
		$data['agent'] = $this->customermaster->getAgent();
		$data['source_data'] = $this->customermaster->getSourceByID($data['customer']->source_id);
		$data['position_data'] = $this->customermaster->getPositionByID($data['customer']->position_id);
		$data['staff_data'] = $this->customermaster->getStaffByID($data['customer']->assigned_id);
        $record['parameter'] = array('id' => $id);
        $assigned = $this->customermaster->getassigneddata('tb_customer_master',$record);
        $data['assigned_id'] = explode(',',$assigned['assigned_id']);
        $value['parameter'] = array('customer_id' => $id);
        $data['agent_id'] = $this->common->getDataByParam('tb_customer_agent',$value);
        foreach ($data['agent_id'] as $key => $value){
            $Data['parameter'] = array('id' => $value['agent_id']);
            $Data['fields'] = array('id');
            $data['channelpartner'][$key] = $this->common->getDataById('tb_agent_master',$Data);
        }
		$data['page_name'] = 'customer_master_edit';
		$this->load->view('admin/index', $data);
	}
	//Contact master
	public function store_contact()
	{
		$formArray = array();
		$formArray['customer_id'] = $this->input->post('customer_id');
		$formArray['first_name'] = $this->input->post('first_name');
		$formArray['last_name'] = $this->input->post('last_name');
		$formArray['position_id'] = $this->input->post('position_id');
		$formArray['company_name'] = $this->input->post('company_name');
		$formArray['email'] = $this->input->post('email');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['description'] = $this->input->post('description');
		$formArray['status'] = $this->input->post('status');

		$response = $this->customermaster->save_contact_records($formArray);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Contact Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function edit_contact($id)
	{
		$data = $this->customermaster->getContact($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('inquiry_type', 'Inquiry type', 'required');
		// if ($this->input->post('inquiry_type') != 'direct') {
		// 	$this->form_validation->set_rules('assigned_id[]', 'Assigned', 'required');
		// }
        if($this->input->post('inquiry_type') != 'direct'){
            $this->form_validation->set_rules('agent_id[]', 'Assigned','required');
        }
		$this->form_validation->set_rules('source_id', 'Source', 'required');
//		$this->form_validation->set_rules('position_id', 'Position', 'required');
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		//$this->form_validation->set_rules('nick_name', 'Nick Name','required');		
		$this->form_validation->set_rules('phone', 'Phone', 'required');
//		$this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('company_name', 'Company name','required');
		// $this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit($id);
		} else {
			$formArray = array();
			$formArray['inquiry_type'] = $this->input->post('inquiry_type');
//			$formArray['agent_id'] = $this->input->post('agent_id');
			$formArray['source_id'] = $this->input->post('source_id');
			if ($formArray['inquiry_type'] == 'direct') {
				$formArray['assigned_id'] = null;
			} else {
				if (!empty($_POST['assigned_id'])) {
					$formArray['assigned_id'] = implode(',', $this->input->post('assigned_id'));
				}
			}
            // if(!empty($_POST['assigned_id'])){
            //     $formArray['assigned_id'] = implode(',',$this->input->post('assigned_id'));
            // }
			$formArray['position_id'] = $this->input->post('position_id');
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			// $formArray['nick_name'] = $this->input->post('nick_name');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['email'] = $this->input->post('email');
			$formArray['company_name'] = $this->input->post('company_name');
			$formArray['description'] = $this->input->post('description');
			$formArray['status'] = $this->input->post('status');

			$response = $this->customermaster->updaterecords($id, $formArray);

            if(!empty($_POST['agent_id'])){
                $olddata['parameter'] = array('customer_id'=>$id);
                $oldagent= $this->common->getDataByParam('tb_customer_agent',$olddata);
                foreach ($oldagent as $key => $value){
                    $remove = $this->customermaster->delete_agent($value['id']);
                }
                foreach ($_POST['agent_id'] as $key => $value){
                    $record['agent_id'] = $value;
                    $record['customer_id'] = $id;
                    $insert_agent = $this->customermaster->save_agent_records($record);
                }
            }
			if ($response == true) {
				$this->session->set_flashdata('success', 'Customer Master Updated Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/Customermaster/');
		}
	}

	public function update_contact($id)
	{
		$formArray = array();
		$formArray['customer_id'] = $this->input->post('customer_id');
		$formArray['first_name'] = $this->input->post('first_name');
		$formArray['last_name'] = $this->input->post('last_name');
		$formArray['position_id'] = $this->input->post('position_id');
		$formArray['company_name'] = $this->input->post('company_name');
		$formArray['email'] = $this->input->post('email');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['description'] = $this->input->post('description');
		$formArray['status'] = $this->input->post('status');

		$response = $this->customermaster->update_contact_records($id, $formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Contact Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	//Note master
	public function store_note()
	{
		$formArray = array();
		$formArray['customer_id'] = $this->input->post('customer_id');
		$formArray['name'] = $this->input->post('name');
		$formArray['status'] = $this->input->post('status');

		$response = $this->customermaster->save_note_records($formArray);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Note Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	public function edit_note($id)
	{
		$data = $this->customermaster->getNote($id);
		echo json_encode($data);
	}
	public function update_note($id)
	{
		$formArray = array();
		$formArray['customer_id'] = $this->input->post('customer_id');
		$formArray['name'] = $this->input->post('name');
		$formArray['status'] = $this->input->post('status');

		$response = $this->customermaster->update_note_records($id, $formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Note Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	public function delete_note($id, $customer_id)
	{
		$response = $this->customermaster->delete_note_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Customer Note Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Customermaster/edit/' . $customer_id . '#customer-notes');
	}
	//reminder
	public function all_reminders($id)
	{
		$reminders = $this->customermaster->getReminders($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($reminders as $value) {

			$type_data = $this->db->get_where('tb_remindertype_master', array('id' => $value['type']))->row();
			$button = '<a href="' . base_url('admin/customermaster/edit_reminders/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-customer-reminders-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/customermaster/delete_reminders/' . $value['id'] . '/' . $id) . '#customer-reminders" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				// $value['type'],
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
		$data['model_type'] = 'customer';
		$data['model_id'] = $this->input->post('customer_id');
		$response = $this->customermaster->save_reminders_records($data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Reminder Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	public function edit_reminders($id)
	{
		$data = $this->customermaster->getReminder($id);
		echo json_encode($data);
	}
	public function update_reminders($id)
	{
		$data = $this->input->post();
		$data['model_type'] = 'customer';
		$data['model_id'] = $this->input->post('customer_id');
		$response = $this->customermaster->update_reminders_records($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Reminder Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}


	public function delete_reminders($id, $customer_id)
	{
		$response = $this->customermaster->delete_reminders_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Customer Reminder Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Customermaster/edit/' . $customer_id . '#customer-reminders');
	}



	public function delete($id)
	{
		$response = $this->customermaster->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Customer Master Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Customermaster/');
	}
	public function delete_contact($id, $customer_id)
	{
		$response = $this->customermaster->delete_contact_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Customer Contact Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Customermaster/edit/' . $customer_id . '#customer-contacts');
	}
	public function store_ajax()
	{
		$formArray = array();
		$formArray['inquiry_type'] = $this->input->post('inquiry_type');
		$formArray['source_id'] = $this->input->post('source_id');
		$formArray['position_id'] = $this->input->post('position_id');
		$formArray['first_name'] = $this->input->post('first_name');
		$formArray['last_name'] = $this->input->post('last_name');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['email'] = $this->input->post('email');
		$formArray['company_name'] = $this->input->post('company_name');
		$formArray['description'] = $this->input->post('description');
		$formArray['status'] = $this->input->post('status');
		if (!empty($_POST['assigned_id'])) {
			$formArray['assigned_id'] = implode(',', $this->input->post('assigned_id'));
		}

		$response = $this->customermaster->saverecords($formArray);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Customer Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
}

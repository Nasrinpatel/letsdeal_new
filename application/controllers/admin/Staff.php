<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Staff_model', 'sta');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'staff_view';
		$data['staffs'] = $this->sta->all();
		$this->load->view('admin/index', $data);
	}
	public function all()
	{
		$staffs = $this->sta->all();
		$result = array('data' => []);
		$result = array();
		$i = 1;
		foreach ($staffs as $value) {
			$button = '<a href="' . base_url('admin/staff/staffdetails/' . $value['id']) . '" class="action-icon view-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#staffview-modal"><i class="mdi mdi-eye-outline text-info"></i></a>
			<a href="' . base_url('admin/staff/edit/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#staffedit-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/staff/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['first_name'] . ' ' . $value['last_name'],
				$value['email'],
				$value['phone'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}

	public function store()
	{

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			$formArray['email'] = $this->input->post('email');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['status'] = $this->input->post('status');

			$response = $this->sta->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Team Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/staff/');
		}
	}



	public function edit($id)
	{
		$data = $this->sta->getStaff($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		$data = $this->input->post();
		$data = $this->security->xss_clean($data);

		$response = $this->sta->updaterecords($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Team Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	//staff details
	public function staffdetails($id)
	{
		$data = $this->sta->getStaff($id);
		echo json_encode($data);
	}
	public function delete($id)
	{
		$response = $this->sta->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Team Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/staff/');
	}
}

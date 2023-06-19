<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FollowupTypeMaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/FollowupType_model', 'followtype');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'followuptype_view';
		$data['followuptypes'] = $this->followtype->all();
		//$data['remtype'] = $this->followtype->getFollowupType();

		$this->load->view('admin/index', $data);
	}
	public function all()
	{
		$followuptypes = $this->followtype->all();
		$result = array('data' => []);
		$result = array();
		$i = 1;
		foreach ($followuptypes as $value) {
			//$model_data = $this->db->get_where('tb_Followuptype_master', array('id' => $value['model_type']))->row();

			$button = '<a href="' . base_url('admin/FollowupTypeMaster/edit/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#followuptypeedit-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/FollowupTypeMaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['name'],
				$value['model_type'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}

	public function store()
	{

		$this->form_validation->set_rules('name', 'Followup Type Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['model_type'] = $this->input->post('model_type');
			$formArray['status'] = $this->input->post('status');

			$response = $this->followtype->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Followup Type Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/FollowupTypeMaster/');
		}
	}

	public function edit($id)
	{
		$data = $this->followtype->getFollowupType($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		$data = $this->input->post();
		$data = $this->security->xss_clean($data);
		// echo $this->db->last_query();
		$response = $this->followtype->updaterecords($id, $data);

		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Followup Type Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function delete($id)
	{
		$response = $this->followtype->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Followup Type Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/FollowupTypeMaster/');
	}
}

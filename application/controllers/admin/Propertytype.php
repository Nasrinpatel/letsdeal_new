<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Propertytype extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Propertytype_model', 'pro');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'property_type_view';
		$data['properties'] = $this->pro->all();

		$this->load->view('admin/index', $data);
	}

	public function protype_store()
	{

		$this->form_validation->set_rules('name', 'Property Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['status'] = $this->input->post('status');

			$response = $this->pro->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Property Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/propertytype/');
		}
	}

	public function edit($id)
	{
		$data = $this->pro->getProperty($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		$data = $this->input->post();
		$data = $this->security->xss_clean($data);

		$response = $this->pro->updaterecords($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Property type Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function delete($id)
	{
		$response = $this->pro->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Property Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/propertytype/');
	}
}

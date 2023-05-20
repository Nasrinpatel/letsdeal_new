<?php
defined('BASEPATH') or exit('No direct script access allowed');

class State extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/State_model', 'sta');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'state_view';
		$data['states'] = $this->sta->all();
		$data['country'] = $this->sta->getCountry();
		$this->load->view('admin/index', $data);
	}
	public function all()
	{
		$states = $this->sta->all();
		$result = array('data' => []);
		$result = array();
		$i = 1;
		foreach ($states as $value) {
			// $this->db->where('id',$value['country_id']);
			// $q = $this->db->get('tb_state_master')->row();

			$button = '<a href="' . base_url('admin/state/edit/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#stateedit-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/state/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				// $q->name,
				$value['name'],
				$value['is_default'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),

				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}

	public function store()
	{

		$this->form_validation->set_rules('name', 'State Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['is_default'] = $this->input->post('is_default');
			$formArray['status'] = $this->input->post('status');

			$response = $this->sta->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'State Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/state/');
		}
	}

	public function edit($id)
	{
		$data = $this->sta->getState($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		$data = $this->input->post();
		$data = $this->security->xss_clean($data);

		$response = $this->sta->updaterecords($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'State Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function delete($id)
	{
		$response = $this->sta->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'State Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/state/');
	}
	//import excel For State
	public function state_spreadsheet_import()
	{
		$upload_file = $_FILES['upload_file']['name'];
		$country_id = $_POST['country_id'];
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);
		if ($extension == 'csv') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if ($extension == 'xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();
		$sheetcount = count($sheetdata);
		if ($sheetcount > 1) {
			$validation_error = false;
			$data = array();
			$validate_data = [];
			for ($i = 1; $i < $sheetcount; $i++) {
				$name = $sheetdata[$i][0];


				$data[] = $validate_data = array(
					'country_id'	=> $country_id,
					'name'		=> $name,
					'is_default'	=> 0,
					'status'	=> 1

				);
				$this->form_validation->set_data($validate_data);
				$this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
				if (!$this->form_validation->run('state_import_excel')) //validation success 
				{
					$validation_error = true;
				}
			}
			if ($validation_error == false) {
				$inserdata = $this->sta->insert_batch($data);
				if ($inserdata) {
					$this->session->set_flashdata('success', 'Successfully Imported');
					redirect('admin/state/');
				} else {
					$this->session->set_flashdata('error', 'Data Not uploaded. Please Try Again.');
					redirect('admin/state/');
				}
			} else {
				$data['page_name'] = 'state_view';
				$this->load->view('admin/index', $data);
			}
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Questionmaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Questionmaster_model', 'ques');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'quetions_view';
		$data['question'] = $this->ques->all();
		$data['sourcecategory'] = $this->ques->getSourcecategory();
		// $data['category'] = $this->ques->getCategory();
		$this->load->view('admin/index', $data);
	}

	public function all()
	{
		$question = $this->ques->all();
		$result = array('data' => []);
		$i = 1;
		foreach ($question as $value) {
			$this->db->where('id', $value['source_id']);
			$q = $this->db->get('source_category_master')->row();

			$button = '<a href="' . base_url('admin/questionmaster/edit/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#questionedit-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/questionmaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$value['question'],
				$value['question_answer_inputtype'],
				// $value['name'],
				($q != null) ? $q->name : '',
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}

	public function store()
	{

		$this->form_validation->set_rules('question', 'Question', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['question'] = $this->input->post('question');
			$formArray['question_answer_inputtype'] = $this->input->post('question_answer_inputtype');
			$formArray['source_id'] = $this->input->post('source_id');
			if($formArray['question_answer_inputtype'] != 'Dropdown' && $formArray['question_answer_inputtype'] != 'Checkbox' && $formArray['question_answer_inputtype'] != 'Radio'){
				$formArray['source_id'] = null;
			}
			$formArray['is_require'] = $this->input->post('is_require');
			$formArray['status'] = $this->input->post('status');

			$response = $this->ques->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Question Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/questionmaster/');
		}
	}

	public function edit($id)
	{
		$data = $this->ques->getQuestion($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		$data = $this->input->post();
		$data = $this->security->xss_clean($data);
		if($data['question_answer_inputtype'] != 'Dropdown' && $data['question_answer_inputtype'] != 'Checkbox' && $data['question_answer_inputtype'] != 'Radio'){
			$data['source_id'] = null;
		}
		$response = $this->ques->updaterecords($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Question Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function delete($id)
	{
		$response = $this->ques->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Question Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/questionmaster/');
	}
}

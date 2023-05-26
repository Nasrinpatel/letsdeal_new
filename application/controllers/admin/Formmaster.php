		<?php
		defined('BASEPATH') or exit('No direct script access allowed');

		class Formmaster extends CI_Controller
		{

			public function __construct()
			{
				parent::__construct();
				$this->load->model('front/Formmaster_model', 'mas');
				$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
			}

			public function index()
			{
				$data['page_name'] = 'formmaster_view';
				$data['master'] = $this->mas->getMaster();
				//$data['question'] = $this->mas->getQuestion();
				//$data['category'] = $this->mas->getCategory();
				$this->load->view('admin/index', $data);
			}

			public function all()
			{
				$masters = $this->mas->all();
				$result = array('data' => []);
				$i = 1;
				foreach ($masters as $value) {
					$master_data = $this->db->get_where('tb_master', array('id' => $value['master_id']))->row();
					$phase_data = $this->db->get_where('tb_phase_master', array('id' => $value['phase_id']))->row();
					$categories = $this->db->select('name')->where_in('id', explode(',', $value['category_ids']))->get('tb_property_category')->result_array();
					$category_names = [];
					foreach ($categories as $category) {
						$category_names[] = $category['name'];
					}
					$sub_categories = $this->db->select('name')->where_in('id', explode(',', $value['sub_category_ids']))->get('tb_property_subcategory')->result_array();
					$sub_category_names = [];
					foreach ($sub_categories as $sub_category) {
						$sub_category_names[] = $sub_category['name'];
					}

					$button = '<a href="' . base_url('admin/formmaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
					<a href="' . base_url('admin/formmaster/copyRecords/' . $value['id']) . '" class="action-icon"><i class="mdi mdi-content-copy text-primary"></i></a>
					<a href="' . base_url('admin/formmaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
					$result['data'][] = array(
						$i++,
						$master_data->name,
						implode(', ', $category_names),
						implode(', ', $sub_category_names),
						$phase_data->name,
						$value['status'],
						$button
					);
				}
				echo json_encode($result);
			}

			public function add()
			{
				//for fetch master
				$query = $this->db->get('tb_master');
				$data['master'] = $query->result_array();

				//for fetch category
				$query = $this->db->get_where('tb_property_category', array('status' => '1'));
				$data['categorychk'] = $query->result();

				//for fetch Sub category
				$query = $this->db->get_where('tb_property_subcategory', array('status' => '1'));
				$data['subcategorychk'] = $query->result();


				//for fetch Phase
				$query = $this->db->get('tb_phase_master');
				$data['phase'] = $query->result_array();

				//for fetch Question
				$query = $this->db->get('tb_question_master');
				$data['question'] = $query->result_array();

				$data['page_name'] = 'formmasters_add';
				$this->load->view('admin/index', $data);
			}
			public function store()
			{
				$this->form_validation->set_rules('master_id', 'Master', 'required');
				$this->form_validation->set_rules('category_ids[]', 'Category', 'required');
				$this->form_validation->set_rules('sub_category_ids[]', 'Sub Category', 'required');
				$this->form_validation->set_rules('phase_id', 'Phase', 'required');
				$this->form_validation->set_rules('question_ids[]', 'Question', 'required');
				$this->form_validation->set_rules('status', 'Status', 'required');
				if ($this->form_validation->run() == false) {
					//echo validation_errors();die;
					$this->add();
				} else {
					$formArray = array();
					$formArray['master_id'] = $this->input->post('master_id');
					$formArray['category_ids'] = implode(',', $this->input->post('category_ids'));
					$formArray['sub_category_ids'] = implode(',', $this->input->post('sub_category_ids'));
					$formArray['phase_id'] = $this->input->post('phase_id');
					$formArray['question_ids'] = implode(',', $this->input->post('question_ids'));
					$formArray['status'] = $this->input->post('status');

					$response = $this->mas->saverecords($formArray);

					if ($response == true) {
						$this->session->set_flashdata('success', 'Form Master Added Successfully.');
					} else {
						$this->session->set_flashdata('error', 'Something went wrong. Please try again');
					}
					return redirect('admin/formmaster/');
				}
			}

			public function edit($id)
			{
				$formmaster = $this->mas->getFormmaster($id);
				$data = array();
				$data['forms'] = $formmaster;
				$data['question'] = $this->mas->getQuestion();
				$data['master'] = $this->mas->getMaster();

				$query = $this->db->get_where('tb_property_category', array('status' => '1'));
				$data['categorychk'] = $query->result();

				$query = $this->db->get_where('tb_property_subcategory', array('status' => '1'));
				$data['subcategorychk'] = $query->result();

				$data['phase'] = $this->mas->getPhase();

				$data['page_name'] = 'formmasters_edit';
				$this->load->view('admin/index', $data);
			}

			public function update($id)
			{

				$this->form_validation->set_rules('master_id', 'Master', 'required');
				$this->form_validation->set_rules('category_ids[]', 'Category', 'required');
				$this->form_validation->set_rules('sub_category_ids[]', 'Sub Category', 'required');
				$this->form_validation->set_rules('phase_id', 'Phase', 'required');
				$this->form_validation->set_rules('question_ids[]', 'Question', 'required');
				$this->form_validation->set_rules('status', 'Status', 'required');

				if ($this->form_validation->run() == false) {
					$this->edit($id);
				} else {

					$formArray = array();

					$formArray['master_id'] = $this->input->post('master_id');
					$formArray['category_ids'] = implode(',', $this->input->post('category_ids'));
					$formArray['sub_category_ids'] = implode(',', $this->input->post('sub_category_ids'));
					$formArray['phase_id'] = $this->input->post('phase_id');
					$formArray['question_ids'] = implode(',', $this->input->post('question_ids'));
					$formArray['status'] = $this->input->post('status');


					$response = $this->mas->updaterecords($id, $formArray);
					if ($response == true) {
						$this->session->set_flashdata('success', 'Form Master Updated Successfully.');
					} else {
						$this->session->set_flashdata('error', 'Something went wrong. Please try again');
					}
					return redirect('admin/Formmaster/');
					//print_r($response);die;
				}
			}

			//copy records from master
			function copyRecords($id)
			{

				// Get the form master record by ID
				$formdata = $this->mas->getFormmaster($id);

				if ($formdata) {
					// Create a copy of the form master record

					$copyData = array(
						'master_id' => $formdata->master_id,
						'category_ids' => $formdata->category_ids,
						'sub_category_ids' => $formdata->sub_category_ids,
						'phase_id' => $formdata->phase_id,
						'question_ids' => $formdata->question_ids,
						'status' => $formdata->status
						
					);

					// Save the copied record
					$response = $this->mas->saverecords($copyData);

					if ($response) {
						$this->session->set_flashdata('success', 'Form Master Copied Successfully.');
					} else {
						$this->session->set_flashdata('error', 'Something went wrong. Please try again');
					}
				} else {
					$this->session->set_flashdata('error', 'Form Master not found.');
				}

				return redirect('admin/Formmaster/');
			}


			public function delete($id)
			{
				$response = $this->mas->delete($id);

				if ($response == true) {
					$this->session->set_flashdata('success', 'Form Master Deleted Successfully.');
				} else {
					$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
				}
				return redirect('admin/formmaster/');
			}
		}

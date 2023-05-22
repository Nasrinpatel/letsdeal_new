		<?php
		defined('BASEPATH') or exit('No direct script access allowed');

		class Masters extends CI_Controller
		{

			public function __construct()
			{
				parent::__construct();
				$this->load->model('front/Masters_model', 'master');
				$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
			}

			public function index()
			{
				$data['page_name'] = 'masters_view';
				$data['masters'] = $this->master->all();

				$this->load->view('admin/index', $data);
			}
			public function all()
			{
				$masters = $this->master->all();
				$result = array('data' => []);
				$i = 1;
				foreach ($masters as $value) {
					$button = '<a href="' . base_url('admin/masters/edit/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#mastersedit-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
					<a href="' . base_url('admin/masters/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
					$result['data'][] = array(
						$i++,
						$value['code'],
						$value['name'],
						date('d M Y h:i:s a', strtotime($value['created_date'])),
						$value['status'],
						$button
					);
				}
				echo json_encode($result);
			}

			public function store()
			{
				$this->form_validation->set_rules('code', 'Code', 'required|is_unique[tb_master.code]');
				$this->form_validation->set_rules('name', 'Name', 'required');
				if ($this->form_validation->run() == false) {
					$this->index();
				} else {
					$formArray = array();
					$formArray['code'] = $this->input->post('code');
					$formArray['name'] = $this->input->post('name');
					$formArray['status'] = $this->input->post('status');

					$response = $this->master->saverecords($formArray);

					if ($response == true) {
						$this->session->set_flashdata('success', 'Master Added Successfully.');
					} else {
						$this->session->set_flashdata('error', 'Something went wrong. Please try again');
					}
					return redirect('admin/masters/');
				}
			}
			public function validation()
			{
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('code', 'Code', 'required|is_unique[tb_master.code]');
				if ($this->form_validation->run() == false) {
					echo "false";
				} else {
					echo "true";
				}
			}
			public function edit($id)
			{
				$data = $this->master->getMasters($id);
				echo json_encode($data);
			}

			public function update($id)
			{
				$data = $this->input->post();
				$data = $this->security->xss_clean($data);

				$response = $this->master->updaterecords($id, $data);
				if ($response == true) {
					echo json_encode(array('success' => true, 'message' => 'Master Updated Successfully.'));
				} else {
					echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
				}
			}

			public function delete($id)
			{
				$response = $this->master->delete($id);

				if ($response == true) {
					echo json_encode(array('success' => true, 'message' => 'Master Updated Successfully.'));
				} else {
					echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
				}
				return redirect('admin/masters/');
			}
		}

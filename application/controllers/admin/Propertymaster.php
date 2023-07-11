<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Propertymaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Propertymaster_model', 'promast');
		$this->load->model('front/Commonmodel', 'common');
		$this->load->model('front/Modal_model', 'modal');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['customers'] = $this->promast->getCustomer();
		$data['master'] = $this->promast->getPromaster();
		$data['category'] = $this->promast->getCategory();
		$data['subcategory'] = $this->promast->getSubcategory();
        $data['stage'] = $this->promast->getPropertyStage();
        $data['master'] = $this->promast->getMaster();
        $data['area'] = $this->promast->getArea();

        $data['page_name'] = 'property_master_view';
		$this->load->view('admin/index', $data);
	}
	public function propertyfeedbackview()
	{
		$data['customers'] = $this->promast->getCustomer();
		$data['master'] = $this->promast->getPromaster();
		$data['category'] = $this->promast->getCategory();
		$data['subcategory'] = $this->promast->getSubcategory();
        $data['stage'] = $this->promast->getPropertyStage();
        $data['master'] = $this->promast->getMaster();
        $data['area'] = $this->promast->getArea();

        $data['page_name'] = 'property_feedback_view';
		$this->load->view('admin/index', $data);
	}
	public function getSubcategoryByCategory()
	{
		$category_id = $this->input->post('property_category_id');
		$subcategories = $this->promast->getSubcategoryByCategory($category_id);
		echo json_encode($subcategories);
	}

    // state to district
    public function getDistrictByState()
    {
        $state_id = $this->input->post('state_id');
        $district = $this->promast->getDistrictByState($state_id);
        echo json_encode($district);
    }
    // district to sub district
    public function getSubDistrictByDistrict()
    {
        $district_id = $this->input->post('district_id');
        $sub_district_id = $this->promast->getSubDistrictByDistrict($district_id);
        echo json_encode($sub_district_id);
    }
    // sub district to area
    public function getAreaBySubDistrict()
    {
        $sub_district_id = $this->input->post('sub_district_id');
        $area_id = $this->promast->getAreaBySubDistrict($sub_district_id);
        echo json_encode($area_id);
    }
    public function set_filter(){
        $this->session->set_userdata('start_date',$this->input->post('start_date'));
        $this->session->set_userdata('end_date',$this->input->post('end_date'));
        $this->session->set_userdata('property_category',$this->input->post('property_category'));
        $this->session->set_userdata('property_subcategory',$this->input->post('property_subcategory'));
        $this->session->set_userdata('budget',$this->input->post('budget'));
        $this->session->set_userdata('stage',$this->input->post('stage'));
        $this->session->set_userdata('master',$this->input->post('master'));
        $this->session->set_userdata('area',$this->input->post('area'));
        echo 'true';
    }
    public function reset_filter(){
        $this->session->unset_userdata('start_date');
        $this->session->unset_userdata('end_date');
        $this->session->unset_userdata('property_category');
        $this->session->unset_userdata('property_subcategory');
        $this->session->unset_userdata('budget');
        $this->session->unset_userdata('stage');
        $this->session->unset_userdata('master');
        $this->session->unset_userdata('area');
        echo 'true';
    }
	//feedback filter  data
	public function set_filter_feedback()
	{
		$this->session->set_userdata('selected_type', $this->input->post('selected_type'));
		echo 'true';
	}
	//feedback Reset filter  data
	public function reset_filter_feedback()
	{
		$this->session->unset_userdata('selected_type');
		echo 'true';
	}
	public function all()
	{
        $search_params=[];
        $search_params['start_date'] = $this->session->userdata('start_date');
        $search_params['end_date'] = $this->session->userdata('end_date');
        $search_params['property_category'] = $this->session->userdata('property_category');
        $search_params['property_subcategory'] = $this->session->userdata('property_subcategory');
        $search_params['budget'] = $this->session->userdata('budget');
        $search_params['stage'] = $this->session->userdata('stage');
        $search_params['master'] = $this->session->userdata('master');
        $search_params['area'] = $this->session->userdata('area');

        $promasters = $this->promast->all($search_params);
        $result = array('data' => []);
		$i = 1;
		foreach ($promasters as $value) {
			$master_data = $this->db->get_where('tb_master', array('id' => $value['pro_master_id']))->row();
			$category_data = $this->db->get_where('tb_property_category', array('id' => $value['pro_category_id']))->row();
			$subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $value['pro_subcategory_id']))->row();
            $stage_data = $this->db->select('name')->where_in('id',$value['property_stage_id'])->get('tb_property_stage')->row_array();
            $area = $this->db->select('name')->where_in('id',$value['area_id'])->get('tb_area_master')->row_array();

            if(!empty($value['customer_id'])){
                $customer = explode(',', $value['customer_id']);
                $customer_name = [];
                for($j=0;$j<count($customer);$j++){
                    $customer_name[$j] = $this->db->where_in('id',$customer[$j])->get('tb_customer_master')->row_array();
                }
                $name = [];
                foreach ($customer_name as $key => $val){
                    $name[$key] = $val['first_name'].' '.$val['last_name'];
                }
            }
            if(!empty($value['agent_id'])){
                $agent = explode(',', $value['customer_id']);
                $agent_name = [];
                for($j=0;$j<count($agent);$j++){
                    $agent_name[$j] = $this->db->where_in('id',$agent[$j])->get('tb_agent_master')->row_array();
                }
                $name = [];
                foreach ($agent_name as $key => $val){
                    $name[$key] = $val['first_name'].' '.$val['last_name'];
                }
            }
            $button = '<a href="' . base_url('admin/Propertymaster/propertyDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-info"></i>
			<a href="' . base_url('admin/Propertymaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Propertymaster/addreminder/' . $value['id']) . '" class="action-icon addreminder-btn"><i class="mdi mdi-calendar-clock-outline text-secondary"></i></a>
			<a href="' . base_url('admin/Propertymaster/change_column/' . $value['id']) . '" class="action-icon thumbs-up-btn" > <i class="mdi mdi-thumb-up text-success"></i></a>
            <a href="' . base_url('admin/Propertymaster/change_column/' . $value['id']) . '" class="action-icon thumbs-down-btn"> <i class="mdi mdi-thumb-down text-danger"></i></a>
            <a href="' . base_url('admin/Propertymaster/change_column/' . $value['id']) . '" class="action-icon not-match-btn"> <i class="mdi mdi-close text-warning"></i></a>
            <a href="' . base_url('admin/Propertymaster/lead_in_property/' . $value['id']) . '" class="action-icon" title="property lead"> <i class="mdi mdi-collapse-all-outline text-secondary"></i></a>
			<a href="' . base_url('admin/Propertymaster/addfollowup/' . $value['id']) . '" class="action-icon addfollowup-btn"><i class="mdi mdi-run text-secondary"></i></a>
			<a href="' . base_url('admin/Propertymaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i>';

			$result['data'][] = array(
				$i++,
                implode(',',$name),
				$master_data->name,
				$category_data->name,
				$subcategory_data->name,
                $stage_data['name'],
                $value['from_budget'].'-'.$value['to_budget'],
                $area['name'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$value['status'],
				$button,
			);
		}
		echo json_encode($result);
	}

	public function all_propertyfeedbacklist()
	{
		
        $search_params=[];
		$search_params['selected_type'] = $this->session->userdata('selected_type');
        $promasters = $this->promast->all_feedback($search_params);
        $result = array('data' => []);

		$i = 1;
		foreach ($promasters as $value) {
			$master_data = $this->db->get_where('tb_master', array('id' => $value['pro_master_id']))->row();
			$category_data = $this->db->get_where('tb_property_category', array('id' => $value['pro_category_id']))->row();
			$subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $value['pro_subcategory_id']))->row();
            $stage_data = $this->db->select('name')->where_in('id',$value['property_stage_id'])->get('tb_property_stage')->row_array();
            $area = $this->db->select('name')->where_in('id',$value['area_id'])->get('tb_area_master')->row_array();

            if(!empty($value['customer_id'])){
                $customer = explode(',', $value['customer_id']);
                $customer_name = [];
                for($j=0;$j<count($customer);$j++){
                    $customer_name[$j] = $this->db->where_in('id',$customer[$j])->get('tb_customer_master')->row_array();
                }
                $name = [];
                foreach ($customer_name as $key => $val){
                    $name[$key] = $val['first_name'].' '.$val['last_name'];
                }
            }
            if(!empty($value['agent_id'])){
                $agent = explode(',', $value['agent_id']);
                $agent_name = [];
                for($j=0;$j<count($agent);$j++){
                    $agent_name[$j] = $this->db->where_in('id',$agent[$j])->get('tb_agent_master')->row_array();
                }
                $name = [];
                foreach ($agent_name as $key => $val){
                    $name[$key] = $val['first_name'].' '.$val['last_name'];
                }
            }
			//feedback icons and reason list
			if ($value['thumbs_up'] == 1) {
				$col_name = 'thumbs_up';
				$reason_message = '-';
				$feedback = '<i class="mdi mdi-thumb-up text-success"></i>';
			} elseif ($value['thumbs_down'] == 1) {
				$col_name = 'thumbs_down';
				$reason_message = $value['thumbsdown_reason'];
				$feedback = '<i class="mdi mdi-thumb-down text-danger"></i>';
			} elseif ($value['not_match'] == 1) {
				$col_name = 'not_match';
				$reason_message = $value['notmatch_reason'];
				$feedback = '<i class="mdi mdi-close-circle-outline text-warning"></i>';
			} else {
				$reason_message = '';
				$feedback = '';
			}
            $button = '<a href="' . base_url('admin/Propertymaster/change_column/' . $value['id']) . '" class="action-icon revert-btn" data-column="'.$col_name.'"><i class="mdi mdi-file-undo text-primary"></i></a>
			<a href="' . base_url('admin/Propertymaster/propertyDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-info"></i>
			<a href="' . base_url('admin/Propertymaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Propertymaster/addreminder/' . $value['id']) . '" class="action-icon addreminder-btn"><i class="mdi mdi-calendar-clock-outline text-secondary"></i></a>
			<a href="' . base_url('admin/Propertymaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i>';

			$result['data'][] = array(
				$i++,
                implode(',',$name),
				$master_data->name,
				$category_data->name,
				$subcategory_data->name,
                $stage_data['name'],
                $value['from_budget'].'-'.$value['to_budget'],
                $area['name'],
				
                $feedback,
                $reason_message,
				$value['status'],
				date('d M Y h:i:s a', strtotime($value['created_date'])),
				$button,
			);
		}
		echo json_encode($result);
	}

    public function change_column($id)
    {
        $data=$_POST;
        $this->promast->change_column($id,$data);
        echo "true";
    }

	public function get_questions()
	{
		$mastet_id = $this->input->post('master_id');
		$category_id = $this->input->post('category_id');
		$subcategory_id = $this->input->post('subcategory_id');
		$phases = $this->db->get_where('tb_phase_master', ['status' => 1])->result_array();

		$html = '<div class="card">
			<div class="card-body">
					<div id="progressbarwizard">

						<ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">';
		$i = 0;
		foreach ($phases as $phase) {
			$html .= '<li class="nav-item">
									<a href="#tab-' . $phase['id'] . '" data-bs-toggle="tab" data-toggle="tab" class="nav-link ' . (($i == 0) ? 'active' : '') . ' rounded-0 pt-2 pb-2">
										<span class="d-none d-sm-inline">' . $phase['name'] . '</span>
									</a>
								</li>';
			$i++;
		}
		$html .= '</ul>
					
						<div class="tab-content b-0 mb-0 pt-0">
					
							<div id="bar" class="progress mb-3" style="height: 7px;">
								<div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
							</div>';
		$i = 0;
		foreach ($phases as $phase) {
			$data['questions'] = $this->promast->getQuestions($mastet_id, $category_id, $subcategory_id, $phase['id']);
			$html .= '<div class="tab-pane ' . (($i == 0) ? 'active' : '') . '" id="tab-' . $phase['id'] . '">
									<input type="hidden" name="phase_ids[]" value="' . $phase['id'] . '">
									<div class="row">
										<div class="col-12 sequence_box">';
			if (!empty($data['questions'])) {
				foreach ($data['questions'] as $que) {
					$html .= '<div class="row mb-3 sequence">
								<label class="col-md-3 col-form-label" for="userName1">' . $que['question'] . '</label>
								<input type="hidden" name="question_' . $phase['id'] . '[]" value="' . $que['question'] . '">
								<input type="hidden" name="question_id_' . $phase['id'] . '[]" value="' . $que['id'] . '">
								<input type="hidden" name="answer_type_' . $phase['id'] . '_' . $que['id'] . '" value="' . $que['question_answer_inputtype'] . '">
								<div class="col-md-9">';
					if ($que['source_id'] != '') {
						$source_options = $this->db->get_where('source_option_master', array('source_cat_id' => $que['source_id']))->result_array();
						foreach ($source_options as $source_option) {
							$html .= '<input type="hidden" name="answer_options_' . $phase['id'] . '_' . $que['id'] . '[]" value="' . $source_option['name'] . '">';
							$html .= '<input type="hidden" name="answer_option_ids_' . $phase['id'] . '_' . $que['id'] . '[]" value="' . $source_option['id'] . '">';
						}
					} else {
						$source_options = [];
					}
					if ($que['question_answer_inputtype'] == 'Textbox') {
						$html .= '<input type="text" name="answer_' . $phase['id'] . '_' . $que['id'] . '" class="form-control" id="userName1" name="userName1" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Dropdown') {
						$html .= '<select class="form-select" name="answer_' . $phase['id'] . '_' . $que['id'] . '" ' . (($que['is_require'] == 1) ? 'required' : '') . '>
																		<option>Select Option</option>';
						foreach ($source_options as $source_option) {
							$html .= '<option value="' . $source_option['id'] . '">' . $source_option['name'] . '</option>';
						}
						$html .= '</select>';
					} elseif ($que['question_answer_inputtype'] == 'Checkbox') {
						foreach ($source_options as $source_option) {
							$html .= '<div class="form-check form-check-inline">';
							$html .= '<input class="form-check-input" type="checkbox" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '[]" value="' . $source_option['id'] . '">';

							$html .= '<label class="form-check-label" for="userName1">' . $source_option['name'] . '</label><br>';
							$html .= '</div>';
						}
					} elseif ($que['question_answer_inputtype'] == 'Radio') {
						foreach ($source_options as $source_option) {
							$html .= '<div class="form-check form-check-inline">';
							$html .= '<input class="form-check-input" type="radio" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="' . $source_option['id'] . '" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
							$html .= '<label class="form-check-label" for="userName1">' . $source_option['name'] . '</label><br>';
							$html .= '</div>';
						}
					} elseif ($que['question_answer_inputtype'] == 'Date') {
						$html .= '<input type="date" class="form-control" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Textarea') {
						$html .= '<textarea class="form-control" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" ' . (($que['is_require'] == 1) ? 'required' : '') . '></textarea>';
					} elseif ($que['question_answer_inputtype'] == 'Multitextbox') {
						$html .= '<div id="options">
									<div class="row">
										<div class="col-lg-6">
											<div class="mb-3">
												<input type="text" class="form-control" name="answer_' . $phase['id'] . '_' . $que['id'] . '[]" id="option" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>
											</div>
										</div>
										<div class="col-lg-1">
											
											<a class="btn btn-success waves-effect waves-light add-button-textbox" data-name="answer_' . $phase['id'] . '_' . $que['id'] . '[]">Add </a>
										</div>
									</div>
								</div>';
					} elseif ($que['question_answer_inputtype'] == 'File') {
						$html .= '<input type="file" class="form-control" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Number') {
						$html .= '<input type="number" class="form-control" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Phone') {
						$html .= '<input type="tel" class="form-control" placeholder="Enter Phone number" id="userName1"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Email') {
						$html .= '<input type="email" class="form-control" id="userName1" placeholder="Enter Email Address"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Link') {
						$html .= '<input type="url" class="form-control" id="userName1" placeholder="Enter Link"  name="answer_' . $phase['id'] . '_' . $que['id'] . '" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Image') {
						$html .= '<input type="file" class="form-control" name="answer_' . $phase['id'] . '_' . $que['id'] . '" accept="image/*" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Video 360') {
						$html .= '<input type="url" class="form-control" placeholder="Enter Video 360 Link" name="answer_' . $phase['id'] . '_' . $que['id'] . '" accept="video/*" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Google Map') {
						$html .= '<div class="row"><div class="col-md-6"><input type="text" class="form-control" placeholder="Enter Latitude"  name="answer_' . $phase['id'] . '_' . $que['id'] . '[]" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '></div><div class="col-md-6"><input type="text" class="form-control" placeholder="Enter Longitude"  name="answer_' . $phase['id'] . '_' . $que['id'] . '[]" value="" ' . (($que['is_require'] == 1) ? 'required' : '') . '></div></div>';
					} elseif ($que['question_answer_inputtype'] == 'Image Gallery') {
						$html .= '<input class="image_gallery" name="answer_' . $phase['id'] . '_' . $que['id'] . '[]" type="file" multiple ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
					} elseif ($que['question_answer_inputtype'] == 'Video Gallery') {
						$html .= '<div id="videogallery">';
						$html .= '<div class="row">';
						$html .= '<div class="col-lg-10">';
						$html .= '<div class="mb-3">';
						$html .= '<input type="url" class="form-control" name="answer_' . $phase['id'] . '_' . $que['id'] . '[]" id="videogallery" placeholder="Enter Video Link" ' . (($que['is_require'] == 1) ? 'required' : '') . '>';
						$html .= '</div>';
						$html .= '</div>';
						$html .= '<div class="col-lg-2">';
						$html .= '<a class="btn btn-success waves-effect waves-light add-button"  data-name="answer_' . $phase['id'] . '_' . $que['id'] . '[]">Add </a>';
						$html .= '</div>';
						$html .= '</div>';
						$html .= '</div>';
					}

					$html .= '</div>
													</div>';
				}
			} else {
				$html .= '<p class="text-center">No Questions</p>';
			}
			$html .= '</div> <!-- end col -->
									</div> <!-- end row -->
								</div>';
			$i++;
		}
		$html .= '<ul class="list-inline mb-0 wizard">
								<li class="previous list-inline-item">
									<a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
								</li>
								<li class="next list-inline-item float-end">
									<a href="javascript: void(0);" class="btn btn-secondary">Next</a>
								</li>
							</ul>

						</div> <!-- tab-content -->
					</div> <!-- end #progressbarwizard-->
			</div> <!-- end card-body -->
		</div> <!-- end card-->
		<script type="application/javascript">
            $(document).ready(function() {
                 $(".sequence_box").sortable({ tolerance: "pointer" });
                 $(".sequence").css("cursor","move");
            });
    	    </script>';

		echo json_encode(array('success' => true, 'html' => $html));
	}
	public function add()
	{
		$data['customers'] = $this->promast->getCustomer();
		$data['agents'] = $this->promast->getAgents();
		$data['master'] = $this->promast->getPromaster();
		$data['category'] = $this->promast->getCategory();
		$data['subcategory'] = $this->promast->getSubcategory();
        $data['propertystage'] = $this->promast->getPropertyStage();
        $data['states'] = $this->promast->getState();
		//for fetch category
		// $query = $this->db->get_where('tb_property_category', array('status' => '1'));
		// $data['categorychk'] = $query->result();

		//for fetch Sub category
		// $query = $this->db->get_where('tb_property_subcategory', array('status' => '1'));
		// $data['subcategorychk'] = $query->result();

		$data['page_name'] = 'property_master_add';
		$this->load->view('admin/index', $data);
	}
	public function store()
	{
		$this->load->library('upload');
		$this->form_validation->set_rules('pro_master_id', 'Property Master', 'required');
		$this->form_validation->set_rules('pro_category_id', 'Property Category', 'required');
		$this->form_validation->set_rules('pro_subcategory_id', 'Property Sub Category', 'required');
		$this->form_validation->set_rules('property_stage_id', 'Property Stage', 'required');
		$this->form_validation->set_rules('from_budget', 'From Budget', 'required');
		$this->form_validation->set_rules('to_budget', 'To Budget', 'required');
		$this->form_validation->set_rules('state_id', 'State', 'required');
		$this->form_validation->set_rules('district_id', 'District', 'required');
		$this->form_validation->set_rules('sub_district_id', 'Sub District', 'required');
		$this->form_validation->set_rules('area_id', 'Area', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == false) {
			$this->add();
		} else {
			$formArray = $_POST;
			if (!empty($_POST['customer_id'])) {
				$formArray['customer_id'] = implode(',', $this->input->post('customer_id'));
			}
			if (!empty($_POST['agent_id'])) {
				$formArray['agent_id'] = implode(',', $this->input->post('agent_id'));
			}
			$response = $this->promast->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Property Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			if ($formArray['redirect_to'] == 'customer') {
				return redirect('admin/customermaster/' . $formArray['page'] . '/' . $formArray['customer_id'] . '#customer-property');
			} elseif ($formArray['redirect_to'] == 'agent') {
				return redirect('admin/Propertymaster/');
			}
			return redirect('admin/Propertymaster/');
		}
	}


	public function edit($id)
	{
		$propertymaster = $this->promast->getPropertymaster($id);
		$data = array();
		$data['property'] = $propertymaster;
		// $data['question'] = $this->mas->getQuestion();
		$data['customers'] = $this->promast->getCustomer();
		$data['agents'] = $this->promast->getAgents();
		$data['master'] = $this->promast->getPromaster();
		$data['category'] = $this->promast->getCategory();
		$data['subcategory'] = $this->promast->getSubcategory();
		$data['phases'] = $this->db->get_where('tb_phase_master', ['status' => 1])->result_array();
		$data['customer_id'] = explode(',', $propertymaster->customer_id);
		$data['agent_id'] = explode(',', $propertymaster->agent_id);
        $data['all_propertystage'] = $this->promast->getPropertyStage();
        $data['lead_stage'] = $this->db->select('name')->where_in('id',$data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['states'] = $this->promast->getState();
        $data['page_name'] = 'property_master_edit';
		$this->load->view('admin/index', $data);
	}

	//property details
	public function propertyDetails($id)
	{
		$propertymaster = $this->promast->getPropertymaster($id);
		$data = array();
		$data['property'] = $propertymaster;
		$data['customer_id'] = explode(',', $propertymaster->customer_id);
		if (!empty($propertymaster->customer_id)) {
			foreach ($data['customer_id'] as $key => $value) {
				$record['parameter'] = array('id' => $value);
				$record['fields'] = array('first_name', 'last_name');
				$customer = $this->common->getDataById('tb_customer_master', $record);
				$data['customer_id'][$key] = $customer['first_name'] . ' ' . $customer['last_name'];
			}
			$data['customer'] = implode(', ', $data['customer_id']);
		}
		$data['agent_id'] = explode(',', $propertymaster->agent_id);
		if (!empty($propertymaster->agent_id)) {
			foreach ($data['agent_id'] as $key => $value) {
				$record['parameter'] = array('id' => $value);
				$record['fields'] = array('first_name', 'last_name');
				$agent = $this->common->getDataById('tb_agent_master', $record);
				$data['agent_id'][$key] = $agent['first_name'] . ' ' . $agent['last_name'];
			}
			$data['agent'] = implode(', ', $data['agent_id']);
		}
		$data['customers'] = $this->promast->getCustomer();
		$data['master'] = $this->promast->getPromaster();
		$data['category'] = $this->promast->getCategory();
		$data['subcategory'] = $this->promast->getSubcategory();
		$data['phases'] = $this->db->get_where('tb_phase_master', ['status' => 1])->result_array();
        $data['property_stage'] = $this->db->select('name')->where_in('id',$propertymaster->property_stage_id)->get('tb_property_stage')->row_array();
        $data['state'] = $this->db->select('name')->where_in('id',$propertymaster->state_id)->get('tb_state_master')->row_array();
        $data['district'] = $this->db->select('name')->where_in('id',$propertymaster->district_id)->get('tb_district_master')->row_array();
        $data['subdistrict'] = $this->db->select('name')->where_in('id',$propertymaster->sub_district_id)->get('tb_sub_district_master')->row_array();
        $data['area'] = $this->db->select('name')->where_in('id',$propertymaster->area_id)->get('tb_area_master')->row_array();

        $data['page_name'] = 'property_master_details';
		$this->load->view('admin/index', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('pro_master_id', 'Property Master', 'required');
		$this->form_validation->set_rules('pro_category_id', 'Property Category', 'required');
		$this->form_validation->set_rules('pro_subcategory_id', 'Property Sub Category', 'required');
        $this->form_validation->set_rules('property_stage_id', 'Property Stage', 'required');
        $this->form_validation->set_rules('from_budget', 'From Budget', 'required');
        $this->form_validation->set_rules('to_budget', 'To Budget', 'required');
        $this->form_validation->set_rules('state_id', 'State', 'required');
        $this->form_validation->set_rules('district_id', 'District', 'required');
        $this->form_validation->set_rules('sub_district_id', 'Sub District', 'required');
        $this->form_validation->set_rules('area_id', 'Area', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit($id);
		} else {

			$formArray = $_POST;
			// $formArray = array();
			// $formArray['pro_master_id'] = $this->input->post('pro_master_id');
			// $formArray['pro_category_id'] = $this->input->post('pro_category_id');
			// $formArray['pro_subcategory_id'] = $this->input->post('pro_subcategory_id');
			// $formArray['status'] = $this->input->post('status');
			if (!empty($_POST['customer_id'])) {
				$formArray['customer_id'] = implode(',', $this->input->post('customer_id'));
			}
			if (!empty($_POST['agent_id'])) {
				$formArray['agent_id'] = implode(',', $this->input->post('agent_id'));
			}
			$response = $this->promast->updaterecords($id, $formArray);
			if ($response == true) {
				$this->session->set_flashdata('success', 'Property Updated Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			if ($formArray['redirect_to'] == 'customer') {
				return redirect('admin/customermaster/' . $formArray['page'] . '/' . $formArray['customer_id'] . '#customer-property');
			} elseif ($formArray['redirect_to'] == 'agent') {
				return redirect('admin/Propertymaster/');
			}
			return redirect('admin/Propertymaster/');

			//print_r($response);die;
		}
	}

	// public function addreminde()
	// {
	// 	//$data['customers'] = $this->promast->getCustomer();
	// 	// $data['agents'] = $this->promast->getAgents();
	// 	// $data['master'] = $this->promast->getPromaster();
	// 	// $data['category'] = $this->promast->getCategory();
	// 	// $data['subcategory'] = $this->promast->getSubcategory();

	// 	//for fetch category
	// 	// $query = $this->db->get_where('tb_property_category', array('status' => '1'));
	// 	// $data['categorychk'] = $query->result();

	// 	//for fetch Sub category
	// 	// $query = $this->db->get_where('tb_property_subcategory', array('status' => '1'));
	// 	// $data['subcategorychk'] = $query->result();

	// 	$data['page_name'] = 'property_master_add';
	// 	$this->load->view('admin/index', $data);
	// }
	public function delete($id)
	{
		$response = $this->promast->delete($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Property Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		if (isset($_GET['customer_id']) && $_GET['customer_id'] != '') {
			return redirect('admin/customermaster/' . $_GET['page'] . '/' . $_GET['customer_id'] . '#customer-property');
		} elseif (isset($_GET['agent_id']) && $_GET['agent_id'] != '') {
			return redirect('admin/agentmaster/edit/' . $_GET['agent_id'] . '#agent-property');
		}
		return redirect('admin/Propertymaster/');
	}
	public function update_status($id, $status)
	{
		$response = $this->promast->update_status($id, $status);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Property Status Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	//reminder
	public function all_reminders($id)
	{
		$reminders = $this->promast->getReminders($id);
		$result = array('data' => []);
		$i = 1;
		foreach ($reminders as $value) {
			$type_data = $this->db->get_where('tb_remindertype_master', array('id' => $value['type']))->row();
			$button = '<a href="' . base_url('admin/propertymaster/edit_reminders/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-property-reminders-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/propertymaster/delete_reminders/' . $value['id'] . '/' . $id) . '#property-reminders" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				//$value['name'],
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
	public function addreminder($id)
	{
		//$data['remtype'] = $this->promast->getReminderType();
		$data['remtype'] = $this->promast->getReminderType('Property');
//        $propertymaster = $this->promast->getPropertymaster($id);
		$data['property'] = $this->promast->getPropertymaster($id);
        $propertymaster = $this->promast->getPropertymaster($id);
        $data = array();
        $data['property'] = $propertymaster;
        $data['customer_id'] = explode(',', $propertymaster->customer_id);
        if (!empty($propertymaster->customer_id)) {
            foreach ($data['customer_id'] as $key => $value) {
                $record['parameter'] = array('id' => $value);
                $record['fields'] = array('first_name', 'last_name');
                $customer = $this->common->getDataById('tb_customer_master', $record);
                $data['customer_id'][$key] = $customer['first_name'] . ' ' . $customer['last_name'];
            }
            $data['customer'] = implode(', ', $data['customer_id']);
        }
        $data['agent_id'] = explode(',', $propertymaster->agent_id);
        if (!empty($propertymaster->agent_id)) {
            foreach ($data['agent_id'] as $key => $value) {
                $record['parameter'] = array('id' => $value);
                $record['fields'] = array('first_name', 'last_name');
                $agent = $this->common->getDataById('tb_agent_master', $record);
                $data['agent_id'][$key] = $agent['first_name'] . ' ' . $agent['last_name'];
            }
            $data['agent'] = implode(', ', $data['agent_id']);
        }
        $data['remtype'] = $this->promast->getReminderType('Property');
        $data['property_stage'] = $this->db->select('name')->where_in('id',$propertymaster->property_stage_id)->get('tb_property_stage')->row_array();
        $data['state'] = $this->db->select('name')->where_in('id',$propertymaster->state_id)->get('tb_state_master')->row_array();
        $data['district'] = $this->db->select('name')->where_in('id',$propertymaster->district_id)->get('tb_district_master')->row_array();
        $data['subdistrict'] = $this->db->select('name')->where_in('id',$propertymaster->sub_district_id)->get('tb_sub_district_master')->row_array();
        $data['area'] = $this->db->select('name')->where_in('id',$propertymaster->area_id)->get('tb_area_master')->row_array();

        $data['page_name'] = 'property_master_addreminder';
		$this->load->view('admin/index', $data);
	}
	public function store_reminders()
	{
		$data = $this->input->post();
		$data['model_type'] = 'Property';
		$data['model_id'] = $this->input->post('property_id');
		$response = $this->promast->save_reminders_records($data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Property Reminder Added Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}
	public function edit_reminders($id)
	{
		$data = $this->promast->getReminder($id);
		echo json_encode($data);
	}
	public function update_reminders($id)
	{
		$data = $this->input->post();
		$data['model_type'] = 'Property';
		$data['model_id'] = $this->input->post('property_id');
		$response = $this->promast->update_reminders_records($id, $data);
		if ($response == true) {
			echo json_encode(array('success' => true, 'message' => 'Property Reminder Updated Successfully.'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function delete_reminders($id, $property_id)
	{
		$response = $this->promast->delete_reminders_records($id);

		if ($response == true) {
			$this->session->set_flashdata('success', 'Property Reminder Deleted Successfully.');
		} else {
			$this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Propertymaster/addreminder/' . $property_id . '#property-reminders');
	}

	public function lead_in_property($id)
    {
        $data['property_id'] = $id;
        $data['page_name'] = 'property_master_leadlist';
        $this->load->view('admin/index', $data);
    }

    public function lead_of_property($property_id){
       $record['parameter'] = array('property_id' => $property_id);
       $lead = $this->common->getDataByParam('tb_lead_property_suggestion',$record);
       $result = array('data' => []);
        $i = 1;
        foreach ($lead as $value) {
            $lead_data = $this->db->where_in('id', $value['lead_id'])->get('tb_lead_master')->row_array();

            $customer_data = $this->db->where_in('id', $lead_data['customer_id'])->get('tb_customer_master')->row_array();

            //channel partner data
            $agent_id = $this->db->select('agent_id')->where_in('customer_id', $lead_data['customer_id'])->get('tb_customer_agent')->result_array();
            $agent_data = [];
            foreach ($agent_id as $key => $v) {
                $agent_data[$key] = $this->db->where_in('id', $v['agent_id'])->get('tb_agent_master')->row_array();
            }
            $agent = [];
            foreach ($agent_data as $key => $val) {
                $agent[$key] = $val['first_name'];
            }

            $master = $this->db->select('name')->where_in('id', $lead_data['pro_master_id'])->get('tb_master')->row_array();
            $stage_data = $this->db->select('name')->where_in('id', $lead_data['lead_stage_id'])->get('tb_lead_stage')->row_array();

            //property data
            $property_id = $this->db->select('pro_subcategory_id')->where_in('lead_id', $lead_data['id'])->get('tb_lead_property_interested')->result_array();
            $property_data = [];
            foreach ($property_id as $k => $v) {
                $property_data[$k] = $this->db->select('name')->where_in('id', $v['pro_subcategory_id'])->get('tb_property_subcategory')->row_array();
            }
            $property = [];
            foreach ($property_data as $key => $val) {
                $property[$key] = $val['name'];
            }

            //area data
            $area_id = $this->db->select('area_id')->where_in('lead_id', $lead_data['id'])->get('tb_lead_area_interested')->result_array();
            $area_data = [];
            foreach ($area_id as $k => $v) {
                $area_data[$k] = $this->db->select('name')->where_in('id', $v['area_id'])->get('tb_area_master')->row_array();
            }
            $area = [];
            foreach ($area_data as $key => $val) {
                $area[$key] = $val['name'];
            }

            $budget = $lead_data['from_budget'] . '-' . $lead_data['to_budget'];

            $result['data'][] = array(
                $i++,
                ucwords($customer_data['first_name'] . ' ' . $customer_data['last_name']),
                implode(',', $agent),
                $master['name'],
                $stage_data['name'],
                implode(',', $property),
                implode(',', $area),
                $budget,
                $lead_data['status']
            );
        }
        echo json_encode($result);
    }

    //followup master
    public function all_followups($id)
    {
        $followups = $this->promast->getFollowups($id);
        $result = array('data' => []);
        $i = 1;
        foreach ($followups as $value) {

            $type_data = $this->db->get_where('tb_followup_type_master', array('id' => $value['followtype_id']))->row();
            $button = '<a href="' . base_url('admin/Propertymaster/edit_followups/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-property-followup-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Propertymaster/delete_followups/' . $value['id'] . '/' . $id) . '#customer-followups" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
            $result['data'][] = array(
                $i++,
                // $value['type'],
                // $type_data->name,
                date('d M Y h:i:s a', strtotime($value['followup_date'])),
                ($value['is_reminder'] == 1)?"yes":"no",
                ($value['reminder_date'] != null)?date('d M Y h:i:s a', strtotime($value['reminder_date'])):"-",
                $value['description'],
                date('d M Y h:i:s a', strtotime($value['created_date'])),
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }

    public function addfollowup($id)
    {
        $propertymaster = $this->promast->getPropertymaster($id);
        $data = array();
        $data['property_id'] = $id;
        $data['property'] = $propertymaster;
        $data['followuptype'] = $this->promast->getFollowupType('Property');
        $data['customer_id'] = explode(',', $propertymaster->customer_id);
        if (!empty($propertymaster->customer_id)) {
            foreach ($data['customer_id'] as $key => $value) {
                $record['parameter'] = array('id' => $value);
                $record['fields'] = array('first_name', 'last_name');
                $customer = $this->common->getDataById('tb_customer_master', $record);
                $data['customer_id'][$key] = $customer['first_name'] . ' ' . $customer['last_name'];
            }
            $data['customer'] = implode(', ', $data['customer_id']);
        }
        $data['agent_id'] = explode(',', $propertymaster->agent_id);
        if (!empty($propertymaster->agent_id)) {
            foreach ($data['agent_id'] as $key => $value) {
                $record['parameter'] = array('id' => $value);
                $record['fields'] = array('first_name', 'last_name');
                $agent = $this->common->getDataById('tb_agent_master', $record);
                $data['agent_id'][$key] = $agent['first_name'] . ' ' . $agent['last_name'];
            }
            $data['agent'] = implode(', ', $data['agent_id']);
        }
        $data['property_stage'] = $this->db->select('name')->where_in('id',$propertymaster->property_stage_id)->get('tb_property_stage')->row_array();
        $data['state'] = $this->db->select('name')->where_in('id',$propertymaster->state_id)->get('tb_state_master')->row_array();
        $data['district'] = $this->db->select('name')->where_in('id',$propertymaster->district_id)->get('tb_district_master')->row_array();
        $data['subdistrict'] = $this->db->select('name')->where_in('id',$propertymaster->sub_district_id)->get('tb_sub_district_master')->row_array();
        $data['area'] = $this->db->select('name')->where_in('id',$propertymaster->area_id)->get('tb_area_master')->row_array();

        $data['page_name'] = 'property_master_addfollowup';
        $this->load->view('admin/index', $data);
    }
    //Followup master
    public function store_followups()
    {
        $data = $this->input->post();
        $data['model_type'] = 'property';
        $data['model_id'] = $this->input->post('property_id');
        if(!array_key_exists('is_reminder',$data)){
            $data['reminder_date'] = null;
        }
        $response = $this->promast->save_followup_records($data);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Property Followup Added Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }
    public function edit_followups($id)
    {
        $data = $this->promast->getFollowup($id);
        echo json_encode($data);
    }
    public function update_followups($id)
    {
        $data = $this->input->post();
        $data['model_type'] = 'property';
        $data['model_id'] = $this->input->post('property_id');
        if(isset($_POST['is_reminder'])){
            $data['is_reminder'] = $this->input->post('is_reminder');
            $data['reminder_date'] = $this->input->post('reminder_date');
        }else{
            $data['is_reminder'] = '0';
            $data['reminder_date'] = NULL;
        }
        $response = $this->promast->update_followup_records($id, $data);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Property Followup Updated Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }
    public function delete_followups($id, $property_id)
    {
        $response = $this->promast->delete_followups_records($id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Property Followup Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Propertymaster/addfollowup/' . $property_id);
    }
}

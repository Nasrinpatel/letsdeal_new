<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leadmaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('front/Leadmaster_model', 'leadmaster');
        $this->load->model('front/Modal_model', 'modal');
        $this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
    }

    public function index()
    {
        $data['page_name'] = 'lead_master_view';
        $data['master'] = $this->leadmaster->getPromaster();
        $data['all_leadstage'] = $this->leadmaster->getLeadStage();
        $data['category'] = $this->leadmaster->getCategory();
        // $data['area'] = $this->leadmaster->getArea();
        $data['sub_category'] = $this->leadmaster->getSubCategory();
        $data['area'] = $this->leadmaster->getArealist();
        $this->load->view('admin/index', $data);
    }
    public function leadfeedbackview()
    {
        $data['page_name'] = 'lead_feedback_view';
        $data['master'] = $this->leadmaster->getPromaster();
        $data['all_leadstage'] = $this->leadmaster->getLeadStage();
        $data['category'] = $this->leadmaster->getCategory();
        // $data['area'] = $this->leadmaster->getArea();
        $data['sub_category'] = $this->leadmaster->getSubCategory();
        $data['area'] = $this->leadmaster->getArealist();
        $this->load->view('admin/index', $data);
    }
    public function add()
    {
        $data['customers'] = $this->leadmaster->getCustomer();
        $data['master'] = $this->leadmaster->getPromaster();
        $data['leadstage'] = $this->leadmaster->getLeadStage();
        $data['question'] = $this->leadmaster->getQuestion();
        $data['category'] = $this->leadmaster->getCategory();
        $data['states'] = $this->leadmaster->getState();
        foreach ($data['question'] as $key => $value) {
            $data['question'][$key] = $this->db->where_in('id', $value['question_ids'])->get('tb_question_master')->row_array();
        }
        $data['page_name'] = 'lead_master_add';
        $this->load->view('admin/index', $data);
    }

    //filter  data
    // public function search_lead()
    // {

    //     $start_date = $this->input->post('start_date');
    //     $end_date = $this->input->post('end_date');
    //     $master = $this->input->post('master');
    //     $lead_stage = $this->input->post('lead_stage');
    //     $property = $this->input->post('property');
    //     $area = $this->input->post('area');
    //     $budget = $this->input->post('budget');

    //     $results = $this->leadmaster->searchData($start_date, $end_date, $master, $lead_stage, $property, $area, $budget);

    //     echo json_encode($results);
    // }
    //filter  data
    public function set_filter()
    {
        $this->session->set_userdata('start_date', $this->input->post('start_date'));
        $this->session->set_userdata('end_date', $this->input->post('end_date'));
        $this->session->set_userdata('master', $this->input->post('master'));
        $this->session->set_userdata('lead_stage', $this->input->post('lead_stage'));
        $this->session->set_userdata('property', $this->input->post('property'));
        $this->session->set_userdata('area', $this->input->post('area'));
        $this->session->set_userdata('budget', $this->input->post('budget'));
        echo 'true';
    }
    //Reset filter  data
    public function reset_filter()
    {
        $this->session->unset_userdata('start_date');
        $this->session->unset_userdata('end_date');
        $this->session->unset_userdata('master');
        $this->session->unset_userdata('lead_stage');
        $this->session->unset_userdata('property');
        $this->session->unset_userdata('area');
        $this->session->unset_userdata('budget');
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
    public function all_lead()
    {
        $search_params = [];
        $search_params['start_date'] = $this->session->userdata('start_date');
        $search_params['end_date'] = $this->session->userdata('end_date');
        $search_params['master'] = $this->session->userdata('master');
        $search_params['lead_stage'] = $this->session->userdata('lead_stage');
        $search_params['property'] = $this->session->userdata('property');
        $search_params['area'] = $this->session->userdata('area');
        $search_params['budget'] = $this->session->userdata('budget');
        $lead = $this->leadmaster->all($search_params);
        $result = array('data' => []);
        //$result = array();
        $i = 1;
        foreach ($lead as $value) {
            $customer_data = $this->db->where_in('id', $value['customer_id'])->get('tb_customer_master')->row_array();

            //channel partner data
            $agent_id = $this->db->select('agent_id')->where_in('customer_id', $value['customer_id'])->get('tb_customer_agent')->result_array();
            $agent_data = [];
            foreach ($agent_id as $key => $v) {
                $agent_data[$key] = $this->db->where_in('id', $v['agent_id'])->get('tb_agent_master')->row_array();
            }
            $agent = [];
            foreach ($agent_data as $key => $val) {
                $agent[$key] = $val['first_name'];
            }

            $master = $this->db->select('name')->where_in('id', $value['pro_master_id'])->get('tb_master')->row_array();
            $stage_data = $this->db->select('name')->where_in('id', $value['lead_stage_id'])->get('tb_lead_stage')->row_array();

            //property data
            $property_id = $this->db->select('pro_subcategory_id')->where_in('lead_id', $value['id'])->get('tb_lead_property_interested')->result_array();
            $property_data = [];
            foreach ($property_id as $k => $v) {
                $property_data[$k] = $this->db->select('name')->where_in('id', $v['pro_subcategory_id'])->get('tb_property_subcategory')->row_array();
            }
            $property = [];
            foreach ($property_data as $key => $val) {
                $property[$key] = $val['name'];
            }

            //area data
            $area_id = $this->db->select('area_id')->where_in('lead_id', $value['id'])->get('tb_lead_area_interested')->result_array();
            $area_data = [];
            foreach ($area_id as $k => $v) {
                $area_data[$k] = $this->db->select('name')->where_in('id', $v['area_id'])->get('tb_area_master')->row_array();
            }
            $area = [];
            foreach ($area_data as $key => $val) {
                $area[$key] = $val['name'];
            }

            $budget = $value['from_budget'] . '-' . $value['to_budget'];

            $button = '<a href="' . base_url('admin/Leadmaster/leadDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-warning"></i>
			<a href="' . base_url('admin/Leadmaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="' . base_url('admin/Leadmaster/addreminder/' . $value['id']) . '" class="action-icon addreminder-btn"><i class="mdi mdi-calendar-clock-outline text-secondary"></i></a>
            <a href="' . base_url('admin/Leadmaster/copyRecords/' . $value['id']) . '" class="action-icon"><i class="mdi mdi-content-copy text-primary"></i></a>
            <a href="' . base_url('admin/Leadmaster/change_column/' . $value['id']) . '" class="action-icon thumbs-up-btn" > <i class="mdi mdi-thumb-up text-success"></i></a>
            <a href="' . base_url('admin/Leadmaster/change_column/' . $value['id']) . '" class="action-icon thumbs-down-btn"> <i class="mdi mdi-thumb-down text-danger"></i></a>
            <a href="' . base_url('admin/Leadmaster/change_column/' . $value['id']) . '" class="action-icon not-match-btn"> <i class="mdi mdi-close text-warning"></i></a>

			<a href="' . base_url('admin/Leadmaster/addproperty/' . $value['id']) . '" class="action-icon addproperty-btn"> <i class="mdi mdi-city-variant text-black"></i></a>
            <a href="' . base_url('admin/Leadmaster/addfollowup/' . $value['id']) . '" class="action-icon addfollowup-btn"><i class="mdi mdi-run text-secondary"></i></a>
            <a href="' . base_url('admin/Leadmaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';

            $result['data'][] = array(
                $i++,
                ucwords($customer_data['first_name'] . ' ' . $customer_data['last_name']),
                implode(',', $agent),
                $master['name'],
                $stage_data['name'],
                implode(',', $property),
                implode(',', $area),
                $budget,
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }
    public function all_leadfeedbacklist()
    {
        $search_params = [];
        $search_params['selected_type'] = $this->session->userdata('selected_type');
        $lead = $this->leadmaster->all_feedback($search_params);
        $result = array('data' => []);
        //$result = array();
        $i = 1;
        foreach ($lead as $value) {
            $customer_data = $this->db->where_in('id', $value['customer_id'])->get('tb_customer_master')->row_array();

            //channel partner data
            $agent_id = $this->db->select('agent_id')->where_in('customer_id', $value['customer_id'])->get('tb_customer_agent')->result_array();
            $agent_data = [];
            foreach ($agent_id as $key => $v) {
                $agent_data[$key] = $this->db->where_in('id', $v['agent_id'])->get('tb_agent_master')->row_array();
            }
            $agent = [];
            foreach ($agent_data as $key => $val) {
                $agent[$key] = $val['first_name'];
            }

            $master = $this->db->select('name')->where_in('id', $value['pro_master_id'])->get('tb_master')->row_array();
            $stage_data = $this->db->select('name')->where_in('id', $value['lead_stage_id'])->get('tb_lead_stage')->row_array();

            //property data
            $property_id = $this->db->select('pro_subcategory_id')->where_in('lead_id', $value['id'])->get('tb_lead_property_interested')->result_array();
            $property_data = [];
            foreach ($property_id as $k => $v) {
                $property_data[$k] = $this->db->select('name')->where_in('id', $v['pro_subcategory_id'])->get('tb_property_subcategory')->row_array();
            }
            $property = [];
            foreach ($property_data as $key => $val) {
                $property[$key] = $val['name'];
            }

            //area data
            $area_id = $this->db->select('area_id')->where_in('lead_id', $value['id'])->get('tb_lead_area_interested')->result_array();
            $area_data = [];
            foreach ($area_id as $k => $v) {
                $area_data[$k] = $this->db->select('name')->where_in('id', $v['area_id'])->get('tb_area_master')->row_array();
            }
            $area = [];
            foreach ($area_data as $key => $val) {
                $area[$key] = $val['name'];
            }

            $budget = $value['from_budget'] . '-' . $value['to_budget'];

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

            $button = '<a href="' . base_url('admin/Leadmaster/change_column/' . $value['id']) . '" class="action-icon revert-btn" data-column="' . $col_name . '"><i class="mdi mdi-file-undo text-primary"></i></a>

            <a href="' . base_url('admin/Leadmaster/leadDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-warning"></i>
			<a href="' . base_url('admin/Leadmaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="' . base_url('admin/Leadmaster/addreminder/' . $value['id']) . '" class="action-icon addreminder-btn"><i class="mdi mdi-calendar-clock-outline text-secondary"></i></a>
            <a href="' . base_url('admin/Leadmaster/copyRecords/' . $value['id']) . '" class="action-icon"><i class="mdi mdi-content-copy text-primary"></i></a>
            
             <a href="' . base_url('admin/Leadmaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';

            $result['data'][] = array(
                $i++,
                ucwords($customer_data['first_name'] . ' ' . $customer_data['last_name']),
                implode(',', $agent),
                $master['name'],
                $stage_data['name'],
                implode(',', $property),
                implode(',', $area),
                $budget,
                $feedback,
                $reason_message,
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }

    public function store()
    {
        /*$this->form_validation->set_rules('customer_id', 'Customer','required');
        $this->form_validation->set_rules('pro_master_id', 'Master','required');
        $this->form_validation->set_rules('lead_stage_id', 'Lead Stage','required');
        $this->form_validation->set_rules('budget_type', 'Budget','required');
        if(!empty($_POST['single_budget'])){
            $this->form_validation->set_rules('single_budget', 'Budget','required');
        }
        if(!empty($_POST['from_budget']) && !empty($_POST['to_budget'])){
            $this->form_validation->set_rules('from_budget', 'From Budget','required');
            $this->form_validation->set_rules('to_budget', 'To Budget','required');
        }
        $this->form_validation->set_rules('status', 'Status','required');*/

        $formArray = $_POST;
        $response = $this->leadmaster->saverecords($formArray);
        if ($response == true) {
            $data['parameter'] = array('id' => $response['id']);
            $data['fields'] = array('pro_master_id');
            $master_id = $this->common->getDataById('tb_lead_master', $data);
            //                $this->session->set_flashdata('success', 'Lead Added Successfully.');
            echo json_encode(array('success' => true, 'message' => 'Lead Added Successfully.', 'insert_id' => $response['id'], 'master_id' => $master_id));
        } else {
            //                $this->session->set_flashdata('error', 'Something went wrong. Please try again');
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    public function store_question()
    {
        $formArray = $_POST;
        $response = $this->leadmaster->savequestion_records($formArray);
        if ($response == true) {
            $this->session->set_flashdata('success', 'Lead Added Successfully.');
            //            echo json_encode(array('success' => true, 'message' => 'Lead question Added Successfully.'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again');
            //            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
        return redirect('admin/Leadmaster/');
    }

    public function edit($id)
    {
        $data = array();
        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['master'] = $this->leadmaster->getPromaster();
        $data['customer'] = $this->db->where_in('id', $data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id', $data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id', $data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id', $data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['lead_id'] = $id;
        $data['category'] = $this->leadmaster->getCategory();
        $data['states'] = $this->leadmaster->getState();
        $data['remtype'] = $this->leadmaster->getReminderType('Lead');
        //        echo "<pre>"; print_r( $data['remtype']); exit;

        $data['all_customers'] = $this->leadmaster->getCustomer();
        $data['all_leadstage'] = $this->leadmaster->getLeadStage();
        $record['parameter'] = array('lead_id' => $id, 'pro_master_id' => $data['lead']['pro_master_id']);
        $data['questions'] = $this->common->getDataByParam('tb_lead_question_answer', $record);
        //        $data['questions'] = $this->db->where_in('lead_id',$id)->get('tb_lead_question_answer')->result_array();

        $data['page_name'] = 'lead_master_edit';
        $this->load->view('admin/index', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('pro_master_id', 'Master', 'required');
        $this->form_validation->set_rules('lead_stage_id', 'Lead Stage', 'required');
        $this->form_validation->set_rules('from_budget', 'From Budget', 'required');
        $this->form_validation->set_rules('to_budget', 'To Budget', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->edit($id);
        } else {
            $formArray = $_POST;
            $response = $this->leadmaster->updaterecords($id, $formArray);

            if ($response == true) {
                $this->session->set_flashdata('success', 'Lead Updated Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again');
            }
            return redirect('admin/Leadmaster/');
        }
    }

    //Lead details
    public function leadDetails($id)
    {
        $data = array();
        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['customer'] = $this->db->where_in('id', $data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id', $data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id', $data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id', $data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['lead_id'] = $id;
        $data['category'] = $this->leadmaster->getCategory();
        $data['states'] = $this->leadmaster->getState();

        $data['all_customers'] = $this->leadmaster->getCustomer();
        $data['all_leadstage'] = $this->leadmaster->getLeadStage();
        $data['questions'] = $this->db->where_in('lead_id', $id)->get('tb_lead_question_answer')->result_array();

        $data['page_name'] = 'lead_master_details';
        $this->load->view('admin/index', $data);
    }


    public function change_column($id)
    {
        $data = $_POST;
        $this->leadmaster->change_column($id, $data);
        echo "true";
    }
    // public function change_columnn($id)
    // {
    //     $data=$_POST;
    //     $this->leadmaster->change_column($id,$data);
    //     echo "true";
    // }


    //Lead Delete
    public function delete($id)
    {
        $response = $this->leadmaster->delete($id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Lead Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Leadmaster/');
    }

    //All Property Interested
    public function all_property_interested($id)
    {
        $property = $this->leadmaster->getPropertyInterested($id);
        $result = array('data' => []);
        $i = 1;
        foreach ($property as $value) {
            $category_data = $this->db->get_where('tb_property_category', array('id' => $value['pro_category_id']))->row();
            $subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $value['pro_subcategory_id']))->row();
            $button = '<a href="' . base_url('admin/Leadmaster/edit_property/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-property-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Leadmaster/delete_property/' . $value['id'] . '/' . $id) . '#property" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
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

    //Property Interetsed -> from category to sub category
    public function getSubcategoryByCategory()
    {
        $category_id = $this->input->post('property_category_id');
        $subcategories = $this->leadmaster->getSubcategoryByCategory($category_id);
        echo json_encode($subcategories);
    }

    //store Property Interetsed
    public function store_property_interested()
    {

        $formArray = array();
        $formArray['lead_id'] = $this->input->post('lead_id');
        $formArray['pro_category_id'] = $this->input->post('pro_category_id');
        $formArray['pro_subcategory_id'] = $this->input->post('pro_subcategory_id');
        $formArray['status'] = $this->input->post('status');

        $response = $this->leadmaster->save_property_intersted_records($formArray);

        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Property Interested Added Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    //Property edit
    public function edit_property($id)
    {
        $data = $this->leadmaster->getProperty($id);
        echo json_encode($data);
    }

    //Property Update
    public function update_property_interested($id)
    {
        $formArray = array();
        $formArray['lead_id'] = $this->input->post('lead_id');
        $formArray['pro_category_id'] = $this->input->post('pro_category_id');
        $formArray['pro_subcategory_id'] = $this->input->post('pro_subcategory_id');
        $formArray['status'] = $this->input->post('status');

        $response = $this->leadmaster->update_property_intersted_records($id, $formArray);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Property Interested Updated Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    //Property Interetsed Delete
    public function delete_property($id, $lead_id)
    {
        $response = $this->leadmaster->delete_property_intersted_records($id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Property Interested Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Leadmaster/edit/' . $lead_id . '#property');
    }

    //All Area Interetsted
    public function all_area_interested($id)
    {
        $specialistarea = $this->leadmaster->getAreaInterested($id);
        $result = array('data' => []);
        $i = 1;
        foreach ($specialistarea as $value) {
            $state_data = $this->db->get_where('tb_state_master', array('id' => $value['state_id']))->row();
            $district_data = $this->db->get_where('tb_district_master', array('id' => $value['district_id']))->row();
            $sub_district_data = $this->db->get_where('tb_sub_district_master', array('id' => $value['sub_district_id']))->row();
            $area_data = $this->db->get_where('tb_area_master', array('id' => $value['area_id']))->row();

            $button = '<a href="' . base_url('admin/Leadmaster/edit_area/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-area-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
				<a href="' . base_url('admin/Leadmaster/delete_area/' . $value['id'] . '/' . $id) . '#area" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
            $result['data'][] = array(
                $i++,
                $state_data->name,
                $district_data->name,
                $sub_district_data->name,
                $area_data->name,
                date('d M Y h:i:s a', strtotime($value['created_date'])),
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }

    // Area Interested -> state to district
    public function getDistrictByState()
    {
        $state_id = $this->input->post('state_id');
        $district = $this->leadmaster->getDistrictByState($state_id);
        echo json_encode($district);
    }
    // Area Interested -> district to sub district
    public function getSubDistrictByDistrict()
    {
        $district_id = $this->input->post('district_id');
        $sub_district_id = $this->leadmaster->getSubDistrictByDistrict($district_id);
        echo json_encode($sub_district_id);
    }
    // Area Interested -> sub district to area
    public function getAreaBySubDistrict()
    {
        $sub_district_id = $this->input->post('sub_district_id');
        $area_id = $this->leadmaster->getAreaBySubDistrict($sub_district_id);
        echo json_encode($area_id);
    }
    //store Area Interetsed
    public function store_area_interested()
    {
        $formArray = array();
        $formArray['lead_id'] = $this->input->post('lead_id');
        $formArray['state_id'] = $this->input->post('state_id');
        $formArray['district_id'] = $this->input->post('district_id');
        $formArray['sub_district_id'] = $this->input->post('sub_district_id');
        $formArray['area_id'] = $this->input->post('area_id');
        $formArray['status'] = $this->input->post('status');

        $record = $this->leadmaster->count_area($formArray);
        if ($record == '0') {
            $response = $this->leadmaster->save_area_intersted_records($formArray);

            if ($response == true) {
                echo json_encode(array('success' => true, 'message' => 'Area Interested Added Successfully.'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
            }
        } else {
            echo json_encode(array('error' => true, 'message' => 'Area Interested already exists.'));
        }
    }

    //Area edit
    public function edit_area($id)
    {
        $data = $this->leadmaster->getArea($id);
        echo json_encode($data);
    }

    // Area Interested Update
    public function update_area_interested($id)
    {
        $formArray = array();
        $formArray['lead_id'] = $this->input->post('lead_id');
        $formArray['state_id'] = $this->input->post('state_id');
        $formArray['district_id'] = $this->input->post('district_id');
        $formArray['sub_district_id'] = $this->input->post('sub_district_id');
        $formArray['area_id'] = $this->input->post('area_id');
        $formArray['status'] = $this->input->post('status');

        $response = $this->leadmaster->update_area_intersted_records($id, $formArray);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Channel Partner Specialist Area Updated Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    //Area Interetsed Delete
    public function delete_area($id, $lead_id)
    {
        $response = $this->leadmaster->delete_area_intersted_records($id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Area Interested Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Leadmaster/edit/' . $lead_id . '#area');
    }

    //reminders master
    public function addreminder($id)
    {
        //        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['lead_id'] = $id;
        $data['remtype'] = $this->leadmaster->getReminderType('Lead');
        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['customer'] = $this->db->where_in('id', $data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id', $data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id', $data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id', $data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        //master data
        $data['master'] = $this->db->where_in('id', $data['lead']['pro_master_id'])->get('tb_master')->row_array();
        //property data
        $record['parameter'] = array('lead_id' => $id);
        $data['property_data'] = $this->common->getDataByParam('tb_lead_property_interested', $record);
        foreach ($data['property_data'] as $k => $v) {
            $property_data[$k] = $this->db->select('name')->where_in('id', $v['pro_subcategory_id'])->get('tb_property_subcategory')->row_array();
        }
        foreach ($property_data as $key => $val) {
            $property[$key] = $val['name'];
        }
        $data['property'] = implode(',', $property);
        //area data
        $value['parameter'] = array('lead_id' => $id);
        $data['area_data'] = $this->common->getDataByParam('tb_lead_area_interested', $value);
        foreach ($data['area_data'] as $k => $v) {
            $area_data[$k] = $this->db->select('name')->where_in('id', $v['area_id'])->get('tb_area_master')->row_array();
        }
        foreach ($area_data as $key => $val) {
            $area[$key] = $val['name'];
        }
        $data['area'] = implode(',', $area);

        $data['page_name'] = 'lead_master_addreminder';
        $this->load->view('admin/index', $data);
    }

    //reminders master
    public function store_reminders()
    {
        $data = $this->input->post();
        $data['model_type'] = 'lead';
        $data['model_id'] = $this->input->post('lead_id');
        $response = $this->leadmaster->save_reminders_records($data);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Lead Reminder Added Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    public function all_reminders($id)
    {
        $reminders = $this->leadmaster->getReminders($id);
        $result = array('data' => []);
        $i = 1;
        foreach ($reminders as $value) {

            $type_data = $this->db->get_where('tb_remindertype_master', array('id' => $value['type']))->row();
            $button = '<a href="' . base_url('admin/Leadmaster/edit_reminders/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-lead-reminders-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Leadmaster/delete_reminders/' . $value['id'] . '/' . $id) . '#reminder" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
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

    public function edit_reminders($id)
    {
        $data = $this->leadmaster->getReminder($id);
        echo json_encode($data);
    }

    public function update_reminders($id)
    {
        $data = $this->input->post();
        $data['model_type'] = 'lead';
        $data['model_id'] = $this->input->post('lead_id');
        $response = $this->leadmaster->update_reminders_records($id, $data);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Lead Reminder Updated Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    public function delete_reminders($id, $lead_id)
    {
        $response = $this->leadmaster->delete_reminders_records($id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Lead Reminder Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Leadmaster/edit/' . $lead_id . '#reminders');
    }

    public function get_questions()
    {
        $master_id = $_POST['master_id'];
        $data['question'] = $this->leadmaster->getQuestions($master_id);

        $html = '<div class="row">
                  <div class="col-12">
                   <form method="post" id="store-question" action="' . base_url('/admin/Leadmaster/store_question') . '">
                       <div class="row">
                           <div class="col-lg-5">
                            <div class="mb-3">
                                <div class="sequence_box">';
        foreach ($data['question'] as $item) {
            $html .= ' <div class="sequence">';
            $html .= '<h5>' . $item['question'] . '</h5>
                                            <input type="hidden" name="lead_id" id="lead_id" value="' . $_POST['lead_id'] . '">
                                            <input type="hidden" name="pro_master_id" id="pro_master_id" value="' . $_POST['master_id'] . '">
                                            <input type="hidden" name="question[]" value="' . $item['question'] . '">
                                            <input type="hidden" name="question_id[]" value="' . $item['id'] . '">
                                            <input type="hidden" name="answer_type_' . $item['id'] . '" value="' . $item['question_answer_inputtype'] . '">';
            if ($item['source_id'] != '') {
                $source_options = $this->db->get_where('source_option_master', array('source_cat_id' => $item['source_id']))->result_array();
                foreach ($source_options as $source_option) {
                    $html .= '<input type="hidden" name="answer_options_' . $item['id'] . '[]" value="' . $source_option['name'] . '">
                                                      <input type="hidden" name="answer_option_ids_' . $item['id'] . '[]" value="' . $source_option['id'] . '">';
                }
            } else {
                $source_options = [];
            }
            if ($item['question_answer_inputtype'] == 'Textbox') {
                $html .= '<input type="text" class="form-control" name="answer_' . $item['id'] . '" id="userName1" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Dropdown') {
                $html .= '<select class="form-select" name="answer_' . $item['id'] . '" ' . (($item['is_require'] == 1) ? 'required' : '') . '>
                                                     <option>Select Option</option>';
                foreach ($source_options as $source_option) {
                    $html .= '<option value="' . $source_option['id'] . '">' . $source_option['name'] . '</option>';
                }
                $html .= '</select>';
            } elseif ($item['question_answer_inputtype'] == 'Checkbox') {
                foreach ($source_options as $source_option) {
                    $html .= '<div class="form-check form-check-inline">
                                                         <input class="form-check-input" type="checkbox" id="userName1"  name="answer_' . $item['id'] . '[]" value="' . $source_option['id'] . '" ' . (($item['is_require'] == 1) ? 'required' : '') . '>
                                                         <label class="form-check-label" for="userName1">' . $source_option['name'] . '</label><br>
                                                     </div>';
                }
            } elseif ($item['question_answer_inputtype'] == 'Radio') {
                foreach ($source_options as $source_option) {
                    $html .= '<div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="userName1"  name="answer_' . $item['id'] . '" value="' . $source_option['id'] . '" ' . (($item['is_require'] == 1) ? 'required' : '') . '>
                                                        <label class="form-check-label" for="userName1">' . $source_option['name'] . '</label><br>
                                                      </div>';
                }
            } elseif ($item['question_answer_inputtype'] == 'Date') {
                $html .= '<input type="date" class="form-control" id="userName1"  name="answer_' . $item['id'] . '" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Textarea') {
                $html .= '<textarea class="form-control" id="userName1" name="answer_' . $item['id'] . '" ' . (($item['is_require'] == 1) ? 'required' : '') . '></textarea>';
            } elseif ($item['question_answer_inputtype'] == 'File') {
                $html .= '<input type="file" class="form-control" id="userName1"  name="answer_' . $item['id'] . '" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Number') {
                $html .= '<input type="number" class="form-control" id="userName1"  name="answer_' . $item['id'] . '" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Phone') {
                $html .= '<input type="tel" class="form-control" placeholder="Enter Phone number" id="userName1" name="answer_' . $item['id'] . '" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Email') {
                $html .= '<input type="email" class="form-control" id="userName1" placeholder="Enter Email Address"  name="answer_' . $item['id'] . '" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Link') {
                $html .= '<input type="url" class="form-control" id="userName1" placeholder="Enter Link"  name="answer_' . $item['id'] . '" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Image') {
                $html .= '<input type="file" class="form-control" name="answer_' . $item['id'] . '" accept="image/*" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Video 360') {
                $html .= '<input type="url" class="form-control" placeholder="Enter Vieo 360 Link" name="answer_' . $item['id'] . '" accept="video/*" ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Image Gallery') {
                $html .= '<input class="image_gallery" name="answer_' . $item['id'] . '[]" type="file" multiple ' . (($item['is_require'] == 1) ? 'required' : '') . '>';
            } elseif ($item['question_answer_inputtype'] == 'Video Gallery') {
                $html .= '<div id="videogallery">
                                                     <div class="row">
                                                         <div class="col-lg-10">
                                                             <div class="mb-3">
                                                                 <input type="url" class="form-control" name="answer_' . $item['id'] . '[]" id="videogallery" placeholder="Enter Video Link" ' . (($item['is_require'] == 1) ? 'required' : '') . '>
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-2">
                                                             <a class="btn btn-success waves-effect waves-light add-button"  data-name="answer_' . $item['id'] . '[]">Add </a>
                                                         </div>
                                                     </div>
                                                 </div>';
            } elseif ($item['question_answer_inputtype'] == 'Google map') {
                $html .= '<div class="row">
                                                     <div class="col-md-6">
                                                         <input type="text" class="form-control" placeholder="Enter Latitude"  name="answer_' . $item['id'] . '[]" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>
                                                     </div>
                                                     <div class="col-md-6">
                                                         <input type="text" class="form-control" placeholder="Enter Longitude"  name="answer_' . $item['id'] . '[]" value="" ' . (($item['is_require'] == 1) ? 'required' : '') . '>
                                                     </div>
                                                 </div>';
            }
            $html .= '</div>';
        }
        $html .= '</div>
                                        </div>
                                       </div>
                                     </div>
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="text">
                                          <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                       </div>
                                    </div>
                                 </div>
                   </form>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <script type="application/javascript">
            $(document).ready(function() {
                 $(".sequence_box").sortable({ tolerance: "pointer" });
                 $(".sequence").css("cursor","move");
            });
    	    </script>';
        echo json_encode(array('success' => true, 'html' => $html));
    }
    //copy records Lead  master
    function copyRecords($id)
    {

        // Get the Lead master record by ID
        $leaddata = $this->leadmaster->getLeadmastercopy($id);

        if ($leaddata) {
            // Create a copy of the Lead master record

            $copyData = array(
                'customer_id' => $leaddata->customer_id,
                'pro_master_id' => $leaddata->pro_master_id,
                'lead_stage_id' => $leaddata->lead_stage_id,
                //'budget_type' => $leaddata->budget_type,
                'status' => $leaddata->status,

            );


            // Save the copied record
            $response = $this->leadmaster->saverecords($copyData);

            if ($response) {
                $this->session->set_flashdata('success', 'Lead Master Copied Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again');
            }
        } else {
            $this->session->set_flashdata('error', 'Lead Master not found.');
        }

        return redirect('admin/Leadmaster/');
    }
    public function addproperty($id)
    {
        $data['lead_id'] = $id;
        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['customer'] = $this->db->where_in('id', $data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id', $data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id', $data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id', $data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['master'] = $this->db->where_in('id', $data['lead']['pro_master_id'])->get('tb_master')->row_array();
        //property data
        $record['parameter'] = array('lead_id' => $id);
        $data['property_data'] = $this->common->getDataByParam('tb_lead_property_interested',$record);
        if(!empty($data['property_data'])){
            foreach ($data['property_data'] as $k => $v){
                $property_data[$k] = $this->db->select('name')->where_in('id',$v['pro_subcategory_id'])->get('tb_property_subcategory')->row_array();
            }
            foreach ($property_data as $key => $val){
                $property[$key] = $val['name'];
            }
            $data['property'] = implode(',',$property);
        }
        //area data
        $value['parameter'] = array('lead_id' => $id);
        $data['area_data'] = $this->common->getDataByParam('tb_lead_area_interested',$value);
        if(!empty($data['area_data'])){
            foreach ($data['area_data'] as $k => $v){
                $area_data[$k] = $this->db->select('name')->where_in('id',$v['area_id'])->get('tb_area_master')->row_array();
            }
            foreach ($area_data as $key => $val){
                $area[$key] = $val['name'];
            }
            $data['area'] = implode(',',$area);
        }
        $data['allmaster'] = $this->leadmaster->getMaster();
        $data['category'] = $this->leadmaster->getCategory();
        $data['subcategory'] = $this->leadmaster->getSubcategory();
        $data['propertystage'] = $this->leadmaster->getPropertyStage();
        $data['states'] = $this->leadmaster->getState();
        $data['allarea'] = $this->leadmaster->getAreas();

        $data['page_name'] = 'lead_master_addproperty';
        $this->load->view('admin/index', $data);
    }

    public function set_property_filter(){
        /*if(isset($_POST['lead_id']) && !empty($_POST['lead_id'])){
            $lead_id = $_POST['lead_id'];
            $value['parameter'] = array('lead_id' => $lead_id);
            $property = $this->common->getDataByParam('tb_lead_property_interested',$value);
            foreach ($property as $key => $value){
                $category[$key] = $value['pro_category_id'];
                $subcategory[$key] = $value['pro_subcategory_id'];
            }
            $this->session->set_userdata('category',$category);
            $this->session->set_userdata('subcategory',$subcategory);
        }else{

        }*/
        $this->session->set_userdata('category',$this->input->post('category'));
        $this->session->set_userdata('subcategory',$this->input->post('subcategory'));
        $this->session->set_userdata('start_date',$this->input->post('start_date'));
        $this->session->set_userdata('end_date',$this->input->post('end_date'));
        $this->session->set_userdata('budget',$this->input->post('budget'));
        $this->session->set_userdata('stage',$this->input->post('stage'));
        $this->session->set_userdata('master',$this->input->post('master'));
        $this->session->set_userdata('area',$this->input->post('area'));
        echo 'true';
    }
    public function reset_property_filter(){
        $this->session->unset_userdata('start_date');
        $this->session->unset_userdata('end_date');
        $this->session->unset_userdata('category');
        $this->session->unset_userdata('subcategory');
        $this->session->unset_userdata('budget');
        $this->session->unset_userdata('stage');
        $this->session->unset_userdata('master');
        $this->session->unset_userdata('area');
        echo 'true';
    }

    public function all_property_suggestion($id){
        $search_params=[];
        $search_params['start_date'] = $this->session->userdata('start_date');
        $search_params['end_date'] = $this->session->userdata('end_date');
        $search_params['category'] = $this->session->userdata('category');
        $search_params['subcategory'] = $this->session->userdata('subcategory');
        $search_params['budget'] = $this->session->userdata('budget');
        $search_params['stage'] = $this->session->userdata('stage');
        $search_params['master'] = $this->session->userdata('master');
        $search_params['area'] = $this->session->userdata('area');

        $properties = $this->leadmaster->all_property_suggestion($search_params);

        foreach ($properties as $key => $record){
            $result = array('data' => []);
            foreach ($record as $value) {
                $master_data = $this->db->get_where('tb_master', array('id' => $value['pro_master_id']))->row();
                $category_data = $this->db->get_where('tb_property_category', array('id' =>  $value['pro_category_id']))->row();
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

                $result['data'][] = array(
                    $value['id'],
                    implode(',',$name),
                    $master_data->name,
                    $category_data->name,
                    $subcategory_data->name,
                    $stage_data['name'],
                    $value['from_budget'].'-'.$value['to_budget'],
                    $area['name'],
                    date('d M Y h:i:s a', strtotime($value['created_date'])),
                    $value['status']
                );
            }
        }
        echo json_encode($result);
    }

    public function store_property_suggestion(){
        unset($_POST['property_suggestion_datatable_length']);
        $data = [];
        foreach ($_POST['property_id'] as $key => $value){
            $count = $this->leadmaster->count_property_suggestion($_POST['lead_id'],$value);
            if($count == '0'){
                $data['lead_id'] = $this->input->post('lead_id');
                $data['property_id'] = $value;
                $response = $this->leadmaster->save_property_suggestion($data);
                if ($response == true) {
                    echo json_encode(array('success' => true, 'message' => 'Lead Property Added Successfully.'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
                }
            }else{
                echo json_encode(array('error' => true, 'message' => 'Property already added.'));
            }
        }
    }

    public function all_properties($id)
    {
        $properties = $this->leadmaster->all_properties($id);
        $result = array('data' => []);
        $i = 1;
        foreach ($properties as $value) {
            $property = $this->db->get_where('tb_property_master', array('id' => $value['property_id']))->row();
            $master_data = $this->db->get_where('tb_master', array('id' => $property->pro_master_id))->row();
            $category_data = $this->db->get_where('tb_property_category', array('id' => $property->pro_category_id))->row();
            $subcategory_data = $this->db->get_where('tb_property_subcategory', array('id' => $property->pro_subcategory_id))->row();
            $stage_data = $this->db->select('name')->where_in('id',$property->property_stage_id)->get('tb_property_stage')->row_array();
            $area = $this->db->select('name')->where_in('id',$property->area_id)->get('tb_area_master')->row_array();

            if(!empty($property->customer_id)){
                $customer = explode(',', $property->customer_id);
                $customer_name = [];
                for($j=0;$j<count($customer);$j++){
                    $customer_name[$j] = $this->db->where_in('id',$customer[$j])->get('tb_customer_master')->row_array();
                }
                $name = [];
                foreach ($customer_name as $key => $val){
                    $name[$key] = $val['first_name'].' '.$val['last_name'];
                }
            }
            if(!empty($property->agent_id)){
                $agent = explode(',', $property->customer_id);
                $agent_name = [];
                for($j=0;$j<count($agent);$j++){
                    $agent_name[$j] = $this->db->where_in('id',$agent[$j])->get('tb_agent_master')->row_array();
                }
                $name = [];
                foreach ($agent_name as $key => $val){
                    $name[$key] = $val['first_name'].' '.$val['last_name'];
                }
            }

            $button = '<a href="' . base_url('admin/Leadmaster/view/' . $value['property_id']) . '" class="action-icon eye-btn view-btn" data-id="' . $value['property_id'] . '" data-bs-toggle="modal" data-bs-target="#property-suggestion-view-modal"><i class="mdi mdi-eye text-info"></i></a>
            <a href="' . base_url('admin/Leadmaster/delete_property_suggestion/' .$id.'/'.$value['property_id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i>';

            $result['data'][] = array(
                $i++,
                implode(',',$name),
                $master_data->name,
                $category_data->name,
                $subcategory_data->name,
                $stage_data['name'],
                $property->from_budget.'-'.$property->to_budget,
                $area['name'],
                date('d M Y h:i:s a', strtotime($property->created_date)),
                $property->status,
                $button
            );
        }
        echo json_encode($result);
    }

    public function view($property_id)
    {
        $propertymaster = $this->leadmaster->getPropertymaster($property_id);
        $data = array();
        $data['property_suggest'] = $propertymaster;
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
        $data['ps_state'] = $this->db->select('name')->where_in('id',$propertymaster->state_id)->get('tb_state_master')->row_array();
        $data['ps_district'] = $this->db->select('name')->where_in('id',$propertymaster->district_id)->get('tb_district_master')->row_array();
        $data['ps_subdistrict'] = $this->db->select('name')->where_in('id',$propertymaster->sub_district_id)->get('tb_sub_district_master')->row_array();
        $data['ps_area'] = $this->db->select('name')->where_in('id',$propertymaster->area_id)->get('tb_area_master')->row_array();
        echo json_encode($data);
    }

    public function delete_property_suggestion($lead_id,$property_id)
    {
        $response = $this->leadmaster->delete_property_suggestion($lead_id,$property_id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Lead Property Suggestion Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Leadmaster/addproperty/' . $lead_id);
    }

    //followup master
    public function all_followups($id)
    {
        $followups = $this->leadmaster->getFollowups($id);
        $result = array('data' => []);
        $i = 1;
        foreach ($followups as $value) {

            $type_data = $this->db->get_where('tb_followup_type_master', array('id' => $value['followtype_id']))->row();
            $button = '<a href="' . base_url('admin/Leadmaster/edit_followups/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-lead-followup-modal"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
			<a href="' . base_url('admin/Leadmaster/delete_followups/' . $value['id'] . '/' . $id) . '#customer-followups" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
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
        $data['lead_id'] = $id;
        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['customer'] = $this->db->where_in('id', $data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id', $data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id', $data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id', $data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['master'] = $this->db->where_in('id', $data['lead']['pro_master_id'])->get('tb_master')->row_array();
        //property data
        $record['parameter'] = array('lead_id' => $id);
        $data['property_data'] = $this->common->getDataByParam('tb_lead_property_interested',$record);
        if(!empty($data['property_data'])){
            foreach ($data['property_data'] as $k => $v){
                $property_data[$k] = $this->db->select('name')->where_in('id',$v['pro_subcategory_id'])->get('tb_property_subcategory')->row_array();
            }
            foreach ($property_data as $key => $val){
                $property[$key] = $val['name'];
            }
            $data['property'] = implode(',',$property);
        }
        //area data
        $value['parameter'] = array('lead_id' => $id);
        $data['area_data'] = $this->common->getDataByParam('tb_lead_area_interested',$value);
        if(!empty($data['area_data'])){
            foreach ($data['area_data'] as $k => $v){
                $area_data[$k] = $this->db->select('name')->where_in('id',$v['area_id'])->get('tb_area_master')->row_array();
            }
            foreach ($area_data as $key => $val){
                $area[$key] = $val['name'];
            }
            $data['area'] = implode(',',$area);
        }
        $data['followuptype'] = $this->leadmaster->getFollowupType('Lead');

        $data['page_name'] = 'lead_master_addfollowup';
        $this->load->view('admin/index', $data);
    }

    //Followup master
    public function store_followups()
    {
        $data = $this->input->post();
        $data['model_type'] = 'lead';
        $data['model_id'] = $this->input->post('lead_id');
        if(!array_key_exists('is_reminder',$data)){
            $data['reminder_date'] = null;
        }
        $response = $this->leadmaster->save_followup_records($data);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Lead Followup Added Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }
    public function edit_followups($id)
    {
        $data = $this->leadmaster->getFollowup($id);
        echo json_encode($data);
    }
    public function update_followups($id)
    {
        $data = $this->input->post();
        $data['model_type'] = 'lead';
        $data['model_id'] = $this->input->post('lead_id');
        if(isset($_POST['is_reminder'])){
            $data['is_reminder'] = $this->input->post('is_reminder');
            $data['reminder_date'] = $this->input->post('reminder_date');
        }else{
            $data['is_reminder'] = '0';
            $data['reminder_date'] = NULL;
        }
        $response = $this->leadmaster->update_followup_records($id, $data);
        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Lead Followup Updated Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }
    public function delete_followups($id, $customer_id)
    {
        $response = $this->leadmaster->delete_followups_records($id);

        if ($response == true) {
            $this->session->set_flashdata('success', 'Lead Followup Deleted Successfully.');
        } else {
            $this->sesssion->set_flashdata('error', 'Something went wrong. Please try again');
        }
        return redirect('admin/Leadmaster/addfollowup/' . $customer_id);
    }
}

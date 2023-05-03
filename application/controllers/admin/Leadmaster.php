<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leadmaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('front/Leadmaster_model', 'leadmaster');
        $this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
    }

    public function index()
    {
        $data['page_name'] = 'lead_master_view';
        $this->load->view('admin/index', $data);
    }

    public function add()
    {
        $data['customers'] = $this->leadmaster->getCustomer();
        $data['leadstage'] = $this->leadmaster->getLeadStage();
        $data['question'] = $this->leadmaster->getQuestion();
        foreach ($data['question'] as $key => $value){
            $data['question'][$key] = $this->db->where_in('id',$value['question_ids'])->get('tb_question_master')->row_array();
        }
        $data['page_name'] = 'lead_master_add';
        $this->load->view('admin/index', $data);
    }

    public function all_lead()
    {
        $lead = $this->leadmaster->all();
        $result = array('data' => []);
        //$result = array();
        $i = 1;
        foreach ($lead as $value) {
            $customer_data = $this->db->select('first_name')->where_in('id',$value['customer_id'])->get('tb_customer_master')->row_array();
            $stage_data = $this->db->select('name')->where_in('id',$value['lead_stage_id'])->get('tb_lead_stage')->row_array();

            $button = '<a href="' . base_url('admin/Leadmaster/leadDetails/' . $value['id']) . '" class="action-icon eye-btn"> <i class="mdi mdi-eye text-warning"></i>
			<a href="' . base_url('admin/Leadmaster/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="' . base_url('admin/Leadmaster/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';

            $result['data'][] = array(
                $i++,
                ucwords($customer_data['first_name']),
                $stage_data['name'],
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }

    public function store()
    {
        $this->form_validation->set_rules('customer_id', 'Customer','required');
        $this->form_validation->set_rules('lead_stage_id', 'Lead Stage','required');
        $this->form_validation->set_rules('status', 'Status','required');
        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $formArray = $_POST;
            $response = $this->leadmaster->saverecords($formArray);
            if ($response == true) {
                $this->session->set_flashdata('success', 'Lead Added Successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again');
            }
            return redirect('admin/Leadmaster/');
        }
    }

    public function edit($id)
    {
        $data = array();
        $data['lead'] = $this->leadmaster->getLeadMaster($id);
        $data['customer'] = $this->db->where_in('id',$data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id',$data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id',$data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id',$data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['lead_id'] = $id;
        $data['category'] = $this->leadmaster->getCategory();
        $data['states'] = $this->leadmaster->getState();

        $data['all_customers'] = $this->leadmaster->getCustomer();
        $data['all_leadstage'] = $this->leadmaster->getLeadStage();
        $data['questions'] = $this->db->where_in('lead_id',$id)->get('tb_lead_question_answer')->result_array();

        $data['page_name'] = 'lead_master_edit';
        $this->load->view('admin/index', $data);
    }

    public function update($id){
        $this->form_validation->set_rules('customer_id', 'Customer','required');
        $this->form_validation->set_rules('lead_stage_id', 'Lead Stage','required');
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
        $data['customer'] = $this->db->where_in('id',$data['lead']['customer_id'])->get('tb_customer_master')->row_array();
        $data['source_data'] = $this->db->where_in('id',$data['customer']['source_id'])->get('tb_source_master')->row_array();
        $data['position_data'] = $this->db->where_in('id',$data['customer']['position_id'])->get('tb_position_master')->row_array();
        $data['lead_stage'] = $this->db->select('name')->where_in('id',$data['lead']['lead_stage_id'])->get('tb_lead_stage')->row_array();
        $data['lead_id'] = $id;
        $data['category'] = $this->leadmaster->getCategory();
        $data['states'] = $this->leadmaster->getState();

        $data['all_customers'] = $this->leadmaster->getCustomer();
        $data['all_leadstage'] = $this->leadmaster->getLeadStage();
        $data['questions'] = $this->db->where_in('lead_id',$id)->get('tb_lead_question_answer')->result_array();

        $data['page_name'] = 'lead_master_details';
        $this->load->view('admin/index', $data);
    }

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
            $button = '<a href="' . base_url('admin/Leadmaster/edit_property/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-property-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
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
            $city_data = $this->db->get_where('tb_city_master', array('id' => $value['city_id']))->row();
            $area_data = $this->db->get_where('tb_area_master', array('id' => $value['area_id']))->row();

            $button = '<a href="' . base_url('admin/Leadmaster/edit_area/' . $value['id']) . '" class="action-icon edit-btn" data-id="' . $value['id'] . '" data-bs-toggle="modal" data-bs-target="#edit-area-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
				<a href="' . base_url('admin/Leadmaster/delete_area/' . $value['id'] . '/' . $id) . '#area" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
            $result['data'][] = array(
                $i++,
                $state_data->name,
                $city_data->name,
                $area_data->name,
                date('d M Y h:i:s a', strtotime($value['created_date'])),
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }

    // Area Interested -> state to city
    public function getCityByState()
    {
        $state_id = $this->input->post('state_id');
        $cities = $this->leadmaster->getCityByState($state_id);
        echo json_encode($cities);
    }
    // Area Interested -> city to area
    public function getAreaByCity()
    {
        $city_id = $this->input->post('city_id');
        $cities = $this->leadmaster->getAreaByCity($city_id);
        echo json_encode($cities);
    }
    //store Area Interetsed
    public function store_area_interested()
    {
        $formArray = array();
        $formArray['lead_id'] = $this->input->post('lead_id');
        $formArray['state_id'] = $this->input->post('state_id');
        $formArray['city_id'] = $this->input->post('city_id');
        $formArray['area_id'] = $this->input->post('area_id');
        $formArray['status'] = $this->input->post('status');

        $response = $this->leadmaster->save_area_intersted_records($formArray);

        if ($response == true) {
            echo json_encode(array('success' => true, 'message' => 'Area Interested Added Successfully.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong. Please try again'));
        }
    }

    //Area edit
    public function edit_area($id)
    {
        $data = $this->leadmaster->getArea($id);
        echo json_encode($data);
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

}

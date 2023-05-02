<?php
class Leadmaster_model extends CI_model{

    public $db_name;

    public function __construct()
    {
        parent::__construct();
        $this->db_name = 'tb_lead_master';
    }

    function saverecords($formArray)
    {
        $d=[];
        $d['customer_id'] = $formArray['customer_id'];
        $d['lead_stage_id'] = $formArray['lead_stage_id'];
        $d['status'] = $formArray['status'];
        $this->db->insert($this->db_name,$d);
        $lead_id = $this->db->insert_id();
        $i=0;
        if(!empty($formArray['question_id'])) {
            foreach ($formArray['question_id'] as $q_id) {
                if ($formArray['answer_type_' . $q_id] == 'Checkbox') {
                    $given_answer = [];
                    foreach ($formArray['answer_' . $q_id . ''] as $answer) {
                        $given_answer[] = $this->db->get_where('source_option_master', ['id' => $answer])->row()->name;
                    }
                    $given_answer_id = $formArray['answer_' . $q_id];
                } elseif ($formArray['answer_type_' . $q_id] == 'Image') {
                    $config = array(
                        'upload_path' => "./uploads/lead/",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,
                        'file_name' => time() . '-' . date("Y-m-d")
                    );
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('answer_' . $q_id)) {
                        $upload_data = $this->upload->data();
                        $given_answer = $upload_data['file_name'];
                        $given_answer_id = $upload_data['file_name'];
                    }
                } elseif ($formArray['answer_type_' . $q_id] == 'Image Gallery') {
                    $given_answer = [];
                    $given_answer_id = [];
                    $filesCount = count($_FILES['answer_' . $q_id]['name']);
                    for ($cnt = 0; $cnt < $filesCount; $cnt++) {
                        $_FILES['file']['name'] = $_FILES['answer_' . $q_id]['name'][$cnt];
                        $_FILES['file']['type'] = $_FILES['answer_' . $q_id]['type'][$cnt];
                        $_FILES['file']['tmp_name'] = $_FILES['answer_' . $q_id]['tmp_name'][$cnt];
                        $_FILES['file']['error'] = $_FILES['answer_' . $q_id]['error'][$cnt];
                        $_FILES['file']['size'] = $_FILES['answer_' . $q_id]['size'][$cnt];
                        $config = array(
                            'upload_path' => "./uploads/lead/",
                            'allowed_types' => "gif|jpg|png|jpeg|pdf",
                            'overwrite' => TRUE,
                            'file_name' => time() . '-' . date("Y-m-d") . $cnt
                        );
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('file')) {
                            $upload_data = $this->upload->data();
                            $given_answer[] = $upload_data['file_name'];
                            $given_answer_id[] = $upload_data['file_name'];
                        }
                    }
                } elseif ($formArray['answer_type_' . $q_id] == 'Dropdown' || $formArray['answer_type_' . $q_id] == 'Radio') {
                    $given_answer = $this->db->get_where('source_option_master', ['id' => $formArray['answer_' . $q_id . '']])->row()->name;
                    $given_answer_id = $formArray['answer_' . $q_id];
                } else {
                    $given_answer = $formArray['answer_' . $q_id . ''];
                    $given_answer_id = $formArray['answer_' . $q_id . ''];
                }
                $answers = [
                    'answer_type' => $formArray['answer_type_' . $q_id],
                ];
                $answer_ids = [
                    'answer_type' => $formArray['answer_type_' . $q_id],
                ];
                $options = [];
                $option_ids = [];
                if (!empty($formArray['answer_options_' . $q_id])) {
                    foreach ($formArray['answer_options_' . $q_id] as $option) {
                        if ($formArray['answer_type_' . $q_id] == 'Checkbox') {
                            $options[][$option] = ((in_array($option, $given_answer)) ? true : false);
                        } else {
                            $options[][$option] = (($given_answer == $option) ? true : false);
                        }
                    }
                } else {
                    if (is_array($given_answer)) {
                        foreach ($given_answer as $option) {
                            $options[][$option] = true;
                        }
                    } else {
                        $options[][$given_answer] = true;
                    }

                }
                if (!empty($formArray['answer_option_ids_' . $q_id])) {
                    foreach ($formArray['answer_option_ids_' . $q_id] as $option_id) {
                        if ($formArray['answer_type_' . $q_id] == 'Checkbox') {
                            $option_ids[][$option_id] = ((in_array($option_id, $given_answer_id)) ? true : false);
                        } else {
                            $option_ids[][$option_id] = (($given_answer_id == $option_id) ? true : false);
                        }
                    }
                } else {
                    if (is_array($given_answer_id)) {
                        foreach ($given_answer_id as $option) {
                            $option_ids[][$option] = true;
                        }
                    } else {
                        $option_ids[][$given_answer_id] = true;
                    }
                }
                $answers['options'] = $options;
                $answer_ids['options'] = $option_ids;
                $data = [
                    'lead_id' => $lead_id,
                    'question_id' => $q_id,
                    'answer_ids' => json_encode($answer_ids),
                    'question' => $formArray['question'][$i],
                    'answers' => json_encode($answers)
                ];
                $this->db->insert('tb_lead_question_answer', $data);
                $i++;
            }
        }
        return true;
    }

    function all(){
        $data = $this->db->get($this->db_name)->result_array();
        return $data;
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->db_name);
        return true;
    }

    function getQuestion(){
        $data = $this->db->get('tb_leadform_master')->result_array();
        return $data;
    }

    function getLeadMaster($id){
        $data = $this->db->where('id',$id)->get($this->db_name)->row_array();
        return $data;
    }

    function getCustomer(){
        $data = $this->db->get('tb_customer_master')->result_array();
        return $data;
    }

    function getLeadStage(){
        $data = $this->db->get('tb_lead_stage')->result_array();
        return $data;
    }

    function getCategory(){
        $data = $this->db->get('tb_property_category')->result_array();
        return $data;
    }

    function getSubcategoryByCategory($category_id)
    {
        $this->db->where('property_category_id', $category_id);
        $data = $this->db->get('tb_property_subcategory')->result_array();
        return $data;
    }

    function getState(){
        $data = $this->db->get('tb_state_master')->result_array();
        return $data;
    }

    function getCityByState($state_id)
    {
        $this->db->where('state_id', $state_id);
        $data = $this->db->get('tb_city_master')->result_array();
        return $data;
    }

    function getAreaByCity($city_id)
    {
        $this->db->where('city_id', $city_id);
        $data = $this->db->get('tb_area_master')->result_array();
        return $data;
    }

    //Property Interested
    function save_property_intersted_records($formArray)
    {
        $this->db->insert('tb_lead_property_interested',$formArray);
        return true;
    }

    //Area Interested
    function save_area_intersted_records($formArray)
    {
        $this->db->insert('tb_lead_area_interested',$formArray);
        return true;
    }

    function getPropertyInterested($id){
        $data = $this->db->get_where('tb_lead_property_interested',['lead_id'=>$id])->result_array();
        return $data;
    }

    function getAreaInterested($id){
        $data = $this->db->get_where('tb_lead_area_interested',['lead_id'=>$id])->result_array();
        return $data;
    }
    function getProperty($id){
        $data = $this->db->get_where('tb_lead_property_interested',['id'=>$id])->row();
        return $data;
    }
    function update_property_intersted_records($id,$formArray)
    {
        $this->db->where('id',$id);
        $this->db->update('tb_lead_property_interested',$formArray);
        return true;
    }
    function delete_property_intersted_records($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_lead_property_interested');
        return true;
    }
    function getArea($id){
        $data = $this->db->get_where('tb_lead_area_interested',['id'=>$id])->row();
        return $data;
    }
    function delete_area_intersted_records($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_lead_area_interested');
        return true;
    }
    function getSource(){
        $data = $this->db->get('tb_source_interested')->row();
        return $data;
    }

}

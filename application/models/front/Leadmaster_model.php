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
        $this->db->insert($this->db_name,$formArray);
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

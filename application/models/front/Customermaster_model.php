<?php
class Customermaster_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_customer_master';
	}
	function all()
	{
		$data = $this->db->get($this->db_name)->result_array();
		return $data;
	}
	function saverecords($formArray)
	{
		 $this->db->insert($this->db_name,$formArray);
		 return true;
	}
	function save_contact_records($formArray)
	{
		 $this->db->insert('tbl_customer_contact_master',$formArray);
		 return true;
	}
	function save_note_records($formArray)
	{
		 $this->db->insert('tbl_note_master',$formArray);
		 return true;
	}
	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db_name);
		return true;
	}
	
	function delete_contact_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_customer_contact_master');
		return true;
	}
	function delete_note_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_note_master');
		return true;
	}
	
	function getCustomer($id){
		$data = $this->db->get_where('tb_customer_master',['id'=>$id])->row();
		return $data;
	}
	function getCustomerContact($id){
		$data = $this->db->get_where('tbl_customer_contact_master',['customer_id'=>$id])->result_array();
		return $data;
	}
	function getCustomerNote($id){
		$data = $this->db->get_where('tbl_note_master',['customer_id'=>$id])->result_array();
		return $data;
	}
	function getCustomerProperty($id){
		$data = $this->db->get_where('tb_property_master',['customer_id'=>$id])->result_array();
		return $data;
	}
	function getNote($id){
		$data = $this->db->get_where('tbl_note_master',['id'=>$id])->row();
		return $data;
	}
	function getContact($id){
		$data = $this->db->get_where('tbl_customer_contact_master',['id'=>$id])->row();
		return $data;
	}
	function getSourceMaster(){
		$data = $this->db->get('source_category_master')->result_array();
		return $data;
	}
	function getPosition(){
		$data = $this->db->get('tb_position_master')->result_array();
		return $data;
	}
	
	function getSource(){
		$data = $this->db->get('tb_source_master')->result_array();
		return $data;
	}
	function getStaff(){
		$data = $this->db->get('tbl_staff_master')->result_array();
		return $data;
	}
	function getAgent(){
		$data = $this->db->get('tb_agent_master')->result_array();
		return $data;
	}
	function getPositionByID($id){
		$data = $this->db->get_where('tb_position_master',['id'=>$id])->row();
		return $data;
	}
	function getSourceByID($id){
		$data = $this->db->get_where('tb_source_master',['id'=>$id])->row();
		return $data;
	}
	function getStaffByID($id){
		$data = $this->db->get_where('tbl_staff_master',['id'=>$id])->row();
		return $data;
	}
	function updaterecords($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update($this->db_name,$formArray);
		return true;
	}

	function update_contact_records($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_customer_contact_master',$formArray);
		return true;
	}
	function update_note_records($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_note_master',$formArray);
		return true;
	}
	// function getAgents(){
	// 	$data = $this->db->get('tb_agent_master')->result_array();
	// 	return $data;
	// }
	// function getPromaster(){
	// 	$data = $this->db->get('tb_master')->result_array();
	// 	return $data;
	// }
	// function getCategory(){
	// 	$data = $this->db->get('tb_property_category')->result_array();
	// 	return $data;
	// }
	// function getSubcategory(){
	// 	$data = $this->db->get('tb_property_subcategory')->result_array();
	// 	return $data;
	// }

	// function getSubcategoryByCategory($category_id)
	// {
	// 	$this->db->where('property_category_id', $category_id);
	// 	$data = $this->db->get('tb_property_subcategory')->result_array();
	// 	return $data;
	// }
}
?>

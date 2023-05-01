<?php
class Agentmaster_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_agent_master';
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
		 $this->db->insert('tbl_agent_contact_master',$formArray);
		 return true;
	}
	//Specialist For
	function save_specialistfor_records($formArray)
	{
		 $this->db->insert('tb_agent_specialist_for',$formArray);
		 return true;
	}
	
	function getSpecialistfor($id){
		$data = $this->db->get_where('tb_agent_specialist_for',['agent_id'=>$id])->result_array();
		return $data;
	}
	function getSpecialist($id){
		$data = $this->db->get_where('tb_agent_specialist_for',['id'=>$id])->row();
		return $data;
	}
	//Specialist Area
	function save_specialistarea_records($formArray)
	{
		 $this->db->insert('tb_agent_specialist_area',$formArray);
		 return true;
	}
	//all
	function getSpecialistarea($id){
		$data = $this->db->get_where('tb_agent_specialist_area',['agent_id'=>$id])->result_array();
		return $data;
	}
	//edit
	function getSpecialistfetch($id){
		$data = $this->db->get_where('tb_agent_specialist_area',['id'=>$id])->row();
		return $data;
	}
	function getSubcategoryByCategory($category_id)
	{
		$this->db->where('property_category_id', $category_id);
		$data = $this->db->get('tb_property_subcategory')->result_array();
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
	function getCategory(){
		$data = $this->db->get('tb_property_category')->result_array();
		return $data;
	}
	function getSubcategory(){
		$data = $this->db->get('tb_property_subcategory')->result_array();
		return $data;
	}
	
	function getState(){
		$data = $this->db->get('tb_state_master')->result_array();
		return $data;
	}
	
	function getCity(){
		$data = $this->db->get('tb_city_master')->result_array();
		return $data;
	}
	function getArea(){
		$data = $this->db->get('tb_agent_specialist_area')->result_array();
		return $data;
	}
	function save_note_records($formArray)
	{
		 $this->db->insert('tbl_agent_note_master',$formArray);
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
		$this->db->delete('tbl_agent_contact_master');
		return true;
	}
	function delete_note_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_agent_note_master');
		return true;
	}
	function getAgent($id){
		$data = $this->db->get_where('tb_agent_master',['id'=>$id])->row();
		return $data;
	}
	function getAgentContact($id){
		$data = $this->db->get_where('tbl_agent_contact_master',['agent_id'=>$id])->result_array();
		return $data;
	}
	function getAgentNote($id){
		$data = $this->db->get_where('tbl_agent_note_master',['agent_id'=>$id])->result_array();
		return $data;
	}

	function getNote($id){
		$data = $this->db->get_where('tbl_agent_note_master',['id'=>$id])->row();
		return $data;
	}
	function getContact($id){
		$data = $this->db->get_where('tbl_agent_contact_master',['id'=>$id])->row();
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
	
	function getAgentProperty($id){
		$data = $this->db->get_where('tb_property_master',['agent_id'=>$id])->result_array();
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
		$this->db->update('tbl_agent_contact_master',$formArray);
		return true;
	}
	function update_note_records($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_agent_note_master',$formArray);
		return true;
	}
	//Specialist For update delete
	function update_specialistfor_records($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tb_agent_specialist_for',$formArray);
		return true;
	}
	
	function delete_specialistfor_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_agent_specialist_for');
		return true;
	}
	//Specialist Area update delete
	function update_specialistarea_records($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tb_agent_specialist_area',$formArray);
		return true;
	}
	function delete_specialistarea_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_agent_specialist_area');
		return true;
	}

	function getassigneddata($table,$post){
		$fields = $post['fields'] ?? array("*");
		$param = implode(',',$fields);
		$this->db->select($param);

		if(isset($post['parameter']) && $post['parameter'] != ''){
			foreach ($post['parameter'] as $key => $value){
				$this->db->where($key,$value);
			}
		}
		$query = $this->db->get($table);
		return $query->row_array();
	}
}
?>

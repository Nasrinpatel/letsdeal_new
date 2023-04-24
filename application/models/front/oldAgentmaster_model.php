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
}
?>

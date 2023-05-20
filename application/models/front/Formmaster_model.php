<?php
class Formmaster_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_form_master';
	}

	function all()
	{
		$data = $this->db->get($this->db_name)->result_array();
		return $data;
	}
	function getMaster(){
		$data = $this->db->get('tb_master')->result_array();
		return $data;
	}
	function getCategory(){
		$data = $this->db->get('tb_property_category')->result_array();
		return $data;
	}
	function getQuestion(){
		$data = $this->db->get('tb_question_master')->result_array();
		return $data;
	}
	function getPhase(){
		$data = $this->db->get('tb_phase_master')->result_array();
		return $data;
	}
	
	
	function saverecords($formArray)
	{
		 $this->db->insert($this->db_name,$formArray);
		 return true;
	}
	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db_name);
		return true;
	}
	// function getCategory($id)
	// {
	// 	$data = $this->db->where('id',$id)->get($this->db_name)->row();
	// 	return $data;
	// }
	function updaterecords($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update($this->db_name,$formArray);
		return true;
	}
	function getFormmaster($id){
		$data = $this->db->where('id',$id)->get('tb_form_master')->row();
		return $data;
	}
	
	
}

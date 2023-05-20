<?php
class Area_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_area_master';
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
	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db_name);
		return true;
	}
	function getArea($id)
	{
		$data = $this->db->where('id',$id)->get($this->db_name)->row();
		return $data;
	}
	function getCity(){
		$data = $this->db->get('tb_city_master')->result_array();
		return $data;
	}
	
	function updaterecords($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update($this->db_name,$formArray);
		return true;
	}
	//import excel for Area
	public function insert_batch($data){
		$this->db->insert_batch('tb_area_master',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	
	
}

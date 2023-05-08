<?php
class City_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_city_master';
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
	function getCity($id)
	{
		$data = $this->db->where('id',$id)->get($this->db_name)->row();
		return $data;
	}
	function getState(){
		$data = $this->db->get('tb_state_master')->result_array();
		return $data;
	}
	
	// function updaterecords($id,$formArray)
	// {
	// 	$this->db->where('id',$id);
	// 	$this->db->update($this->db_name,$formArray);
	// 	return true;
	// }
	function updaterecords($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update($this->db_name,$formArray);
		if($formArray['is_default']==1){
			$this->db->update($this->db_name,['is_default'=>0],['is_default'=>1,'id !=' => $id]);
		 }
		return true;
	}
	
	//import excel for City
	public function insert_batch($data){
		$this->db->insert_batch('tb_city_master',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	
}	 
 ?>

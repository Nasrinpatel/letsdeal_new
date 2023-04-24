<?php
class Sourcecategory_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'source_category_master';
	}

	function all()
	{
		$data = $this->db->get($this->db_name)->result_array();
		return $data;
	}
	function saverecords($formArray,$formArrayoptions)
	{
		 $this->db->insert($this->db_name,$formArray);
		 $category_id = $this->db->insert_id();
		 foreach($formArrayoptions as $s){
			$this->db->insert('source_option_master',array('source_cat_id'=>$category_id,'name'=>$s));
		 }
		 return true;
	}
	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db_name);
		return true;
	}
	function getSourcecategory($id)
	{
		$data = $this->db->where('id',$id)->get($this->db_name)->row();
		return $data;
	}

	function updaterecords($id,$formArray,$formArrayoptions)
	{
		$this->db->where('id',$id);
		$this->db->update($this->db_name,$formArray);
		//delete old option and insert new
		$this->db->delete('source_option_master',array('source_cat_id'=>$id));
		foreach($formArrayoptions as $s){
			$this->db->insert('source_option_master',array('source_cat_id'=>$id,'name'=>$s));
		}
		return true;
	}
	
	
	
}	 
 ?>

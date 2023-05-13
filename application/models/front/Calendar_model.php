<?php
class Calendar_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		//$this->db_name = 'tb_agent_master';
	}
	
	public function getReminders(){
		$this->db->select(['tbl_reminder_master.*','tb_remindertype_master.name as type_name']);
		$this->db->join('tb_remindertype_master','tb_remindertype_master.id=tbl_reminder_master.type');
		return $this->db->get('tbl_reminder_master')->result_array();
	}
}
?>

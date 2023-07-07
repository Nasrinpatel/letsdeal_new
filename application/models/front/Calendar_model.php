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
		$this->db->where('tbl_reminder_master.status', 1);
		return $this->db->get('tbl_reminder_master')->result_array();
	}


	public function updateReminder($reminderId, $reminderData)
    {
        $this->db->where('id', $reminderId);
        return $this->db->update('tbl_reminder_master', $reminderData);
    }
	public function getReminderById($reminderId)
	{
		// Perform the necessary database query or retrieval logic to fetch the reminder by its ID
		// For example:
		$query = $this->db->get_where('tbl_reminder_master', array('id' => $reminderId));
		$reminder = $query->row();
	
		return $reminder;
	}
	public function getFollowups(){
		$this->db->select(['tb_followup_master.*','tb_followup_type_master.name as type_name']);
		$this->db->join('tb_followup_type_master','tb_followup_type_master.id=tb_followup_master.followtype_id');
		return $this->db->get('tb_followup_master')->result_array();
	}
	// public function getProperties(){
	// 	$this->db->select(['tbl_reminder_master.*','tb_remindertype_master.name as type_name']);
	// 	$this->db->join('tb_remindertype_master','tb_remindertype_master.id=tbl_reminder_master.type');
	// 	return $this->db->get('tbl_reminder_master')->result_array();
	// }
}

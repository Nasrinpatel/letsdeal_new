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
	//reminder
	function save_reminders_records($data)
	{
        $data['startdate']    = date('Y-m-d',strtotime($data['startdate']));

        if (isset($data['repeat_every']) && $data['repeat_every'] != '') {
            $data['recurring'] = 1;
            if ($data['repeat_every'] == 'custom') {
                $data['repeat_every']     = $data['repeat_every_custom'];
                $data['recurring_type']   = $data['repeat_type_custom'];
                $data['custom_recurring'] = 1;
            } else {
                $_temp                    = explode('-', $data['repeat_every']);
                $data['recurring_type']   = $_temp[1];
                $data['repeat_every']     = $_temp[0];
                $data['custom_recurring'] = 0;
            }
        } else {
            $data['recurring'] = 0;
        }

        if (isset($data['repeat_type_custom']) && isset($data['repeat_every_custom'])) {
            unset($data['repeat_type_custom']);
            unset($data['repeat_every_custom']);
        }

        // $data = hooks()->apply_filters('before_add_task', $data);

        $this->db->insert('tbl_reminder_master', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        }
        return false;

	}
	function getReminders($id){
		$data = $this->db->get_where('tbl_reminder_master',['customer_id'=>$id])->result_array();
		return $data;
	}
	function getReminder($id){
		$data = $this->db->get_where('tbl_reminder_master',['id'=>$id])->row();
		return $data;
	}
	function delete_reminders_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_reminder_master');
		return true;
	}
	function update_reminders_records($id,$data)
	{
		$data['startdate']    = date('Y-m-d',strtotime($data['startdate']));

        if (isset($data['repeat_every']) && $data['repeat_every'] != '') {
            $data['recurring'] = 1;
            if ($data['repeat_every'] == 'custom') {
                $data['repeat_every']     = $data['repeat_every_custom'];
                $data['recurring_type']   = $data['repeat_type_custom'];
                $data['custom_recurring'] = 1;
            } else {
                $_temp                    = explode('-', $data['repeat_every']);
                $data['recurring_type']   = $_temp[1];
                $data['repeat_every']     = $_temp[0];
                $data['custom_recurring'] = 0;
            }
        } else {
            $data['recurring'] = 0;
        }

        if (isset($data['repeat_type_custom']) && isset($data['repeat_every_custom'])) {
            unset($data['repeat_type_custom']);
            unset($data['repeat_every_custom']);
        }
		unset($data['reminder_id']);
        // $data = hooks()->apply_filters('before_add_task', $data);
		$this->db->where('id',$id);
		$r=$this->db->update('tbl_reminder_master',$data);
        if ($r) {
            return $r;
        }
        return false;
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

}
?>

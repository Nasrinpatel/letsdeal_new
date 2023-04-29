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
	function save_reminders_records($formArray)
	{
		 $this->db->insert('tbl_reminder_master',$formArray);
		 return true;
	}
	function getReminders($id){
		$data = $this->db->get_where('tbl_reminder_master',['customer_id'=>$id])->result_array();
		return $data;
	}
	function delete_reminders_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_reminder_master');
		return true;
	}
	function update_reminders_records($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_reminder_master',$formArray);
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





	 /**
     * Add new staff task
     * @param array $data task $_POST data
     * @return mixed
     */
    public function add($data, $clientRequest = false)
    {
        $ticket_to_task = false;

        if (isset($data['ticket_to_task'])) {
            $ticket_to_task = true;
            unset($data['ticket_to_task']);
        }

        $data['startdate']             = to_sql_date($data['startdate']);
        $data['duedate']               = to_sql_date($data['duedate']);
        $data['dateadded']             = date('Y-m-d H:i:s');
        $data['addedfrom']             = $clientRequest == false ? get_staff_user_id() : get_contact_user_id();
        $data['is_added_from_contact'] = $clientRequest == false ? 0 : 1;

        $checklistItems = [];
        if (isset($data['checklist_items']) && count($data['checklist_items']) > 0) {
            $checklistItems = $data['checklist_items'];
            unset($data['checklist_items']);
        }

        if ($clientRequest == false) {
            $defaultStatus = get_option('default_task_status');
            if ($defaultStatus == 'auto') {
                if (date('Y-m-d') >= $data['startdate']) {
                    $data['status'] = 4;
                } else {
                    $data['status'] = 1;
                }
            } else {
                $data['status'] = $defaultStatus;
            }
        } else {
            // When client create task the default status is NOT STARTED
            // After staff will get the task will change the status
            $data['status'] = 1;
        }

        if (isset($data['custom_fields'])) {
            $custom_fields = $data['custom_fields'];
            unset($data['custom_fields']);
        }

        if (isset($data['is_public'])) {
            $data['is_public'] = 1;
        } else {
            $data['is_public'] = 0;
        }

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

        if (is_client_logged_in() || $clientRequest) {
            $data['visible_to_client'] = 1;
        } else {
            if (isset($data['visible_to_client'])) {
                $data['visible_to_client'] = 1;
            } else {
                $data['visible_to_client'] = 0;
            }
        }

        if (isset($data['billable'])) {
            $data['billable'] = 1;
        } else {
            $data['billable'] = 0;
        }

        if ((!isset($data['milestone']) || $data['milestone'] == '') || (isset($data['milestone']) && $data['milestone'] == '')) {
            $data['milestone'] = 0;
        } else {
            if ($data['rel_type'] != 'project') {
                $data['milestone'] = 0;
            }
        }
        if (empty($data['rel_type'])) {
            unset($data['rel_type']);
            unset($data['rel_id']);
        } else {
            if (empty($data['rel_id'])) {
                unset($data['rel_type']);
                unset($data['rel_id']);
            }
        }

        $data = hooks()->apply_filters('before_add_task', $data);

        $tags = '';
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $this->db->insert(db_prefix() . 'tasks', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            foreach ($checklistItems as $key => $chkID) {
                if ($chkID != '') {
                    $itemTemplate = $this->get_checklist_template($chkID);
                    $this->db->insert(db_prefix() . 'task_checklist_items', [
                        'description' => $itemTemplate->description,
                        'taskid'      => $insert_id,
                        'dateadded'   => date('Y-m-d H:i:s'),
                        'addedfrom'   => get_staff_user_id(),
                        'list_order'  => $key,
                        ]);
                }
            }
            handle_tags_save($tags, $insert_id, 'task');
            if (isset($custom_fields)) {
                handle_custom_fields_post($insert_id, $custom_fields);
            }

            if (isset($data['rel_type']) && $data['rel_type'] == 'lead') {
                $this->load->model('leads_model');
                $this->leads_model->log_lead_activity($data['rel_id'], 'not_activity_new_task_created', false, serialize([
                    '<a href="' . admin_url('tasks/view/' . $insert_id) . '" onclick="init_task_modal(' . $insert_id . ');return false;">' . $data['name'] . '</a>',
                    ]));
            }

            if ($clientRequest == false) {
                $new_task_auto_assign_creator = (get_option('new_task_auto_assign_current_member') == '1' ? true : false);

                if (isset($data['rel_type']) && $data['rel_type'] == 'project' && !$this->projects_model->is_member($data['rel_id'])) {
                    $new_task_auto_assign_creator = false;
                }
                if ($new_task_auto_assign_creator == true) {
                    $this->db->insert(db_prefix() . 'task_assigned', [
                        'taskid'        => $insert_id,
                        'staffid'       => get_staff_user_id(),
                        'assigned_from' => get_staff_user_id(),
                    ]);
                }
                if (get_option('new_task_auto_follower_current_member') == '1') {
                    $this->db->insert(db_prefix() . 'task_followers', [
                        'taskid'  => $insert_id,
                        'staffid' => get_staff_user_id(),
                    ]);
                }

                if ($ticket_to_task && isset($data['rel_type']) && $data['rel_type'] == 'ticket') {
                    $ticket_attachments = $this->db->query('SELECT * FROM ' . db_prefix() . 'ticket_attachments WHERE ticketid=' . $this->db->escape_str($data['rel_id']) . ' OR (ticketid=' . $this->db->escape_str($data['rel_id']) . ' AND replyid IN (SELECT id FROM ' . db_prefix() . 'ticket_replies WHERE ticketid=' . $this->db->escape_str($data['rel_id']) . '))')->result_array();

                    if (count($ticket_attachments) > 0) {
                        $task_path = get_upload_path_by_type('task') . $insert_id . '/';
                        _maybe_create_upload_path($task_path);

                        foreach ($ticket_attachments as $ticket_attachment) {
                            $path = get_upload_path_by_type('ticket') . $data['rel_id'] . '/' . $ticket_attachment['file_name'];
                            if (file_exists($path)) {
                                $f = fopen($path, FOPEN_READ);
                                if ($f) {
                                    $filename = unique_filename($task_path, $ticket_attachment['file_name']);
                                    $fpt      = fopen($task_path . $filename, 'w');
                                    if ($fpt && fwrite($fpt, stream_get_contents($f))) {
                                        $this->db->insert(db_prefix() . 'files', [
                                                            'rel_id'         => $insert_id,
                                                            'rel_type'       => 'task',
                                                            'file_name'      => $filename,
                                                            'filetype'       => $ticket_attachment['filetype'],
                                                            'staffid'        => get_staff_user_id(),
                                                            'dateadded'      => date('Y-m-d H:i:s'),
                                                            'attachment_key' => app_generate_hash(),
                                                        ]);
                                    }
                                    if ($fpt) {
                                        fclose($fpt);
                                    }
                                    fclose($f);
                                }
                            }
                        }
                    }
                }
            }

            log_activity('New Task Added [ID:' . $insert_id . ', Name: ' . $data['name'] . ']');
            hooks()->do_action('after_add_task', $insert_id);

            return $insert_id;
        }

        return false;
    }

    /**
     * Update task data
     * @param  array $data task data $_POST
     * @param  mixed $id   task id
     * @return boolean
     */
    public function update($data, $id, $clientRequest = false)
    {
        $affectedRows      = 0;
        $data['startdate'] = to_sql_date($data['startdate']);
        $data['duedate']   = to_sql_date($data['duedate']);

        $checklistItems = [];
        if (isset($data['checklist_items']) && count($data['checklist_items']) > 0) {
            $checklistItems = $data['checklist_items'];
            unset($data['checklist_items']);
        }

        if (isset($data['datefinished'])) {
            $data['datefinished'] = to_sql_date($data['datefinished'], true);
        }

        if (isset($data['custom_fields'])) {
            $custom_fields = $data['custom_fields'];
            if (handle_custom_fields_post($id, $custom_fields)) {
                $affectedRows++;
            }
            unset($data['custom_fields']);
        }

        if ($clientRequest == false) {
            $data['cycles'] = !isset($data['cycles']) ? 0 : $data['cycles'];

            $original_task = $this->get($id);

            // Recurring task set to NO, Cancelled
            if ($original_task->repeat_every != '' && $data['repeat_every'] == '') {
                $data['cycles']              = 0;
                $data['total_cycles']        = 0;
                $data['last_recurring_date'] = null;
            }

            if ($data['repeat_every'] != '') {
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

            if (isset($data['is_public'])) {
                $data['is_public'] = 1;
            } else {
                $data['is_public'] = 0;
            }
            if (isset($data['billable'])) {
                $data['billable'] = 1;
            } else {
                $data['billable'] = 0;
            }

            if (isset($data['visible_to_client'])) {
                $data['visible_to_client'] = 1;
            } else {
                $data['visible_to_client'] = 0;
            }
        }

        if ((!isset($data['milestone']) || $data['milestone'] == '') || (isset($data['milestone']) && $data['milestone'] == '')) {
            $data['milestone'] = 0;
        } else {
            if ($data['rel_type'] != 'project') {
                $data['milestone'] = 0;
            }
        }


        if (empty($data['rel_type'])) {
            $data['rel_id']   = null;
            $data['rel_type'] = null;
        } else {
            if (empty($data['rel_id'])) {
                $data['rel_id']   = null;
                $data['rel_type'] = null;
            }
        }

        $data = hooks()->apply_filters('before_update_task', $data, $id);

        if (isset($data['tags'])) {
            if (handle_tags_save($data['tags'], $id, 'task')) {
                $affectedRows++;
            }
            unset($data['tags']);
        }

        foreach ($checklistItems as $key => $chkID) {
            $itemTemplate = $this->get_checklist_template($chkID);
            $this->db->insert(db_prefix() . 'task_checklist_items', [
                    'description' => $itemTemplate->description,
                    'taskid'      => $id,
                    'dateadded'   => date('Y-m-d H:i:s'),
                    'addedfrom'   => get_staff_user_id(),
                    'list_order'  => $key,
                    ]);
            $affectedRows++;
        }

        $this->db->where('id', $id);
        $this->db->update(db_prefix() . 'tasks', $data);
        if ($this->db->affected_rows() > 0) {
            $affectedRows++;
            hooks()->do_action('after_update_task', $id);
            log_activity('Task Updated [ID:' . $id . ', Name: ' . $data['name'] . ']');
        }

        if ($affectedRows > 0) {
            return true;
        }

        return false;
    }

}
?>

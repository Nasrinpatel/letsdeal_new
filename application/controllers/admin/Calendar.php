<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Calendar_model', 'cale');
		//$this->load->model('front/Propertymaster_model', 'promast');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');
	}

	public function index()
	{
		$data['page_name'] = 'calendar_view';
		$this->load->view('admin/index', $data);
	}

	public function getAllCalenderEvents()
	{
		$remiders = $this->cale->getReminders();
		$followups = $this->cale->getFollowups();
		//$proprties = $this->cale->getProperty();
		$events = array();
		foreach ($remiders as $r) {
			if ($r['model_type'] == 'Customer') {
				$events[] = array(
					'id' => $r['id'],
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					// 'type' => $r['model_type'],
					'type' => $r['model_type'].' Reminder',
					'event_type' => 'reminder',
					'priority' => $r['priority'],
					'display' => 'block',
					'className' => 'bg-success',
					//'backgroundColor' =>'magenta',
					'color' => '#ffffff'
				);
			} elseif ($r['model_type'] == 'Property') {
				$events[] = array(
					'id' => $r['id'],
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'].' Reminder',
					'event_type' => 'reminder',
					'priority' => $r['priority'],
					'display' => 'block',
					//'backgroundColor' =>'green',
					'className' => 'bg-info',
					'color' => '#ffffff'
				);
			} elseif ($r['model_type'] == 'Channel Partner') {
				$events[] = array(
					'id' => $r['id'],
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'].' Reminder',
					'event_type' => 'reminder',
					'priority' => $r['priority'],
					'display' => 'block',
					'className' => 'bg-warning',
					'color' => '#ffffff'
				);
			} elseif ($r['model_type'] == 'Lead') {
				$events[] = array(
					'id' => $r['id'],
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'].' Reminder',
					'event_type' => 'reminder',
					'priority' => $r['priority'],
					'display' => 'block',
					'className' => 'bg-danger',
					'color' => '#ffffff'
				);
			}
		}
		foreach ($followups as $f) {
			if ($f['model_type'] == 'Customer') {
				$events[] = array(
					'id' => $f['id'],
					'model_id' => $f['model_id'],
					'title' => $f['type_name'],
					'start' => $f['followup_date'],
					'url' => '#',
					'type' => $f['model_type'].' Followup',
					'event_type' => 'followup',
					// 'priority' => $f['priority'],
					'display' => 'block',
					//'className' => 'bg-success',
					'backgroundColor' =>'magenta',
					'color' => '#ffffff'
				);
			} elseif ($f['model_type'] == 'Property') {
				$events[] = array(
					'id' => $f['id'],
					'model_id' => $f['model_id'],
					'title' => $f['type_name'],
					'start' => $f['followup_date'],
					'url' => '#',
					'type' => $f['model_type'].' Followup',
					'event_type' => 'followup',
					// 'priority' => $f['priority'],
					'reminder_date' => $f['reminder_date'],
					'display' => 'block',
					'backgroundColor' =>'olive',
					//'className' => 'bg-info',
					'color' => '#ffffff'
				);
			} elseif ($f['model_type'] == 'Channel Partner') {
				$events[] = array(
					'id' => $f['id'],
					'model_id' => $f['model_id'],
					'title' => $f['type_name'],
					'start' => $f['followup_date'],
					'url' => '#',
					'type' => $f['model_type'].' Followup',
					'event_type' => 'followup',
					// 'priority' => $f['priority'],
					'display' => 'block',
					'backgroundColor' =>'teal',
					//'className' => 'bg-warning',
					'color' => '#ffffff'
				);
			} elseif ($f['model_type'] == 'Lead') {
				$events[] = array(
					'id' => $f['id'],
					'model_id' => $f['model_id'],
					'title' => $f['type_name'],
					'start' => $f['followup_date'],
					'url' => '#',
					'type' => $f['model_type'].' Followup',
					'event_type' => 'followup',
					// 'priority' => $f['priority'],
					'display' => 'block',
					'backgroundColor' =>'lime',
					//'className' => 'bg-danger',
					'color' => '#ffffff'
				);
			}
		}
		echo $events = json_encode($events);
	}
	public function updateReminderStatus()
	{
		$data=$_POST;
		if($data['event_type'] == 'reminder'){
			$reminder = $this->cale->getReminderById($data['event_id']);	
			if ($reminder) {				
				$reminderData = array('status' => $data['status']);
				$this->cale->updateReminder($data['event_id'], $reminderData);			
				echo json_encode(["success"=>true,"message"=>"Reminder status updated successfully"]);
			} else {			
				echo json_encode(["success"=>false,"message"=>"Reminder not found"]);
			}
		}
	}
	

	// public function getAllCalenderFollowups()
	// {
	// 	$follow = $this->cale->getFollowups();
	// 	//$proprties = $this->cale->getProperty();
	// 	$followups = array();
	// 	foreach ($follow as $f) {
	// 		if ($f['model_type'] == 'Customer') {
	// 			$followups[] = array(
	// 				'id' => 1,
	// 				'model_id' => $f['model_type'],
	// 				'title' => $f['type_name'],
	// 				'start' => $f['date_time'],
	// 				'url' => '#',
	// 				'type' => $f['model_type'],
	// 				// 'priority' => $f['priority'],
	// 				'display' => 'block',
	// 				'className' => 'bg-success',
	// 				//'backgroundColor' =>'magenta',
	// 				'color' => '#ffffff'
	// 			);
	// 		} elseif ($f['model_type'] == 'Property') {
	// 			$followups[] = array(
	// 				'id' => 1,
	// 				'model_id' => $f['model_id'],
	// 				'title' => $f['type_name'],
	// 				'start' => $f['date_time'],
	// 				'url' => '#',
	// 				'type' => $f['model_type'],
	// 				// 'priority' => $f['priority'],
	// 				'display' => 'block',
	// 				//'backgroundColor' =>'green',
	// 				'className' => 'bg-info',
	// 				'color' => '#ffffff'
	// 			);
	// 		} elseif ($f['model_type'] == 'Channel Partner') {
	// 			$followups[] = array(
	// 				'id' => 1,
	// 				'model_id' => $f['model_id'],
	// 				'title' => $f['type_name'],
	// 				'start' => $f['date_time'],
	// 				'url' => '#',
	// 				'type' => $f['model_type'],
	// 				// 'priority' => $f['priority'],
	// 				'display' => 'block',
	// 				'className' => 'bg-warning',
	// 				'color' => '#ffffff'
	// 			);
	// 		} elseif ($f['model_type'] == 'Lead') {
	// 			$followups[] = array(
	// 				'id' => 1,
	// 				'model_id' => $f['model_id'],
	// 				'title' => $f['type_name'],
	// 				'start' => $f['date_time'],
	// 				'url' => '#',
	// 				'type' => $f['model_type'],
	// 				// 'priority' => $f['priority'],
	// 				'display' => 'block',
	// 				'className' => 'bg-danger',
	// 				'color' => '#ffffff'
	// 			);
	// 		}
	// 	}
	// 	echo $followups = json_encode($followups);
	// }
}

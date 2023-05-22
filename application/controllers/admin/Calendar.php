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
		//$proprties = $this->cale->getProperty();
		$events = array();
		foreach ($remiders as $r) {
			if ($r['model_type'] == 'Customer') {
				$events[] = array(
					'id' => 1,
					'model_id' => $r['model_type'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'],
					'priority' => $r['priority'],
					'display' => 'block',
					'className' => 'bg-success',
					//'backgroundColor' =>'magenta',
					'color' => '#ffffff'
				);
			} elseif ($r['model_type'] == 'Property') {
				$events[] = array(
					'id' => 1,
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'],
					'priority' => $r['priority'],
					'display' => 'block',
					//'backgroundColor' =>'green',
					'className' => 'bg-info',
					'color' => '#ffffff'
				);
			} elseif ($r['model_type'] == 'Channel Partner') {
				$events[] = array(
					'id' => 1,
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'],
					'priority' => $r['priority'],
					'display' => 'block',
					'className' => 'bg-warning',
					'color' => '#ffffff'
				);
			} elseif ($r['model_type'] == 'Lead') {
				$events[] = array(
					'id' => 1,
					'model_id' => $r['model_id'],
					'title' => $r['type_name'],
					'start' => $r['date_time'],
					'url' => '#',
					'type' => $r['model_type'],
					'priority' => $r['priority'],
					'display' => 'block',
					'className' => 'bg-danger',
					'color' => '#ffffff'
				);
			}
		}
		echo $events = json_encode($events);
	}
}

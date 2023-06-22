<?php
class Propertymaster_model extends CI_model
{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_property_master';
	}

    function all($search_params=[])
    {
        if (!empty($search_params)) {
            if (isset($search_params['start_date']) && !empty($search_params['start_date'])) {
                $start_date = $search_params['start_date'];
                $this->db->where('tb_property_master.created_date >=', $start_date);
            }
            if (isset($search_params['end_date']) && !empty($search_params['end_date'])) {
                $end_date = $search_params['end_date'];
                $this->db->where('tb_property_master.created_date <=', $end_date);
            }
            if(isset($search_params['property_category']) && !empty($search_params['property_category'])){
                $this->db->where('tb_property_master.pro_category_id', $search_params['property_category']);
            }
            if(isset($search_params['property_subcategory']) && !empty($search_params['property_subcategory'])){
                $this->db->where('tb_property_master.pro_subcategory_id', $search_params['property_subcategory']);
            }
            if (isset($search_params['budget']) && !empty($search_params['budget'])) {
                $budget = $search_params['budget'];
                $this->db->where('tb_property_master.from_budget <=', $budget);
                $this->db->where('tb_property_master.to_budget >=', $budget);
            }
            if(isset($search_params['stage']) && !empty($search_params['stage'])){
                $this->db->where('tb_property_master.property_stage_id', $search_params['stage']);
            }
            if(isset($search_params['master']) && !empty($search_params['master'])){
                $this->db->where('tb_property_master.pro_master_id', $search_params['master']);
            }
            if(isset($search_params['area']) && !empty($search_params['area'])){
                $this->db->where('tb_property_master.area_id', $search_params['area']);
            }
        }
		$this->db->where('tb_property_master.thumbs_up', 0);
        $this->db->where('tb_property_master.thumbs_down', 0);
        $this->db->where('tb_property_master.not_match', 0);
        $data = $this->db->get($this->db_name)->result_array();
        return $data;
    }
	function saverecords($formArray)
	{
		$d = [];
		$d['customer_id'] = $formArray['customer_id'];
		$d['agent_id'] = $formArray['agent_id'];
		if ($formArray['customeragent'] == 'customer') {
			$d['agent_id'] = null;
		}
		if ($formArray['customeragent'] == 'agent') {
			$d['customer_id'] = null;
		}

		$d['pro_master_id'] = $formArray['pro_master_id'];
		$d['pro_category_id'] = $formArray['pro_category_id'];
		$d['pro_subcategory_id'] = $formArray['pro_subcategory_id'];
		$d['property_stage_id'] = $formArray['property_stage_id'];
		$d['from_budget'] = $formArray['from_budget'];
		$d['to_budget'] = $formArray['to_budget'];
		$d['state_id'] = $formArray['state_id'];
		$d['district_id'] = $formArray['district_id'];
		$d['sub_district_id'] = $formArray['sub_district_id'];
		$d['area_id'] = $formArray['area_id'];
		$d['status'] = $formArray['status'];

		$this->db->insert($this->db_name, $d);
		$property_id = $this->db->insert_id();

		foreach ($formArray['phase_ids'] as $phase_id) {
			$i = 0;
			if (!empty($formArray['question_id_' . $phase_id])) {
				foreach ($formArray['question_id_' . $phase_id] as $q_id) {
					if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Checkbox') {
						$given_answer = [];
						foreach ($formArray['answer_' . $phase_id . '_' . $q_id . ''] as $answer) {
							$given_answer[] = $this->db->get_where('source_option_master', ['id' => $answer])->row()->name;
						}
						$given_answer_id = $formArray['answer_' . $phase_id . '_' . $q_id];
					} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image') {
						$config = array(
							'upload_path' => "./uploads/property/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE,
							'file_name' => time() . '-' . date("Y-m-d")
						);
						$this->upload->initialize($config);
						if ($this->upload->do_upload('answer_' . $phase_id . '_' . $q_id)) {
							$upload_data = $this->upload->data();
							$given_answer = $upload_data['file_name'];
							$given_answer_id = $upload_data['file_name'];
						}
					} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image Gallery') {
						$given_answer = [];
						$given_answer_id = [];
						$filesCount = count($_FILES['answer_' . $phase_id . '_' . $q_id]['name']);
						for ($cnt = 0; $cnt < $filesCount; $cnt++) {
							$_FILES['file']['name']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['name'][$cnt];
							$_FILES['file']['type']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['type'][$cnt];
							$_FILES['file']['tmp_name'] = $_FILES['answer_' . $phase_id . '_' . $q_id]['tmp_name'][$cnt];
							$_FILES['file']['error']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['error'][$cnt];
							$_FILES['file']['size']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['size'][$cnt];
							$config = array(
								'upload_path' => "./uploads/property/",
								'allowed_types' => "gif|jpg|png|jpeg|pdf",
								'overwrite' => TRUE,
								'file_name' => time() . '-' . date("Y-m-d") . $cnt
							);
							$this->upload->initialize($config);
							if ($this->upload->do_upload('file')) {
								$upload_data = $this->upload->data();								
								$given_answer[] = $upload_data['file_name'];
								$given_answer_id[] = $upload_data['file_name'];
							}
						}
					} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Dropdown' || $formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Radio') {
						$given_answer = $this->db->get_where('source_option_master', ['id' => $formArray['answer_' . $phase_id . '_' . $q_id . '']])->row()->name;
						$given_answer_id = $formArray['answer_' . $phase_id . '_' . $q_id];
					} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Multitextbox') {
						$given_answer = [];
						$given_answer_id = [];
						$answers = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
						foreach ($answers as $answer) {
							$given_answer[] = $answer;
							$given_answer_id[] = $answer;
						}
					} else {
						$given_answer = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
						$given_answer_id = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
					}
					$answers = [
						'answer_type' => $formArray['answer_type_' . $phase_id . '_' . $q_id],
					];
					$answer_ids = [
						'answer_type' => $formArray['answer_type_' . $phase_id . '_' . $q_id],
					];
					$options = [];
					$option_ids = [];
					if (!empty($formArray['answer_options_' . $phase_id . '_' . $q_id])) {
						foreach ($formArray['answer_options_' . $phase_id . '_' . $q_id] as $option) {
							if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Checkbox') {
								$options[][$option] = ((in_array($option, $given_answer)) ? true : false);
							} else {
								$options[][$option] = (($given_answer == $option) ? true : false);
							}
						}
					} else {
						if (is_array($given_answer)) {
							foreach ($given_answer as $option) {
								$options[][$option] = true;
							}
						} else {
							$options[][$given_answer] = true;
						}
					}
					if (!empty($formArray['answer_option_ids_' . $phase_id . '_' . $q_id])) {
						foreach ($formArray['answer_option_ids_' . $phase_id . '_' . $q_id] as $option_id) {
							if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Checkbox') {
								$option_ids[][$option_id] = ((in_array($option_id, $given_answer_id)) ? true : false);
							} else {
								$option_ids[][$option_id] = (($given_answer_id == $option_id) ? true : false);
							}
						}
					} else {
						if (is_array($given_answer_id)) {
							foreach ($given_answer_id as $option) {
								$option_ids[][$option] = true;
							}
						} else {
							$option_ids[][$given_answer_id] = true;
						}
					}
					$answers['options'] = $options;
					$answer_ids['options'] = $option_ids;
					$data = [
						'property_id' => $property_id,
						'phase_id' =>  $phase_id,
						'question_id' => $q_id,
						'answer_ids' => json_encode($answer_ids),
						'question' => $formArray['question_' . $phase_id][$i],
						'answers' => json_encode($answers)
					];
					$this->db->insert('tb_property_question_answer', $data);
					$i++;
				}
			}
		}

		return true;
	}

	// thumbs up (hide record)
    function all_feedback($search_params = [])
    {
        if (!empty($search_params)) {
            if (isset($search_params['selected_type']) && !empty($search_params['selected_type'])) {
                $selected_type = $search_params['selected_type'];
                $this->db->where("tb_property_master.$selected_type", 1);
            }
        }
        $this->db->group_start();
        $this->db->where('tb_property_master.thumbs_up', 1);
        $this->db->or_where('tb_property_master.thumbs_down', 1);
        $this->db->or_where('tb_property_master.not_match', 1);
        $this->db->group_end();
        $data = $this->db->get($this->db_name)->result_array();
        return $data;
    }
	// thumbs up (hide record)

    public function change_column($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_property_master', $data);
        return true;
    }
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->db_name);
		return true;
	}

	function getCustomer()
	{
		$data = $this->db->get('tb_customer_master')->result_array();
		return $data;
	}
	function getAgents()
	{
		$data = $this->db->get('tb_agent_master')->result_array();
		return $data;
	}
	function getPromaster()
	{
		$data = $this->db->get('tb_master')->result_array();
		return $data;
	}
	function getCategory()
	{
		$data = $this->db->get('tb_property_category')->result_array();
		return $data;
	}
	function getSubcategory()
	{
		$data = $this->db->get('tb_property_subcategory')->result_array();
		return $data;
	}

	function getSubcategoryByCategory($category_id)
	{
		$this->db->where('property_category_id', $category_id);
		$data = $this->db->get('tb_property_subcategory')->result_array();
		return $data;
	}
	function getPropertymaster($id)
	{
		$this->db->select(['tb_property_master.*,`tb_customer_master`.`first_name` as customer_first_name,`tb_customer_master`.`last_name` as customer_last_name,`tb_agent_master`.`first_name` as agent_first_name,`tb_agent_master`.`last_name` as agent_last_name,`tb_master`.`name` as master_name,`tb_property_category`.`name` as property_category_name,`tb_property_subcategory`.`name` as property_subcategory_name']);
		$this->db->join('tb_customer_master', 'tb_customer_master.id = tb_property_master.customer_id', 'left');
		$this->db->join('tb_agent_master', 'tb_agent_master.id = tb_property_master.agent_id', 'left');
		$this->db->join('tb_master', 'tb_master.id = tb_property_master.pro_master_id', 'left');
		$this->db->join('tb_property_category', 'tb_property_category.id = tb_property_master.pro_category_id', 'left');
		$this->db->join('tb_property_subcategory', 'tb_property_subcategory.id = tb_property_master.pro_subcategory_id', 'left');

		$data = $this->db->where('tb_property_master.id', $id)->get('tb_property_master')->row();
		return $data;
	}
	function updaterecords($id, $formArray)
	{
		$d = [];
		$d['customer_id'] = $formArray['customer_id'];
		$d['agent_id'] = $formArray['agent_id'];
		if ($formArray['customeragent'] == 'customer') {
			$d['agent_id'] = null;
		}
		if ($formArray['customeragent'] == 'agent') {
			$d['customer_id'] = null;
		}
		$d['pro_master_id'] = $formArray['pro_master_id'];
		$d['pro_category_id'] = $formArray['pro_category_id'];
		$d['pro_subcategory_id'] = $formArray['pro_subcategory_id'];
		$d['property_stage_id'] = $formArray['property_stage_id'];
		$d['from_budget'] = $formArray['from_budget'];
		$d['to_budget'] = $formArray['to_budget'];
        $d['state_id'] = $formArray['state_id'];
        $d['district_id'] = $formArray['district_id'];
        $d['sub_district_id'] = $formArray['sub_district_id'];
        $d['area_id'] = $formArray['area_id'];
		$d['status'] = $formArray['status'];

		//update property master
		$this->db->where('id', $id);
		$this->db->update($this->db_name, $d);

		// delete question-answer records 
		$this->db->where('property_id', $id);
		$this->db->delete('tb_property_question_answer');
		//insert question-answer records
		if (!empty($formArray['phase_ids'])) {
			foreach ($formArray['phase_ids'] as $phase_id) {
				if (!empty($formArray['question_id_' . $phase_id])) {
					$i = 0;
					foreach ($formArray['question_id_' . $phase_id] as $q_id) {
						if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Checkbox') {
							$given_answer = [];
							foreach ($formArray['answer_' . $phase_id . '_' . $q_id . ''] as $answer) {
								$given_answer[] = $this->db->get_where('source_option_master', ['id' => $answer])->row()->name;
							}
							$given_answer_id = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
						} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image' && !empty($_FILES['answer_' . $phase_id . '_' . $q_id])) {
							$config = array(
								'upload_path' => "./uploads/property/",
								'allowed_types' => "gif|jpg|png|jpeg|pdf",
								'overwrite' => TRUE,
								'file_name' => time() . '-' . date("Y-m-d")
							);
							$this->upload->initialize($config);
							if ($this->upload->do_upload('answer_' . $phase_id . '_' . $q_id)) {
								$upload_data = $this->upload->data();
								$given_answer = $upload_data['file_name'];
								$given_answer_id = $upload_data['file_name'];
							}
						} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image Gallery') {
							$given_answer = [];
							$given_answer_id = [];
							//existing files
							if (!empty($formArray['answer_' . $phase_id . '_' . $q_id . ''])) {
								foreach ($formArray['answer_' . $phase_id . '_' . $q_id . ''] as $answer) {
									$given_answer[] = $answer;
									$given_answer_id[] = $answer;
								}
							}
							//new files
							$filesCount = count($_FILES['answer_' . $phase_id . '_' . $q_id]['name']);
							for ($cnt = 0; $cnt < $filesCount; $cnt++) {
								$_FILES['file']['name']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['name'][$cnt];
								$_FILES['file']['type']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['type'][$cnt];
								$_FILES['file']['tmp_name'] = $_FILES['answer_' . $phase_id . '_' . $q_id]['tmp_name'][$cnt];
								$_FILES['file']['error']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['error'][$cnt];
								$_FILES['file']['size']     = $_FILES['answer_' . $phase_id . '_' . $q_id]['size'][$cnt];
								$config = array(
									'upload_path' => "./uploads/property/",
									'allowed_types' => "gif|jpg|png|jpeg|pdf",
									'overwrite' => TRUE,
									'file_name' => time() . '-' . date("Y-m-d") . $cnt
								);
								$this->upload->initialize($config);
								if ($this->upload->do_upload('file')) {
									$upload_data = $this->upload->data();
									$given_answer[] = $upload_data['file_name'];
									$given_answer_id[] = $upload_data['file_name'];
								}
							}
						} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Dropdown' || $formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Radio') {
							$given_answer = $this->db->get_where('source_option_master', ['id' => $formArray['answer_' . $phase_id . '_' . $q_id . '']])->row()->name;
							$given_answer_id = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
						} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Multitextbox') {
							$given_answer = [];
							$given_answer_id = [];
							$answers = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
							foreach ($answers as $answer) {
								$given_answer[] = $answer;
								$given_answer_id[] = $answer;
							}
						} else {
							$given_answer = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
							$given_answer_id = $formArray['answer_' . $phase_id . '_' . $q_id . ''];
						}
						$answers = [
							'answer_type' => $formArray['answer_type_' . $phase_id . '_' . $q_id],
						];
						$answer_ids = [
							'answer_type' => $formArray['answer_type_' . $phase_id . '_' . $q_id],
						];
						$options = [];
						$option_ids = [];
						if (!empty($formArray['answer_options_' . $phase_id . '_' . $q_id]) && !empty($_FILES['answer_' . $phase_id . '_' . $q_id]['name'])) {
							$remain_given_answer = $given_answer;
							foreach ($formArray['answer_options_' . $phase_id . '_' . $q_id] as $option) {
								if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image Gallery') {
									if (in_array($option, $given_answer)) {
										$options[][$option] = true;
									} else {
										unlink('./uploads/property/' . $option);
									}
									$remain_given_answer = array_diff($remain_given_answer, [$option]);
								}
							}
							foreach ($remain_given_answer as $ans) {
								$options[][$ans] = true;
							}
						} elseif (!empty($formArray['answer_options_' . $phase_id . '_' . $q_id])) {
							foreach ($formArray['answer_options_' . $phase_id . '_' . $q_id] as $option) {
								if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Checkbox') {
									$options[][$option] = ((in_array($option, $given_answer)) ? true : false);
								} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Dropdown' || $formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Radio') {
									$options[][$option] = (($given_answer == $option) ? true : false);
								} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image Gallery') {
									if (in_array($option, $given_answer)) {
										$options[][$option] = true;
									} else {
										unlink('./uploads/property/' . $option);
									}
								} else {
									if (is_array($given_answer)) {
										$options[][$option] = true;
									} else {
										$options[][$given_answer] = true;
									}
								}
							}
						} else {
							if (is_array($given_answer)) {
								foreach ($given_answer as $option) {
									$options[][$option] = true;
								}
							} else {
								$options[][$given_answer] = true;
							}
						}
						if (!empty($formArray['answer_option_ids_' . $phase_id . '_' . $q_id]) && !empty($_FILES['answer_' . $phase_id . '_' . $q_id]['name'])) {
							foreach ($formArray['answer_option_ids_' . $phase_id . '_' . $q_id] as $option_id) {
								if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image Gallery') {
									if (in_array($option, $given_answer)) {
										$option_ids[][$option_id] = true;
									} else {
										unlink('./uploads/property/' . $option);
									}
								}
							}
							foreach ($given_answer as $ans) {
								if (!in_array($ans, $option_ids)) {
									$option_ids[][$ans] = true;
								}
							}
						} elseif (!empty($formArray['answer_option_ids_' . $phase_id . '_' . $q_id])) {
							foreach ($formArray['answer_option_ids_' . $phase_id . '_' . $q_id] as $option_id) {
								if ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Checkbox') {
									$option_ids[][$option_id] = ((in_array($option_id, $given_answer_id)) ? true : false);
								} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Dropdown' || $formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Radio') {
									$option_ids[][$option_id] = (($given_answer_id == $option_id) ? true : false);
								} elseif ($formArray['answer_type_' . $phase_id . '_' . $q_id] == 'Image Gallery') {
									if (in_array($option_id, $given_answer)) {
										$option_ids[][$option_id] = true;
									} else {
										if (!empty($_FILES['answer_' . $phase_id . '_' . $q_id]['name'])) {
											$option_ids[][$option_id] = true;
										}
									}
								} else {
									if (is_array($given_answer_id)) {
										$option_ids[][$option_id] = true;
									} else {
										$option_ids[][$given_answer] = true;
									}
								}
							}
						} else {
							if (is_array($given_answer_id)) {
								foreach ($given_answer_id as $option) {
									$option_ids[][$option] = true;
								}
							} else {
								$option_ids[][$given_answer_id] = true;
							}
						}
						$answers['options'] = $options;
						$answer_ids['options'] = $option_ids;
						$data = [
							'property_id' => $id,
							'phase_id' =>  $phase_id,
							'question_id' => $q_id,
							'answer_ids' => json_encode($answer_ids),
							'question' => $formArray['question_' . $phase_id][$i],
							'answers' => json_encode($answers)
						];
						$this->db->insert('tb_property_question_answer', $data);
						$i++;
					}
				}
			}
		}
		return true;
	}


	//fetch Question
	function getQuestions($mastet_id, $category_id, $subcategory_id, $phase_id)
	{
		$this->db->where('master_id', $mastet_id);
		$this->db->where('find_in_set("' . $category_id . '", category_ids) <> 0');
		$this->db->where('find_in_set("' . $subcategory_id . '", sub_category_ids) <> 0');
		$this->db->where('phase_id', $phase_id);
		$data = $this->db->get('tb_form_master')->row();
		$question_list = [];
		if ($data != null) {
			$question_ids = explode(',', $data->question_ids);
			if (!empty($question_ids)) {
				$this->db->where_in('id', $question_ids);
				$question_list = $this->db->get('tb_question_master')->result_array();
			}
		}
		return $question_list;
	}
	//edit question
	function fetchQuestions($property_id, $phase_id)
	{
		$this->db->select('*');
		$this->db->from('tb_property_question_answer');
		$this->db->where('property_id', $property_id);
		$this->db->where('phase_id', $phase_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	function update_status($id, $status)
	{
		return $this->db->update($this->db_name, ['status' => $status], ['id' => $id]);
	}


	//reminder
	function save_reminders_records($data)
	{
		$data['startdate']    = date('Y-m-d', strtotime($data['startdate']));

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
		unset($data['property_id']);
		// $data = hooks()->apply_filters('before_add_task', $data);

		$this->db->insert('tbl_reminder_master', $data);
		$insert_id = $this->db->insert_id();
		if ($insert_id) {
			return $insert_id;
		}
		return false;
	}
	function getReminders($id)
	{
		$data = $this->db->get_where('tbl_reminder_master', ['model_type' => 'Property', 'model_id' => $id])->result_array();
		return $data;
	}
	function getReminder($id)
	{
		$data = $this->db->get_where('tbl_reminder_master', ['id' => $id])->row();
		return $data;
	}
	function delete_reminders_records($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_reminder_master');
		return true;
	}
	function update_reminders_records($id, $data)
	{
		$data['startdate']    = date('Y-m-d', strtotime($data['startdate']));

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
		unset($data['property_id']);
		// $data = hooks()->apply_filters('before_add_task', $data);
		$this->db->where('id', $id);
		$r = $this->db->update('tbl_reminder_master', $data);
		if ($r) {
			return $r;
		}
		return false;
	}

	function getReminderType($type)
	{
		$data = $this->db->get_where('tb_remindertype_master', ['model_type' => $type])->result_array();
		return $data;
	}

    function getPropertyStage(){
        $data = $this->db->get('tb_property_stage')->result_array();
        return $data;
    }

    function getState(){
        $data = $this->db->get('tb_state_master')->result_array();
        return $data;
    }

    function getMaster(){
        $data = $this->db->get('tb_master')->result_array();
        return $data;
    }

    function getArea(){
        $data = $this->db->get('tb_area_master')->result_array();
        return $data;
    }

    function getDistrictByState($state_id)
    {
        $this->db->where('state_id', $state_id);
        $data = $this->db->get('tb_district_master')->result_array();
        return $data;
    }

    function getSubDistrictByDistrict($district_id)
    {
        $this->db->where('district_id', $district_id);
        $data = $this->db->get('tb_sub_district_master')->result_array();
        return $data;
    }

    function getAreaBySubDistrict($area_id)
    {
        $this->db->where('subdistrict_id', $area_id);
        $data = $this->db->get('tb_area_master')->result_array();
        return $data;
    }

    //Followup
    function save_followup_records($data)
    {

        unset($data['property_id']);
        // $data = hooks()->apply_filters('before_add_task', $data);

        $this->db->insert('tb_followup_master', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        }
        return false;

    }
    function getFollowups($id){
        $data = $this->db->get_where('tb_followup_master',['model_type'=>'Property','model_id'=>$id])->result_array();
        return $data;
    }
    function getFollowup($id){
        $data = $this->db->get_where('tb_followup_master',['id'=>$id])->row();
        return $data;
    }
    function update_followup_records($id,$data)
    {

        unset($data['followup_id']);
        unset($data['property_id']);
        // $data = hooks()->apply_filters('before_add_task', $data);
        $this->db->where('id',$id);
        $r=$this->db->update('tb_followup_master',$data);
        if ($r) {
            return $r;
        }
        return false;
    }
    function getFollowupType($type){
        $data = $this->db->get_where('tb_followup_type_master',['model_type'=>$type])->result_array();
        return $data;
    }
    function delete_followups_records($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_followup_master');
        return true;
    }
}

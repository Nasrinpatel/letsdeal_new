<?php
class Propertymaster_model extends CI_model{

	public $db_name;

	public function __construct()
	{
		parent::__construct();
		$this->db_name = 'tb_property_master';
	}

	function all()
	{
		$data = $this->db->get($this->db_name)->result_array();
		return $data;
	}
	function saverecords($formArray)
	{
		$d=[];
		$d['customer_id'] = $formArray['customer_id'];
		$d['agent_id'] = $formArray['agent_id'];
		if($formArray['customeragent']=='customer'){
			$d['agent_id'] = null;
		}
		if($formArray['customeragent']=='agent'){			
			$d['customer_id'] = null;
		}
		
		$d['pro_master_id'] = $formArray['pro_master_id'];
		$d['pro_category_id'] = $formArray['pro_category_id'];
		$d['pro_subcategory_id'] = $formArray['pro_subcategory_id'];
		$d['status'] = $formArray['status'];
		$this->db->insert($this->db_name,$d);
		$property_id = $this->db->insert_id();
		
		foreach($formArray['phase_ids'] as $phase_id){
			$i=0;
			if(!empty($formArray['question_id_'.$phase_id])){
				foreach($formArray['question_id_'.$phase_id] as $q_id){
					if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Checkbox'){
						$given_answer=[];
						foreach($formArray['answer_'.$phase_id.'_'.$q_id.''] as $answer){
							$given_answer[]=$this->db->get_where('source_option_master',['id'=>$answer])->row()->name;						
						}
						$given_answer_id=$formArray['answer_'.$phase_id.'_'.$q_id];
					}
					elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image'){
						$config = array(
							'upload_path' => "./uploads/property/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE,
							'file_name' => time() . '-' . date("Y-m-d")
						);
						$this->upload->initialize($config);
						if($this->upload->do_upload('answer_'.$phase_id.'_'.$q_id))
						{
							$upload_data=$this->upload->data();
							$given_answer=$upload_data['file_name'];
							$given_answer_id=$upload_data['file_name'];
						}
					}
					elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image Gallery'){
						$given_answer=[];
						$given_answer_id=[];
						$filesCount = count($_FILES['answer_'.$phase_id.'_'.$q_id]['name']); 
						for($cnt = 0; $cnt < $filesCount; $cnt++){ 
							$_FILES['file']['name']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['name'][$cnt]; 
							$_FILES['file']['type']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['type'][$cnt]; 
							$_FILES['file']['tmp_name'] = $_FILES['answer_'.$phase_id.'_'.$q_id]['tmp_name'][$cnt]; 
							$_FILES['file']['error']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['error'][$cnt]; 
							$_FILES['file']['size']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['size'][$cnt]; 
							$config = array(
								'upload_path' => "./uploads/property/",
								'allowed_types' => "gif|jpg|png|jpeg|pdf",
								'overwrite' => TRUE,
								'file_name' => time() . '-' . date("Y-m-d").$cnt
							);
							$this->upload->initialize($config);
							if($this->upload->do_upload('file'))
							{
								$upload_data=$this->upload->data();
								$given_answer[]=$upload_data['file_name'];
								$given_answer_id[]=$upload_data['file_name'];
							}
						}
					}
					elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Dropdown' || $formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Radio'){
						$given_answer=$this->db->get_where('source_option_master',['id'=>$formArray['answer_'.$phase_id.'_'.$q_id.'']])->row()->name;
						$given_answer_id=$formArray['answer_'.$phase_id.'_'.$q_id];
					}else{
						$given_answer=$formArray['answer_'.$phase_id.'_'.$q_id.''];
						$given_answer_id=$formArray['answer_'.$phase_id.'_'.$q_id.''];
					}
					$answers=[
						'answer_type' => $formArray['answer_type_'.$phase_id.'_'.$q_id],
					];
					$answer_ids=[
						'answer_type' => $formArray['answer_type_'.$phase_id.'_'.$q_id],
					];
					$options=[];
					$option_ids=[];
					if(!empty($formArray['answer_options_'.$phase_id.'_'.$q_id])){
						foreach($formArray['answer_options_'.$phase_id.'_'.$q_id] as $option){
							if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Checkbox'){
								$options[][$option]=((in_array($option,$given_answer))?true:false);
							}else{
								$options[][$option]=(($given_answer == $option)?true:false);
							}
						}
					}else{
						if(is_array($given_answer)){
							foreach($given_answer as $option){
								$options[][$option]=true;
							}
						}else{
							$options[][$given_answer]=true;
						}
						
					}
					if(!empty($formArray['answer_option_ids_'.$phase_id.'_'.$q_id])){
						foreach($formArray['answer_option_ids_'.$phase_id.'_'.$q_id] as $option_id){
							if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Checkbox'){
								$option_ids[][$option_id]=((in_array($option_id,$given_answer_id))?true:false);
							}else{
								$option_ids[][$option_id]=(($given_answer_id == $option_id)?true:false);
							}
						}
					}else{
						if(is_array($given_answer_id)){
							foreach($given_answer_id as $option){
								$option_ids[][$option]=true;
							}
						}else{
							$option_ids[][$given_answer_id]=true;
						}
					}
					$answers['options'] = $options;
					$answer_ids['options'] = $option_ids;
					$data=[
						'property_id' => $property_id,
						'phase_id' =>  $phase_id,
						'question_id' => $q_id,
						'answer_ids' => json_encode($answer_ids),
						'question' => $formArray['question_'.$phase_id][$i],
						'answers' => json_encode($answers)
					];
					$this->db->insert('tb_property_question_answer',$data);
					$i++;
				}	
			}		
		}
		
		return true;
	}
	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->db_name);
		return true;
	}
	
	function getCustomer(){
		$data = $this->db->get('tb_customer_master')->result_array();
		return $data;
	}
	function getAgents(){
		$data = $this->db->get('tb_agent_master')->result_array();
		return $data;
	}
	function getPromaster(){
		$data = $this->db->get('tb_master')->result_array();
		return $data;
	}
	function getCategory(){
		$data = $this->db->get('tb_property_category')->result_array();
		return $data;
	}
	function getSubcategory(){
		$data = $this->db->get('tb_property_subcategory')->result_array();
		return $data;
	}

	function getSubcategoryByCategory($category_id)
	{
		$this->db->where('property_category_id', $category_id);
		$data = $this->db->get('tb_property_subcategory')->result_array();
		return $data;
	}
	function getPropertymaster($id){
		$this->db->select(['tb_property_master.*,`tb_customer_master`.`first_name` as customer_first_name,`tb_customer_master`.`last_name` as customer_last_name,`tb_agent_master`.`first_name` as agent_first_name,`tb_agent_master`.`last_name` as agent_last_name,`tb_master`.`name` as master_name,`tb_property_category`.`name` as property_category_name,`tb_property_subcategory`.`name` as property_subcategory_name']);
		$this->db->join('tb_customer_master', 'tb_customer_master.id = tb_property_master.customer_id', 'left'); 
		$this->db->join('tb_agent_master', 'tb_agent_master.id = tb_property_master.agent_id', 'left'); 
		$this->db->join('tb_master', 'tb_master.id = tb_property_master.pro_master_id', 'left'); 
		$this->db->join('tb_property_category', 'tb_property_category.id = tb_property_master.pro_category_id', 'left'); 
		$this->db->join('tb_property_subcategory', 'tb_property_subcategory.id = tb_property_master.pro_subcategory_id', 'left'); 

		$data = $this->db->where('tb_property_master.id',$id)->get('tb_property_master')->row();
		return $data;
	}
	function updaterecords($id,$formArray)
	{

		$d = [];
		$d['customer_id'] = $formArray['customer_id'];
		$d['agent_id'] = $formArray['agent_id'];
		if($formArray['customeragent']=='customer'){
			$d['agent_id'] = null;
		}
		if($formArray['customeragent']=='agent'){			
			$d['customer_id'] = null;
		}
		$d['pro_master_id'] = $formArray['pro_master_id'];
		$d['pro_category_id'] = $formArray['pro_category_id'];
		$d['pro_subcategory_id'] = $formArray['pro_subcategory_id'];
		$d['status'] = $formArray['status'];

		//update property master
		$this->db->where('id', $id);
   		$this->db->update($this->db_name, $d);
		  
		 // delete question-answer records 
		 $this->db->where('property_id', $id);
		 $this->db->delete('tb_property_question_answer');
		//insert question-answer records
		 if(!empty($formArray['phase_ids'])){
			foreach($formArray['phase_ids'] as $phase_id){
			  if(!empty($formArray['question_id_'.$phase_id])){
				$i=0;
				foreach($formArray['question_id_'.$phase_id] as $q_id){
					if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Checkbox'){
						$given_answer=[];
						foreach($formArray['answer_'.$phase_id.'_'.$q_id.''] as $answer){
							$given_answer[]=$this->db->get_where('source_option_master',['id'=>$answer])->row()->name;						
						}
						$given_answer_id=$formArray['answer_'.$phase_id.'_'.$q_id.''];
					}
					elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image' && !empty($_FILES['answer_'.$phase_id.'_'.$q_id]) ){
						$config = array(
							'upload_path' => "./uploads/property/",
							'allowed_types' => "gif|jpg|png|jpeg|pdf",
							'overwrite' => TRUE,
							'file_name' => time() . '-' . date("Y-m-d")
						);
						$this->upload->initialize($config);
						if($this->upload->do_upload('answer_'.$phase_id.'_'.$q_id))
						{
							$upload_data=$this->upload->data();
							$given_answer=$upload_data['file_name'];
							$given_answer_id=$upload_data['file_name'];
						}
					}
					elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image Gallery'){
						$given_answer=[];
						$given_answer_id=[];
						//existing files
						if(!empty($formArray['answer_'.$phase_id.'_'.$q_id.''])){
							foreach($formArray['answer_'.$phase_id.'_'.$q_id.''] as $answer){
								$given_answer[]=$answer;
								$given_answer_id[]=$answer;
							}
						}
						//new files
						$filesCount = count($_FILES['answer_'.$phase_id.'_'.$q_id]['name']); 
						for($cnt = 0; $cnt < $filesCount; $cnt++){ 
							$_FILES['file']['name']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['name'][$cnt]; 
							$_FILES['file']['type']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['type'][$cnt]; 
							$_FILES['file']['tmp_name'] = $_FILES['answer_'.$phase_id.'_'.$q_id]['tmp_name'][$cnt]; 
							$_FILES['file']['error']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['error'][$cnt]; 
							$_FILES['file']['size']     = $_FILES['answer_'.$phase_id.'_'.$q_id]['size'][$cnt]; 
							$config = array(
								'upload_path' => "./uploads/property/",
								'allowed_types' => "gif|jpg|png|jpeg|pdf",
								'overwrite' => TRUE,
								'file_name' => time() . '-' . date("Y-m-d").$cnt
							);
							$this->upload->initialize($config);
							if($this->upload->do_upload('file'))
							{
								$upload_data=$this->upload->data();
								$given_answer[]=$upload_data['file_name'];
								$given_answer_id[]=$upload_data['file_name'];
							}
						}
					}
					elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Dropdown' || $formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Radio'){
						$given_answer=$this->db->get_where('source_option_master',['id'=>$formArray['answer_'.$phase_id.'_'.$q_id.'']])->row()->name;
						$given_answer_id=$formArray['answer_'.$phase_id.'_'.$q_id.''];
					}else{
						$given_answer=$formArray['answer_'.$phase_id.'_'.$q_id.''];
						$given_answer_id=$formArray['answer_'.$phase_id.'_'.$q_id.''];
					}
					$answers=[
						'answer_type' => $formArray['answer_type_'.$phase_id.'_'.$q_id],
					];
					$answer_ids=[
						'answer_type' => $formArray['answer_type_'.$phase_id.'_'.$q_id],
					];
					$options=[];
					$option_ids=[];
					if(!empty($formArray['answer_options_'.$phase_id.'_'.$q_id]) && !empty($_FILES['answer_'.$phase_id.'_'.$q_id]['name'])){
						$remain_given_answer=$given_answer;
						foreach($formArray['answer_options_'.$phase_id.'_'.$q_id] as $option){
							if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image Gallery'){
								if(in_array($option,$given_answer)){
									$options[][$option]=true;
								}else{
									unlink('./uploads/property/'.$option);
								}
								$remain_given_answer=array_diff($remain_given_answer,[$option]);
							}
						}
						foreach($remain_given_answer as $ans){
							$options[][$ans]=true;
						}
					}
					elseif(!empty($formArray['answer_options_'.$phase_id.'_'.$q_id])){
						foreach($formArray['answer_options_'.$phase_id.'_'.$q_id] as $option){
							if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Checkbox'){
								$options[][$option]=((in_array($option,$given_answer))?true:false);
							}elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Dropdown' || $formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Radio'){
								$options[][$option]=(($given_answer == $option)?true:false);
							}
							elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image Gallery'){
								if(in_array($option,$given_answer)){
									$options[][$option]=true;
								}else{
									unlink('./uploads/property/'.$option);
								}			
							}
							else{
								if(is_array($given_answer)){
									$options[][$option]=true;
								}else{
									$options[][$given_answer]=true;
								}
							}
						}
					}else{
						if(is_array($given_answer)){
							foreach($given_answer as $option){
								$options[][$option]=true;
							}
						}else{
							$options[][$given_answer]=true;
						}
					}
					if(!empty($formArray['answer_option_ids_'.$phase_id.'_'.$q_id]) && !empty($_FILES['answer_'.$phase_id.'_'.$q_id]['name'])){
						foreach($formArray['answer_option_ids_'.$phase_id.'_'.$q_id] as $option_id){
							if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image Gallery'){
								if(in_array($option,$given_answer)){
									$option_ids[][$option_id]=true;
								}else{
									unlink('./uploads/property/'.$option);
								}
							}
						}
						foreach($given_answer as $ans){
							if(!in_array($ans,$option_ids)){
								$option_ids[][$ans]=true;
							}
						}
					}
					elseif(!empty($formArray['answer_option_ids_'.$phase_id.'_'.$q_id])){
						foreach($formArray['answer_option_ids_'.$phase_id.'_'.$q_id] as $option_id){
							if($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Checkbox'){
								$option_ids[][$option_id]=((in_array($option_id,$given_answer_id))?true:false);
							}elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Dropdown' || $formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Radio'){
								$option_ids[][$option_id]=(($given_answer_id == $option_id)?true:false);
							}
							elseif($formArray['answer_type_'.$phase_id.'_'.$q_id] == 'Image Gallery'){
								if(in_array($option_id,$given_answer)){
									$option_ids[][$option_id]=true;
								}else{
									if(!empty($_FILES['answer_'.$phase_id.'_'.$q_id]['name'])){
										$option_ids[][$option_id]=true;
									}
								}
							}
							else{
								if(is_array($given_answer_id)){
									$option_ids[][$option_id]=true;
								}else{
									$option_ids[][$given_answer]=true;
								}
							}
						}
					}else{
						if(is_array($given_answer_id)){
							foreach($given_answer_id as $option){
								$option_ids[][$option]=true;
							}
						}else{
							$option_ids[][$given_answer_id]=true;
						}
					}
					$answers['options'] = $options;
					$answer_ids['options'] = $option_ids;
					$data=[
						'property_id' => $id,
						'phase_id' =>  $phase_id,
						'question_id' => $q_id,
						'answer_ids' => json_encode($answer_ids),
						'question' => $formArray['question_'.$phase_id][$i],
						'answers' => json_encode($answers)
					];
					$this->db->insert('tb_property_question_answer',$data);
					$i++;
				}	
			  }
			}
		  }
		return true;
	}
	
	
	//fetch Question
	function getQuestions($mastet_id,$category_id,$subcategory_id,$phase_id){
		$this->db->where('master_id',$mastet_id);
		$this->db->where('find_in_set("'.$category_id.'", category_ids) <> 0');
		$this->db->where('find_in_set("'.$subcategory_id.'", sub_category_ids) <> 0');
		$this->db->where('phase_id',$phase_id);
		$data = $this->db->get('tb_form_master')->row();
		$question_list=[];
		if($data != null){
			$question_ids=explode(',',$data->question_ids);
			if(!empty($question_ids)){
				$this->db->where_in('id',$question_ids);
				$question_list=$this->db->get('tb_question_master')->result_array();
			}
		}
		return $question_list;
	}
	//edit question
	function fetchQuestions($property_id, $phase_id) {
		$this->db->select('*');
		$this->db->from('tb_property_question_answer');
		$this->db->where('property_id', $property_id);
		$this->db->where('phase_id', $phase_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	function update_status($id,$status){
		return $this->db->update($this->db_name,['status'=>$status],['id'=>$id]);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prosubcategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Prosubcategory_model','prosub');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');

	}

	public function index()
	{		
		$data['page_name'] = 'property_subcat_view';
		$data['subcategory'] = $this->prosub->all();
		$data['category'] = $this->prosub->getCategory();
		$this->load->view('admin/index',$data);
	}

	public function all()
	{
		$subcategory = $this->prosub->all();
		$result = array('data'=>[]);
		$result = array();
		$i=1;
		foreach ($subcategory as $value) { 
			$this->db->where('id',$value['property_category_id']);
			$q = $this->db->get('tb_property_category')->row();
			$button = '<a href="'.base_url('admin/prosubcategory/edit/' .$value['id']).'" class="action-icon edit-btn" data-id="'.$value['id'].'" data-bs-toggle="modal" data-bs-target="#prosubcategoryedit-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/prosubcategory/delete/' .$value['id']).'" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
				$q->name,
				$value['name'],
				date('d M Y h:i:s a',strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	
	public function store()
	{

		$this->form_validation->set_rules('name', 'Property Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['property_category_id'] = $this->input->post('property_category_id');
			$formArray['name'] = $this->input->post('name');
			$formArray['status'] = $this->input->post('status');
		
			$response = $this->prosub->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Property Sub Category Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/prosubcategory/');
		}
	}

	public function edit($id)
	{
		$data = $this->prosub->getProsubcategory($id);
		echo json_encode($data);
	}

	public function update($id)
	{	
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		$response = $this->prosub->updaterecords($id,$data);
		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Property Sub Category Updated Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}
	}
	
	public function delete($id)
	{
		$response = $this->prosub->delete($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Property Sub Category Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/prosubcategory/');
		

	}
	
}

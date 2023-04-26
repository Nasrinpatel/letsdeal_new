<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Area_model','ar');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');

	}

	public function index()
	{		
		$data['page_name'] = 'area_view';
		$data['areas'] = $this->ar->all();
		$data['cites'] = $this->ar->getCity();
		$this->load->view('admin/index',$data);

	}
	public function all()
	{
		$areas = $this->ar->all();
		$result = array('data'=>[]);
		$result = array();
		$i=1;
		foreach ($areas as $value) { 
			$button = '<a href="'.base_url('admin/area/edit/' .$value['id']).'" class="action-icon edit-btn" data-id="'.$value['id'].'" data-bs-toggle="modal" data-bs-target="#areaedit-modal"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="'.base_url('admin/area/delete/' .$value['id']).'" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
			$result['data'][] = array(
				$i++,
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

		$this->form_validation->set_rules('name', 'Area Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArray['city_id'] = $this->input->post('city_id');
			$formArray['name'] = $this->input->post('name');
			$formArray['status'] = $this->input->post('status');
		
			$response = $this->ar->saverecords($formArray);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Area Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/area/');
		}
	}

	public function edit($id)
	{
		$data = $this->ar->getArea($id);
		echo json_encode($data);
	}

	public function update($id)
	{	
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		$response = $this->ar->updaterecords($id,$data);
		if ($response == true) {
			echo json_encode(array('success'=>true,'message'=>'Area Updated Successfully.'));
		} else {
			echo json_encode(array('success'=>false,'message'=>'Something went wrong. Please try again'));
		}
	}
	
	public function delete($id)
	{
		$response = $this->ar->delete($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Area Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/area/');
		

	}
	//import excel For Area
	public function area_spreadsheet_import()
	{
		$upload_file=$_FILES['upload_file']['name'];
		$city_id=$_POST['city_id'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$validation_error=false;
			$data=array();
			$validate_data=[];
			for ($i=1; $i < $sheetcount; $i++) { 
				$name=$sheetdata[$i][0];
			
				
				$data[]=$validate_data=array(
				
					'city_id'	=>$city_id,
					'name'		=>$name,
					'status'		=>1
					
				);
				$this->form_validation->set_data($validate_data);
				$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
				if (!$this->form_validation->run('area_import_excel')) //validation success 
				{
					$validation_error=true;
					
				}
			}
			if($validation_error == false){
				$inserdata=$this->ar->insert_batch($data);
				if($inserdata)
				{
					$this->session->set_flashdata('success','Successfully Imported');
					redirect('admin/area/');
				} else {
					$this->session->set_flashdata('error','Data Not uploaded. Please Try Again.');
					redirect('admin/area/');
				}	
			}else{
				$data['page_name'] = 'area_view';	
       			$this->load->view('admin/index',$data);
			}			
		}
	}
}
